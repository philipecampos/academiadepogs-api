<?php

namespace App\Http\Controllers;

use App\Models\Entity\Artigos;
use App\Models\Entity\ArtigoTag;
use App\Models\Facade\ArtigoDB;
use App\Models\Facade\TagsDB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtigosController extends Controller
{
    public function create()
    {
        $tags = TagsDB::combo();

        return response(compact('tags'));
    }

    public function index()
    {
        $tags = TagsDB::combo();
        $artigos = ArtigoDB::grid(new \stdClass());

        return response(compact('tags', 'artigos'));
    }

    public function grid(Request $request)
    {
        $p = (object)$request->all();
        return response(ArtigoDB::grid($p));
    }

    public function show($hash)
    {
        if (Str::isUuid($hash)) {
            return Artigos::where('hash', $hash)
                ->latest()
                ->first();
        }

        return response('Essa Pog ainda não existe. Braba demais.', 404);
    }

    public function store(Request $request)
    {
        $p = (object)$request->all();

        $oArtigo = Artigos::create([
            'hash' => Str::uuid(),
            'titulo' => $p->titulo,
            'artigo' => $p->artigo,
        ]);

        if (isset($p->tags) && is_array($p->tags) && !empty($p->tags)) {
            foreach($p->tags as $tag) {
                ArtigoTag::create([
                    'artigos_id' => $oArtigo->id,
                    'tags_id' => $tag
                ]);
            }
        }


        return response('salvo com sucesso');
    }
}
