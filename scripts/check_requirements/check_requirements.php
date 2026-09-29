<?php
echo "TechWorld Database Setup Check\n";
echo "===========================\n\n";

// Check MySQL Server
echo "Checking MySQL Server...\n";
try {
    $conn = new PDO("mysql:host=127.0.0.1", "root", "");
    echo "✓ MySQL Server is running and accessible\n";
    
    // Check if database exists
    $databases = $conn->query("SHOW DATABASES LIKE 'techworld'")->fetchAll();
    if (empty($databases)) {
        echo "× Database 'techworld' does not exist\n";
        echo "To create database:\n";
        echo "1. Connect to MySQL as root\n";
        echo "2. Run: CREATE DATABASE techworld;\n";
        echo "3. Run: GRANT ALL PRIVILEGES ON techworld.* TO 'root'@'localhost';\n";
        echo "4. Run: FLUSH PRIVILEGES;\n";
    } else {
        echo "✓ Database 'techworld' exists\n";
    }
    
} catch (PDOException $e) {
    echo "× MySQL Server connection failed:\n";
    echo "  " . $e->getMessage() . "\n\n";
    echo "Please ensure:\n";
    echo "1. MySQL Server is installed\n";
    echo "2. MySQL Service is running\n";
    echo "3. Root user can connect without password (or update config.php)\n\n";
    
    echo "Installation Instructions:\n";
    echo "1. Download MySQL Installer from: https://dev.mysql.com/downloads/installer/\n";
    echo "2. Run installer and follow setup wizard\n";
    echo "3. Choose 'Server only' installation\n";
    echo "4. Start MySQL service\n";
}

// Check PHP Configuration
echo "\nChecking PHP Configuration...\n";
if (extension_loaded('pdo_mysql')) {
    echo "✓ PDO MySQL extension is loaded\n";
} else {
    echo "× PDO MySQL extension is not loaded\n";
    echo "Enable it in php.ini: extension=pdo_mysql\n";
}

// Check File Permissions
echo "\nChecking File Permissions...\n";
$upload_dir = realpath(__DIR__ . '/../uploads');
if (is_dir($upload_dir) && is_writable($upload_dir)) {
    echo "✓ Upload directory is writable\n";
} else {
    echo "× Upload directory is not writable or doesn't exist\n";
    echo "Create directory and set permissions:\n";
    echo "mkdir $upload_dir\n";
    echo "chmod 755 $upload_dir\n";
}

echo "\nNext Steps:\n";
echo "1. Address any issues shown above\n";
echo "2. Run create_api_tables.php to create required tables\n";
?>