<?php

namespace App\Http\Traits;

use App\Models\Tweet;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likeable {

    public function like($liked = true) {
    $this->likes()->updateOrCreate([
        'user_id' => auth()->id()
    ], [
        'liked' => !$liked,
        'disliked' => false
    ]);
}

    public function dislike($disliked = true) {
        //dd($user->id);
        $this->likes()->updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'liked' => false,
            'disliked' => !$disliked
        ]);
    }

    public function count_of_likes() {
        return $this->likes()->where('liked', true);
    }

    public function count_of_dislikes() {
        return $this->likes()->where('disliked', true);
    }

    public function isLikedBy(User $user) {
        return (bool) $user->likes()->where('tweet_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $user->likes()->where('tweet_id', $this->id)->where('disliked', true)->count();
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function scopeWithLikes(Builder $query) {
        $query->leftJoinSub(
            'SELECT tweet_id, SUM(liked) AS likes, SUM(disliked) AS dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id');
    }
}
