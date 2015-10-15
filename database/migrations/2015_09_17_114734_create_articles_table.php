<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            // 指定文章所属用户ID
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->text('intro');
            $table->text('body');
            $table->text('excerpt')->nullable();
            $table->timestamps();
            $table->timestamp('published_at');

            // 生成外键，并且指定在删除用户时同时删除该用户的所有文章
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); 
            // 生成外键，并且指定在删除类别时同时删除该类别的所有文章
            
            /* $table->foreign('category_id')
                ->references('id')
                ->on('categorys')
                ->onDelete('cascade');  */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
