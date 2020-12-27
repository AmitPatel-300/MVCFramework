<?php

/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

/**
 * Template Class Doc Comment
 * 
 * Template Class
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

class rout
{
    public $controller="welcome";
    public $method="index";
    public $params=[];
    /**
     * Replaces all {tags} with corresponding values from $tags array
     *
     * @return void
     **/  
    public function __construct()
    {
        $url=$this->url();
        //print_r($url);
        if (!empty($url) && !empty($url[4])) {
            if (file_exists("../Application/controller/".$url[4].".php")) {
                $this->controller=$url[4];
                unset($url[4]);
            } else {
                echo "<div style='margin:0;padding:10px;background-color:silver'>Sorry 
                ".$url[4].".php not found";
            }
        }
        include_once "../Application/controller/".$this->controller.".php";
        $this->controller=new $this->controller();
       
        if (isset($url[5]) && ($url[5])) {
            if (method_exists($this->controller, $url[5])) {
                $this->method=$url[5];
                unset($url[5]);
            } else {
                echo "<div style='margin:0;padding:10px;background-color:silver'>Sorry 
                ".$url[5]." method not found";
            }
        }

        if (isset($url)) {
            $this->pramas=$url;
        } else {
            $this->params=[];
        }
        
        call_user_func_array([$this->controller, $this->method], $this->params); 
    }

    public function url() 
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url=$_SERVER['REQUEST_URI'];
            $url=rtrim($url);
            $url=filter_var($url, FILTER_SANITIZE_URL);
            $url=explode("/", $url);
            return $url;
        }
    }
}
?>