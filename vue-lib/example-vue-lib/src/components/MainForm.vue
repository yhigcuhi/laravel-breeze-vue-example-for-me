<script setup>
/** import vue */
import { reactive } from 'vue';
/** import 部品 */
import Datepicker from './datepicker/MyDatepicker.vue';

// フォームの値
const form = reactive({
    email: '',
    password: '',
    date: null,
});
</script>

<template>
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="form.email" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" v-model="form.password" >
        </div>
        <div class="mb-3">
            <label for="example-date-pick" class="form-label">日付</label>
            <Datepicker id="example-date-pick" v-model="form.date" />
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>