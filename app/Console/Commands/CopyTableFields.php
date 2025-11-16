<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CopyTableFields extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products 
    {--since= : Timestamp terakhir sinkronisasi (format: Y-m-d H:i:s)} 
    {--chunk=100 : Jumlah data per batch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $chunkSize = (int) $this->option('chunk');
        $syncFile = base_path('.last_sync');
        $lastSync = File::exists($syncFile) ? trim(File::get($syncFile)) : null;

        $query = DB::connection('local_sumber')
            ->table('tblbarang as b')
            ->join('tblpersediaan as p', 'b.kdBarang', '=', 'p.kdPersediaan')
            ->select([
                'b.kdBarang',
                'b.ktgBarang',
                'b.nmBarang',
                'b.hrgJual',
                'b.merek',
                'p.stokPersediaan',
                'b.updated_at',
            ])
            ->orderBy('b.updated_at');

        if ($lastSync) {
            $query->where('b.updated_at', '>', $lastSync);
            $this->info("Sinkronisasi sejak: {$lastSync}");
        }

        $latestSyncTime = now()->format('Y-m-d H:i:s');

        $query->chunk($chunkSize, function ($rows) use ($latestSyncTime) {
            foreach ($rows as $row) {
                $data = [
                    'category_id' => $row->ktgBarang,
                    'name'        => $row->nmBarang,
                    'price'       => $row->hrgJual,
                    'brand_id'    => $row->merek,
                    'slug'        => Str::slug($row->nmBarang),
                    'stock'       => $row->stokPersediaan,
                    'updated_at'  => now(),
                ];

                $existing = DB::connection('local')->table('products')
                    ->where('sku', $row->kdBarang)
                    ->first();

                $action = $existing ? 'update' : 'insert';

                if ($existing) {
                    DB::connection('local')->table('products')
                        ->where('sku', $row->kdBarang)
                        ->update($data);
                } else {
                    DB::connection('local')->table('products')->insert(array_merge([
                        'sku' => $row->kdBarang,
                        'created_at' => now(),
                    ], $data));
                }

                DB::connection('local')->table('sync_logs')->insert([
                    'sku' => $row->kdBarang,
                    'action' => $action,
                ]);

                $this->info("{$action}: {$row->kdBarang} - {$row->nmBarang}");
            }
        });

        File::put($syncFile, $latestSyncTime);
        $this->info("Sinkronisasi selesai. Waktu terakhir disimpan: {$latestSyncTime}");
    }
}
