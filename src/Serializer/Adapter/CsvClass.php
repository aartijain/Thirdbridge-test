<?php

namespace ThirdBridge\Serializer\Adapter;

use Exception;
use EasyCSV;
use ThirdBridge\User;

class CsvClass
{    
    /**
     * @param string $csv
     * @return int
     */
    public function unserializeUsers($csv)
    {
        $nodeValue = 0;
        
        $reader = new EasyCSV\Reader($csv);
        
        while ($row = $reader->getRow()) {
            $user = new User((array)$row);
            //echo "<pre>"; print_r($user);
            
            if ($user->getActive()) {
                $nodeValue += $user->getValue();
            }
        }

        return $nodeValue;
    }
}
