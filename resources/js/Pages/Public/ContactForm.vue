<script setup>
import { toRaw, ref, onMounted, computed } from 'vue'
import { Head, usePage } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import TrophyZinc from '@/Components/SVG/Trophy/TrophyZinc.vue'
import TrophyGold from '@/Components/SVG/Trophy/TrophyGold.vue'
import { useCan } from '@/Composables/useCan'
let { can } = useCan()
const accumulatedScore = computed(() => Number(usePage().props.accumulatedScore))
const background = toRaw(usePage().props.background)
const backgroundDiv = ref(null)
onMounted(() => {
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
})
</script>
<template>
    <Head :title="$msg.faq1" />
    <CompleteLayout>
        <div class="py-12 w-full h-[1280px] lg:h-[1440px] bg-cover" ref="backgroundDiv">
            <div class="max-w-2xl sm:max-w-3xl md:max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-orange-50/80 dark:bg-green-800/80 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-amber-200 font-semibold">
                        <div class="flex flex-col justify-start">
                            <h1 class="mb-4 font-semibold text-2xl">{{ $msg.contactForm }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </CompleteLayout>
    <div v-if="accumulatedScore != null && accumulatedScore > 0">
        <Teleport to="#score">
            <div class="flex flex-row place-items-center ml-8 sm:ml-1">
                <span class="scoreStyle">{{ $msg.score }}: </span>
                <span class="scoreStyle">{{ accumulatedScore }}</span>
                <TrophyGold v-if="can('trophy.gold')" class="trophyStyle" />
                <TrophyZinc v-else-if="can('trophy.silver')" class="trophyStyle" />
            </div>
        </Teleport>
    </div>
</template>
<style lang="postcss" scoped>
.scoreStyle {
    @apply font-luckiestguy tracking-widest text-orange-500 dark:text-orange-400 lg:text-xl xl:text-2xl;
}
.trophyStyle {
    @apply ml-0.5 md:ml-1 lg:ml-2 xl:ml-3 2xl:ml-4;
}
</style>