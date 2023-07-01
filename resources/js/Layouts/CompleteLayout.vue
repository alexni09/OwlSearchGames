<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/Logo/ApplicationLogoSmall.vue'
import TheAuthUserNavigationBar from '@/Components/NavigationBar/TheAuthUserNavigationBar.vue'
import TheLocaleSwitcher from '@/Components/NavigationBar/TheLocaleSwitcher.vue'
import TheLightBulbFeeder from '@/Components/NavigationBar/TheLightBulbFeeder.vue'
import TheHamburgerX from '@/Components/Hamburger/TheHamburgerX.vue'
import TheResponsiveLocaleSwitcher from '@/Components/Hamburger/TheResponsiveLocaleSwitcher.vue'
import FlashMessage from '@/Components/JS/FlashMessage.vue'
import MustUpdateLocale from '@/Components/JS/MustUpdateLocale.vue'
import SaveLocaleBeforeUnload from '@/Components/JS/SaveLocaleBeforeUnload.vue'
import { useDebounce } from '@/Composables/useDebounce'
import { useCan } from '@/Composables/useCan'
let { debounce } = useDebounce()
let { can } = useCan()
const smallSizeBreakpoint = 640
const showingNavigationDropdown = ref(false)
const myInnerWidth = ref(innerWidth)
const user = computed(() => usePage().props.auth.user)
const pronoun = computed(() => usePage().props.auth.pronoun)
const locale = computed(() => usePage().props.auth.locale)
const closeHamburger = () => { showingNavigationDropdown.value = false }
onMounted(() => {
    addEventListener('resize', debounce(() => {
        myInnerWidth.value = innerWidth
        if (innerWidth >= smallSizeBreakpoint) closeHamburger()
    }, 200, false), false)
})
onUnmounted(() => {
    window.removeEventListener('resize', debounce, false)
})
</script>
<template>
    <MustUpdateLocale />
    <SaveLocaleBeforeUnload />
    <FlashMessage />
    <div>
        <div class="min-h-screen bg-orange-100 dark:bg-green-700 text-orange-700 dark:text-orange-100">
            <nav class="bg-orange-200 dark:bg-green-800 border-b border-amber-100 dark:border-emerald-600">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex justify-between">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <ApplicationLogo />
                            </div>
                            <!-- Locale Switcher -->
                            <div class="navLinkDiv" v-if="$locale.canShow && $localeInfo != null && Object.keys($localeInfo).length > 1">
                                <TheLocaleSwitcher />
                            </div>
                            <!-- Score -->
                            <div id="score" class="shrink-0 flex items-center ml-0 sm:ml-2 md:ml-3 lg:ml-5" />
                        </div>
                        <div class="flex">
                            <!-- Idea Feeder -->
                            <TheLightBulbFeeder 
                                class="flex -right-10 sm:-left-10 top-[18px]" />
                            <!-- User Info -->
                            <TheAuthUserNavigationBar v-if="myInnerWidth >= smallSizeBreakpoint" class="flex mr-2 mt-[2px]" />
                        </div>
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <TheHamburgerX v-model="showingNavigationDropdown" 
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="mr-2" />
                        </div>
                    </div>
                </div>
                <!-- Responsive Navigation Menu -->
                <div class="sm:hidden"
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" >
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                        <!-- pronoun, locale, email, userid -->
                        <div v-if="user != null" class="px-4">
                            <div class="font-semibold text-orange-800 dark:text-amber-100">
                                <span v-if="user.show_name && user.show_pronoun && locale === $locale.locale">{{ pronoun }}&nbsp;</span>
                                <span v-if="user.show_name">{{ user.name }}</span>
                            </div>
                            <div v-if="user.show_email || user.show_user_id">
                                <span v-if="user.show_email" class="text-orange-700 dark:text-amber-100 text-sm">{{ user.email }}</span>
                                <span v-if="user.show_user_id" class="text-indigo-600 dark:text-indigo-300 text-sm font-semibold">&nbsp;[{{ user.user_id }}]</span>
                            </div>
                        </div>
                        <!-- register, login -->
                        <div v-else class="mx-4">
                            <div><Link :href="route('login')" class= "responsiveLink">{{ $msg.login2 }}</Link></div>
                            <div><Link :href="route('register.create')" class= "responsiveLink">{{ $msg.register }}</Link></div>
                        </div>
                        <!-- locale -->
                        <div class="mx-4">
                            <hr class="my-3 border-orange-800 dark:border-amber-100" />
                            <TheResponsiveLocaleSwitcher @responsiveLocaleSelected="closeHamburger" />
                            <hr v-if="user != null" class="my-3 border-orange-800 dark:border-amber-100" />
                            <div v-else class="h-3" />
                        </div>
                        <!-- profile &c -->
                        <div v-if="user != null" class="space-y-1 px-4">
                            <div v-if="can('profile.update')"><Link :href="route('profile.edit')" class= "responsiveLink">{{ $msg.profileEdit }}</Link></div>
                            <div v-if="can('password.update')"><Link :href="route('updatePassword.create')" class= "responsiveLink">{{ $msg.updatePassword }}</Link></div>
                            <div>
                                <Link :href="route('logout')"
                                    class= "text-base font-medium 
                                            text-red-600 dark:text-red-400
                                            hover:text-red-700 dark:hover:text-red-300
                                            transition duration-150 ease-in-out
                                    ">{{ $msg.logout }}</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page Heading -->
            <header class="bg-orange-200 dark:bg-green-600 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>
            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
<style lang="postcss" scoped>
.navLinkDiv {
    @apply hidden space-x-8 sm:-my-px sm:ml-2 sm:flex md:ml-4 lg:ml-8;
}
.responsiveLink {
    @apply text-base font-medium text-orange-800 dark:text-amber-100 hover:text-orange-900 dark:hover:text-amber-50 transition duration-150 ease-in-out cursor-pointer;
}
</style>