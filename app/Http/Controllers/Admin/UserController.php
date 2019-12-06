<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Http\Model\User;
class UserController extends Controller
{
    //
    public function index(){

	    /*$users = DB::table('user')->get();

    	dd($users);*/

    	/*$pdo = DB::connection()->getPdo();

    	dd($pdo);*/
    
    	$user = User::where('id',1)->get();

    	dd($user);

    	return view('welcome');
	}
}

