<script setup>
import { Link } from '@inertiajs/vue3'
</script>
<template>
    <Link :href="route('home')">
        <img src="/images/logo/owl96.jpg" class="block h-24 border-2 border-emerald-950 rounded-2xl bg-black opacity-90 shadow-md" />
    </Link>
</template>