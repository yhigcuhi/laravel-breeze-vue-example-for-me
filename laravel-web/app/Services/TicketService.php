<?php

namespace App\Services;

use App\Repositories\TicketRepository;
use Illuminate\Support\Collection;

/**
 * チケットサービス
 */
class TicketService
{
    /* 利用リポジトリ */
    private TicketRepository $repository;

    /**
     * コンストラクタ
     * @param TicketRepository $repository 利用リポジトリ
     */
    public function __construct(TicketRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * ユーザー一覧
     * @param int|string|null $user_id
     * @return Collection
     */
    public function findByUser(int|string|null $user_id): Collection
    {
        // 前提条件
        if (empty($user_id)) return Collection::empty(); // 空
        // ユーザーのチケット一覧
        return $this->repository->findAll($user_id);
    }
}
