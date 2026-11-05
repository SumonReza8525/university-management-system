<?php
namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class TeacherPersonalInfo extends Model {
    protected $guarded = [];
    public function teachers() {
        return $this->belongsTo( Teacher::class, 'teacher_id' );
    }
}
