<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'subjects';

    public function marks()
    {
        return $this->hasMany(MarkModel::class);
    }
}
