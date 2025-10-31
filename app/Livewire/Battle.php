<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Pet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 *
 */
class Battle extends Component
{
    /**
     * @var Pet
     */
    public Pet $dog;
    /**
     * @var Pet
     */
    public Pet $cat;

    /**
     * @var bool
     */
    public bool $thankYou = false;

    /**
     * @var string[]
     */
    protected $listeners = ['battleReload' => '$refresh'];

    /**
     *
     */
    public function mount(): void
    {
        $this->loadPets();
    }

    /**
     *
     */
    public function loadPets(): void
    {
        $this->dog = Pet::where('type', 'dog')->inRandomOrder()->first();
        $this->cat = Pet::where('type', 'cat')->inRandomOrder()->first();
        $this->thankYou = false;
    }

    /**
     *
     */
    public function render(): Factory|View|\Illuminate\View\View
    {
        return view('livewire.battle');
    }

    /**
     *
     */
    public function like(int $petId): void
    {
        Like::create(['pet_id' => $petId]);
        $this->thankYou = true;
    }
}
