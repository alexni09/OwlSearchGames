<script setup>
import { getCurrentInstance } from 'vue'
import { useChangeLocaleAxios } from '@/Composables/useChangeLocaleAxios'
let { changeLocaleAxios } = useChangeLocaleAxios()
const emit = defineEmits(['responsiveLocaleSelected'])
const app = getCurrentInstance()
const changeLocale = (k) => {
    app.appContext.config.globalProperties.$setLocale(k)
    changeLocaleAxios(k)
    emit('responsiveLocaleSelected')
}
</script>
<template>
    <div v-for="(vl,k) in $localeInfo" :key="k">
        <button v-if="$locale.locale !== k" class="responsiveLink" @click.prevent="changeLocale(k)">{{ vl.name }}</button>
    </div>
</template>
<style lang="postcss" scoped>
.responsiveLink {
    @apply italic text-base font-medium text-orange-800 dark:text-amber-100 hover:text-orange-900 dark:hover:text-amber-50 transition duration-150 ease-in-out cursor-pointer;
}
</style>