<script setup>
defineProps({
    message: {
        type: String,
        default: 'Generic Error'
    }
})
</script>
<template>
    <div class="min-h-screen flex justify-center items-center">
        <p class="min-h-[50%]"></p>
        <p class="uppercase font-medium text-gray-500">{{ message }}</p>
    </div>
</template>