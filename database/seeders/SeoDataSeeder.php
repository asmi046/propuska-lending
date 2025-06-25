<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class SeoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'url' => "/",
                'seo_title' => "Проверка пропуска на МКАД (Москва) по номеру машины",
                'seo_description' => "Стоматологическая клиника Dentalica в городе Курск. Все виды стоматологических услуг",
                'page_title' => "",
            ],
        ];

        DB::table("seo_data")->insert($data);
    }
}
