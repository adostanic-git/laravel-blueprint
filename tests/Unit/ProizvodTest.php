<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Proizvod;

class ProizvodUnitTest extends TestCase
{
    /** @test */
    public function proizvod_moze_biti_instanciran()
    {
        $proizvod = new Proizvod();

        $this->assertInstanceOf(Proizvod::class, $proizvod);
    }

    /** @test */
    public function proizvod_ima_osnovna_polja()
    {
        $proizvod = new Proizvod();
        $proizvod->naziv = 'Sveže kruške';
        $proizvod->cena = 120;
        $proizvod->kolicina_na_stanju = 500;

        $this->assertEquals('Sveže kruške', $proizvod->naziv);
        $this->assertEquals(120, $proizvod->cena);
        $this->assertEquals(500, $proizvod->kolicina_na_stanju);
    }
}
