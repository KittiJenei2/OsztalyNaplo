<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'students';

    protected $fillable = ['name','gender','sclass_id',];

    public function schoolclasses()
    {
        return $this->belongsTo(SClassModel::class, 'sclass_id');
    }
    
    public function marks()
    {
        return $this->hasMany(MarkModel::class, 'student_id');
    }


}
