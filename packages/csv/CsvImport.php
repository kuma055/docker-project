<?php

namespace Packages\csv;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class CsvImport
{
    private $index = [], $header = [], $bodies = [];

    public function __construct()
    {
        Log::debug('fdsfasdfas');

        $filePath = 'database/seeders/users.csv';
        $file = new \SplFileObject($filePath);
        $file->setFlags(
            \SplFileObject::READ_CSV | // CSVとして行を読み込み
            \SplFileObject::READ_AHEAD | // 先読み／巻き戻しで読み込み
            \SplFileObject::SKIP_EMPTY | // 空行を読み飛ばす
            \SplFileObject::DROP_NEW_LINE // 行末の改行を読み飛ばす
        );
        foreach ($file as $key => $line) {
            mb_convert_variables('UTF-8', 'sjis-win, MS932', $line);
            if ($key === 0) {
                $this->header = $line;
                continue;
            }
            $this->bodies[] = new Body($line);
        }
        foreach ($this->header as $key => $header) {
            $this->index[] = $key;
        }
//        DB::table('users')->insert();
//        var_dump($collect);
    }

    public function header(): Header
    {
        return new Header($this->header);
    }

    public function body(): array
    {
        return $this->bodies;
    }

    public function index(): Index
    {
        return new Index($this->index);
    }
}
