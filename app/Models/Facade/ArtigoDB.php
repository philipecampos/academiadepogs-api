<?php

namespace App\Models\Facade;

use Illuminate\Support\Facades\DB;

class ArtigoDB
{
    public static function grid(\stdClass $p)
    {
        $sql = DB::table('artigos as a')
            ->groupBy('a.id')
            ->groupBy('t.nome')
            ->limit(200);

        if (isset($p->titulo)) {
//            $sql->where('a.titulo', 'like', "%{$p->titulo}%");
            $sql->whereFullText('artigo', $p->titulo);
        }

//        $sql->leftJoin('artigo_tag as at', 'at.artigos_id', '=', 'a.id')
//            ->leftJoin('tags as t', 't.id', '=', 'at.tags_id');

        if (isset($p->tags)) {
            $sql->whereIn('at.tags_id', $p->tags);
        }

        return $sql->get([
            'a.id',
            'a.titulo',
            'a.hash',
            't.nome as tag',
            DB::raw("to_char(a.created_at, 'DD/MM/YYYY HH24:MI:SS') as dt_cadastro")
        ]);
    }
}
