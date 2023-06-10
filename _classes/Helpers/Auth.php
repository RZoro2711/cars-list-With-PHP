<?php 
namespace Helpers;

use Faker\Provider\HtmlLorem;

class Auth
{
    static $loginUrl = "/index.php";
    static function check(){
        session_start();
        if($_SESSION["user"]){
            return $_SESSION['user'];
            HTTP::redirect("/home.php");
        }else{
            HTTP::redirect(static::$loginUrl);
        }
    }
}