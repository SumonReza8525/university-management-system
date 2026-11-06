<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {
    protected $guarded = [];
    public function students() {
        return $this->hasOne( Student::class );
    }
}
