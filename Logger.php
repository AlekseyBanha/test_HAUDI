<?php

class Logger
{

    public static $PATH;
    protected static $loggers=array();

    protected $name;
    protected $file;
    protected $fp;
}
public function __construct($name, $file=null){
    $this->name=$name;
    $this->file=$file;

    $this->open();
}

public function open(){
    if(self::$PATH==null){
        return ;
    }

    $this->fp=fopen($this->file==null ? self::$PATH.'/'.$this->name.'.log' : self::$PATH.'/'.$this->file,'a+');
}










