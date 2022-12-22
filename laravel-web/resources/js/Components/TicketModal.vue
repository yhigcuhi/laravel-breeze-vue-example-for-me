<script setup>
// イベント定義
const emit = defineEmits(['onClickClose']);

// 閉じるボタンハンドリング
const onClickClose = (e) => {
    // バブリング させん
    e.preventDefault();
    // 閉じるイベント発火
    emit('onClickClose');
}

</script>
<template>
    <div class="my-modal">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <!-- <template v-slot:title> -->
                    <slot name="title" />
                </h5>
                <p class="card-text">
                    <!-- <template v-slot:main> -->
                    <slot name="main" />
                </p>
            </div>
            <div class="card-footer">
                <button @click="onClickClose" class="btn btn-primary">close</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* この画面だけのデザイン scoped */
.my-modal {
    /*　要素を重ねた時の順番　*/
    z-index:1;

    /*　画面全体を覆う設定　*/
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.5);
    /* 余白あり */
    padding: 32px;

    /*　画面の中央に要素を表示させる設定　*/
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
