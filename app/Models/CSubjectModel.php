<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CSubjectModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'classes_subjects';
    protected $fillable = ['sclass_id', 'subject_id'];

    public function schoolclasses()
    {
        return $this->belongsTo(SClassModel::class, 'sclass_id');
    }

    public function subjects()
    {
        return $this->belongsTo(SubjectModel::class, 'subject_id');
    }
}
