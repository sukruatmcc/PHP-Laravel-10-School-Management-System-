<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->string('admission_number')->nullable()->after('remember_token');
            $table->string('roll_number')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('caste')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:active, 1:inactive')->after('is_delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
