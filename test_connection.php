<?php
require_once __DIR__ . '/db.php'; // Ensure the correct path is used

// If Database class is not defined in db.php, define it here as an example:
if (!class_exists('Database')) {
    class Database {
        private static $instance = null;
        private $connection;

        private function __construct() {
            $this->connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        }

        public static function getInstance() {
            if (self::$instance === null) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public function getConnection() {
            return $this->connection;
        }
    }
}

try {
    $db = Database::getInstance()->getConnection();
    echo json_encode(["message" => "Database connection successful!"]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
