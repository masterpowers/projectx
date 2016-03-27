<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku', 50)->unique();
            $table->integer('category_id')->unsigned()->nullable()->index();
            $table->string('name', 255);
            $table->decimal('price', 20, 2)->unsigned()->index();
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->string('caption');
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('options')->nullable();
            $table->boolean('published')->default(0);
            $table->float('rating_cache', 2, 1)->default(0);
            $table->integer('rating_count')->default(0);
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
        Schema::drop('products');
    }
}
