<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'teacher_personal_infos', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'teacher_id' )
                ->unique()
                ->constrained( 'teachers' )
                ->cascadeOnDelete();
            $table->string( 'email' )->unique();
            $table->string( 'phone', 20 )->unique();
            $table->string( 'permanent_address' );
            $table->string( 'present_address' );
            $table->enum( 'gender', ['Male', 'Female', 'Other'] )->nullable();

            $table->enum( 'marital_status', [
                'Single',
                'Married',
                'Divorced',
                'Widowed',
            ] )->nullable();
            $table->string( 'image' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'teacher_personal_infos' );
    }
};
