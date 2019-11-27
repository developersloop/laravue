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

        $data = DB::table('users')
                     ->select('id','name','email')
                     ->paginate(2);


        $users = array(
            'total' => $data->total(),
            'currentPage' => $data->currentPage(),
            'items' => $data->items(),
            'perPage' => $data->perPage(),
        );

        // dd($users);
        return $users;
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

    public function update($id, UsersRequest $request)
    {
        $inputs = $request->validated();
        try {
                $user = User::find($id)
                              ->update($inputs);
                 return [
                            'erro' => false, 
                            'message' => 'Usário editado com sucesso.'
                        ];
        } catch (\Throwable $th) {
            return [
                        'erro' => false, 
                        'message' => "${th}"
                   ];
        }
    }
}



?>
