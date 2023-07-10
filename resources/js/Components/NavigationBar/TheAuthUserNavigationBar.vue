<script setup>
import { computed } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'
import TheAuthUser from '@/Components/NavigationBar/TheAuthUser.vue'
import TheDropdownAuth from '@/Components/NavigationBar/TheDropdownAuth.vue'
import UserCircle from '@/Components/SVG/UserCircle.vue'
import IdentificationSVG from '@/Components/SVG/IdentificationSVG.vue'
import ArrowRectangleRight from '@/Components/SVG/ArrowRectangleRight.vue'
import UserPlus from '@/Components/SVG/UserPlus.vue'
import { useCan } from '@/Composables/useCan'
let { can } = useCan()
const user = computed(() => usePage().props.auth.user)
</script>
<template>
    <div v-if="user != null">
        <TheDropdownAuth>
            <template #trigger>
                <button class="text-sm font-medium text-gray-500 mt-6">
                    <div class="flex flex-row place-items-center relative top-[-12px]">
                        <TheAuthUser />
                    </div>
                </button>
            </template>
            <template #content>
                <div v-if="can('profile.update')">
                    <Link :href="route('profile.edit')" as="button" type="button"
                        class="my-1 mx-2 w-[240px] px-3 py-2 bg-sky-400 text-white font-semibold text-sm 
                        flex flex-row-reverse place-items-center
                        hover:underline uppercase rounded-sm whitespace-nowrap">
                        <IdentificationSVG class="mx-1" />
                        <span>{{ $msg.profileEdit }}</span>
                    </Link>
                </div>
                <div v-if="can('password.update')">
                    <Link :href="route('updatePassword.create')" as="button" type="button"
                        class="my-1 mx-2 w-[240px] px-3 py-2 bg-sky-400 text-white font-semibold text-sm 
                        flex flex-row-reverse place-items-center
                        hover:underline uppercase rounded-sm whitespace-nowrap">
                        <UserCircle class="mx-1" />
                        <span>{{ $msg.updatePassword }}</span>
                    </Link>
                </div>
                <div v-if="can('admin.generic')">
                    <Link :href="route('querydb.show')" as="button" type="button"
                        class="my-1 mx-2 w-[240px] px-3 py-2 bg-cyan-600 text-white font-semibold text-sm 
                        flex flex-row-reverse place-items-center
                        hover:underline uppercase rounded-sm whitespace-nowrap">
                        <span>{{ $msg.queryDb }}</span>
                    </Link>
                </div>
                <div v-if="can('admin.updatedb')">
                    <Link :href="route('directdb.show')" as="button" type="button"
                        class="my-1 mx-2 w-[240px] px-3 py-2 bg-cyan-800 text-white font-semibold text-sm 
                        flex flex-row-reverse place-items-center
                        hover:underline uppercase rounded-sm whitespace-nowrap">
                        <span>{{ $msg.directDb }}</span>
                    </Link>
                </div>
                <div>
                    <Link :href="route('logout')" as="button" type="button"
                        class="my-1 mx-2 w-[240px] px-3 py-2 bg-red-400 text-amber-50 font-semibold text-sm 
                        flex flex-row-reverse place-items-center 
                        hover:underline uppercase rounded-sm">
                        <ArrowRectangleRight class="mx-1" />
                        <span class="ml-1">{{ $msg.logout }}</span>
                    </Link>
                </div>
            </template>
        </TheDropdownAuth>
    </div>
    <div v-else class="reverse-flex">
        <Link href="/login" 
            as="button" 
            class="py-2 pl-4 pr-5 bg-sky-500 text-amber-50 text-md uppercase flex flex-row-reverse border border-cyan-700 rounded-sm">
            <div class="normal-flex">
                <ArrowRectangleRight />
                <span class="ml-1">{{ $msg.login2 }}</span>
            </div>
        </Link>
        <Link href="/register" 
            as="button" 
            class="mr-3 py-2 pl-4 pr-5 bg-emerald-600 text-amber-50 text-md uppercase flex flex-row-reverse border border-green-700 rounded-sm">
            <div class="normal-flex">
                <UserPlus />
                <span class="ml-1">{{ $msg.register }}</span>
            </div>
        </Link>
    </div>
</template>
<style lang="postcss" scoped>
.normal-flex {
    @apply flex flex-row items-center;
}
.reverse-flex {
    @apply hidden sm:flex flex-row-reverse items-center;
}
</style>