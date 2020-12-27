<?php

class add extends framework
{
    public function index() {
        echo "<div style='margin:0;padding:20px;background-color:silver;text-align:center;height:60px;font-size:30px'>Add Controller";
    }

    public function method()
    {
        echo "<div style='margin:0;padding:10px;background-color:silver;text-align:center'>";
        $this->view('add');

        $this->model('add');
        $obj=new MOD\add();
        
    }
}
?>