<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContactFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->assertSee('Contato');
        });
    }

    public function testIfInputsExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->assertSee('Nome completo')
                    ->assertSee('Email')
                    ->assertSee('Mensagem');
        });

    }

    public function testIfContactFormIsWorking()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->type('name','Francisco Cezar')
                    ->type('email','francisco@email.com')
                    ->type('message','Testando 123')
                    ->press('Enviar mensagem')
                    ->assertPathIs('/contato')
                    ->assertSee('O contato foi criado com sucesso!');
        }); 
    }
}
