<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;

class ArtigosController {

    public function search()
    {
        // $artigos = [];
        $artigos = DB::table('artigos')
                   ->select('id','titulo','descricao')
                   ->get();



        return json_encode($artigos);
    }
}




?>
