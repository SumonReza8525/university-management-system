<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'student_personal_infos', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'student_id' )->unique();
            $table->foreign( 'student_id' )->references( 'studentId' )->on( 'students' )->cascadeOnDelete();
            $table->string( 'phone' );
            $table->text( 'present_address' );
            $table->text( 'permanent_address' );
            $table->string( 'father_name' );
            $table->string( 'mother_name' );
            $table->string( 'gender' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'student_personal_infos' );
    }
};
