<template>
    <h1>{{ store.counter }}</h1>
    <!-- <h1>{{ title }}</h1> -->
    <button @click="greet">Add 1</button>

    <div>a</div>
</template>
<script>
import { useCounterStore } from './../stores/counter'
export default {
    setup(){
   const store = useCounterStore();
       return {
        store,
       }
    },
    methods: {
  greet() {
    //alert(useCounterStore().counter);
    useCounterStore().increment();
    }
    }
}
</script>