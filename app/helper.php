<?php

if(!function_exists('pr')){
    function pr ($data){
        echo '<pre>';
        print_r($data);  
        echo '</pre>';
    }
}

if(!function_exists('formated_date')){
    function formated_date ($date,$format){
        $formatedData = date($format,strtotime($date));
        return $formatedData;
    }
}

if(!function_exists('isLogin')){
    function isLogIn(){
        if(!Empty(session('user'))){
                return true;
        }
        return false;
    }
}

