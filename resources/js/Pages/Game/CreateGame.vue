<script setup>
import Swal from 'sweetalert2'
import { toRaw, reactive, ref, getCurrentInstance, onMounted, computed, onUnmounted } from 'vue'
import { usePage, useForm } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import ShineBlur from '@/Components/CSS/ShineBlur.vue'
import StarPinkFuchsia from '@/Components/SVG/Star/StarPinkFuchsia.vue'
import StarLimeGreen from '@/Components/SVG/Star/StarLimeGreen.vue'
import StarGray from '@/Components/SVG/Star/StarGray.vue'
import StarSkyBlue from '@/Components/SVG/Star/StarSkyBlue.vue'
import StarRedOrange from '@/Components/SVG/Star/StarRedOrange.vue'
import StarRosePink from '@/Components/SVG/Star/StarRosePink.vue'
import StarBrownYellow from '@/Components/SVG/Star/StarBrownYellow.vue'
import TrophyZinc from '@/Components/SVG/Trophy/TrophyZinc.vue'
import TrophyGold from '@/Components/SVG/Trophy/TrophyGold.vue'
import { useDebounce } from '@/Composables/useDebounce'
import { useRandom } from '@/Composables/useRandom'
import { useCan } from '@/Composables/useCan'
let { debounce } = useDebounce()
let { getRandomIntInclusive, percentage } = useRandom()
let { can } = useCan()
const user = computed(() => usePage().props.auth.user)
const prefersReducedMotion = computed(() => window.matchMedia && ( window.matchMedia(`(prefers-reduced-motion: reduce)`) === true 
                                                                || window.matchMedia(`(prefers-reduced-motion: reduce)`).matches === true))
