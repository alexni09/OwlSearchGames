<script setup>
import { getCurrentInstance, computed } from 'vue'
import TheDropdownLocale from '@/Components/NavigationBar/TheDropdownLocale.vue'
import GlobeIcon from '@/Components/SVG/GlobeIcon.vue'
import { useChangeLocaleAxios } from '@/Composables/useChangeLocaleAxios'
let { changeLocaleAxios } = useChangeLocaleAxios()
const app = getCurrentInstance()
const changeLocale = (k) => {
    app.appContext.config.globalProperties.$setLocale(k)
    changeLocaleAxios(k)
}
const isDarkMode = computed(() => window.matchMedia && (window.matchMedia(`(prefers-color-scheme: dark)`) === true 
                                                     || window.matchMedia(`(prefers-color-scheme: dark)`).matches === true))
</script>
<template>
    <TheDropdownLocale>
        <template #trigger>
            <button class="text-sm font-medium text-gray-500 mt-6">
                <div class="flex flex-row place-items-center relative top-[-2px]">
                    <GlobeIcon class="mr-[2px]" />
                    <span :class="{'text-amber-100':isDarkMode, 'text-emerald-700':!isDarkMode}">{{ $msg.localeChange }}</span>
                </div>
            </button>
        </template>
        <template #content>
            <button class="localeSwitcherButton" v-for="(vl,k) in $localeInfo" :key="k"
                @click.prevent="changeLocale(k)" :disabled="$locale.locale === k">
                <span class="ml-3">{{ vl.name }}</span>
            </button>
        </template>
    </TheDropdownLocale>
</template>
<style lang="postcss" scoped>
.localeSwitcherButton {
    @apply block w-full px-4 py-2 text-left text-sm leading-5 
    bg-amber-100 dark:bg-emerald-600
    text-orange-800 dark:text-amber-50
    disabled:text-gray-500 disabled:dark:text-gray-300
    hover:bg-amber-100 dark:hover:bg-emerald-700 
    focus:bg-amber-100 dark:focus:bg-emerald-700
    transition duration-150 ease-in-out;
}
</style>