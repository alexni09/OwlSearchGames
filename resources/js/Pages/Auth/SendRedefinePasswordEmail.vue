<script setup>
import { Head, Link } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import HomeSVG from '@/Components/SVG/HomeSVG.vue'
import EmailNotes from '@/Components/Email/EmailNotes.vue'
</script>
<template>
    <Head :title="$msg.redefinePassword" />
    <NarrowLayout>
        <h3 class="mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.redefinePassword }}</h3>
        <p class="mt-1 mb-4 text-orange-700 dark:text-amber-100">{{ $msg.redefinePasswordText }}</p>
        <EmailNotes />
        <div class="flex flex-row-reverse">
            <Link href="/" as="button" type="button"
                class="p-4 bg-orange-100 border-[3px] dark:bg-green-700 border-orange-700 dark:border-green-200 rounded-2xl"><HomeSVG /></Link>
        </div>
    </NarrowLayout>
</template>