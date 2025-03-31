<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarkModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'marks';
    protected $fillable = ['mark','student_id', 'subject_id'];

    public function students()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    public function subjects()
    {
        return $this->belongsTo(SubjectModel::class, 'subject_id');
    }
}
