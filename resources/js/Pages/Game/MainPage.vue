<script setup>
import { ref, watch, computed, toRaw, onMounted } from 'vue'
import { Link, Head, useForm, usePage } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import TrophyZinc from '@/Components/SVG/Trophy/TrophyZinc.vue'
import TrophyGold from '@/Components/SVG/Trophy/TrophyGold.vue'
import TheTrophyZincAnimated from '@/Components/SVG/Trophy/TheTrophyZincAnimated.vue'
import TheTrophyGoldAnimated from '@/Components/SVG/Trophy/TheTrophyGoldAnimated.vue'
import TheSwitchThreeStateDifficultyGame from '@/Components/Complex/TheSwitchThreeStateDifficultyGame.vue'
import TheSwitchFourStateDifficultyGame from '@/Components/Complex/TheSwitchFourStateDifficultyGame.vue'
import TheSwitchFiveStateDifficultyGame from '@/Components/Complex/TheSwitchFiveStateDifficultyGame.vue'
import TheRangeSliderHeight from '@/Components/Complex/TheRangeSliderHeight.vue'
import TheRangeSliderWidth from '@/Components/Complex/TheRangeSliderWidth.vue'
import TheRangeSliderWords from '@/Components/Complex/TheRangeSliderWords.vue'
import TheSwitchThreeStateDifficultyWords from '@/Components/Complex/TheSwitchThreeStateDifficultyWords.vue'
import TheDifficultyDisplay from '@/Components/Complex/TheDifficultyDisplay.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import { useCan } from '@/Composables/useCan'
let { can } = useCan()
const prefersReducedMotion = computed(() => window.matchMedia && ( window.matchMedia(`(prefers-reduced-motion: reduce)`) === true 
                                                                || window.matchMedia(`(prefers-reduced-motion: reduce)`).matches === true))
