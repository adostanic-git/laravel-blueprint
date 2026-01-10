<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kupac;

class KupacUnitTest extends TestCase
{
    /** @test */
    public function kupac_moze_biti_instanciran()
    {
        $kupac = new Kupac();

        $this->assertInstanceOf(Kupac::class, $kupac);
    }

    /** @test */
    public function kupac_ima_osnovna_polja()
    {
        $kupac = new Kupac();
        $kupac->ime = 'Petar';
        $kupac->prezime = 'Petrović';
        $kupac->email = 'petar@example.com';

        $this->assertEquals('Petar', $kupac->ime);
        $this->assertEquals('Petrović', $kupac->prezime);
        $this->assertEquals('petar@example.com', $kupac->email);
    }
}
