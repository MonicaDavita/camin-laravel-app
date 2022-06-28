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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->text('description');
            $table->float('price', 10, 2);
            $table->enum('category', ['rapat', 'sport', 'department']);
            $table->time('open_time');
            $table->time('close_time');
            $table->string('map_url');
            $table->integer('quota');
            $table->timestamps();

            $table->foreignId('department_id')->constrained('departments')->nullable();
            $table->foreignId('admin_id')->constrained('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
