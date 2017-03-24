<?php

require_once "Controller.php";

class CIndex extends Controller{
    public function AIndex(){
                
        $this->whenGet(function(){
            $this->renderInStructure("VCursoIndex");
        });
        
        $this->whenPost(function(){
            echo "ok";
        });
        
    }
}
