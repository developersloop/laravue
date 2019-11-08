<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class UsersController{

    public function index()
    {
        $users = [];

        $users = DB::table('users')
                     ->select('id','name','email')
                     ->get();



        return $users->toArray();
    }
}



?>
