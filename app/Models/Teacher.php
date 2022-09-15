<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    //  this is a name of the table which we will use it.
    protected $table = "teachers";

    //  this is a name of the field has a primary key.
    protected $primaryKey = "id"; 

    //  this is if we have a timestamps in our table.
    public $timestamps= false ;

    protected $fillable = [
        'user_id',
        'subject_id'
    ];
 
    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Subject(){
        return $this->belongsTo('App\Models\Subject');
    }

    public function Mark(){
        return $this->hasMany('App\Models\Mark');
    }

}
