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
    parentAreaCd: {
        type: String,
        default: null,
    },
    // 初期表示 モデル値
    modelValue: {
        type: String,
        default: null,
    },
});

// input 内容変更 → モデルの値 通知 処理定義
const emit = defineEmits(['update:modelValue']);

// 画面内の エリア
// 利用 エリア一覧
const movieTheaterAreas = computed(() => {
    // エリア一覧 取得
    return _.isEmpty(props.parentAreaCd) ? store.getters.findAllByAreaRoot() : store.getters.findAllByParentAreaCd(props.parentAreaCd);
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
    if (_.isEmpty(store.getters.getMovieTheaterAreas())) store.dispatch('fetchMovieTheaterAreas');
});
</script>

<template>
    <!-- 映画館の一覧表示 TODO:したの セレクトボックスだけでコンポーネント化しても良いかと -->
    <select v-model="selected">
        <option v-for="area in movieTheaterAreas" :key="area.area_cd" :value="area.area_cd">
            {{ area.name }}
        </option>
    </select>
</template>
