<?php
class TrnsJson implements ITransform
{
    public $filenameIn;
    public $filenameOut;
    protected $handle;
    protected $handles;

    public function __construct($filenameIn,$filenameOut)
    {
        $this->filenameIn = $filenameIn;
        $this->filenameOut=$filenameOut;

    }

    /**
     *
     */
    public function openFileIn()
    {
        if (is_writable($this->filenameIn)) {

            if (!$this->handle = fopen($this->filenameIn,'r+')) {
                echo "Не могу открыть файл filenameIn ($this->filenameIn)";
                exit;
            }else{$this->handles=file_get_contents($this->handle);

            }
        }
/**file_get_contents**/
    }
    public function openFileOut()
    {
        if (is_writable($this->filenameOut)) {

            if ( fopen($this->filenameOut, 'a')) {
                echo "Не могу открыть файл filenameOut ($this->filenameOut)";
                exit;
            }
        }

    }



public function transform()
{
    fwrite($this->filenameOut, json_encode($this->handles, true), JSON_PRETTY_PRINT);
}
    public function fileClose()
    {
        fclose($this->filenameIn);
         fclose($this->filenameOut);

    }
}