/*********************************************
 * Tickets Vuex 管理
 *********************************************/
/** import */
import MyAxios from '../Client/useMyAxios';

/*********************************************
 * Tickets store 定義
 *********************************************/
// 基本エンドポイントURL
const BASE_ENDPOINT = '/ticket';

// 管理物
const state = {
    tickets: [],
}
// getter
const getters = {
    // 一覧取得
    getTickets: state => () => state.tickets,
    // 指定IDのタスク取得
    findTicketById: state => (id) => state.tickets.find(task => task.id === id),
};
// アクション一覧
const actions = {
    // 最新化
    async fetchTickets({commit}) {
        // タスク一覧 GET -> 内部状態変更
        MyAxios.get(BASE_ENDPOINT).then((response) => commit('setTickets', response.data));
    },
    // アイテム追加
    async createTicket({commit}, item) {
        // アイテム追加 通信 -> アイテム追加
        MyAxios.post(BASE_ENDPOINT).then((response) => commit('appendTicket', response.data));
    },
    // アイテム 削除 Id
    async removeTaskById({commit}, {id}) {
        // アイテム 削除 実行
        MyAxios.delete(`/tasks/${id}`).then(() => commit('removeTicketById', id));
    },
};
// reducer的なやつ
const mutations = {
    // 一覧 設定
    setTickets: (state, tickets) => {state.tickets = tickets; },
    // アイテム 追加
    appendTicket: (state, ticket) => {state.tickets = [...state.tickets, ticket]; },
    // アイテム 更新
    updateTicket: (state, ticket) => { state.tickets.each((t) => { if (t.id === ticket.id) t = ticket; }); },
    // アイテム 削除
    removeTicketById: (state, id) => { state.tickets = state.tickets.filter(task => task.id !== id); },
};

/* export */
export default {
    state,
    getters,
    actions,
    mutations,
}
