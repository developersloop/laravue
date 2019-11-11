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

        $artigos = new Artigos();

        $fillable = $artigos->getFillable();

        $fields = [];
        $countFields = count($fields);
        foreach ($fillable as $key => $value) {
            array_push($fields,
                    [
                        "key" => $value,
                        "sortable" => true
                    ]
            );

            if($key == $countFields){
                array_push($fields,
                            [
                                "key" => "Acao",
                                "sortable" => false
                            ]
                    );


            }
        }

        $getFields = json_encode($fields,true);
        dd($fields);

        return view("Admin.artigos.manager",compact(
                                                    'lista',
                                                    'getFields'
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

         return view('Admin.artigos.show',
                                          compact(
                                                    'id'
                                                 )
        );
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
