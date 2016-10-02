<?php

class Validator
{
    //$values is an array that user will pass while creating object then it would be $_POST
    private $values;
    //message that will respond with appropriate message
    private $error;

    public function __costruct($values){
        $this->values = $values;
        $this->error = "";
}
function validation() {
    global $values,$error;
    foreach ($values as $key=>$value){
        //iterating over $_POST and finding fields
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