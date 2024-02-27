<?php

namespace Felix\Microsearch;

class IndexConfiguration
{

    public function __construct(
        public string $name,
        public string $key

    )
    {
    }

    public static function create(string $name, string $key)
    {
        return new self($name, $key);
    }
}
