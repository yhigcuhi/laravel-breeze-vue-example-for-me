<?php

namespace App\Repositories;

use App\Models\Ticket;
use \Illuminate\Support\Collection;

class TicketRepository
{
    /**
     * チケット一覧
     * @param int|string $user_id 検索ユーザー
     * @return Collection ユーザーのチケット一覧
     */
    public function findAll(int|string $user_id): Collection
    {
        return Ticket::where('user_id', $user_id)->get();
    }
}
