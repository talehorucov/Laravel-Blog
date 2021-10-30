<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained();
            $table->foreignId('tag_id')->constrained();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('post_tags');
    }
}
