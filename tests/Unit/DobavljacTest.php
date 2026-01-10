<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Dobavljac;

class DobavljacUnitTest extends TestCase
{
    /** @test */
    public function dobavljac_moze_biti_instanciran()
    {
        $dobavljac = new Dobavljac();

        $this->assertInstanceOf(Dobavljac::class, $dobavljac);
    }

    /** @test */
    public function dobavljac_ima_osnovna_polja()
    {
        $dobavljac = new Dobavljac();
        $dobavljac->naziv = 'Agro Plus';
        $dobavljac->email = 'agro@example.com';

        $this->assertEquals('Agro Plus', $dobavljac->naziv);
        $this->assertEquals('agro@example.com', $dobavljac->email);
    }
}
