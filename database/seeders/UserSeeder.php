<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = __DIR__.'/data/users.csv';
        $file = new \SplFileObject($filePath);
        $file->setFlags(
            \SplFileObject::READ_CSV | // CSVとして行を読み込み
            \SplFileObject::READ_AHEAD | // 先読み／巻き戻しで読み込み
            \SplFileObject::SKIP_EMPTY | // 空行を読み飛ばす
            \SplFileObject::DROP_NEW_LINE // 行末の改行を読み飛ばす
        );
        $header = null;
        $bodies = [];
        foreach ($file as $key => $line) {
            mb_convert_variables('UTF-8', 'sjis-win, MS932', $line);
            if ($key === 0) {
                $header = $line;
                continue;
            }
            $bodies[] = $line;
        }
        $this->map($header, $bodies);
    }

    private function map($header, $bodies)
    {
        foreach ($bodies as $body) {
            $values = collect();
            foreach ($header as $index => $headerName) {
                $value = [$headerName => $body[$index]];
                $values->put($headerName, $body[$index]);
            }
            DB::table('users')->insert($values->toArray());
        }
        dd($header);
    }
}
