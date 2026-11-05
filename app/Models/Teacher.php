<?php
namespace App\Models;

use App\Models\TeacherPersonalInfo;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {
    protected $guarded = [];
    public function department() {
        return $this->belongsTo( Department::class );
    }
    public function personalInfo() {
        return $this->hasOne( TeacherPersonalInfo::class, 'teacher_id' );
    }
}
