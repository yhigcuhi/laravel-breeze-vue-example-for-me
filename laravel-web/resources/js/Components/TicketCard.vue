<script setup>
import { ref } from 'vue';
import Modal from './TicketModal.vue';

// カード形式 チケット表示
defineProps({
    ticket: {
        default: {
            broadcast_day: '',
            broadcast_start_time: '',
            broadcast_end_time: '',
            display_ticket_cd: '',
        },
        required: true,
    }
});
// モーダルの表示非表示 定義
const isShowModal = ref(false); // デフォルト非表示

// モーダル開く
const onClickOpenModal = () => isShowModal.value = true;
// モーダル閉じる (イベントハンドラー()
const onClickCloseModal = () => isShowModal.value = false;
</script>

<template>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ `${ticket.broadcast_day} ${ticket.broadcast_start_time} 〜 ${ticket.broadcast_end_time}` }}</h5>
            <p class="card-text">{{ ticket.display_ticket_cd }}</p>
            <button @click="onClickOpenModal" class="btn btn-primary">詳細表示</button>
        </div>
    </div>
    <Modal v-show="isShowModal" @on-click-close="onClickCloseModal">
        <template v-slot:title>
            <h5 class="card-title">{{ `${ticket.broadcast_day} ${ticket.broadcast_start_time} 〜 ${ticket.broadcast_end_time}` }} チケット</h5>
        </template>
        <template v-slot:main>
            <p>状態：{{ticket.ticket_type}}</p>
            <p>申込者：{{`${ticket.last_name} ${ticket.first_name}`}}</p>
            <p>ご連絡先：{{ticket.phone}}</p>
            <p v-show="ticket.canceled_at">キャンセル日：{{ticket.canceled_at}}</p>
        </template>
    </Modal>
</div>
</template>