const app = getCurrentInstance()
const getPositiveSoundName = () => { return 'positive_beep' + getRandomIntInclusive(1,4).toString() }
const getNegativeSoundName = () => { return 'negative_beep' + getRandomIntInclusive(1,4).toString() }
const pointsAdvanced = Number(toRaw(usePage().props.pointsAdvanced))
const pointsPremium = Number(toRaw(usePage().props.pointsPremium))
const accumulatedScore = computed(() => Number(usePage().props.accumulatedScore))
const background = toRaw(usePage().props.background)
const thisGameScore = ref(0)
const myProps = defineProps({ 
    wordSearchGame: {
        type: Object
    },
    score_id : {
        type: Number,
        min: 1,
        default: null
    },
    difficultyLevel : {
        type: Number,
        min: 0,
        max: 4,
        default: 0
    }
})
let starKey = ref(0)
const addPoints = Math.max(0, myProps.difficultyLevel * 2 - 1)
const grid = toRaw(myProps.wordSearchGame.grid)
const gridReactive = []
for (let j=0; j<grid.length; j++) {
    const arr = []
    for (let i=0; i<grid[0].length; i++) arr.push(reactive({ dragValue: false, persistValue: false }))
    gridReactive.push(arr)
}
const words = toRaw(myProps.wordSearchGame.words)
const wordReactive = []
for (let i=0; i<words.length; i++) wordReactive.push(reactive({ hasBeenFound: false }))
let hasBeenFoundCount = 0
const resetGridDragValue = () => {
    for (let j=0; j<gridReactive.length; j++)
        for (let i=0; i<gridReactive[j].length; i++)
            gridReactive[j][i].dragValue = gridReactive[j][i].persistValue
}
let x0 = null;
let y0 = null;
const selectedWord = ref("temp")
const rectangleWidth = ref(0)
const rectangleHeight = ref(0)
const onDragStart = (event,x,y) => {
    event.dataTransfer.dropEffect = 'move'
    event.dataTransfer.effectAllowed = 'move'
    doStart(x,y)
}
const doStart = (x,y) => {
    x0 = x; y0 = y
    gridReactive[y][x].dragValue = true
} 
const onDragOver = (x,y) => {
    resetGridDragValue()
    if ((y0 === y) && (x > x0)) {
        for (let i=x0; i<=x; i++) gridReactive[y][i].dragValue = true
    } else if ((y0 === y) && (x < x0)) {
        for (let i=x0; i>=x; i--) gridReactive[y][i].dragValue = true
    } else if ((x0 === x) && (y > y0)) {
        for (let j=y0; j<=y; j++) gridReactive[j][x].dragValue = true
    } else if ((x0 === x) && (y < y0)) {
        for (let j=y0; j>=y; j--) gridReactive[j][x].dragValue = true
    }
}
const onDragEnd = () => {
    //
}
const onDrop = (x,y) => {
    let st = ""
    let x2 = x
    let y2 = y
    if ((y0 === y) && (x > x0)) {
        if (x > grid[0].length - 1 && x < grid[0].length + 2) x2 = grid[0].length - 1  /* user's finger is lifted up a little away from the grid */
        for (let i=x0; i<=x2; i++) st += grid[y2][i]
    } else if ((y0 === y) && (x < x0)) {
        if (x === - 1 || x === -2) x2 = 0  /* idem */
        for (let i=x0; i>=x2; i--) st += grid[y2][i]
    } else if ((x0 === x) && (y > y0)) {
        if (y > grid.length - 1 && y < grid.length + 2) y2 = grid.length - 1  /* ibidem */
        for (let j=y0; j<=y2; j++) st += grid[j][x2]
    } else if ((x0 === x) && (y < y0)) {
        if (y === - 1 || y === -2) y2 = 0  /* ibidem */
        for (let j=y0; j>=y2; j--) st += grid[j][x2]
    }
    selectedWord.value = st
    let pos = words.indexOf(st)
    if ((pos > -1) && !wordReactive[pos].hasBeenFound) {
        starKey.value++
        wordReactive[pos].hasBeenFound = true
        thisGameScore.value += st.length < 10 ? Math.ceil(0.5 * (20 - st.length)) : 5
        thisGameScore.value += addPoints
        hasBeenFoundCount++
        if (hasBeenFoundCount < words.length) document.getElementById(getPositiveSoundName()).play()
        if ((y0 === y) && (x > x0)) {
            for (let i=x0; i<=x; i++) gridReactive[y][i].persistValue = true
        } else if ((y0 === y) && (x < x0)) {
            for (let i=x0; i>=x; i--) gridReactive[y][i].persistValue = true
        } else if ((x0 === x) && (y > y0)) {
            for (let j=y0; j<=y; j++) gridReactive[j][x].persistValue = true
        } else if ((x0 === x) && (y < y0)) {
            for (let j=y0; j>=y; j--) gridReactive[j][x].persistValue = true
        }
    } else document.getElementById(getNegativeSoundName()).play()
    x0 = null; y0 = null
    rectangleStartX = null; rectangleStartY = null; rectangleCurrentX = null; rectangleCurrentY = null
    resetGridDragValue()
    if (hasBeenFoundCount === words.length) submit()
}
let rectangleStartX = null
let rectangleStartY = null
let rectangleCurrentX = null
let rectangleCurrentY = null
const onTouchStart = (e, x, y) => {
    rectangleStartX = Math.round(e.targetTouches[0].pageX)
    rectangleStartY = Math.round(e.targetTouches[0].pageY)
    doStart(x,y)
}
const onTouchMove = (e) => {
    rectangleCurrentX = Math.round(e.targetTouches[0].pageX)
    rectangleCurrentY = Math.round(e.targetTouches[0].pageY)
    let x = x0 + Math.round((rectangleCurrentX - rectangleStartX) / rectangleWidth.value)
    let y = y0 + Math.round((rectangleCurrentY - rectangleStartY) / rectangleHeight.value)
    onDragOver(x,y)
}
const onTouchEnd = () => {   /*  event info is unavailable (!)  */
    let x = x0 + Math.round((rectangleCurrentX - rectangleStartX) / rectangleWidth.value)
    let y = y0 + Math.round((rectangleCurrentY - rectangleStartY) / rectangleHeight.value)
    onDrop(x,y)
}
const onTouchCancel = () => {
    rectangleStartX = null; rectangleStartY = null; rectangleCurrentX = null; rectangleCurrentY = null
    resetGridDragValue()
}
const backgroundDiv = ref(null)
const wordDiv = ref(null)
const form = useForm({
    gameScore: 0,
    score_id: myProps.score_id
})
const hasLeveledUpToAdvanced = computed(() => {
    return accumulatedScore.value < pointsAdvanced && accumulatedScore.value + thisGameScore.value >= pointsAdvanced
})
const hasLeveledUpToPremium = computed(() => {
    return accumulatedScore.value < pointsPremium && accumulatedScore.value + thisGameScore.value >= pointsPremium
})
const submit = () => {
    form.gameScore = thisGameScore.value
    document.getElementById('finish_beep').play()
    let hasLeveledUp = hasLeveledUpToAdvanced.value || hasLeveledUpToPremium.value
    Swal.fire({
        icon: 'success',
        title: app.appContext.config.globalProperties.$msg.congratulations,
        text: hasLeveledUp ? app.appContext.config.globalProperties.$msg.gainedALevel : app.appContext.config.globalProperties.$msg.gameCompleted,
        timer: 7000
    })
    setTimeout(() => { form.patch(route('game.update')) }, 7000)
}
let opening = ref(null)
const setRectangleWidthAndHeight = () => {  /*  space between cells is 2 by default  */
    rectangleWidth.value = 2 + document.getElementById('charsTable').firstElementChild.firstElementChild.firstElementChild.offsetWidth
    rectangleHeight.value = 2 + document.getElementById('charsTable').firstElementChild.firstElementChild.firstElementChild.offsetHeight
}
onMounted(() => {
    setRectangleWidthAndHeight()
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
    document.getElementById('chime').play()
    if (!prefersReducedMotion.value) {
        const halfPerimeter = grid.length + grid[0].length + 1
        const millisec = Math.floor(2000 / halfPerimeter)
        for (let i=1; i<halfPerimeter; i++) setTimeout(() => { opening.value = i }, millisec * i)
    }
    addEventListener('resize', debounce(() => {
        setRectangleWidthAndHeight()
    }, 200, false), false)
})
onUnmounted(() => {
    window.removeEventListener('resize', debounce, false)
})
</script>
<template>
    <audio id="chime" src="/audio/chime.mp3" preload="auto" />
    <audio id="positive_beep1" src="/audio/positive_beep1.mp3" preload="auto" />
    <audio id="positive_beep2" src="/audio/positive_beep2.mp3" preload="auto" />
    <audio id="positive_beep3" src="/audio/positive_beep3.mp3" preload="auto" />
    <audio id="positive_beep4" src="/audio/positive_beep4.mp3" preload="auto" />
    <audio id="finish_beep" src="/audio/finish_beep.mp3" preload="auto" />
    <audio id="negative_beep1" src="/audio/negative_beep1.mp3" preload="auto" />
    <audio id="negative_beep2" src="/audio/negative_beep2.mp3" preload="auto" />
    <audio id="negative_beep3" src="/audio/negative_beep3.mp3" preload="auto" />
    <audio id="negative_beep4" src="/audio/negative_beep4.mp3" preload="auto" />
    <CompleteLayout>
        <div class="pt-4 flex justify-center items-top w-full h-[480px] md:h-[640px] lg:h-[768px] 2xl:h-[900px] bg-cover" ref="backgroundDiv">
            <div class="flex flex-col justify-center xs:flex-row xs:justify-between xs:items-top">
                <div class="flex flex-col">
                    <div class="p-1 
                                xs:mr-1 xs:ml-6
                                sm:p-[6px] sm:mr-2 sm:ml-4
                                md:p-2 md:mr-3 md:ml-2
                                lg:p-3 lg:mr-4 
                                xl:mr-5 
                                2xl:p-4 2xl:mr-6 
                                border lg:border-2 2xl:border-3 
                                border-orange-800 dark:border-green-900 rounded-2xl">
                        <table id="charsTable">
                            <tr v-for="(arrY,idY) in grid" :key="idY">
                                <td v-for="(item,idX) in arrY" :key="idX">
                                    <div
                                        class="flex justify-center items-center cursor-grab
                                            w-[18px] h-3 text-xs rounded-sm border-b font-medium pb-[1px]
                                            sm:w-5 sm:h-[14px] sm:pb-[2px]
                                            md:w-[23px] md:h-4 md:text-sm md:rounded-md
                                            lg:w-[30px] lg:h-6 lg:rounded-lg lg:border-b-2 lg:font-semibold lg:pb-[3px]
                                            xl:w-10 xl:h-8 xl:text-base 
                                            2xl:w-[52px] 2xl:h-11 2xl:text-lg 2xl:pb-1
                                            border-t border-x border-solid
                                            bg-opacity-80 dark:bg-opacity-80 relative z-10"
                                        :class="{
                                            'bg-orange-100 dark:bg-green-800 text-orange-800 dark:text-amber-100 border-orange-800 dark:border-green-900': !gridReactive[idY][idX].dragValue,
                                            'bg-green-700 dark:bg-orange-100 text-amber-100 dark:text-orange-800 border-green-900 dark:border-orange-800': gridReactive[idY][idX].dragValue,
                                        }"
                                        draggable="true" @dragstart="onDragStart($event,idX,idY)" @dragend="onDragEnd" @drop="onDrop(idX,idY)"
                                        @dragenter.prevent @dragover.prevent="onDragOver(idX,idY)"
                                        @touchstart.prevent="onTouchStart($event,idX,idY)" @touchmove.prevent="onTouchMove($event)"
                                        @touchend.prevent="onTouchEnd" @touchcancel.prevent="onTouchCancel" >
                                            {{ item }}
                                        <ShineBlur :v1="1+idX+idY" :v2="opening" />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div ref="wordDiv" class="flex flex-col h-fit w-fit mx-auto mt-3 xs:mt-0
                    px-3 pt-1 xs:pt-3 pb-5 xs:pb-3 
                    overflow-y-auto rounded-lg bg-opacity-80 dark:bg-opacity-80
                    bg-orange-100 dark:bg-green-800 text-orange-800 dark:text-amber-100
                    border lg:border-2 border-orange-800 dark:border-green-900
                    ">
                    <span class="mb-0.5 xs:mb-1 text-sm md:text-base xl:text-lg font-semibold">{{ $msg.wordList }}:</span>
                    <span v-if="wordSearchGame.category != null" class="mb-0.5 xs:mb-1 text-sm md:text-base xl:text-lg font-medium">({{ wordSearchGame.category }})</span>
                    <span v-for="(item,idx) in wordReactive" :key="idx"
                        class="text-xs md:text-sm xl:text-base" 
                        :class="{'line-through': item.hasBeenFound}">
                        {{ words[idx] }}
                    </span>
                </div>
            </div>
        </div>
    </CompleteLayout>
    <div v-if="accumulatedScore != null">
        <Teleport to="#score">
            <div class="flex flex-row place-items-center ml-8 sm:ml-1">
                <span class="scoreStyle">{{ $msg.score }}: </span>
                <span class="scoreStyle">{{ accumulatedScore }}</span>
                <span class="scoreStyleRelative" v-if="thisGameScore > 0"> + {{ thisGameScore }}
                    <StarPinkFuchsia v-if="!!user && !prefersReducedMotion && percentage(40)" class="absolute z-20" :x0=26 :y0=-12 :key="starKey" />
                    <StarLimeGreen v-if="!!user && !prefersReducedMotion && percentage(60)" class="absolute z-20" :x0=24 :y0=12 :key="starKey" />
                    <StarGray v-if="!!user && !prefersReducedMotion && percentage(60)" class="absolute z-20" :x0=44 :y0=0 :key="starKey" />
                    <StarSkyBlue v-if="!!user && !prefersReducedMotion && percentage(60)" class="absolute z-20" :x0=0 :y0=6 :key="starKey" />
                    <StarRedOrange v-if="!!user && !prefersReducedMotion && percentage(60)" class="absolute z-20" :x0=30 :y0=-6 :key="starKey" />
                    <StarRosePink v-if="!!user && !prefersReducedMotion && percentage(60)" class="absolute z-20" :x0=-3 :y0=15 :key="starKey" />
                    <StarBrownYellow v-if="!!user && !prefersReducedMotion && percentage(60)" class="absolute z-20" :x0=-10 :y0=8 :key="starKey" />
                </span>
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
.scoreStyleRelative {
    @apply relative z-10 font-luckiestguy tracking-widest text-orange-500 dark:text-orange-400 lg:text-xl xl:text-2xl;
}
.trophyStyle {
    @apply ml-0.5 md:ml-1 lg:ml-2 xl:ml-3 2xl:ml-4;
}
</style>