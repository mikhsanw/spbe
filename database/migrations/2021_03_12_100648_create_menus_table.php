<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 50)->unique();
            $table->string('nama');
            $table->string('link');
            $table->string('icon');
            $table->boolean('status')->default(1);
            $table->boolean('tampil')->default(1);
            $table->json('detail')->nullable();
            $table->boolean('perbaikan')->default(0);
            $table->integer('urut')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('menus');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
