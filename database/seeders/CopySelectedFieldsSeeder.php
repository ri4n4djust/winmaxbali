<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CopySelectedFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = DB::connection('local_sumber')
            ->table('tblbarang')
            ->join('tblpersediaan', 'tblbarang.kdBarang', 'tblpersediaan.kdPersediaan')
            ->select('kdBarang', 'ktgBarang', 'nmBarang', 'hrgJual', 'deskripsi', 'merek', 'stokPersediaan') // pilih field yang diinginkan
            ->get();

        foreach ($data as $row) {
            DB::connection('local')
                ->table('products')
                ->insert([
                    'sku' => $row->kdBarang,
                    'category_id' => $row->ktgBarang,
                    'name' => $row->nmBarang,
                    'price' => $row->hrgJual,
                    'description' => $row->deskripsi,
                    'brand_id' => $row->merek,
                    'slug' => Str::slug($row->nmBarang),
                    'stock' => $row->stokPersediaan,
                ]);
        }

        $this->command->info('Data berhasil disalin!');


    }
}
