<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 独自作成 ユーザー チケット テーブル (トランザクション)
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            // pk
            $table->id();
            // フィールド
            // which
            $table->unsignedBigInteger('user_id')->comment('(所有) ユーザーID');
            $table->string('display_ticket_cd')->comment('(画面表示) チケットコード')->unique();
            // how
            $table->enum('ticket_type', ['PROVISIONAL', 'SETTLED', 'COMPLETED', 'CANCELED'])->comment('チケット 状態');
            // where
            $table->string('movie_theater_cd')->comment('映画館 コード');
            // when
            $table->date('broadcast_day')->comment('放映 日');
            $table->time('broadcast_start_time')->comment('放映 開始時間');
            $table->time('broadcast_end_time')->comment('放映 終了時間');;
            // who
            $table->string('last_name')->comment('姓');
            $table->string('first_name')->comment('名');
            $table->string('phone')->comment('連絡先 電話番号');
            // 計測用
            $table->timestamp('canceled_at')->nullable(); // キャンセル 日時
            // created_at, updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
