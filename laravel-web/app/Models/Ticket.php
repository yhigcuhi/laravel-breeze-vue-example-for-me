<?php

namespace App\Models;

use App\Enums\TicketType;
use App\Facades\DateUtil;
use App\Facades\StringUtil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * チケット モデル
 */
class Ticket extends Model
{
    use HasFactory;

    /**
     * キャンスト.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'canceled_at' => 'datetime',
    ];

    /**
     * 新規登録値 生成
     * @param array $input 入力値
     * @return Ticket 新規登録値
     */
    public static function buildCreate(array $input): Ticket
    {
        // 新規登録値 初期化
        $result = new Ticket($input);
        // 固定値
        $result->display_ticket_cd = self::createTicketCd(); // チケットコード発券
        $result->ticket_type = TicketType::Provisional;// 仮予約で新規登録
        $result->canceled_at = null; // キャンセル = 否定
        // 結果返却
        return $result;
    }

    /**
     * チケットコード 発行
     * @return string チケットコード
     */
    private static function createTicketCd(): string
    {
        // ランダム文字列 14桁
        return StringUtil::random(14);
    }
}
