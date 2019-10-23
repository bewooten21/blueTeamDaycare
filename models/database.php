<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=teams';
    private static $username = 'root';
    private static $password = '';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                $error_message = $e->getMessage();
                include('../model/database_error.php');
                exit();
            }
        }
        return self::$db;
    }

}





?>
