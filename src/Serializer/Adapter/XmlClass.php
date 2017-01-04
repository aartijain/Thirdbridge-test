<?php

namespace ThirdBridge\Serializer\Adapter;

use DOMDocument;
use ThirdBridge\User;

class XmlClass
{  
    public function unserializeUsers($xml) 
    {
        $nodeValue = 0;
        $docElement = simplexml_load_string($xml)->children();
        $name = $docElement->getName();

        foreach ($docElement->$name as $node) {
            $user = new User((array)$node);
            //echo "<pre>"; print_r($user);
            
            if ($user->getActive()) {
                $nodeValue += $user->getValue();
            }
        }
        return $nodeValue;
    }
}
