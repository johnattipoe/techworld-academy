<?php
/**
 * File Upload Security Library
 * Secure file upload validation and handling
 */

class FileUploadSecurity {
    // Allowed MIME types
    private static $allowedMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-powerpoint',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/zip',
        'text/plain'
    ];
    
    // Allowed extensions
    private static $allowedExtensions = [
        'jpg', 'jpeg', 'png', 'gif', 
        'pdf', 'doc', 'docx', 
        'ppt', 'pptx', 
        'zip', 'txt'
    ];
    
    /**
     * Validate uploaded file
     */
    public static function validateUpload($file, $maxSize = 10485760) {
        $errors = [];
        
        // Check if file was uploaded
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            $errors[] = 'No file uploaded or invalid upload';
            return ['valid' => false, 'errors' => $errors];
        }
        
        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'Upload error: ' . self::getUploadErrorMessage($file['error']);
            return ['valid' => false, 'errors' => $errors];
        }
        
        // Check file size
        if ($file['size'] > $maxSize) {
            $sizeMB = round($maxSize / 1048576, 2);
            $errors[] = "File too large. Maximum size: {$sizeMB}MB";
        }
        
        // Get file extension
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        // Validate extension
        if (!in_array($extension, self::$allowedExtensions)) {
            $errors[] = 'File type not allowed. Allowed types: ' . implode(', ', self::$allowedExtensions);
        }
        
        // Validate MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mimeType, self::$allowedMimeTypes)) {
            $errors[] = 'Invalid file type detected';
        }
        
        // Check for executable content in images
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (!self::isValidImage($file['tmp_name'])) {
                $errors[] = 'Invalid or corrupted image file';
            }
        }
        
        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'extension' => $extension,
            'mime_type' => $mimeType,
            'size' => $file['size']
        ];
    }
    
    /**
     * Validate image file
     */
    private static function isValidImage($filePath) {
        $imageInfo = @getimagesize($filePath);
        return $imageInfo !== false;
    }
    
    /**
     * Generate secure filename
     */
    public static function generateSecureFilename($originalName) {
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $randomName = bin2hex(random_bytes(16));
        return $randomName . '.' . $extension;
    }
    
    /**
     * Get upload error message
     */
    private static function getUploadErrorMessage($errorCode) {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize directive',
            UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE directive',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
        ];
        
        return $errors[$errorCode] ?? 'Unknown upload error';
    }
    
    /**
     * Secure file move
     */
    public static function secureMove($file, $destination, $newFilename = null) {
        if (!is_uploaded_file($file['tmp_name'])) {
            throw new Exception('Invalid file upload');
        }
        
        // Generate secure filename if not provided
        if ($newFilename === null) {
            $newFilename = self::generateSecureFilename($file['name']);
        }
        
        // Ensure destination directory exists
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        
        $targetPath = rtrim($destination, '/') . '/' . $newFilename;
        
        // Move file
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Set secure permissions
            chmod($targetPath, 0644);
            return $targetPath;
        }
        
        throw new Exception('Failed to move uploaded file');
    }
    
    /**
     * Scan file for malware (basic check)
     */
    public static function basicMalwareScan($filePath) {
        $content = file_get_contents($filePath);
        
        // Check for common malware signatures
        $signatures = [
            'eval(', 'base64_decode(', 'system(', 'exec(',
            'shell_exec(', 'passthru(', 'proc_open(',
            '<?php', '<%', '<script'
        ];
        
        foreach ($signatures as $signature) {
            if (stripos($content, $signature) !== false) {
                return false;
            }
        }
        
        return true;
    }
}
