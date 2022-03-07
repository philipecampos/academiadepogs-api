<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
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
                'nome' => 'docker',
                'icone' => 'mdi-docker',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'nome' => 'git',
                'icone' => 'mdi-git',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'nome' => 'laravel',
                'icone' => 'mdi-laravel',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'nome' => 'linux',
                'icone' => 'mdi-penguin',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'nome' => 'php',
                'icone' => 'mdi-php',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'nome' => 'postgres',
                'icone' => 'mdi-database',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'nome' => 'vue',
                'icone' => 'mdi-vuejs',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
        ];

        DB::table('tags')->insert($items);
    }
}
