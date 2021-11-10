<?php
 $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>', null, false);

$node = $xml->addChild('Projects');

array_to_xml($newArray, $node);

echo $xml->asXML();
die();

function array_to_xml($newArray, &$xml) {
    foreach($newArray as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml->addChild("$key");
                array_to_xml($value, $xml);
            } else {
                array_to_xml($value, $xml);
            }
        } else {
            $xml->addChild("$key","$value");
        }
    }
}