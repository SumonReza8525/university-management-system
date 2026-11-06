<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'students', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'studentId' )->unique();
            $table->foreignId( 'department_id' )->constrained( 'departments' )->restrictOnDelete();;
            $table->foreignId( 'session_id' )->constrained( 'sessions' )->restrictOnDelete();;
            $table->foreignId( 'year_id' )->constrained( 'years' )->restrictOnDelete();;
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'students' );
    }
};
