<?php

namespace Felix\Microsearch;

class Index
{
    protected array $vocabulary = [];

    private int $id = 0;

    public function __construct(
        protected IndexConfiguration $config
    )
    {
    }

    public function add(array...$valueObject)
    {
        foreach ($valueObject as $object) {
            $id = ++$this->id;
            preg_match_all(
                '/[\p{L}\p{N}]+/ui',
                $object[$this->config->key],
                $words
            );

            foreach ($words[0] as $word) {
                $word = strtolower($word);
                if (!isset($this->vocabulary[$word])) {
                    $this->vocabulary[$word] = [];
                }

                $this->vocabulary[$word][] = $id;
            }
        }
    }

    public function search(string $term)
    {
        dd($this->vocabulary);
    }

}
