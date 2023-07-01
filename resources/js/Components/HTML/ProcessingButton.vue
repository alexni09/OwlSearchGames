<script setup>
defineProps({
    modelValue: {
        type: Boolean,
        default: false
    }
})
</script>
<template>
    <button :disabled="modelValue" 
        class="text-center px-3 py-2 bg-blue-600 text-white rounded disabled:opacity-75 disabled:cursor-not-allowed w-24">
        <span v-if="modelValue" class="circleAnimation"></span>
        <span v-else class="text-center uppercase"><slot /></span>
    </button>
</template>
<style lang="postcss" scoped>
.circleAnimation {
    @apply inline-block animate-spin w-4 h-4 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full;
}
</style>