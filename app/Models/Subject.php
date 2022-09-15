<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    //  this is a name of the table which we will use it.
    protected $table = "subjects";

    //  this is a name of the field has a primary key.
    protected $primaryKey = "id"; 

    //  this is if we have a timestamps in our table.
    public $timestamps= true ;

    protected $fillable = [
        'name'
    ];
 
    public function Mark(){
        return $this->hasMany('App\Models\Mark');
    }

    public function Teacher(){
        return $this->hasMany('App\Models\Teacher');
    }
}
