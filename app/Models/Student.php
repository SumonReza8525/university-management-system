<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $guarded = [];
    public function department() {
        return $this->belongsTo( Department::class );
    }
    public function years() {
        return $this->belongsTo( Year::class );
    }
    public function sessions() {
        return $this->belongsTo( Session::class );
    }
    public function stuPersonalInfo() {
        return $this->hasOne( StudentPersonalInfo::class, 'student_id', 'studentId' );
    }
}
