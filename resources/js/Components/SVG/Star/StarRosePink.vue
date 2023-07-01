<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useRandom } from '@/Composables/useRandom'
import { useAccumulate } from '@/Composables/useAccumulate'
let { getRandomIntInclusive } = useRandom()
let { accumulate } = useAccumulate()
const myProps = defineProps({
    x0: { type:Number, default: 0 },
    y0: { type:Number, default: 0 }
})
const starDivRosePink = ref(null)
const shouldDisplay = ref(0)
let arrTimeout = []
onBeforeUnmount(() => {
    arrTimeout.map(x => clearTimeout(x))
})
onMounted(() => {
    let x = Math.floor(myProps.x0)
    let y = Math.floor(myProps.y0)
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 1
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,3)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,3)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 2
        x += getRandomIntInclusive(0,3)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,3)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,3)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 3
        x += getRandomIntInclusive(0,3)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,0)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 4
        x += getRandomIntInclusive(0,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(0,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 5
        x += getRandomIntInclusive(0,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 4
        x += getRandomIntInclusive(-1,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,2)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(-1,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        y += getRandomIntInclusive(-1,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        x += getRandomIntInclusive(-1,1)
        starDivRosePink.value.style.left = x.toString() + 'px'
        starDivRosePink.value.style.top = y.toString() + 'px'
    }, accumulate(100)))
    arrTimeout.push(setTimeout(() => {
        shouldDisplay.value = 0
    }, accumulate(100)))
})
</script>
<template>
    <div class="absolute" ref="starDivRosePink">
        <svg v-if="shouldDisplay === 1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="w-5 h-5 opacity-80 fill-rose-800 stroke-pink-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>
        <svg v-if="shouldDisplay === 2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="w-6 h-6 opacity-100 fill-rose-800 stroke-pink-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>
        <svg v-if="shouldDisplay === 3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="w-6 h-6 opacity-80 fill-rose-800 stroke-pink-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>
        <svg v-if="shouldDisplay === 4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="w-5 h-5 opacity-50 fill-rose-800 stroke-pink-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>
        <svg v-if="shouldDisplay === 5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" 
            class="w-4 h-4 opacity-20 fill-rose-800 stroke-pink-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>
    </div>
</template>