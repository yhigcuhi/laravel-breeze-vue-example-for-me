<?php

namespace App\Facades;

use Illuminate\Support\Carbon;
use \Illuminate\Support\Facades\Facade;

/**
 * 日付 Util
 */
class DateUtil extends Facade
{
    // タイムゾーン
    const TIMEZONE = 'Asia/Tokyo';

    // 日時フォーマット
    const FORMAT_DATE = 'Y-m-d h:i:s';

    // みり秒までの 日時フォーマット
    const FORMAT_DATETIME = 'Y-m-d h:i:s.v';

    /**
     * @return Carbon 今
     */
    public static function now(): Carbon
    {
        return Carbon::now(self::TIMEZONE);
    }

    /**
     * 指定日付でフォーマット
     * @param Carbon $date 日付
     * @param string $format フォーマット
     * @return string 日付文字列
     */
    private static function format(Carbon $date, string $format): string
    {
        return $date->format($format);
    }

    /**
     * 日時 でフォーマット
     * @param Carbon $date 日付
     * @return string 日時の日付文字列
     */

    public static function formatDate(Carbon $date): string
    {
        return self::format($date, self::FORMAT_DATE);
    }

    /**
     * m秒までの日時 でフォーマット
     * @param Carbon $date 日付
     * @return string m秒までの日時の日付文字列
     */
    public static function formatDateTime(Carbon $date): string
    {
        return self::format($date, self::FORMAT_DATETIME);
    }

    /**
     * 日付文字列 → 日付型
     * @param string $date_str 日付文字列
     * @return Carbon 日付型
     */
    public static function parse(string $date_str): Carbon
    {
        return Carbon::parse($date_str, self::TIMEZONE);
    }
}
