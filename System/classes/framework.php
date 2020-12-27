<?php

class framework
{
    public function view($viewname) 
    {
        if (file_exists("../Application/view/".$viewname.".php")) {
            require_once "../Application/view/$viewname.php";
     } else {
        echo "<div style='margin:0;padding:10px;background-color:silver'>Sorry 
        ".$viewname.".php not found";
     }
     
    }

    public function model($modelname) 
    {
        if (file_exists("../Application/model/".$modelname.".php")) {
            require_once "../Application/model/$modelname.php";
     } else {
        echo "<div style='margin:0;padding:10px;background-color:silver'>Sorry 
        ".$modelname.".php not found";
     }
    }

}
?>