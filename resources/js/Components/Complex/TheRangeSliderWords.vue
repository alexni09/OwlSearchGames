<!--
    A range slider that changes colors according to the selected value (for word quantity).
-->
<script setup>
import { ref } from 'vue'
const myProps = defineProps({
    modelValue: {
        type: Number,
        default: 10
    },
    tabindex: {
        type: Number,
        default: 0
    }
})
const emit = defineEmits(['update:modelValue'])
const myValue = ref(myProps.modelValue)
const exec = () => {
    document.getElementById('sliderWordsAudio').play()
    emit('update:modelValue',Number(myValue.value))
}
</script>
<template>
    <audio id="sliderWordsAudio" src="/audio/slider1.mp3" preload="auto" />
    <div class="px-3 py-1 w-60 flex flex-row place-items-center bg-neutral-100 rounded-xl border-2 border-neutral-300">
        <input type="range" :tabindex="tabindex" min="10" max="28" step="1"
            class="cursor-pointer outline-none"
            :class="{
                'accent-green-600': myValue < 12, 
                'accent-lime-500': myValue >= 12 && myValue < 15, 
                'accent-yellow-400': myValue >= 15 && myValue < 18, 
                'accent-orange-400': myValue >= 18 && myValue < 21, 
                'accent-red-700': myValue >= 21 && myValue < 25, 
                'accent-fuchsia-800': myValue >= 25
            }" 
            v-model="myValue" @change="exec" >
        <span class="ml-2 text-xs sm:text-sm lg:text-base"
            :class="{
                'text-green-600': myValue < 12, 
                'text-lime-500': myValue >= 12 && myValue < 15, 
                'text-yellow-400': myValue >= 15 && myValue < 18, 
                'text-orange-400': myValue >= 18 && myValue < 21, 
                'text-red-700': myValue >= 21 && myValue < 25, 
                'text-fuchsia-800': myValue >= 25
            }" 
        >{{ myValue }}</span>
    </div>
</template>