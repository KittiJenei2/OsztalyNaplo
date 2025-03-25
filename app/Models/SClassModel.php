<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SClassModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'schoolclasses';

    public function students()
    {
        return $this->hasMany(StudentModel::class);
    }
}
