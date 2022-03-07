<?php

namespace App\Models\Facade;

use Illuminate\Support\Facades\DB;

class TagsDB
{
    public static function combo()
    {
        return DB::table('tags')
            ->orderBy('nome')
            ->get([
                'id as value',
                'nome as text'
            ]);
    }
}
