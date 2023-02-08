import { defineStore } from "pinia";
import { ref, computed } from "vue";

export const useCounterStore = defineStore('counter', () =>{
    const count = ref(16)
    const compruebaReset = computed(() => count.value == 16)
    function increment(){
        count.value += 4;
    }
    function decrement(){
        count.value -= 4;
    }

    function reset(){
        count.value = 16;
    }

    return {count,compruebaReset, increment, decrement, reset}
})