<script>
// 部品
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'AppendLinkButton',
    // 利用コンポーネント   
    components: {
        Link,
    },
    props: {
        href: {
            required: true
        },
        class:{
            required: false
        },
    },
}
</script>

<template>
    <!-- 追加ボタン -->
    <Link :href="href" :class="`btn btn-success ${this.class}`">
        <!-- テキストなど子階層s -->
        <slot></slot>
    </Link>
</template>
