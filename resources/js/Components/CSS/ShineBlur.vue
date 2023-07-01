<!--
    Dipslays the blurred white semi-transparent light as needed for the diagonal moving effect.
-->
<script setup>
defineProps({
    v1: {
        type: Number,
        min: 1
    },
    v2: {
        type: Number,
        min: 1
    }
})
</script>
<template>
    <div v-if="v1 === v2"
        class= "absolute z-20 bg-opacity-80 blur-md rounded-full
                bg-white
                w-3 h-3
                sm:w-[14px] sm:h-[14px]
                md:w-4 md:h-4
                lg:w-5 lg:h-5
                xl:w-7 xl:h-7
                2xl:w-9 2xl:h-9
                -translate-x -translate-y pointer-events-none"
    />
</template>