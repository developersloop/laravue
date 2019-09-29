<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artigos;

class ArtigosController {

    public function search()
    {
        // $artigos = [];
        $artigos = DB::table('artigos')
                   ->select('id','titulo','descricao')
                   ->get();



        return json_encode($artigos);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        DB::table('artigos')
            ->where('id',$id)
            ->update($inputs);

        return ['error'=>false, 'message' => 'Atualizado com Sucesso'];
    }

    public function store(Request $request)
    {
        $inputs = $request->except(['_token']);
        Artigos::create($inputs);
        return ['error'=>false, 'message' => 'Criado com Sucesso'];
    }


}




?>
