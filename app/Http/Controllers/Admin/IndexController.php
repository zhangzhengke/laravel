<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use App\Http\Model\User;

use Illuminate\Support\Facades\Crypt;
Class IndexController extends CommonController{

	public function index(){

		return view('admin.index');
	}

	public function info(){
		return view('admin.info');
	}

	public function loginout(){

		session(['user'=>null]);
		return redirect('admin/login'); 
	}

	public function cgpass(){

		if($input = Input::all()){

			//dd($input);

			$rules = [
				'password' => 'required|between:6,20|confirmed',
			];
			$message = [
				'password.required' =>'新密码不能为空！',
				'password.between' =>'新密码必须在6到20位之间！',
				'password.confirmed'=>'两次密码不一致！',
			];
			$validator = Validator::make($input,$rules,$message);

			if($validator->passes()){
				$user = User::where('username', $input['username'])->first();

				if($user != null){
					$_password = Crypt::decrypt($user->password);
					//dd($_password);
					if($input['password_o'] == $_password){
						$user->password = Crypt::encrypt($input['password']);
						$user->update();

						return back()->withErrors(['errors'=>'密码修改成功！']);
					}else{
						return back()->withErrors(['errors'=>'原密码错误！']);
					}
				}else{
						return back()->withErrors(['errors'=>'用户名不存在！']);
				}
			}else{

				return back()->withErrors($validator);
			}
		}else{

			return view('admin.cgpass');
		}
	}

}