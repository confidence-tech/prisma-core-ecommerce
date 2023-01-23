<?php
trait TSystemVersion
{
    private $version;

    public function setVersion($version){
        if (!empty($version)) {
            $this->version = $version;
        }else{
            $this->version = '0.1';
        }
    }

    public function getVersion(){
        return $this->version;
    }
}