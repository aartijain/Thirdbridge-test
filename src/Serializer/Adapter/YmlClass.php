<?php

namespace ThirdBridge\Serializer\Adapter;

use Exception;
use ThirdBridge\User;
use Symfony\Component\Yaml\Parser;

class YmlClass
{
    /**
     * @param string $yml
     * @return int
     */
    public function unserializeUsers($yml)
    {
        $nodeValue = 0;
        
        $yaml = new Parser();

        $data = $yaml->parse($yml);

        foreach ($data['users'] as $node) {
            $user = new User($node);
            
            if ($user->getActive()) {
                $nodeValue += $user->getValue();
            }
        }
        return $nodeValue;
    }
}
