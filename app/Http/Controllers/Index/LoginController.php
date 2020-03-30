<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function loginDo(){
        $data=request()->all();
        $data['user_pwd']=md5($data['user_pwd']);
        $where=[
            ['username','=',$data['username']]
        ];
        $info=Admin::where($where)->first();
        if(!empty($info)){
            if($data['user_pwd']==$info['user_pwd']){
                session(['user'=>$info]);
                return redirect('index/index');
            }else{
                echo '登陆失败';
            }
        }
    }
}
