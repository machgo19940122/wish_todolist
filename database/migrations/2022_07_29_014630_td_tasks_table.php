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
        Schema::create('td_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned();
            $table->string('title', 100);
            $table->date('due_date');
            $table->integer('status')->default(0)->comment('0=未着手,1=実行中,2=完了');
            $table->text('url')->comment('URL貼り付け欄')->nullable();
            $table->string('who',10)->index()->nullable();
            $table->string('comment', 30)->index()->comment('登録時使用するコメント欄')->nullable();
            $table->string('remarks', 30)->index()->comment('完了時使用するコメント欄')->nullable();
            $table->timestamps();
//外部キー
            // $table->foreign('folder_id')->reference('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_tasks');
    }
};
