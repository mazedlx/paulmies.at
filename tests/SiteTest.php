<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SiteTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $this->visit('/')
             ->see('/');
    }

    public function testAdmin()
    {
        $this->visit('/admin')
            ->see('/login');
    }

    public function testLogin()
    {
        $this->visit('/login')
            ->type('paulmies.baum@gmail.com', 'email')
            ->type('$baum.', 'password')
            ->press('Anmelden')
            ->see('/admin');
    }

    public function testContent()
    {
        $this->actingAs(App\User::find(1))
            ->visit('/admin/contents')
            ->see('/admin/contents');
    }

    public function testUploads()
    {
        $this->actingAs(App\User::find(1))
            ->visit('/admin/uploads')
            ->see('/admin/uploads');
    }

    public function testSlides()
    {
        $this->actingAs(App\User::find(1))
            ->visit('/admin/slides')
            ->see('/admin/slides');
    }

    public function testSettings()
    {
        $this->actingAs(App\User::find(1))
            ->visit('/admin/settings')
            ->see('/admin/settings');
    }
}
