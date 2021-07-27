<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;

use Livewire\Component;
use App\Models\User;
use App\Models\Tweet;

class TweetsCollection extends Component
{
    public User $user;

    use WithPagination;

    public function delete(Tweet $tweet)
    {
        $tweet->delete();
        $this->render();

    }

    public function render()
    {
        return view('livewire.tweets-collection', ["tweets" => Tweet::where('user_id', $this->user->id)->latest()->get()]);
    }
}
