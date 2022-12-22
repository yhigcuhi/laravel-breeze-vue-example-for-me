/*********************************************
 * 映画館エリア Vuex 管理
 *********************************************/
/* import マスタJSON */
import master from './json/movie_theater_areas.json';

// 管理物
const state = {
  movieTheaterAreas: [],
}
// getter
const getters = {
  // 一覧取得
  getMovieTheaterAreas: state => () => state.movieTheaterAreas,
  // rootのエリア 一覧
  findAllByAreaRoot: state => () => state.movieTheaterAreas.filter(({parent_area_cd}) => _.isEmpty(parent_area_cd)),
  // 指定 親エリアコードの 一覧
  findAllByParentAreaCd: state => (parentAreaCd) => state.movieTheaterAreas.filter(({parent_area_cd}) => parent_area_cd === parentAreaCd),
};
// アクション一覧
const actions = {
  // マスター最新化
  fetchMaster({commit}) {
    commit('setMovieTheaterAreas', master);
  },
  // 自身だけ
  fetchMovieTheaterAreas({commit}) {
    commit('setMovieTheaterAreas', master);
  },
};
// reducer的なやつ
const mutations = {
  // 一覧 設定
  setMovieTheaterAreas: (state, movieTheaterAreas) => {state.movieTheaterAreas = movieTheaterAreas; },
};

/* export */
export default {
  state,
  getters,
  actions,
  mutations,
}