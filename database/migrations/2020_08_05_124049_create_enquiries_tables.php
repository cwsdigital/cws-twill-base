<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnquiriesTables extends Migration
{
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->string('name', 200)->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('regarding')->nullable();
            $table->text('message')->nullable();
            $table->boolean('read')->default(0);
            $table->timestamp('read_at')->nullable();
            $table->unsignedBigInteger('read_by')->nullable();
            $table->foreign('read_by')->references('id')->on('twill_users')->onDelete('set null');
        });






    }

    public function down()
    {

        Schema::dropIfExists('enquiries');
    }
}
