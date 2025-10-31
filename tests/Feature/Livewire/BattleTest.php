<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Battle;
use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BattleTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_it_renders_successfully(): void
    {
        $component = Livewire::test(Battle::class);

        $component->assertStatus(200);
        $component->assertViewIs('livewire.battle');
    }

    public function test_it_loads_random_dog_and_cat_on_mount(): void
    {
        $component = Livewire::test(Battle::class);

        $component->assertSet('dog', function ($dog) {
            return $dog instanceof Pet && $dog->type === 'dog';
        });

        $component->assertSet('cat', function ($cat) {
            return $cat instanceof Pet && $cat->type === 'cat';
        });

        $this->assertFalse($component->thankYou);
    }

    public function test_it_creates_like_when_like_method_is_called(): void
    {
        $dog = Pet::where('type', 'dog')->first();

        $this->assertDatabaseCount('likes', 0);

        Livewire::test(Battle::class)
            ->call('like', $dog->id);

        $this->assertDatabaseCount('likes', 1);
        $this->assertDatabaseHas('likes', [
            'pet_id' => $dog->id,
        ]);
    }

    public function test_it_sets_thank_you_flag_after_liking(): void
    {
        $cat = Pet::where('type', 'cat')->first();

        Livewire::test(Battle::class)
            ->assertSet('thankYou', false)
            ->call('like', $cat->id)
            ->assertSet('thankYou', true);
    }


    public function test_load_pets_resets_thank_you_flag(): void
    {
        $dog = Pet::where('type', 'dog')->first();

        $component = Livewire::test(Battle::class)
            ->call('like', $dog->id)
            ->assertSet('thankYou', true)
            ->call('loadPets')
            ->assertSet('thankYou', false);
    }

    public function test_load_pets_reloads_random_pets(): void
    {
        $component = Livewire::test(Battle::class);

        $firstDogId = $component->get('dog')->id;
        $firstCatId = $component->get('cat')->id;

        $different = false;
        for ($i = 0; $i < 10; $i++) {
            $component->call('loadPets');

            if ($component->get('dog')->id !== $firstDogId ||
                $component->get('cat')->id !== $firstCatId) {
                $different = true;
                break;
            }
        }

        $dogsCount = Pet::where('type', 'dog')->count();
        $catsCount = Pet::where('type', 'cat')->count();

        if ($dogsCount > 1 || $catsCount > 1) {
            $this->assertTrue(
                $different,
                'LoadPets should randomly select different pets when multiple are available'
            );
        }
    }
}
