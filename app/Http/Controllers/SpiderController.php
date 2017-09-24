<?php

namespace App\Http\Controllers;

use EntrustUserTrait; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Role;
use App\Permission;
use App\User;
header( "Content-type:text/html;Charset=utf-8" );



class SpiderController extends Controller
{
    public function spider(Request $request){
        $stu_id = $request->stu_id;
        $user = \DB::select('select * from stukbs where stuid = ?', [$stu_id]);
        if($user){
        echo "查询结果如下:";
        dd($user);
    }else{
        echo "正在爬取数据:";
        $ch = curl_init();
        curl_setopt ( $ch , CURLOPT_USERAGENT ,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.113 Safari/537.36" );
        curl_setopt($ch,CURLOPT_URL,"http://jwzx.cqupt.congm.in/jwzxtmp/kebiao/kb_stu.php?xh=$stu_id");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $content=curl_exec($ch);

        // preg_match_all("/<td rowspan='\d'>(.*?)<\/td>\n<td rowspan='\d'>(.*?)<\/td>\n<td>(.*?)<td>(.*?)<\/td>\n<td rowspan='\d' align='\w+'>(.*?)<\/a><\/td>/",$content,$matchs,PREG_SET_ORDER);
        preg_match_all("/<td rowspan=\"\d\">(.*?)<\/td>\n<td rowspan=\"\d\">(.*?)<\/td><td rowspan=\"\d\" align=\"\w+\">(.*?)<\/td><td rowspan=\"\d\" align=\"\w+\">(.*?)<\/td><td>(.*?)<\/td>\n<td>(.*?)<\/td><td>(.*?)<\/td>/",$content,$matchs,PREG_SET_ORDER);
        if(empty($matchs[0])){
            echo "查询失败，请输入正确的学号";
        }else{
            \DB::insert("insert into stukbs (stuid) values (?) ",
                [$stu_id]);
            for($i=0;$i<count($matchs);$i++){
            $str = "class$i";
            \DB::update("update stukbs set $str=? where stuid = ?",[$matchs[$i][0],$stu_id]);
            }
        }
            
        
        
        
        dd($matchs);
    }
}
    public function spider_index(){
        return view('spider_index');
    }
}
