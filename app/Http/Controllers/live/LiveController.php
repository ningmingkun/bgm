<?php
namespace App\Http\Controllers\live;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Cookie;

class LiveController extends Controller
{
    public function reg()
    {
        return view('reg/reg');
    }

    public function reg_do(Request $request)
    {
        $data = $request->input();
        $pwd = md5($data['pwd']);

        if(md5($data['pwd1']) != $pwd){
            echo '确认密码不正确';die;
        }

        $res = User::create([
            'username'=>$data['username'],
            'tel'=>$data['tel'],
            'pwd'=>$pwd
        ]);

        if($res){
            return redirect('live/login');
        }else{
            echo '注册失败';
        }
    }

    public function login()
    {
        return view('login/login');
    }

        public function login_do(Request $request)
    {
        $username = $request->input('username');
        $pwd = $request->input('pwd');
        $pwd = md5($pwd);
        $pwd1 = $request->input('pwd1');

        $info = User::where(['username'=>$username])->first();
        if(empty($info)){
            echo '该用户名没有注册';die;
        }else if($pwd == $info['pwd']){
            if(md5($pwd1) != $pwd){
                echo '确认密码不正确';die;
            }else{
                echo '登陆成功';
                session(['username'=>$info['username']]);
                return redirect('//index');
            }
        }else{
            echo '登陆失败';
        }


    }
}

