<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FriendsList extends Component
{

    public $users = [];

    protected $listeners = ['refreshList' => 'test'];

    public function mount()
    {
        $this->users = auth()->user()->followed;
    }

    public function test()
    {
        dd('hey');
    }

    public function render()
    {
        return view('livewire.friends-list');
    }
}
