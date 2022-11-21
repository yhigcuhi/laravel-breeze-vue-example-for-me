<script>
// カード形式 チケット表示
export default {
    name: 'TicketCard',
    props: {
        // 表示チケット
        ticket: {
            required: true,
        }
    }
}
</script>

<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ `${ticket.broadcast_day} ${ticket.broadcast_start_time} 〜 ${ticket.broadcast_end_time}` }}</h5>
            <p class="card-text">{{ ticket.display_ticket_cd }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</template>
