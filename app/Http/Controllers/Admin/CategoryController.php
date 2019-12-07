<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
class CategoryController extends Controller
{
    // admin/category GET 列表
    public function index(){
    	$cates = Category::orderBy('cate_order','asc')->get();

    	$category = new Category();

    	$data = $category->getTree($cates);

    	return view('admin.category.index')->with('cates',$data);
    }
    //admin/category POST
    public function store(){

    }
    //admin/category/create get 添加分类
    public function create(){

    }
    //admin/category/{id} get 显示单个分类信息
    public function show(){

    }
    //admin/category/{id} put 更新分类
    public function update(){

    }
    //admin/category/{id} delete 删除分类
    public function destroy(){

    }
    //admin/category/{id}/edit get 编辑分类
    public function edit(){

    }
    public function  cgorder(){
        $data = Input::all();
        $cate = Category::find($data['cate_id']);
        $cate->cate_order = $data['orderV'];
        $res = $cate->update();
        if($res){
            $info = [
                'status' =>0,
                'msg'=>'分类排序更新成功！',

            ];
        }else{
            $info = [
                'status' =>1,
                'msg'=>'分类排序更新失败！',

            ];
        }
        return $info;
    }
}
