<script setup>
import { Link } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import HomeSVG from '@/Components/SVG/HomeSVG.vue'
</script>
<template>
    <NarrowLayout>
        <div class="flex justify-between items-start">
            <h3 class="mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.whoops }}</h3>
            <LocaleCycler class="mt-1" />
        </div>
        <p class="mt-1 mb-4 text-orange-700 dark:text-amber-100">{{ $msg.somethingWentWrong }}</p>
        <p class="mt-1 mb-4 text-orange-700 dark:text-amber-100">{{ $msg.tryAgainLater }}</p>
        <div class="flex flex-row-reverse">
            <Link :href="route('logout')" as="button" type="button"
                class="p-4 bg-orange-100 border-[3px] dark:bg-green-700 border-orange-700 dark:border-green-200 rounded-2xl"><HomeSVG /></Link>
        </div>
    </NarrowLayout>
</template>