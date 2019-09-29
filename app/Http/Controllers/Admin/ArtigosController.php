<?php

namespace App\Http\Controllers\Admin;

use App\Artigos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = DB::table('artigos')->whereNull('deleted_at')->select('*')->get();
        // dd($artigos);
        $lista = json_encode([
            ["id"=> 1, "titulo"=>"Home","url"=>route('home')],
            ["id" => 2, "titulo" =>"Lista de compras","url"=>""]
        ]);
        // dd($artigos);
        return view("Admin.artigos.manager",compact(
                                                    'artigos',
                                                    'lista'
                                            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('Admin.artigos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }


    public function show($id)
    {
         return view('Admin.artigos.show');
    }


    public function edit($id)
    {

        $data = DB::table('artigos')
                   ->where('id',$id)
                   ->get();

         return view('Admin.artigos.edit',compact('data'));
    }

    public function destroy($id)
    {
        // dd($id);
    }

}
