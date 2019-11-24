<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
                    ->get();


         return view('Admin.Users.manager',
                                    compact(
                                            'data'
                                            )
                    );
    }

    public function create()
    {
         return view('Admin.Users.create');
    }

    public function store(Request $request)
    {
          dd($request->all());
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
