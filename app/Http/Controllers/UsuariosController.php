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

         return view('Admin.users.manager',
                                    compact(
                                            'data'
                                            )
                    );
    }

    public function create()
    {

    }

    public function store()
    {

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
