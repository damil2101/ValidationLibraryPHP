<?php

class Validator
{
    private $values;
    private $error;

    public function __costruct($values){
        $this->values = $values;
        $this->error = "";
}
function validation() {
    global $values,$error;
    foreach ($values as $key=>$value){
        if($key=='email'){
             if(!preg_match(AllRegex::$EMAILREGEX,$value)){
              $error = "Email is not valid please enter again<br>";
             }
        }
        if($key =='phone'){
            if(!preg_match(AllRegex::$PHONEREGEX,$value)){
                $error = "Phone is not valid please enter again<br>";
            }
        }
        if($key =='password'){
            if(!preg_match(AllRegex::$PASSWORDREGEX,$value)){
                $error = "Password is not valid please enter again<br>";
            }
        }

    }
    return $error;
}
}