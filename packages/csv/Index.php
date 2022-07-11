<?php

namespace Packages\csv;

class Index
{
    public function __construct(private array $index)
    {
    }

    public function toArray(): array
    {
        return $this->index;
    }
}
