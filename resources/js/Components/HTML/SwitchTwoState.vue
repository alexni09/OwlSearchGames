<script setup>
import { ref, computed } from 'vue'
import { useUniqueID } from '@/Composables/useUniqueID'
let { uniqueID } = useUniqueID()
const myProps = defineProps({
    modelValue: {
        type: Boolean,
        default: false
    },
    tabindex: {
        type: Number,
        default: 0
    }
})
const emit = defineEmits(['update:modelValue'])
const myState = ref(myProps.modelValue)
const myClass = computed(() => myState.value ? "left-7 bg-emerald-600" : "left-1 bg-neutral-300")
const audioID = uniqueID()
const exec = () => {
    myState.value = !myState.value
    playSound()
    emit('update:modelValue',myState.value)
}
const exec2 = (e) => {
    switch (e.keyCode) {
        case 13: case 32: myState.value = !myState.value; playSound(); emit('update:modelValue',myState.value); break;
        case 37: myState.value = false; playSound(); emit('update:modelValue',myState.value); break;
        case 39: myState.value = true; playSound(); emit('update:modelValue',myState.value); break;
    }
}
const playSound = () => { document.getElementById(audioID).play() }
</script>
<template>
    <div class="relative w-12 outline-none" @click="exec" :tabindex="tabindex" @keydown="exec2">
        <audio :id="audioID" src="/audio/controlswitch1.mp3" preload="auto" />
        <div class="relative z-10 w-12 h-6 bg-neutral-100 rounded-full border-2 border-neutral-300 hover:cursor-pointer" />
        <div class="absolute z-20 top-1 h-4 w-4 rounded-full transition-all hover:cursor-pointer" :class="myClass" />
    </div>
</template>