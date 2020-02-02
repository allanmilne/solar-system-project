<?php

namespace SolarSystem\Domain;

use Exception;
use PHPUnit\Framework\TestCase;

class SolarSystemTest extends TestCase
{
    private $solarSystem;

    public function setUp(): void
    {
        $starId         = StarId::generate();
        $starMass       = new Mass(1.989E+30);
        $hzInnerEdge    = new AstronomicalUnit(0.39);
        $hzOuterEdge    = new AstronomicalUnit(9.58);
        $hzRange        = new Range(
            $hzInnerEdge, 
            $hzOuterEdge
        );
        $habitableZone  = new HabitableZone($hzRange);
        
        $this->solarSystem  = new SolarSystem(
            SolarSystemId::generate(),
            new Star(
                $starId,
                'Sun', 
                new Radius(100000), 
                $starMass
            ),
            $habitableZone,
        );
    }

    public function test_solar_system_can_discover_planet()
    {
        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Earth',
            new AstronomicalUnit(1.0),
            new Mass(5.97E+24)
        );

        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Neptune',
            new AstronomicalUnit(30.06),
            new Mass(1.02E+26)
        );

        $this->assertAttributeCount(2, 'planets', $this->solarSystem);
    }

    public function test_solar_system_can_remove_planet()
    {
        $planetId = PlanetId::generate();

        $this->solarSystem->discoverPlanet(
            $planetId,
            'Earth',
            new AstronomicalUnit(1.0),
            new Mass(5.97E+24)
        );

        $this->assertAttributeCount(1, 'planets', $this->solarSystem);

        $this->solarSystem->removePlanet($planetId);

        $this->assertAttributeCount(0, 'planets', $this->solarSystem);
    }

    public function test_solar_system_can_return_planet_count()
    {
        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Earth',
            new AstronomicalUnit(1.0),
            new Mass(5.97E+24)
        );

        $this->assertAttributeCount(1, 'planets', $this->solarSystem);
    }

    public function test_it_can_remove_a_specific_planet()
    {
        $earthId    = PlanetId::generate();
        $neptuneId  = PlanetId::generate();

        $this->solarSystem->discoverPlanet(
            $earthId,
            'Earth',
            new AstronomicalUnit(1.0),
            new Mass(5.97E+24)
        );

        $this->solarSystem->discoverPlanet(
            $neptuneId,
            'Neptune',
            new AstronomicalUnit(30.06),
            new Mass(1.02E+26)
        );

        $this->assertAttributeCount(2, 'planets', $this->solarSystem);

        $this->solarSystem->removePlanet($earthId);

        $this->assertAttributeCount(1, 'planets', $this->solarSystem);
    }

    public function test_solar_system_can_return_total_mass()
    {
        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Earth',
            new AstronomicalUnit(1.0),
            new Mass(5.97E+24)
        );

        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Neptune',
            new AstronomicalUnit(30.06),
            new Mass(1.02E+26)
        );

        $this->assertAttributeCount(2, 'planets', $this->solarSystem);

        $this->assertAttributeEquals(1.98910797E+30, 'value', $this->solarSystem->calculateMass());
    }

    public function test_solar_system_can_check_if_planet_is_within_habitable_zone()
    {
        $planetId       = PlanetId::generate();
        $planetDistance = new AstronomicalUnit(1.0);
        $this->solarSystem->discoverPlanet(
            $planetId,
            'Earth',
            $planetDistance,
            new Mass(5.97E+24)
        );

        $this->assertAttributeCount(1, 'planets', $this->solarSystem);

        $this->assertTrue(
            $this->solarSystem->withinHabitableZone($planetDistance)
        );
    }

    public function test_solar_system_cannot_discover_planet_with_same_AU()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Collision alert, cannot add Planet with same distance as another Planet!");

        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Earth',
            new AstronomicalUnit(1.0),
            new Mass(5.97E+24)
        );

        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Neptune',
            new AstronomicalUnit(1.0),
            new Mass(1.02E+26)
        );
    }

    public function test_solar_system_can_add_asteroid_belt()
    {
        $this->assertAttributeCount(0, 'asteroidBelts', $this->solarSystem);

        $asteroidBeltId = AsteroidBeltId::generate();
        $this->solarSystem->discoverAsteroidBelt(
            $asteroidBeltId,
            new Range(
                new AstronomicalUnit(2.2), 
                new AstronomicalUnit(3.2)
            ),
            new Mass(2.39E+21)
        );

        $this->assertAttributeCount(1, 'asteroidBelts', $this->solarSystem);
    }

    public function test_solar_system_cannot_discover_planet_within_Asteroid_Belt()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Collision alert, Planet is within Asteroid Belt!");

        $this->solarSystem->discoverAsteroidBelt(
            AsteroidBeltId::generate(),
            new Range(
                new AstronomicalUnit(2.2), 
                new AstronomicalUnit(3.2)
            ),
            new Mass(2.39E+21)
        );

        $this->assertAttributeCount(1, 'asteroidBelts', $this->solarSystem);

        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Planet X',
            new AstronomicalUnit(3.0),
            new Mass(5.97E+24)
        );
    }

    public function test_solar_system_cannot_discover_Asteroid_Belt_if_planet_within_range()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Collision alert, Planet is within Asteroid Belt range!");

        $this->solarSystem->discoverPlanet(
            PlanetId::generate(),
            'Planet X',
            new AstronomicalUnit(3.0),
            new Mass(5.97E+24)
        );

        $this->assertAttributeCount(1, 'planets', $this->solarSystem);

        $this->solarSystem->discoverAsteroidBelt(
            AsteroidBeltId::generate(),
            new Range(
                new AstronomicalUnit(2.2), 
                new AstronomicalUnit(3.2)
            ),
            new Mass(2.39E+21)
        );
    }
}
