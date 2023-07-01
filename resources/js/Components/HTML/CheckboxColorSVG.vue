<!--
    A color check box. Green for true; red for false.
    Uses different SVGs.
-->
<script setup>
import { ref, computed } from 'vue'
const myProps = defineProps({
    modelValue: {
        type: Boolean,
        default: true
    },
    tabindex: {
        type: Number,
        default: 0
    },
    reverse: {
        type: Boolean,
        default: false
    }
})
const emit = defineEmits(['update:modelValue'])
const myState = ref(myProps.modelValue)
const myClass = computed(() => myState.value ? 'text-gray-700' : 'text-gray-400 line-through')
const exec = () => {
    myState.value = !myState.value
    emit('update:modelValue', myState.value)
}
const exec2 = (e) => {
    if ((e.keyCode === 13) || (e.keyCode === 32)) {
        myState.value = !myState.value
        emit('update:modelValue', myState.value)
    }
}
const isDarkMode = computed(() => window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches)
</script>
<template>
    <div :tabindex="tabindex" class="outline-none flex place-items-center" :class="{ 'flex-row-reverse': myProps.reverse} " @keydown="exec2">
        <div v-if="myState" @click="exec">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
                class="w-5 h-5 cursor-pointer" :class="{'stroke-emerald-700': !isDarkMode, 'stroke-emerald-200': isDarkMode}" >
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div v-else @click="exec">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="w-5 h-5 stroke-red-600 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <span @click="exec" class="mx-1 cursor-pointer text-orange-700 dark:text-amber-100" :class="myClass" >
            <slot />
        </span>
    </div>
</template>