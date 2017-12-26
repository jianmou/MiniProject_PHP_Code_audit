<?php

/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 10:19
 */

    class Read{  //f1aG.php
        public $file;
        public function __toString(){
            if(isset($this->file)){
                echo file_get_contents($this->file);
            }
            return "__toString was called!";
        }
    }

?>