<?php

namespace Packages\csv;

class Header
{
    public function __construct(private array $header)
    {
    }

    public function get(int $key)
    {
        if (!array_key_exists($key, $this->header)) {
            throw new \Exception();
        }
        return $this->header[$key];
    }

    public function toArray(): array
    {
        return $this->header;
    }
}
