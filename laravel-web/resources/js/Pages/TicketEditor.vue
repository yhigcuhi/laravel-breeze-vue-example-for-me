<script>
/* import vue */
import { computed } from 'vue';
import { mapActions, useStore } from 'vuex'; // vuex
/* import inertia */
import { useForm } from '@inertiajs/inertia-vue3';
/* import 画面部品 */
import AuthenticatedLayout from '../Layouts/AuthenticatedLayout.vue'; // 利用レイアウト
import Datepicker from '@vuepic/vue-datepicker'; // DatePicker for vue オプション:https://vue3datepicker.com/api/props/
import InputError from '../Components/InputError.vue';
import InputLabel from '../Components/InputLabel.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';
import TextInput from '../Components/TextInput.vue';
import SelectMovieTheaterArea from '../Components/SelectMovieTheaterArea.vue' // 独自 映画館エリア選択
import SelectMovieTheater from '../Components/SelectMovieTheater.vue' // 独自 映画館 選択

// デフォルト値の定義
const DEFAULT_VALUE = {
    level1_area_cd: '001', // 第1階層(ルート) エリアコード
    level2_area_cd: '001001', // 第2階層 エリアコード
    movie_theater_cd: '', // 映画コード (映画館もさす)
    broadcast_day: '', // 放映 日
    broadcast_start_time: '', // 放映 開始時間
    broadcast_end_time: '', // 放映 終了時間
    last_name: '', // 姓
    first_name: '', // 名
    phone: '', // 連絡先 電話番号
};

// create vue class
export default {
    // 画面名
    name: 'TicketEditor',
    // 利用レイアウト
    layout: AuthenticatedLayout,
    // 画面表示引数 (コンストラクタ 引数)
    props: {
        // 編集 アイテムID
        id: {
            required: false // 任意 = 指定なし ? 登録 : 編集
        }
    },
    // 利用コンポーネント
    components: {
        Datepicker,
        PrimaryButton,
        InputError,
        TextInput,
        InputLabel,
        SelectMovieTheaterArea,
        SelectMovieTheater,
    },
    // コンストラクタ
    setup(props) {
        // グローバルストア アクセス
        const store = useStore();
        // 編集アイテム (登録時: undefined)
        const ticket = store.getters.findTicketById(props.id);
        // 編集フォーム内容 (登録時は フォームのデフォルト値)
        const item = _.pick(ticket || DEFAULT_VALUE, _.keys(DEFAULT_VALUE));

        // 土日以外
        const ignore_days = computed(() => {
        })

        // 画面利用値
        return {
            form: useForm(item), // 画面内の 編集フォーム値 返却
            isEdit: computed(() => !_.isEmpty(ticket)), // 編集モード
        }
    },
    // 内部利用関数一覧
    methods: {
        /**
         * @returns {boolean} true:送信可能 / false: それ以外
         */
        canSubmit() { return !(this.form.processing); },
        /**
         * 登録・編集 submit
         */
        onSubmit() {
            console.log(this.form)
            return false;
            // // 多重送信防止
            // if (this.isSubmitting) return; // 何もしない
            // // エラー情報存在
            // if (!this.checkForm()) {
            //     // 送信可能
            //     this.isSubmitting = false;
            //     // 後続しない
            //     return;
            // }

            // // 送信中
            // this.isSubmitting = true;
            // // タスクIDあり かつ編集モード(念の為) → 更新通信
            // if (this.taskId && this.isEdit) {
            //     // 更新通信
            //     this.axios.put(`/tasks/${this.taskId}`, this.task)
            //         .then((res) => { // 成功時
            //             // 送信完了
            //             this.isSubmitting = false;
            //             // タスク詳細へ
            //             this.$router.push({name: 'task.detail', params: {taskId: this.taskId}});
            //         });
            // // それ以外 → 登録通信
            // } else {
            //     this.axios.post('/tasks', this.task)
            //         .then((res) => { // 成功時
            //             // 送信完了
            //             this.isSubmitting = false;
            //             // 一覧へ
            //             this.$router.push({name: 'task.list'});
            //         });
            // }
        },
    },
}
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- フォーム -->
                <form @submit.prevent="onSubmit">
                    <!-- エリア1 -->
                    <div class="mb-3">
                        <InputLabel for="level1_area_cd" value="都道府県" />
                        <SelectMovieTheaterArea id="level1_area_cd" :style="{ width: '100%' }" v-model="form.level1_area_cd" required autofocus />
                        <InputError class="mt-2 text-danger" :message="form.errors.level1_area_cd" />
                    </div>
                    <!-- エリア2 -->
                    <div class="mb-3">
                        <InputLabel for="level2_area_cd" value="最寄り" />
                        <SelectMovieTheaterArea id="level2_area_cd" :style="{ width: '100%' }" :parentAreaCd="form.level1_area_cd" v-model="form.level2_area_cd" required />
                        <InputError class="mt-2 text-danger" :message="form.errors.level2_area_cd" />
                    </div>
                    <!-- 映画館 -->
                    <div class="mb-3">
                        <InputLabel for="movie_theater_cd" value="映画館" />
                        <SelectMovieTheater id="movie_theater_cd" :style="{ width: '100%' }" :areaCd="form.level2_area_cd" v-model="form.movie_theater_cd" required />
                        <InputError class="mt-2 text-danger" :message="form.errors.movie_theater_cd" />
                    </div>
                    <!-- 上映日 -->
                    <div class="mb-3">
                        <InputLabel for="movie_theater_cd" value="上映日" />
                        <Datepicker
                            v-model="form.broadcast_day"
                            :minDate="new Date()"
                            :enableTimePicker="false" 
                            :disabledDates="[new Date()]"
                            showNowButton nowButtonLabel="今日"
                            autoApply
                            locale="ja" :format-locale="ja"
                        />
                        <InputError class="mt-2 text-danger" :message="form.errors.movie_theater_cd" />
                    </div>

                    <!-- 登録編集ボタン -->
                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="btn btn-success" :style="{ width: '100%' }" :class="{ 'opacity-25': form.processing }" :disabled="canSubmit()">予約</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>