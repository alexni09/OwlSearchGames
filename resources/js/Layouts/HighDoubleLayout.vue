<script setup>
import { onMounted, toRaw, ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/Logo/ApplicationLogoMedium.vue'
import MustUpdateLocale from '@/Components/JS/MustUpdateLocale.vue'
import SaveLocaleBeforeUnload from '@/Components/JS/SaveLocaleBeforeUnload.vue'
const background = toRaw(usePage().props.background)
const backgroundDiv = ref(null)
onMounted(() => {
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
})
</script>
<template>
    <MustUpdateLocale />
    <SaveLocaleBeforeUnload />
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 
            bg-orange-200 dark:bg-green-600 border-b border-amber-100 dark:border-emerald-600
            w-full h-[1280px] bg-cover"
            ref="backgroundDiv">
        <div>
            <ApplicationLogo />
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg">
            <slot name="one" />
        </div>
        <div class="w-full sm:max-w-md mt-12 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg" v-if="$slots.two">
            <slot name="two" />
        </div>
    </div>
</template>