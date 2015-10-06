<?php
/**
 *  @author brian.mosigisi
 *  This tests the Evangelist class, which stores information
 *  on a particular evangelist.
 */

namespace Burayan\Evangalize\Test;

use Burayan\Evangalize\Evangelist;
use \PHPUnit_Framework_TestCase;

class EvangelistTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->evangelist = new Evangelist('octocat');
    }

    public function testEvangelistObjectsAreCreated()
    {
        $this->assertTrue($this->evangelist instanceof Evangelist);
    }

    public function testEvangelistsHaveRightProperties()
    {
        $this->assertSame('octocat', $this->evangelist->getUsername());
        $this->assertNotNull($this->evangelist->getEmail());
        $this->assertNull($this->evangelist->getStatus());

        $this->evangelist->setStatus("Junior Evangelist");

        $this->assertSame($this->evangelist->getStatus(), "Junior Evangelist");
    }

    /**
     *  @expectedException InvalidArgumentException
     *  Check whether trying to set an invalid email format
     *  throws an exception
     */
    public function testExceptionIsThrownForBadEmail()
    {
        $this->evangelist->setEmail("not-an-email");
    }
}
