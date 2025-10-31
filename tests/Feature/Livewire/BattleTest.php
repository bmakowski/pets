<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Battle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BattleTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Battle::class)
            ->assertStatus(200);
    }
}
