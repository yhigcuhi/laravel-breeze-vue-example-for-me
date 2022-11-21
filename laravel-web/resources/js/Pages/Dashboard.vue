<script>
/* import vue */
import { mapActions } from 'vuex'; // vuex
/* import 画面部品 */
import AuthenticatedLayout from '../Layouts/AuthenticatedLayout.vue'; // 利用レイアウト
import AppendLinkButton from '../Components/AppendLinkButton.vue';
import TicketCard from '../Components/TicketCard.vue';

// create vue class
export default {
    // 画面名
    name: 'Dashboard',
    // 利用レイアウト
    layout: AuthenticatedLayout,
    // 利用コンポーネント   
    components: {
        AppendLinkButton,
        TicketCard,
    },
    // 内部利用関数
    methods: {
        // vuex 関数インジェクション
        ...mapActions(['fetchMaster', 'fetchTickets']),
    },
    // 画面生成時 ハンドラー
    created() {
        // fetch dispath
        this.fetchMaster(); // 共通マスター
        this.fetchTickets(); // チケット一覧
    },
    // 状態変更ハンドラー
    computed: {
        // チケット一覧
        tickets() { return this.$store.getters.getTickets(); }
    },
}
</script>

<template>
    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in! {{ this.tickets }}
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <!-- 新規追加メニュー -->
            <div class="mx-ato">
                <AppendLinkButton :href="route('ticket.create')" :class="p-6">
                    + 映画チケット新規追加
                </AppendLinkButton>
            </div>
            <!-- チケット一覧 -->
            <div class="mx-ato my-4" v-for="ticket in tickets" :key="ticket.id">
                <TicketCard :ticket="ticket" />
            </div>
        </div>
    </div>
</template>