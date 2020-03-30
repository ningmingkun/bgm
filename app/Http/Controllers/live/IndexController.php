<?php
namespace App\Http\Controllers\live;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Cookie;
use App\Model\Gift;

class IndexController extends Controller
{
    public function index()
    {
        $username = session('username');
        $image = Gift::get();
        return view('live/index',['username'=>$username,'image'=>$image]);
    }
}
