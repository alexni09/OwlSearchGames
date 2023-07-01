<script setup>
import Swal from 'sweetalert2'
import { getCurrentInstance, onMounted, onUnmounted, computed, watch } from 'vue'
const app = getCurrentInstance()
const fl = computed(() => app.appContext.config.globalProperties.$misc.flashMessage)
onMounted(() => {
    app.appContext.config.globalProperties.$canRemoveFlashMessage = true
})
onUnmounted(() => {
    if (app.appContext.config.globalProperties.$canRemoveFlashMessage)
        app.appContext.config.globalProperties.$misc.flashMessage = null
})
watch(fl, () => {
    if (app.appContext.config.globalProperties.$misc.flashMessage != null) {
        Swal.fire(app.appContext.config.globalProperties.$misc.flashMessage)
        app.appContext.config.globalProperties.$misc.flashMessage = null
    }
})
</script>
<template />