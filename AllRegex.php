<?php

class AllRegex
{
    public static $EMAILREGEX = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
    public static $PHONEREGEX = "/^[1-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$/";
    public static $PASSWORDREGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/";
    public static $DATEREGEX = "^[0-9]{4}[-/][0-9]{1,2}[-/][0-9]{1,2}/$";

}