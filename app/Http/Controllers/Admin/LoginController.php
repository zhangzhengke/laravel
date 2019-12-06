<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
require_once 'resources/org/code/Code.class.php';
class LoginController extends CommonController
{
    //
    public function login(){
    	if($input = Input::all()){
    		$code = new \Code;
    		$_code = $code->get();
    		//echo session('msg');die;
    		if(strtoupper($input['code']) != $_code){

    			return back()->with('msg','验证码错误');
    		
    		}
    		$user = User::where('username', $input['username'])->first();

            if($user != null  && Crypt::decrypt($user->password) == $input['password']){
                session(['user'=>$user]);
                return redirect("admin/index");
            }else{
                return back()->with('msg','用户名或密码错误');
            }
    	}else{
            
    		return view('admin.login');
    	}
    	
    }

    public function code(){
    	$code = new \Code;
    	$code->make();
        //$code = Crypt::encrypt(123456);
        //echo $code;
    }
}
