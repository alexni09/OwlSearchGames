<script setup>
import { getCurrentInstance } from 'vue'
const app = getCurrentInstance()
window.addEventListener("beforeunload", function (event) {
    event.preventDefault()
    sessionStorage.setItem("localeBeforeUnload", app.appContext.config.globalProperties.$locale.locale)
})
</script>
<template />