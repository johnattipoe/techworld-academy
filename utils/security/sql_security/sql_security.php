<?php
/**
 * SQL Injection Protection Library
 * Secure database query helpers
 */

class SQLSecurity {
    /**
     * Escape string for SQL query (fallback)
     */
    public static function escape($value, $pdo = null) {
        if ($pdo) {
            return $pdo->quote($value);
        }
        return addslashes($value);
    }
    
    /**
     * Validate table name (prevent SQL injection in dynamic table names)
     */
    public static function validateTableName($tableName) {
        // Only allow alphanumeric and underscores
        return preg_match('/^[a-zA-Z0-9_]+$/', $tableName);
    }
    
    /**
     * Validate column name
     */
    public static function validateColumnName($columnName) {
        return preg_match('/^[a-zA-Z0-9_]+$/', $columnName);
    }
    
    /**
     * Safe ORDER BY clause
     */
    public static function safeOrderBy($column, $direction = 'ASC') {
        // Validate column name
        if (!self::validateColumnName($column)) {
            throw new Exception('Invalid column name');
        }
        
        // Validate direction
        $direction = strtoupper($direction);
        if (!in_array($direction, ['ASC', 'DESC'])) {
            $direction = 'ASC';
        }
        
        return "$column $direction";
    }
    
    /**
     * Safe LIMIT clause
     */
    public static function safeLimit($limit, $offset = 0) {
        $limit = (int) $limit;
        $offset = (int) $offset;
        
        if ($limit < 0) $limit = 10;
        if ($offset < 0) $offset = 0;
        
        return [$limit, $offset];
    }
    
    /**
     * Prepared statement helper
     */
    public static function preparedQuery($pdo, $query, $params = []) {
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            // Log error but don't expose details
            error_log("SQL Error: " . $e->getMessage());
            throw new Exception("Database query failed");
        }
    }
    
    /**
     * Sanitize search input for LIKE queries
     */
    public static function sanitizeLikeInput($input) {
        // Escape special LIKE characters
        $search = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $input);
        return $search;
    }
}
