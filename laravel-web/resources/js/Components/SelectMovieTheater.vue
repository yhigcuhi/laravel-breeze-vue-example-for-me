<script setup>
// sfo バージョンで記述の練習 結論使いずらい、読みづらい
/* import vue */
import { computed, onBeforeMount } from 'vue';
import { useStore } from 'vuex'; // vuex

// マスター用の状態管理値
const store = useStore();
// 画面引数
const props = defineProps({
    // 親エリアコード
    areaCd: {
        type: String,
        default: null,
    },
    // 初期表示 モデル値 (movie_theater_cd)
    modelValue: {
        type: String,
        default: null,
    },
});

// input 内容変更 → モデルの値 通知 処理定義
const emit = defineEmits(['update:modelValue']);

// 画面内の 変数
// 利用 映画館一覧
const movieTheaters = computed(() => {
    // エリア一覧 取得
    return _.isEmpty(props.areaCd) ? [] : store.getters.findAllByAreaCd(props.areaCd);
});

// 選択 映画館
const selected = computed({
    // getter
    get() { return props.modelValue; },
    // setter
    set(val) { emit('update:modelValue', val); }, // 値変更通知
});

// 描画前の処理
onBeforeMount(() => {
    // 最新取得
    if (_.isEmpty(store.getters.getMovieTheaters())) store.dispatch('fetchMovieTheaters');
});

</script>

<template>
    <!-- エリアコードの一覧表示 TODO:したの セレクトボックスだけでコンポーネント化しても良いかと -->
    <select v-model="selected">
        <option v-for="area in movieTheaters" :key="area.movie_theater_cd" :value="area.movie_theater_cd">
            {{ area.name }}
        </option>
    </select>
</template>
