<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }
    public function feed_microposts()
    {
       //$follow_user_ids = $this->followings()-> pluck('users.id')->toArray();
       // $follow_user_ids[] = $this->id;
        return Micropost::whereIn('user_id');//$follow_user_ids);
    }
}
