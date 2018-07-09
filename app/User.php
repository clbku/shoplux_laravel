<?php

namespace App;

use App\Http\Requests\StoreUserRequest;
use http\Env\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function getUserList() {
        return self::get();
    }

    public function comment() {
        return $this->hasMany('App\User', 'user_id', 'id');
    }

    public function findUser($request) {

        return self::where('name', 'like', '%' . $request->keyword . '%')
            ->orWhere('gender', 'like', '%' . $request->keyword . '%')
            ->orWhere('email', 'like', '%' . $request->keyword . '%')
            ->orWhere('phone', 'like', '%' . $request->keyword . '%')
            ->orWhere('address',  'like', '%' . $request->keyword . '%')
            ->get();
    }
}
