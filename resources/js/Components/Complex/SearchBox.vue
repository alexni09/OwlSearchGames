<!--
    A search box with css.
    * Emits the default event.
    * Emits the event 'thisSearch' when either:
      - the user presses the enter key;
      - or myMili milliseconds elapses without the user pressing another key.
    Please note: that event will not fire with less than myNumber characters.
-->
<script setup>
import { ref, watch } from 'vue'
import SearchLens from '@/Components/SVG/SearchLens.vue'
const myNumber = 5
const myMili = 4000
const myProps = defineProps({
    modelValue: {
        type: String,
        default: ""
    },
    placeholder: {
        type: String,
        default: ""
    }
})
const emit = defineEmits(['update:modelValue','thisSearch'])
const initialValue = myProps.modelValue
const thisValue = ref(initialValue)
const emitSearch = (cancelTimeout = false) => {
    /* true iff the enter key was pressed; and if so only the last Timeout matters */
    if (cancelTimeout) { 
        clearTimeout(myTimeout)
        /* Note: if the blur() event is unimportant, comment the following line: */
        //idInputField.value.blur()
    }
    /* Scenario1: comes in with a search and the user wishes to clear that search. (Needs to press enter.) */
    if (cancelTimeout && (initialValue !== '') && (thisValue.value.length < myNumber)) {
        emit('thisSearch', '')
    /* Scenario2: less characters than the accepted minimum. */
    } else if (thisValue.value.length < myNumber) { 
        //
    /* Scenario3: after such milliseconds. */
    } else if (!cancelTimeout || (lastText !== thisValue.value)) { /* the enter key won't send the event again */
        emit('thisSearch', thisValue.value)
    /* Scenario4: user presses enter after the event is fired due to waiting such milliseconds. */
    } else {
        // repeated enter key.
    }
}
let lastText = Symbol()
let lastKeydown = 0
const updateMili = () => lastKeydown = Date.now()
let myTimeout = null
watch(thisValue, () => {
    emit('update:modelValue', thisValue.value) /* This needs to be updated anyway. */
    updateMili()
    myTimeout = setTimeout(() => {
        let m = Date.now()
        if (m >= myMili + lastKeydown) {
            updateMili()
            emitSearch()
            lastText = thisValue.value
        }
    }, myMili)
})
const idInputField = ref(null) /* Needed for blur() */
</script>
<template>
    <div class="h-12 bg-orange-100 dark:bg-green-800 text-orange-700 dark:text-green-200 relative">
        <input type="text" maxlength="25" 
            class="relative mt-1 w-72 h-8 rounded-full py-5 cursor-text 
            text-orange-700 dark:text-green-200
            bg-amber-200 dark:bg-emerald-700
            border-2 border-amber-800 dark:border-emerald-200
            placeholder:text-amber-200 placeholder:dark:text-emerald-700
            hover:placeholder:text-amber-700 hover:placeholder:dark:text-emerald-200  
            focus:placeholder:text-amber-700 focus:placeholder:dark:text-emerald-200
            focus:border-amber-800 focus:dark:border-emerald-200
            focus:ring focus:ring-amber-800 focus:dark:ring-emerald-100 focus:ring-opacity-50 
            outline-none"
            v-model="thisValue" @keydown.enter="emitSearch(true)" ref="idInputField" :placeholder="placeholder">
        <SearchLens class="absolute z-20 right-[10px] top-[15px] cursor-default" @click="emitSearch" />
    </div>
</template>