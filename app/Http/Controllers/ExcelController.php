<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use App\User;

class ExcelController extends Controller
{
    public function export(){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['teacher','admin']);
        if($result!==false){
            $info = \DB::select('select * from stuinf');
            foreach ($info as $key => $value) {            
                $export[] = array(                
                    '学号' => $value->stuid,                
                    '班级' => $value->banji,                
                    '年级' => $value->class,                
                    '名字' => $value->name,                           
                );        
            }  
       
            Excel::create('学生信息',function($excel) use ($export){
                $excel->sheet('informations', function($sheet) use ($export){
                    $sheet->rows($export);
                });
            })->export('xls');
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }  
    }
}