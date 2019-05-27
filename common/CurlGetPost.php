<?php
class Test{
    public function curl_order($url,$data='',$method='POST',$ssl = false)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$method);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        if($ssl) {
            curl_setopt($ch,CURLOPT_SSLCERT,$this -> sslcert_path);
            curl_setopt($ch,CURLOPT_SSLKEY,$this -> sslkey_path);
        }
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_AUTOREFERER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result  = curl_exec($ch);
        return $result;
    }
    public function curl_get_https($url)
    {
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_HEADER,1);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); // 跳过证书检查
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);  // 从证书中检查SSL加密算法是否存在
        $tmpInfo = curl_exec($curl);     //返回api的json对象
        $tmpInfo = json_decode($tmpInfo,true);
        //关闭URL请求
        curl_close($curl);
        return $tmpInfo;    //返回json对象
    }
}