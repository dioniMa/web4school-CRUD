<?php

namespace App\Services;
use App\Models\User;
use Dotenv\Validator;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserService
{


    protected $userRepository;
    public function _construct(UserRepos $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function saveUserData($data){
        $validator= Validator::make($data,[
            //cfare na kerkohet
        ]);
        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());

        }
        $result= $this->userRepository->save($data);
        return $result;

    }
    public static function createData(Request $request)
    {
        return User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'=> $request->input('role'),
            'class_id'=>null,
        ]);
    }
}
