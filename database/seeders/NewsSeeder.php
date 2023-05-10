<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert([
            'title' => 'Пингвины объявили импичмент президенту Арктики',
            'text' => "Вчера в 17:00 по арктическому времени парламент Арктики объявил импичмент Гусу Серому. Ему вменяется превышение должностных полномочий."
        ]);
    }
}
