<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class FollowUnfollowButton extends Component
{
    public $user;

    protected $listeners = ['refreshList' => 'test'];

        public function test()
    {
        dd('hey');
    }


    public function mount(User $user)
    {
        $this->user = $user;

    }

    public function follow()
    {
        auth()
            ->user()
            ->follow($this->user);

        $this->emitTo('friendslist', 'refreshList');

        session()->flash('follow', 'You followed ' . $this->user->username . "!");

    }

    public function unfollow()
    {
        auth()
            ->user()
            ->unfollow($this->user);

        $this->emitTo('friendslist', 'refreshList');

        session()->flash('unfollow', 'You unfollowed ' . $this->user->username . "!");

    }


    public function render()
    {
        return view('livewire.follow-unfollow-button');
    }
}
