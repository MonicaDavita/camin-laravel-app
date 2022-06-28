<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('book_date');
            $table->integer('duration');
            $table->integer('participants');
            $table->string('proposal');
            $table->string('berkas');
            $table->text('description');
            $table->enum('status', ['rejected', 'pending', 'accepted'])->default('pending');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();

            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('facility_id')->constrained('facilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
