<!--
    Displays the predicted difficulty level for the next game, according to the parameters.
-->
<script setup>
import { ref } from 'vue'
import ArrowSmallRightGreen700 from '@/Components/SVG/ArrowSmallRight/ArrowSmallRightGreen700.vue'
import ArrowSmallRightLime400 from '@/Components/SVG/ArrowSmallRight/ArrowSmallRightLime400.vue'
import ArrowSmallRightOrange500 from '@/Components/SVG/ArrowSmallRight/ArrowSmallRightOrange500.vue'
import ArrowSmallRightRed700 from '@/Components/SVG/ArrowSmallRight/ArrowSmallRightRed700.vue'
import ArrowSmallRightFuchsia950 from '@/Components/SVG/ArrowSmallRight/ArrowSmallRightFuchsia950.vue'
import { useSessionStorage } from '@/Composables/useSessionStorage'
let { getSession, setSession } = useSessionStorage()
const sessionFolder = 'main'
const initialValue = Number(getSession(sessionFolder, 'initialValue', '0'))
const myMilli = 400
const myProps = defineProps({
    difficulty: {
        type: Number,
        min: 0,
        max: 4,
        default: 0
    }
})
let myNumber = myProps.difficulty
setSession(sessionFolder, 'initialValue', String(myNumber))
const circleNumber = ref(initialValue)
let milli = 0
if (myNumber > initialValue) {
    for (let i=initialValue+1; i<=myNumber; i++) {
        milli += myMilli
        setTimeout(() => {
            circleNumber.value = i
        }, milli)
    }
} else if (myNumber < initialValue) {
    for (let i=initialValue-1; i>=myNumber; i--) {
        milli += myMilli
        setTimeout(() => {
            circleNumber.value = i
        }, milli)
    }
}  
</script>
<template>
    <div class="relative p-4 z-0 w-[220px] md:w-[180px] lg:w-[220px] h-[240px] bg-neutral-100 rounded border-2 border-neutral-300">
        <div class="absolute z-20 left-[40px] top-[28px] flex flex-col-reverse">
            <div class="w-7 h-[50px] bg-gradient-to-t from-green-600 from-10% to-lime-400 to-80%" />
            <div class="w-7 h-[50px] bg-gradient-to-t from-lime-400 from-20% to-orange-500 to-80%" />
            <div class="w-7 h-[82px] bg-gradient-to-t from-orange-500 from-10% via-red-700 via-40% to-fuchsia-950 to-70%" />
        </div>
        <ArrowSmallRightGreen700 class="absolute z-20 left-2 top-[181px]" :class="{'hidden': circleNumber !== 0}" />
        <ArrowSmallRightLime400 class="absolute z-20 left-2 top-[143px]" :class="{'hidden': circleNumber !== 1}" />
        <ArrowSmallRightOrange500 class="absolute z-20 left-2 top-[105px]" :class="{'hidden': circleNumber !== 2}" />
        <ArrowSmallRightRed700 class="absolute z-20 left-2 top-[67px]" :class="{'hidden': circleNumber !== 3}" />
        <ArrowSmallRightFuchsia950 class="absolute z-20 left-2 top-[29px]" :class="{'hidden': circleNumber !== 4}" />
        <div class="absolute z-20 left-[76px] top-[184px] text-green-700 whitespace-nowrap text-sm lg:text-base" 
            :class="{'opacity-30': circleNumber !== 0, 'font-semibold': circleNumber === 0}" >
            {{ $msg.difficulty0 }}
        </div>
        <div class="absolute z-20 left-[76px] top-[146px] text-lime-400 whitespace-nowrap text-sm lg:text-base"
            :class="{'opacity-30': circleNumber !== 1, 'font-semibold': circleNumber === 1}" >
            {{ $msg.difficulty1 }}
        </div>
        <div class="absolute z-20 left-[76px] top-[108px] text-orange-500 whitespace-nowrap text-sm lg:text-base"
            :class="{'opacity-30': circleNumber !== 2, 'font-semibold': circleNumber === 2}" >
            {{ $msg.difficulty2 }}
        </div>
        <div class="absolute z-20 left-[76px] top-[70px] text-red-700 whitespace-nowrap text-sm lg:text-base"
            :class="{'opacity-30': circleNumber !== 3, 'font-semibold': circleNumber === 3}" >
            {{ $msg.difficulty3 }}
        </div>
        <div class="absolute z-20 left-[76px] top-[32px] text-fuchsia-950 whitespace-nowrap text-sm lg:text-base"
            :class="{'opacity-30': circleNumber !== 4, 'font-semibold': circleNumber === 4}" >
            {{ $msg.difficulty4 }}
        </div>
    </div>
</template>