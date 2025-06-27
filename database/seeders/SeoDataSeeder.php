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
                'seo_description' => "Проверить пропуск на МКАД/ТТК/СК по гос номеру автомобиля можно на нашем сайте за 20 секунд. Вы получите детальную информацию о всех выданных пропуска на указанный ГРЗ",
                'page_title' => "",
            ],
        ];

        DB::table("seo_data")->insert($data);
    }
}
