<?php

namespace App\Models\Facade;

use Illuminate\Support\Facades\DB;

class MenuDB
{
    public static function menuPrincipal()
    {
        $pais = DB::table('menus')
            ->whereNull('menu_pai')
            ->get([
                'id',
                'icone',
                'nome'
            ]);

        $filhos = DB::table('artigos')
            ->whereIn('menu_id', $pais->pluck('id'))
            ->get([
                'hash',
                'titulo',
                'menu_id as id'
            ]);

        //agrupa todos os filhos de um mesmo pai no mesmo array
        $irmaosUnidos = $filhos->groupBy('id');

        //junta todos os filhos e pais no mesmo array
        $menu = $pais->mapToGroups(function ($item) use ($irmaosUnidos) {
            //cria uma chave "filhos" no array pai
            $item->filhos = $irmaosUnidos->get($item->id);

            //devolve um novo array com toda família junta =)
            return [$item];//tem que ser um array de array. É sintaxe do Laravel =/
        });

        //método acima gera a informação necessária em um array de array
        //abaixo o array externo é removido passando a ser um array simples
        return $menu->first();




//        return array_merge($raiz->all(), ($filhos->groupBy('id'))->all());

    }
}
