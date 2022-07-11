<?php

namespace Packages\csv;

use Packages\helper\Helper;

class Body
{
    use Helper;

    public function __construct(private array $body)
    {
    }

    /**
     * @param $index
     * @return mixed
     */
    public function get(int $key)
    {
        if (!array_key_exists($key, $this->body)) {
            throw new \Exception();
        }
        return $this->body[$key];
    }
}
