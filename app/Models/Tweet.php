<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Likeable;

class Tweet extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'user_id',
        'body',
        'attached_image'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
