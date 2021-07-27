<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Traits\Followable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'bio',
        'email',
        'password',
        'avatar',
        'banner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getProfilePhotoPathAttribute($value) {
        return asset($value ? 'storage/' . $value : '/images/default-avatar.jpeg');
    }

    public function getBannerAttribute($value) {
        return asset($value ? 'storage/' . $value : '/images/default-profile-banner.jpg');
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)
            ->withLikes()
            ->latest();
    }

    public function timeline() {
        $followedIds = $this->followed->pluck('id');
        $followedIds->push($this->id);
        return Tweet::whereIn('user_id', $followedIds)
            ->withLikes()
            ->latest()
            ->get();
    }

    public function ciao() {
        $followedIds = $this->followed->pluck('id');
        $followedIds->push($this->id);
        return Tweet::whereIn('user_id', $followedIds)
            ->withLikes()
            ->latest()
            ->get();

    }

    public function path($append = "") {
        $path = route('profile', $this->username);
        return $append ? "{$path}/$append" : $path;
    }


    public function getRouteKeyName() {
        return 'name';
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

}
