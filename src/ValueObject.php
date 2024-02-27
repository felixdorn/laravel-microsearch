<?php

namespace Felix\Microsearch;

class ValueObject
{
    public static ?array $array = null;

    public function __construct(protected array|object $data)
    {
    }

    /**
     * @param array|null $array
     */
    public static function setArray(?array $array): void
    {
        self::$array = $array;
    }

    public function keys(): array
    {
        return array_keys(
            $this->data()
        );
    }

    public function data(): array
    {
        if (static::$array) {
            return static::$array;
        }

        if (is_array($this->data)) {
            return static::$array = $this->data;
        }

        return static::$array = get_object_vars($this->data);
    }


}
