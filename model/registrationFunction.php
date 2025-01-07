<?php

function nameCheck($name){
    $nameParts = explode(" ", $name);
    if(count($nameParts) >= 2){

        $firstPart = $nameParts[0];
        $secondPart = $nameParts[1];
        if(ctype_alpha($firstPart) && ctype_alpha($secondPart)){
            return true;
        }
        else{
            return false;
        }
    }
}

function usernameChaeck($username){
    $flag = true;
    for($i = 0; $i < strlen($username); $i++){
        $char = $username[$i];

        if (!ctype_alnum($char) && $char !== '.' && $char !== '-' && $char !== '_') {
        $flag = false;
        }
    }
    if($flag){
        return true;
    }
    else {
        return false;
    }
}

function numberCheck($number){
    $flag = false;
    if(strlen($number) == 11){
        if((int)$number[0] == 0 && (int)$number[1] == 1){
            for($i=2; $i<strlen($number); $i++){
                if(is_numeric($number[$i])){
                    $flag = true;
                }
            }
        }
    }
    if($flag){
        return true;
    }
    else{
        return false;
    }
}
    
?>