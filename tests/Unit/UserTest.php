<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Log;
use Packages\csv\Body;
use Packages\csv\CsvImport;
use Packages\csv\CsvImportDbInsert;
use Packages\csv\Header;
use Packages\helper\Helper;
use Tests\TestCase;

class UserTest extends TestCase
{
    use Helper;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $csvImpoert = new CsvImport();

        $csvImportDbInsert = new CsvImportDbInsert();
        foreach ($csvImpoert->body() as $body) {
            $items = [];
            $csvImportDbInsert->set($csvImpoert->index(), $csvImpoert->header(), $body);
        }
        $csvImportDbInsert->save();
//        dd($items);
        $this->assertTrue(true);
    }
}
