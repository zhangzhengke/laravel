<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'cate';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    public function getTree($data,$pid=0,$level=0){
    	//var_dump($data);die;
    	static $arr = array();
    	foreach($data as $k=>$v){

    		if($v['cate_pid'] == $pid){
    			
    			$v['level'] = $level;
    			
    			$arr[] = $v;
                $this->getTree($data,$v['cate_id'],$level+1);
    		}
                
    	}
       return $arr;
    }
}
