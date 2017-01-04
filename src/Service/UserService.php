<?php
namespace ThirdBridge\Service;

class UserService {
    
    static function processFileClass($fileType)
    {     
        $className = 'ThirdBridge\\Serializer\\Adapter\\' . ucfirst($fileType).'Class';

        if (!class_exists($className)) {
            throw new \Exception(ucfirst($fileType) . ' class not found.');
        }
               
        $service = new $className();
        return $service;        
    }
    
    public function processUsers($fileType, $fileName) 
    {
        $service = $this->processFileClass($fileType);
        
        switch ($fileType){
            case 'xml':
            case 'yml':
                $file = file_get_contents($fileName);
                break;
            case 'csv':
                $file = $fileName;
                break;
        }
        # parse the file into an array of ThirdBridge\User
        //$fileUsers = $service->unserialize($file);
        $fileUsers = $service->unserializeUsers($file);
        return $fileUsers;
    }
    
    public function writeFile($output, $users)
    {
        $this->makedir(dirname($output));
        $file = fopen($output, "w") or die("Unable to open file!");
        fwrite($file, $users);
        fclose($file);
    }
    
    public function makedir($dirpath, $mode = 0777) {
        return is_dir($dirpath) || mkdir($dirpath, $mode, true);
    }
}
