<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * チケット コントローラー
 */
class TicketController extends Controller
{
    /* 利用サービス */
    private TicketService $service;

    /**
     * コンストラクタ
     * @param TicketService $service サービス
     */
    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }

    /**
     * (ユーザーの) チケット一覧取得
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        // (ユーザーの) チケット一覧 検索実行
        return response()->json($this->service->findByUser(Auth::id()));
    }
}
