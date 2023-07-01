<!--
    A range slider that changes colors according to the selected value (for height).
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
    document.getElementById('sliderHeightAudio').play()
    emit('update:modelValue',Number(myValue.value))
}
</script>
<template>
    <audio id="sliderHeightAudio" src="/audio/slider1.mp3" preload="auto" />
    <div class="px-3 py-1 w-60 flex flex-row place-items-center bg-neutral-100 rounded-xl border-2 border-neutral-300">
        <input type="range" :tabindex="tabindex" min="8" max="18" step="1"
            class="cursor-pointer outline-none"
            :class="{
                'accent-green-600': myValue < 10, 
                'accent-lime-500': myValue >= 10 && myValue < 12, 
                'accent-yellow-400': myValue >= 12 && myValue < 14, 
                'accent-orange-400': myValue >= 14 && myValue < 16, 
                'accent-red-700': myValue >= 16 && myValue < 18, 
                'accent-fuchsia-800': myValue >= 18
            }" 
            v-model="myValue" @change="exec" >
        <span class="ml-2 text-xs sm:text-sm lg:text-base"
            :class="{
                'text-green-600': myValue < 10, 
                'text-lime-500': myValue >= 10 && myValue < 12, 
                'text-yellow-400': myValue >= 12 && myValue < 14, 
                'text-orange-400': myValue >= 14 && myValue < 16, 
                'text-red-700': myValue >= 16 && myValue < 18, 
                'text-fuchsia-800': myValue >= 18
            }" 
        >{{ myValue }}</span>
    </div>
</template>