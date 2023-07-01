<script setup>
import { getCurrentInstance } from 'vue'
import { usePage } from '@inertiajs/vue3'
const app = getCurrentInstance()
const locale = usePage().props.auth.locale
const mustUpdateLocale = usePage().props.mustUpdateLocale
if (mustUpdateLocale) app.appContext.config.globalProperties.$setLocale(locale)
</script>
<template />