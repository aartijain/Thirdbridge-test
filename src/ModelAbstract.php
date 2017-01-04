<?php

namespace ThirdBridge;

abstract class ModelAbstract
{
    public function __construct(array $data = array())
    {
        $this->exchangeArray($data);
    }
    
    
    public function __set($name, $value)
    {
        $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
        if (!in_array($method, get_class_methods($this))) {
            throw new ModelException('Invalid page property method :: ' . $method . ' does not Exist');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (!in_array($method, get_class_methods($this))) {
            throw new ModelException('Invalid page property method :: ' . $method . ' does not Exist');
        }
        return $this->$method();
    }

    public function exchangeArray(array $options)
    {
        $methods = get_class_methods($this);

        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                if ($value) {
                    $this->$method($value);
                }
            }
        }
        return $this;
    }

}
