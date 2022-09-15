<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    //  this is a name of the table which we will use it.
    protected $table = "marks";

    //  this is a name of the field has a primary key.
    protected $primaryKey = "id"; 

    //  this is if we have a timestamps in our table.
    public $timestamps= true ;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'value',
    ];
 
    public function Student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function Teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }
    
}
