<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import UserIcon from '@/Components/SVG/UserIcon.vue'
import UserIconBig from '@/Components/SVG/UserIconBig.vue'
import HandThumbUp from '@/Components/SVG/HandThumbUp.vue'
import HandThumbUpBig from '@/Components/SVG/HandThumbUpBig.vue'
import { useCan } from '@/Composables/useCan'
let { can } = useCan()
const user = computed(() => usePage().props.auth.user)
const pronoun = computed(() => usePage().props.auth.pronoun)
const sex = computed(() => usePage().props.auth.sex)
const locale = computed(() => usePage().props.auth.locale)
</script>
<template>
    <div v-if="user != null">
        <div class="reverse-flex">
            <HandThumbUp v-if="user.show_name && can('trophy.donor')" />
            <UserIcon v-if="user.show_name" />
            <div class="font-semibold text-orange-800 dark:text-amber-100 text-sm">
                <span v-if="user.show_name && sex === 'F'" class="hidden md:inline">{{ $msg.welcomeF }}, </span>
                <span v-if="user.show_name && sex === 'M'" class="hidden md:inline">{{ $msg.welcomeM }}, </span>
                <span v-if="user.show_name && sex !== 'F' && sex !== 'M'" class="hidden md:inline">{{ $msg.welcome }}, </span>
                <span v-if="user.show_name && user.show_pronoun && locale === $locale.locale">{{ pronoun }}&nbsp;</span>
                <span v-if="user.show_name">{{ user.name }}</span>
            </div>
        </div>
        <div class="reverse-flex">
            <span v-if="user.show_user_id" class="text-indigo-600 dark:text-indigo-300 text-xs font-semibold flex flex-row-reverse">&nbsp;[{{ user.user_id }}]</span>
            <span v-if="user.show_email" class="text-orange-700 dark:text-amber-100 text-xs flex flex-row-reverse">{{ user.email }}</span>
        </div>
        <div class="reverse-flex">
            <HandThumbUpBig v-if="!user.show_name && !user.show_email && !user.show_user_id && can('trophy.donor')" class="my-1" />
            <UserIconBig v-if="!user.show_name && !user.show_email && !user.show_user_id" class="my-1" />
        </div>
    </div>
</template>
<style lang="postcss" scoped>
.reverse-flex {
    @apply flex flex-row-reverse items-center;
}
</style>