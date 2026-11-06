<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model {
    // public $timestamps = false;

    protected $guarded = [];
    public function students() {
        return $this->hasOne( Student::class );
    }
}
