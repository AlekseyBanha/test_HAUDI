<?php

class Logger
{

    public static $PATH;
    protected static $loggers=array();

    protected $name;
    protected $file;
    protected $fp;

    public function __construct($name, $file=null){
        $this->name=$name;
        $this->file=$file;

        $this->open();
    }

    public function open(){
        if(self::$PATH==null){
            return ;
        }

        $this->fp=fopen($this->file==null ? self::$PATH.'/'.$this->name.'filename.json' : self::$PATH.'/'.$this->file,'a+');
    }

    public static function getLogger($name='root',$file=null){
        if(!isset(self::$loggers[$name])){
            self::$loggers[$name]=new Logger($name, $file);
        }

        return self::$loggers[$name];
    }

    public function log($message){
        if(!is_string($message)){
            $this->logPrint($message);

            return ;
        }
        $host_user=$_SERVER['SCRIPT_FILENAME'];
        $host_user=explode('C:/OpenServer/domains/',$host_user);
        $log=[
            'time'=>date('Y-m-d H:i:s',time()),
            'action'=> $host_user[1] ,
            'ip_user'=> " - $_SERVER[REMOTE_ADDR]"
        ];

        $arr=json_encode($log);

        if(func_num_args()>1){
            $params=func_get_args();

            $message=call_user_func_array('sprintf',$params);
        }

        $arr.=$message;
        $arr.="\n";

        $this->_write($arr);
    }





    public function logPrint($obj){
        ob_start();

        print_r($obj);

        $ob=ob_get_clean();
        $this->log($ob);
    }

    protected function _write($string){
        fwrite($this->fp, $string);

        echo $string;
    }

    public function __destruct(){
        fclose($this->fp);
    }
}








