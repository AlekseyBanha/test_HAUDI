<?php
include("XML/Serializer.php");
class TrnsXml implements ITransform
{
    public $json;
    public $obj;
    public $serializer;

    public function __construct($json)
    {
        $this->json=$json;
    }

    public function transform($json) {
    $this->serializer = new XML_Serializer();
    $this->obj = json_decode($this->json);

    if ($serializer->serialize($this->obj)) {
        return $serializer->getSerializedData();
    }
    else {
        return null;
    }
}
}