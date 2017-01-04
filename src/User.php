<?php

namespace ThirdBridge;


class User extends ModelAbstract
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $active;

    /**
     * @var int
     */
    private $value;

   
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        if (is_string($this->active)) {
            $this->active = ($this->active == 'true') ? 1 : 0;
        } 
        return $this->active;
    }

    /**
     * @param string $active
     * @return $this
     */
    public function setActive($active)
    {
        if (is_string($active)) {
            $active = ($active === 'true') ? 1 : 0;
        } 
        $this->active = $active;
        return $this;
    }
       
    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * @param int $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = (int)$value;
        return $this;
    }
 
    
}
