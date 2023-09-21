<?php

namespace App;

use mysqli;
use mysqli_stmt;

class Database
{
    private static ?Database $instance = null;
    private ?mysqli $connection;

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->connection = mysqli_connect($_ENV["DB_HOST"] . ":" . $_ENV["DB_PORT"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
    }

    public function insert(string $table, array $data): int|false
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->stmt($sql);
        if (!$stmt) return false;
        $this->bindParams($stmt, $data);
        if ($stmt->execute())
            return mysqli_insert_id($this->connection);
        return false;
    }

    public function select($table, $where = '', $params = []): array
    {
        $sql = "SELECT * FROM $table";
        if ($where != '') {
            $sql .= " WHERE $where";
        }
        $stmt = $this->stmt($sql);
        if ($params) {
            $this->bindParams($stmt, $params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function stmt(string $query): false|mysqli_stmt
    {
        return $this->connection->prepare($query);
    }

    private function bindParams(mysqli_stmt $stmt, array $data): void
    {
        $stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));
    }
}