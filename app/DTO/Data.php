<?php

namespace App\DTO;

use ReflectionClass;
use ReflectionProperty;


abstract class Data
{
    /**
     * @return static[]
     */
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $props = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        $data = [];

        foreach ($props as $prop) {
            $propName = $prop->getName();
            $propValue = $this->$propName;

            if (is_array($propValue)) {
                $data[$propName] = [];
                foreach ($propValue as $item) {
                    if ($item instanceof Data)
                        $data[$propName][] = $item->toArray();
                    else
                        $data[$propName][] = $item;
                }
            } elseif ($propValue instanceof Data)
                $data[$propName] = $propValue->toArray();
            else
                $data[$propName] = $propValue;
        }
        return $data;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }


}