<?php

require_once "Controller.php";

class CIndex extends Controller{
    public function AIndex(){
                
        $this->whenGet(function(){
            $this->render("VCursoIndex");
        });
        
        $this->whenPost(function(){
            echo "ok";
        });
        
    }
}
