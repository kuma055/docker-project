<?php

namespace Packages\csv;

use DB;

class CsvImportDbInsert
{
    private $items = [];

    public function set(Index $index, Header $header, Body $body)
    {
        if (empty($index->toArray())) return;
        $items = [];
        foreach ($index->toArray() as $index) {
            $key = $header->get($index);
            $value = $body->get($index);
            array_push($items, [$key => $value]);
        }
        $this->items[] = $items;
    }

    public function save()
    {
        if (empty($this->items)) return;
        DB::table('users')->insert($this->items);
    }
}
