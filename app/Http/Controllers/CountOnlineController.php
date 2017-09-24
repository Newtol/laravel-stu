<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CountOnlineController extends Controller
{
    public function CountOnline(){
        header("Content-type: text/html; charset=utf-8");
        $user_online = "D:\Program Files (x86)\wamp\www\sample\chap2\online\count.txt";
        touch($user_online);//如果count.txt文件不存在则创建它
        $timeout=30;//30s没动作则认为掉线

        $user_arr = file_get_contents($user_online);
        $user_arr = explode('#',rtrim($user_arr,'#'));//读入文件内容，并以间隔符"#"分隔字符串，重新存入数组

        $temp = array();

        foreach ($user_arr as $value) {
            $user = explode(',', trim($value));
            if(($user[0]!=getenv('REMOTE_ADDR'))&&($user[1]>time())){
                array_push($temp, $user[0].",".$user[1]);
            }
        }//将未超时的用户放入数组

        array_push($temp,getenv('REMOTE_ADDR').",".(time()+($timeout)).'#');
        $user_arr=implode("#", $temp);//保存用户信息


        $fp = fopen($user_online,'w');
        flock($fp,LOCK_EX);
        fputs($fp,$user_arr);
        flock($fp,LOCK_UN);
        fclose($fp);
        echo "当前有".count($temp)."人在线";
   }
}
    