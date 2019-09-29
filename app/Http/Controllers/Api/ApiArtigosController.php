<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artigos;
use App\Http\Requests\StoreArtigos;
use Carbon\Carbon;

class ArtigosController {

    public function search()
    {
        // $artigos = [];
        $artigos = DB::table('artigos')
                   ->select('id','titulo','descricao')
                   ->whereNull('deleted_at')
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

    public function store(StoreArtigos $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        Artigos::create($inputs);
        return ['error'=>false, 'message' => 'Criado com Sucesso'];
    }

    public function delete($id)
    {
        $findArtigos = DB::table('artigos')
                       ->where('id',$id)
                       ->update(['deleted_at' => Carbon::now()]);

        return ['error'=>false, 'message' => 'Deletedo com Sucesso'];

    }


}




?>
