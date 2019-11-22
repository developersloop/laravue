<?php


namespace App\Http\Controllers\Api;

use App\Http\Requests\UsersRequest;
use App\User;
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

    public function store(UsersRequest $request)
    {
        $inputs = $request->all();
        try {
               $users = User::create($inputs);
               return ['error'=>false, 'message' => 'Criado com Sucesso'];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'status' => 500,
                'message' => $th->getMessage()
            ];
        }

    }
}



?>
