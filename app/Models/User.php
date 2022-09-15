<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //  this is a name of the table which we will use it.
    protected $table = "users";

    //  this is a name of the field has a primary key.
    protected $primaryKey = "id"; 

    //  this is if we have a timestamps in our table.
    public $timestamps= true ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Kind',
        'FirstName',
        'LastName',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Teacher(){
        return $this->hasOne('App\Models\Teacher');
    }

    public function Student(){
        return $this->hasOne('App\Models\Student');
    }
}
