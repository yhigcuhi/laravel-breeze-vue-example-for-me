/*********************************************
 * このプロジェクト Vuex 管理
 *********************************************/
/** import modules */
import tickets from './tickets'; // (ユーザー) チケット一覧
import movieTheaterAreas from './movieTheaterAreas'; // 映画館 エリア一覧
import movieTheaters from './movieTheaters'; // 映画館 一覧
import createPersistedState from 'vuex-persistedstate'; // F5キャッシュ用

/* export */
export default {
    // 拡張プラグイン
    plugins: [createPersistedState({
        storage: window.sessionStorage, // キャッシュ保存先
        key: 'my-vuex-sample', // キャッシュ保存キー
        paths: [ // キャッシュしておくもの一覧
            'tickets', // トランザクションだけど アイテム編集あるので一旦
            // マスター系 キャッシュ
            'movieTheaterAreas',
            'movieTheaters',
        ],
    })],
    modules: {
        tickets, // チケット 管理
        movieTheaterAreas, // マスタ 映画館エリア 一覧
        movieTheaters, // マスタ 映画館 一覧
    },
};
