<?php

namespace Tests;

use MenaraSolutions\FluentGeonames\Country;
use MenaraSolutions\FluentGeonames\Exceptions\MisconfigurationException;
use MenaraSolutions\FluentGeonames\Earth;

class EarthTest extends Test
{
    const TOTAL_COUNTRIES = 249;
    
    /**
     * @test
     */
    public function planet_class_loads_default_countries()
    {
        $earth = new Earth();
        $countries = $earth->getCountries();
        $this->assertTrue(is_array($countries->toArray()));
        $this->assertEquals(self::TOTAL_COUNTRIES, count($countries));
        $this->assertEquals(self::TOTAL_COUNTRIES, count($countries->toArray()));
    }

    /**
     * @test
     */
    public function can_get_country_names_and_iso_codes_for_all_countries()
    {
        $earth = new Earth();
        $countries = $earth->getCountries();
        foreach($countries as $country) {
            $this->assertNotEmpty($country->getShortName());
            $this->assertNotEmpty($country->getLongName());
            $this->assertEquals(2, strlen($country->getCode()));
            $this->assertEquals(3, strlen($country->getCode3()));
        }
    }

    /**
     * @test
     */
    public function can_get_translated_country_names()
    {
        $earth = new Earth();
        $country = $earth->find(['code' => 'ru']);
        //$country = $countries[rand(0, count($countries))];
        $original = $country->getLongName();
        $country->setLanguage('ru');
        $this->assertTrue(!empty($country->getLongName()));
        $this->assertNotEquals($original, $country->getLongName());
    }

    /**
     * @test
     */
    public function can_find_a_country_by_code()
    {
        $earth = new Earth();
        $russia = $earth->find(['code' => 'RU']);
        $this->assertTrue($russia instanceof Country);
        $this->assertEquals('RU', $russia->getCode());
    }
}