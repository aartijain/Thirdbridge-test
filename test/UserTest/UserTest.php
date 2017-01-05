<?php
namespace UserTest;

use \ThirdBridge\User;
/**
 * Description of UserTest
 *
 * @author A.Jain
 */
class UserTest extends \PHPUnit_Framework_TestCase 
{
    public function testValueIsInteger()
    {
        $user = new User();
        $user->setValue(500);
        $this->assertEquals(500, $user->getValue());
    }
    
    public function testIsNameString()
    {
        $user = new User();
        $user->setName('TestTitle');
        $this->assertStringMatchesFormat('%s', $user->getName());
        
        /*
        $this->setExpectedException('InvalidArgumentException');
        $user->setName(71414);
         */
    }
    
    public function testIsActiveBoolean()
    {
        $user = new User();
        $user->setActive(true);
        $this->assertSame(1, $user->getActive());

        /*
        $this->setExpectedException('InvalidArgumentException');
        $user->setName(71414);
         */
    }
    
}
