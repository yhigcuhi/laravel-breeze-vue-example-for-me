/*********************************************
 * 映画館 Vuex 管理
 *********************************************/
/* import マスタJSON */
import master from './json/movie_theaters.json';

// 管理物
const state = {
  movieTheaters: [],
}
// getter
const getters = {
  // 一覧取得
  getMovieTheaters: state => () => state.movieTheaters,
  // 指定 エリアコードの 一覧
  findAllByAreaCd: state => (areaCd) => state.movieTheaters.filter(({area_cd}) => area_cd === areaCd),
};
// アクション一覧
const actions = {
  // 最新化
  fetchMaster({commit}) {
    commit('setMovieTheaters', master);
  },
  // 自身のみ最新化
  fetchMovieTheaters({commit}) {
    commit('setMovieTheaters', master);
  },
};
// reducer的なやつ
const mutations = {
  // 一覧 設定
  setMovieTheaters: (state, movieTheaters) => {state.movieTheaters = movieTheaters; },
};

/* export */
export default {
  state,
  getters,
  actions,
  mutations,
}