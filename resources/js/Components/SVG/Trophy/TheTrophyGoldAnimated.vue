<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useAccumulate } from '@/Composables/useAccumulate'
let { accumulate } = useAccumulate()
const phase = ref(1)
let timeout1 = undefined
let timeout2 = undefined
let timeout3 = undefined
let timeout4 = undefined
onMounted(() => {
    timeout1 = setTimeout(() => { phase.value = 2 }, accumulate(2300))
    timeout2 = setTimeout(() => { phase.value = 3 }, accumulate(2300))
    timeout3 = setTimeout(() => { phase.value = 4 }, accumulate(1000))
    timeout4 = setTimeout(() => { phase.value = 5 }, accumulate(1700))
    document.getElementById('applause').play()
})
onBeforeUnmount(() => {
    clearTimeout(timeout1)
    clearTimeout(timeout2)
    clearTimeout(timeout3)
    clearTimeout(timeout4)
})
</script>
<template>
    <div class="relative z-0">
        <audio id="applause" src="/audio/applause2.mp3" preload="auto" />
        <svg v-if="phase === 1" id="trophyGoldSVG1" 
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="relative z-10 w-7 h-7 stroke-orange-700 dark:stroke-orange-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
        </svg>
        <svg v-if="phase === 2" id="trophyGoldSVG2" 
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="relative z-10 w-7 h-7 stroke-orange-700 dark:stroke-orange-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
        </svg>
        <svg v-if="phase === 3" id="trophyGoldSVG3" 
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="relative z-10 w-7 h-7 stroke-orange-700 dark:stroke-orange-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
        </svg>
        <svg v-if="phase === 4" id="trophyGoldSVG4" 
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="relative z-10 w-7 h-7 stroke-orange-700 dark:stroke-orange-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
        </svg>
        <svg v-if="phase === 5" id="trophyGoldSVG5" 
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="relative z-10 w-7 h-7 stroke-orange-700 dark:stroke-orange-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
        </svg>
        <div v-if="phase === 1" 
            class="absolute z-20 -top-[10px] -left-[10px] w-12 h-12 rounded-full
                bg-yellow-200/70 blur-md 
                dark:bg-yellow-200/30 dark:blur-lg" />
        <div v-if="phase === 2" 
            class="absolute z-20 -top-[10px] -left-[10px] w-12 h-12 rounded-full
                bg-yellow-200/50 blur-sm
                dark:bg-yellow-200/40 dark:blur-md" />
        <div v-if="phase === 3" 
            class="absolute z-20 -top-[10px] -left-[10px] w-12 h-12 rounded-full
                bg-yellow-400/30 blur-sm
                dark:bg-yellow-400/60 dark:blur-md" />
        <div v-if="phase === 4" 
            class="absolute z-20 -top-[10px] -left-[10px] w-12 h-12 rounded-full
                bg-yellow-300/60 blur-sm
                dark:bg-yellow-300/50 dark:blur-md" />
        <div v-if="phase === 5" 
            class="absolute z-20 -top-[10px] -left-[10px] w-12 h-12 rounded-full
                bg-yellow-200/80 blur-md
                dark:bg-yellow-300/50 dark:blur-lg" />
    </div>
</template>
<style scoped>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% {  transform: rotate(359deg); }
}
#trophyGoldSVG1 { animation: spin 2.3s linear infinite; }
#trophyGoldSVG2 { animation: spin 2.3s linear infinite; }
#trophyGoldSVG3 { animation: spin 1s linear infinite; }
#trophyGoldSVG4 { animation: spin 1.7s linear infinite; }
</style>