<?php

namespace App\Facades;

use Illuminate\Support\Carbon;
use \Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str;

/**
 * 文字列 Util
 */
class StringUtil extends Facade
{
    /**
     * @param string $str base64文字列にする文字列
     * @return string base64文字列 へ
     */
    public static function encodeBase64(string $str): string
    {
        // 前提条件
        if (empty($str)) return '';
        // base64文字列 へ
        return base64_encode($str);
    }

    /**
     * @param string $base64_str base64文字列
     * @return string 元の文字列
     */
    public static function decodeBase64(string $base64_str): string
    {
        // 前提条件
        if (empty($base64_str)) return '';
        // base64から平文へ
        return base64_decode($base64_str);
    }

    /**
     * 指定桁の ランダム文字列生成
     * @param int $length 桁数
     * @return string ランダム文字列
     */
    public static function random(int $length = 10): string
    {
        // 利用する char 配列
        $src = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        // 結果初期化
        $result = '';

        // 指定桁数分だけ ランダム文字列生成
        for ($i = 0; $i < $length; $i++) $result .= $src[rand(0, count($src) - 1)];

        // 結果返却
        return $result;
    }
}
