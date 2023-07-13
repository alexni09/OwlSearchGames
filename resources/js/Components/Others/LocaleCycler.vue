<script setup>
import { getCurrentInstance } from 'vue'
import GlobeIcon from '@/Components/SVG/GlobeIcon.vue'
import { useChangeLocaleAxios } from '@/Composables/useChangeLocaleAxios'
let { changeLocaleAxios } = useChangeLocaleAxios()
const app = getCurrentInstance()
const changeLocale = (k) => {
    app.appContext.config.globalProperties.$setLocale(k)
    changeLocaleAxios(k)
}
const cycle = () => {
    let loc = app.appContext.config.globalProperties.$locale.locale
    if (loc === 'en') changeLocale('pt')
    else if (loc === 'pt') changeLocale('en')
}
</script>
<template>
    <div class="flex flex-row items-center py-1 pl-2 pr-[10px]
                bg-amber-100 dark:bg-emerald-700
                border-2 border-emerald-700 dark:border-amber-100 rounded cursor-pointer" 
        @click.prevent="cycle()">
        <GlobeIcon class="mr-1" />
        <span class="uppercase text-sm font-semibold text-emerald-700 dark:text-amber-100">{{ $locale.locale }}</span>
    </div>
</template>