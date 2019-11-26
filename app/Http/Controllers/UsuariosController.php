<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {

         return view('Admin.Users.manager');
    }

    public function create()
    {
         return view('Admin.Users.create');
    }


    public function edit(){}

}
