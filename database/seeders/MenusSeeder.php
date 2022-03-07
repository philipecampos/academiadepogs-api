<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agora = date('Y-m-d H:i:s');
        $items = [
            [
                'nome' => 'Docker',
                'icone' => 'mdi-docker',
                'menu_pai' => null,
                'created_at' => $agora,
                'updated_at' => $agora
            ],
            [
                'nome' => 'Git',
                'icone' => 'mdi-git',
                'menu_pai' => null,
                'created_at' => $agora,
                'updated_at' => $agora
            ],
            [
                'nome' => 'Laravel',
                'icone' => 'mdi-laravel',
                'menu_pai' => null,
                'created_at' => $agora,
                'updated_at' => $agora
            ],
            [
                'nome' => 'Linux',
                'icone' => 'mdi-penguin',
                'menu_pai' => null,
                'created_at' => $agora,
                'updated_at' => $agora
            ],
            [
                'nome' => 'Postgres',
                'icone' => 'mdi-database',
                'menu_pai' => null,
                'created_at' => $agora,
                'updated_at' => $agora
            ],
            [
                'nome' => 'Vue',
                'icone' => 'mdi-vuejs',
                'menu_pai' => null,
                'created_at' => $agora,
                'updated_at' => $agora
            ],
        ];

        DB::table('menus')->insert($items);
    }
}
