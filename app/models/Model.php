<?php

namespace App\models;

use App\Database;

abstract class Model
{
    protected static string $table;

    /**
     * @return static[]
     */
    public static function all(): array
    {
        $db = Database::getInstance();
        return self::_toObject($db->select(static::$table));
    }

    /**
     * @param array $values
     * @return static[]
     */
    private static function _toObject(array $values): array
    {
        $objects = [];
        foreach ($values as $result) {
            $object = new static();
            foreach ($result as $key => $value) {
                $object->$key = $value;
            }
            $objects[] = $object;
        }

        return $objects;
    }

    public static function create(array $data): static|false
    {
        $db = Database::getInstance();
        if ($id = $db->insert(static::$table, $data))
            return static::byId($id);
        return false;
    }

    /**
     * @param string $field
     * @param string $operator
     * @param string $value
     * @return static[]
     */
    public static function find(string $field, string $operator, string $value): array
    {
        $db = Database::getInstance();
        return self::_toObject($db->select(static::$table, "$field $operator ?", [$value]));
    }

    public static function byId(int $id): static|false
    {
        return static::find('id', '=', $id)[0] ?? false;
    }
}