const feederOperation = computed(() => usePage().props.feederOperation)
const accumulatedScore = computed(() => usePage().props.accumulatedScore)
const background = toRaw(usePage().props.background)
const initialDirections = true
const initialDifficultyLevelTopControl = 0
const initialWidthValue = 15
const initialHeightValue = 10
const initialWordCountValue = 16
const initialDifficultyWords = false
const directions = ref(initialDirections)
const difficultyLevelTopControl = ref(initialDifficultyLevelTopControl)
const widthValue = ref(initialWidthValue)
watch(widthValue, () => {
    forceRerenderDifficultyDisplay()
})
const heightValue = ref(initialHeightValue)
watch(heightValue, () => {
    forceRerenderDifficultyDisplay()
})
const wordCountValue = ref(initialWordCountValue)
watch(wordCountValue, () => {
    forceRerenderDifficultyDisplay()
})
const difficultyWords = ref(initialDifficultyWords)
watch(difficultyWords, () => {
    forceRerenderDifficultyDisplay()
})
const difficulty = computed(() => {
    let ddir = directions ? 0 : -50
    let dw = 0
    if (difficultyWords.value === null) dw = 15
    else if (difficultyWords.value === true) dw = 30
    let d = ddir + dw + Math.floor(0.3 * widthValue.value * heightValue.value) + Math.floor(1.6 * wordCountValue.value) - 45
    return d
})
const difficultyLevelBottomControl = computed(() => {
    let d = 0
    if (difficulty.value >= 30 && difficulty.value < 60) d = 1
    else if (difficulty.value >= 60 && difficulty.value < 90) d = 2
    else if (difficulty.value >= 90 && difficulty.value < 120) d = 3
    else if (difficulty.value >= 120) d = 4
    forceRerenderDifficultyDisplay()
    return d
})
const keyDifficultyDisplay = ref(0)
const forceRerenderDifficultyDisplay = () => {
    keyDifficultyDisplay.value += 1
}
const form = useForm({
    directions: initialDirections,
    difficultyLevel: initialDifficultyLevelTopControl,
    x: initialWidthValue,
    y: initialHeightValue,
    count: initialWordCountValue,
    worddiff: initialDifficultyWords,
    difficulty: 0
})
const submit1 = () => {
    switch (difficultyLevelTopControl.value) {
        case 0: form.directions = false; form.x = 15; form.y = 10; form.count = 15; form.worddiff = false; form.difficulty = -25; break;
        case 1: form.directions = true; form.x = 15; form.y = 10; form.count = 16; form.worddiff = null; form.difficulty = 40; break;
        case 2: form.directions = true; form.x = 18; form.y = 14; form.count = 19; form.worddiff = null; form.difficulty = 75; break;
        case 3: form.directions = true; form.x = 20; form.y = 15; form.count = 22; form.worddiff = true; form.difficulty = 110; break;
        case 4: form.directions = true; form.x = 23; form.y = 17; form.count = 25; form.worddiff = true; form.difficulty = 142; break;
    }
    form.difficultyLevel = difficultyLevelTopControl.value
    document.getElementById('gameButtonAudio1').play()
    form.post(route('game.create'))
}
const submit2 = () => {
    form.directions = true
    form.difficultyLevel = difficultyLevelBottomControl.value
    form.x = widthValue.value
    form.y = heightValue.value
    form.count = wordCountValue.value
    form.worddiff = difficultyWords.value
    form.difficulty = difficulty.value
    document.getElementById('gameButtonAudio2').play()
    form.post(route('game.create'))
}
const canInsane = computed(() => { return can('main.difficulty.insane') })
const canAllControls = computed(() => { return can('main.allcontrols') })
const backgroundDiv = ref(null)
onMounted(() => {
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
})
</script>
<template>
    <Head :title="$msg.home" />
    <audio id="gameButtonAudio1" src="/audio/gamebutton1.mp3" preload="auto" />
    <audio id="gameButtonAudio2" src="/audio/gamebutton2.mp3" preload="auto" />
    <CompleteLayout>
        <div class="py-12 w-full lg:h-[768px] 2xl:h-[900px] bg-cover bg-center" 
             :class="{'h-[480px] md:h-[640px]': !canInsane, 'h-[1024px] md:h-[768px]': canInsane}"
             ref="backgroundDiv">
            <div class="max-w-2xl sm:max-w-3xl md:max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-orange-50 dark:bg-green-800 bg-opacity-80 dark:bg-opacity-80 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-amber-100 font-semibold">
                        <div class="flex flex-col justify-start">
                            <h1 class="mb-3 font-semibold text-2xl">{{ $msg.welcomeWSG }}</h1>
                            <p class="mb-2">{{ $msg.quickGenerateNewGame }}</p>
                            <TheSwitchFiveStateDifficultyGame v-if="canInsane" class="mb-2" v-model="difficultyLevelTopControl" />
                            <TheSwitchFourStateDifficultyGame v-else-if="can('main.difficulty.verydifficult')" class="mb-2" v-model="difficultyLevelTopControl" />
                            <TheSwitchThreeStateDifficultyGame v-else class="mb-2" v-model="difficultyLevelTopControl" />
                            <div class="mb-2">
                                <ProcessingButton class="w-64 text-center uppercase px-6 py-2 bg-blue-600 text-white rounded"
                                    v-model="form.processing" :disabled="form.processing"
                                    @click="submit1" @keydown.enter="submit1">
                                    {{ $msg.generateQuickGame }}
                                </ProcessingButton>
                            </div>
                            <p v-if="canAllControls" class="mt-7 mb-3">{{ $msg.orGenerateNewGame }}</p>
                        </div>
                        <div v-if="canAllControls" class="flex flex-col md:flex-row justify-start place-items-top">
                            <form @submit.prevent="submit2">
                                <div class="flex flex-col">
                                    <div class="mb-5 flex flex-row place-items-center">
                                        <span class="mr-3 w-32">{{ $msg.mainWidth }}</span>
                                        <TheRangeSliderWidth v-model="widthValue" />
                                        <InputError :message="form.errors.x" class="mt-2" />
                                    </div>
                                    <div class="mb-5 flex flex-row place-items-center">
                                        <span class="mr-3 w-32">{{ $msg.mainHeight }}</span>
                                        <TheRangeSliderHeight v-model="heightValue" />
                                        <InputError :message="form.errors.y" class="mt-2" />
                                    </div>
                                    <div class="mb-5 flex flex-row place-items-center">
                                        <span class="mr-3 w-32">{{ $msg.mainWordCount }}</span>
                                        <TheRangeSliderWords v-model="wordCountValue" />
                                        <InputError :message="form.errors.count" class="mt-2" />
                                    </div>
                                    <div class="mb-5 flex flex-row place-items-center">
                                        <span class="mr-3 w-32">{{ $msg.mainWordDifficulty }}</span>
                                        <TheSwitchThreeStateDifficultyWords v-model="difficultyWords" />
                                        <InputError :message="form.errors.worddiff" class="mt-2" />
                                    </div>
                                    <div class="mb-2 flex flex-row">
                                        <ProcessingButton v-model="form.processing" class="w-64" :disabled="form.processing">{{ $msg.generateNewGame }}</ProcessingButton>
                                    </div>
                                </div>
                            </form>
                            <div class="md:ml-8 flex flex-col">
                                <h3 class="mt-3 md:mt-0 ml-0.5 mb-1 text-sm lg:text-base font-semibold">{{ $msg.difficultyLevelPredicted }}</h3>
                                <TheDifficultyDisplay :difficulty="difficultyLevelBottomControl" :key="keyDifficultyDisplay" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FAQ, Contact Form -->
                <div class="mt-8 bg-orange-50 dark:bg-green-800 bg-opacity-80 dark:bg-opacity-80 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-3 sm:p-4 md:p-5 lg:p-6 text-orange-800 dark:text-amber-100 font-semibold">
                        <div class="flex flex-col md:flex-row justify-start md:justify-between place-items-top">
                            <Link :href="route('faq')" 
                                class="mb-2 xs:mb-3 sm:mb-4 md:mb-0 px-0 md:px-12 lg:px-14 xl:px-16 py-1 xs:py-1.5 sm:py-2 uppercase 
                                    text-orange-800 dark:text-green-700 bg-orange-200 dark:bg-amber-100
                                    border border-orange-900 dark:border-amber-200 rounded"
                                as="button" type="button">
                                {{ $msg.faq2 }}
                            </Link>
                            <Link :href="route('contact.show')" 
                                class="px-0 md:px-12 lg:px-14 xl:px-16 py-1 xs:py-1.5 sm:py-2 uppercase
                                    text-orange-800 dark:text-green-700 bg-orange-200 dark:bg-amber-100
                                    border border-orange-900 dark:border-amber-200 rounded"
                                as="button" type="button">
                                {{ $msg.contactForm }}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </CompleteLayout>
    <div v-if="accumulatedScore != null && accumulatedScore > 0">
        <Teleport to="#score">
            <div class="flex flex-row place-items-center mx-2 md:ml-8 md:mr-0">
                <span class="scoreStyle">{{ $msg.score }}: </span>
                <span class="scoreStyle">{{ accumulatedScore }}</span>
                <TheTrophyGoldAnimated v-if="(feederOperation === 3 || feederOperation === 4) && !prefersReducedMotion" class="trophyStyle" />
                <TrophyGold v-else-if="can('trophy.gold')" class="trophyStyle" />
                <TheTrophyZincAnimated v-else-if="feederOperation === 2 && !prefersReducedMotion" class="trophyStyle" />
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