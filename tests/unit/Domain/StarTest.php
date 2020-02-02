<?php

namespace SolarSystem\Domain;

use PHPUnit\Framework\TestCase;

class StarTest extends TestCase
{
    public function test_Star_requires_id_name_size_and_mass()
    {
        $starId     = StarId::generate();
        $radius     = new Radius(100000);
        $starMass   = new Mass(1.989E+30);
        $star = new Star(
            $starId, 
            'Sun', 
            $radius, 
            $starMass,
        );

        $this->assertEquals($starId, $star->getId());

        $this->assertEquals('Sun', $star->getName());
        
        $this->assertEquals($radius, $star->getSize());
        
        $this->assertEquals($starMass, $star->calculateMass());
    }
}
