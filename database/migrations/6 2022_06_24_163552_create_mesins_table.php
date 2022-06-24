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
        Schema::create('mesins', function (Blueprint $table) {
            $table->id();
            $table->string("serial_number");
            $table->string("merk");
            $table->integer("no_uap");

            // Define foreign key constraints
            $table->unsignedBigInteger("id_uap");
            $table->unsignedBigInteger("id_jenis");
            $table->unsignedBigInteger("id_gedung");
            $table->unsignedBigInteger("id_creator_user");
            $table->unsignedBigInteger("id_status");
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign("id_uap")->references("id")->on("u_a_p_s");
            $table->foreign("id_jenis")->references("id")->on("jenis");
            $table->foreign("id_gedung")->references("id")->on("gedungs");
            $table->foreign("id_creator_user")->references("id")->on("users");
            $table->foreign("id_status")->references("id")->on("statuses");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesins');
    }
};
