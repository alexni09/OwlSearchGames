<script setup>
import { toRaw, ref, onMounted, computed } from 'vue'
import { Head, usePage } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import PanelRegister from '@/Components/Panel/PanelRegister.vue'
import PanelPoints from '@/Components/Panel/PanelPoints.vue'
import PanelAdvanced from '@/Components/Panel/PanelAdvanced.vue'
import PanelPremium from '@/Components/Panel/PanelPremium.vue'
import PanelDeveloper from '@/Components/Panel/PanelDeveloper.vue'
import PanelAds from '@/Components/Panel/PanelAds.vue'
import TrophyZinc from '@/Components/SVG/Trophy/TrophyZinc.vue'
import TrophyGold from '@/Components/SVG/Trophy/TrophyGold.vue'
import { useCan } from '@/Composables/useCan'
let { can } = useCan()
const accumulatedScore = computed(() => Number(usePage().props.accumulatedScore))
const background = toRaw(usePage().props.background)
const backgroundDiv = ref(null)
const open1 = ref(false)
const open2 = ref(false)
const open3 = ref(false)
const open4 = ref(false)
const open5 = ref(false)
const open6 = ref(false)
const keyOpen = ref(0)
const openClose = (e) => {
    open1.value = e === 1
    open2.value = e === 2
    open3.value = e === 3
    open4.value = e === 4
    open5.value = e === 5
    open6.value = e === 6
    keyOpen.value++
}
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
                            <h1 class="mb-4 font-semibold text-2xl">{{ $msg.faq2 }}</h1>
                            <PanelRegister class="mb-6" v-model="open1" :myId=1 :key="keyOpen" @selectedId="openClose" />
                            <PanelPoints class="mb-6" v-model="open2" :myId=2 :key="keyOpen" @selectedId="openClose" />
                            <PanelAdvanced class="mb-6" v-model="open3" :myId=3 :key="keyOpen" @selectedId="openClose" />
                            <PanelPremium class="mb-6" v-model="open4" :myId=4 :key="keyOpen" @selectedId="openClose" />
                            <PanelDeveloper class="mb-6" v-model="open5" :myId=5 :key="keyOpen" @selectedId="openClose" />
                            <PanelAds v-model="open6" :myId=6 :key="keyOpen" @selectedId="openClose" />
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