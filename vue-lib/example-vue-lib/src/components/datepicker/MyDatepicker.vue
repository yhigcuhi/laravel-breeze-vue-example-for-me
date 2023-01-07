<script setup>
/** import datepicker for vue */
import Datepicker from '@vuepic/vue-datepicker';
import { ja } from 'date-fns/locale';
</script>
<template>
    <Datepicker
        :format-locale="ja"
        format="yyyy年MM月dd日(E)"
        autoApply
        show-now-button
        now-button-label="Current"
    />
</template>