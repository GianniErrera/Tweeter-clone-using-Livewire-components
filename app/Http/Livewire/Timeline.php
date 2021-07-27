<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Livewire\WithPagination;

class Timeline extends Component
{
    use WithPagination;

    public $followedIds;


    public function delete(Tweet $tweet)
    {

        $tweet->delete();

    }


    public function render()
    {   $followed_ids = current_user()->followed()->pluck('id');
        $followed_ids->push(current_user()->id);


        return view('livewire.timeline', ['tweets' => Tweet::whereIn('user_id', $followed_ids)
        ->get()]);
    }
}
