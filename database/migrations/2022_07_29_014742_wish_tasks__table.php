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
        Schema::create('wish_tasks', function (Blueprint $table) {
                $table->id();
                $table->integer('folder_id')->unsigned();
                $table->string('title', 100);
                $table->date('due_date');
                $table->integer('status')->default(0)->comment('0=未着手,1=実行中,2=完了');
                $table->string('url', 50)->index()->comment('URL貼り付け欄');
                $table->string('comment', 30)->index()->comment('登録時使用するコメント欄');
                $table->string('remarks', 30)->index()->comment('完了時使用するコメント欄');
                $table->integer('budget');
                $table->timestamps();

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
        Schema::dropIfExists('wish_tasks');
    }
};
