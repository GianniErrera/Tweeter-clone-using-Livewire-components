<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Like;
use App\Models\Tweet;
use DB;

class LikeDislikeButtons extends Component
{
    public Like $like;
    public Like $dislike;
    public Tweet $tweet;

    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }


    public function like() {
        $like = Like::where('tweet_id', $this->tweet->id)
        ->where('user_id', current_user()->id)
        ->where('liked', true)->first();
        if ($like) {
            $like->delete();
        } else {
            $this->tweet->like(false);
        }
        $this->tweet->refresh();
    }

    public function dislike() {
        $dislike = Like::where('tweet_id', $this->tweet->id)
        ->where('user_id', current_user()->id)
        ->where('disliked', true)->first();
        if ($dislike) {
                $dislike->delete();
        } else {
            $this->tweet->dislike(false);
        }
        $this->tweet->refresh();
    }

    public function render()
    {
        return view('livewire.like-dislike-buttons');
    }
}
