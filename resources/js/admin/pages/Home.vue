<template>
    <h1>{{ store.counter }}</h1>
    <button @click="greet">{{name}}</button>
    <br>
    {{a}}
    <h1>{{ auth.auth }}</h1>
    <h1>{{ auth.notAuth }}</h1>
    <button @click="changeAuth">change</button>


    <div>a</div>
</template>
<script>
import { useCounterStore } from './../stores/counter'
import { useAuthStore } from './../stores/auth'
export default {
    // setup() {
    //     const store = useCounterStore();
    //     const auth = useAuthStore();
    //     return {
    //         store,
    //         auth,
    //         a:9,
    //     }
    // },
    data(){
        return {
            store:useCounterStore(),
            auth:useAuthStore(),
            name:'abdulsmia',
        }
    },
    methods: {
        greet() {
            useCounterStore().increment();
        },
                changeAuth() {
            useAuthStore().change();
        }
    }
}
</script>