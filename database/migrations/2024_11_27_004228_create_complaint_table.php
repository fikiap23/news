<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('district'); // Kecamatan
            $table->string('village');  // Kelurahan
            $table->text('message');
            $table->enum('type', ['complaint', 'appreciation']);
            $table->string('image')->nullable(); // Optional image
            $table->text('name_admin')->nullable(); // Admin response
            $table->text('response_details')->nullable(); // Details of the response
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint');
    }
}
