<script setup>
const myProps = defineProps(['magnifyingGlassClass'])
</script>
<template>
    <button class="border-2 border-gray-300 w-8 h-8 rounded-full pl-[3px] cursor-default text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5" :class="magnifyingGlassClass">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </button>
</template>