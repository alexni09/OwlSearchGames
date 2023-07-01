<script setup>
defineProps({
    modelValue: { type: Boolean, default: false }
})
</script>
<template>
    <svg class="p-1 h-9 w-9
        stroke-orange-800 dark:stroke-amber-100
        border-2 border-orange-800 dark:border-amber-100 
        cursor-pointer rounded-md
        transition duration-150 ease-in-out" fill="none" viewBox="0 0 24 24">
        <path
            :class="{
                hidden: modelValue,
                'inline-flex': !modelValue,
            }"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
        />
        <path
            :class="{
                hidden: !modelValue,
                'inline-flex': modelValue,
            }"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
        />
    </svg>
</template>