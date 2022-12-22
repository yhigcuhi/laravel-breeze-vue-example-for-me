<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Provisional()
 * @method static static Settled()
 * @method static static Completed()
 * @method static static Canceled()
 */
final class TicketType extends Enum
{
    // 仮予約
    const Provisional = 'PROVISIONAL';
    // 決済完了
    const Settled = 'SETTLED';
    // 完了
    const Completed = 'COMPLETED';
    // キャンセル
    const Canceled = 'CANCELED';
}
