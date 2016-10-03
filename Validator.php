<?php

class Validator
{
    //$values is an array that user will pass while creating object then it would be $_POST
    private $values;
    //message that will respond with appropriate message
    private $error;


    public static $regexs = Array(

        'EMAILREGEX' => "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/",
        'PHONEREGEX' => "/^[1-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$/",
        'PASSWORDREGEX' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/",
        'DATEREGEX' => '^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}/$',
        'POSTALCODEREGEX' => '[A-Z][0-9][A-Z] {2}',

    );
    
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
        if ($key == 'date') {
            if (!preg_match(AllRegex::$DATEREGEX, $value)) {
                $error .= "Date is not valid<br>";
            }
        }


    }
    return $error;
}


// function that will check for an input with a corresponding type and return a message if the value doesnt match

// this function works on an array of regexs

    public static function validate($input, $type)
    {
        if (array_key_exists($type, self::$regexs)) {
            $returnval = filter_var($input, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => self::$regexs[$type]))) !== false; // function takes an associative array of options for input types which in turn is our array of regexs
            return ($returnval);
        }

        $filter = false;
        switch ($type) {
            case 'email':
                $filter = FILTER_VALIDATE_EMAIL;
                break;
            case 'int':
                $filter = FILTER_VALIDATE_INT;
                break;
            case 'url':
                $filter = FILTER_VALIDATE_URL;
                break;
        }
        if ($filter === false) {
            return false;
        } else if (filter_var($input, $filter)) {
            return true;
        } else
            return false;
    }

}