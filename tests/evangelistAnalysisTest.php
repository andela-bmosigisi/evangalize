<?php

/**
 * @author brian.mosigisi
 * Test the EvangelistAnalysis class and its dependencies,
 * which takes an evangelist object and populates it's properties.
 */

namespace Burayan\Evangalize\Test;

use Burayan\Evangalize\EvangelistAnalysis;
use Burayan\Evangalize\Evangelist;

class EvangelistAnalysisTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->evangelist = new Evangelist('octocat');
        $this->analysis = new EvangelistAnalysis($this->evangelist);
        $this->analysis->init();
    }

    public function testEvangelistStatusIsDefined()
    {
        $this->assertNotNull($this->evangelist->getStatus());
        $this->assertSame(
            'string', gettype($this->evangelist->getStatus())
        );
        $this->assertSame(
            'octocat@github.com',
            $this->evangelist->getEmail()
        );
    }

    public function testEvangelistAnalysisProperties()
    {
        $status = $this->evangelist->getStatus();
        $this->assertSame(gettype($status), 'string');
        $this->assertTrue(
            strlen($this->analysis->getEvangelistStatus()) >= 9
        );

        // Test a sentence is returned, containing the subtle status.
        $possible_status = ['Junior Evangelist',
            'Associate Evangelist', 'Most Senior Evangelist'];
        
        $this->assertArraySubset([$status], $possible_status);
    }
}
