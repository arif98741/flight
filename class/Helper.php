<?php

class Helper {

    public $helpObj;

    /*
    !-----------------------------------------------------
    !      Validation Data
    !----------------------------------------------------
    */
    public function validation($data)
    {
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = trim($data);
        return $data;
    }

    /*
    !-----------------------------------------------------
    !     Substring
    !----------------------------------------------------
    */
    public function subtr($string,$lenghth=10)
    {
        $string = substr($string, 0, $lenghth);
        return $string;
    }

}
