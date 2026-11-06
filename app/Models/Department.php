<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
    public $timestamps = false;
    protected $guarded = [];
    public function teachers() {
        return $this->hasMany( Teacher::class );
    }
    public function students() {
        return $this->hasMany( Student::class );
    }
}
