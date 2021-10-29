<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagsTable extends Migration
{
    public function up()
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained();
            $table->foreignId('tag_id')->constrained();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('product_tags');
    }
}
