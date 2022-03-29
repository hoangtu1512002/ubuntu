<?php
    // kiểm tra email đúng định dạng. 
    function is_email($email){
        $part = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
        if (preg_match($part, $email)){
            return true;
        }
        else{
            return false;
        }
    }

    function number_check($number){
        $part = "/^[0-9]/";
        if (preg_match($part, $number)){
            return true;
        }
        else{
            return false;
        }
    }