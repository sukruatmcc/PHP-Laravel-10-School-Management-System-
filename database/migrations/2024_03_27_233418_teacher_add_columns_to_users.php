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
            $table->date('date_of_joining')->after('date_of_birth')->nullable();
            $table->string('martial_status')->after('mobile_number')->nullable();
            $table->string('parmanent_address')->after('address')->nullable();
            $table->string('quafilication')->after('parmanent_address')->nullable();
            $table->string('work_experince')->after('quafilication')->nullable();
            $table->string('note')->after('work_experince')->nullable();
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
