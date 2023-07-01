<!--
    A Drag-and-drop three-state switch (for word difficulty).
-->
<script setup>
import { ref, computed, getCurrentInstance } from 'vue'
const myProps = defineProps({
    modelValue: {
        type: Boolean,
        default: null
    },
    tabindex: {
        type: Number,
        default: 0
    }
})
const emit = defineEmits(['update:modelValue'])
const app = getCurrentInstance()
const myState = ref(myProps.modelValue)
const myState2 = computed(() => {
    return isDragging.value ? null : myState.value
})
const myMsg = computed(() => {
    if (myState2.value === false) return app.appContext.config.globalProperties.$msg.difficultyWordsEasy;
    else if (myState2.value === null) return app.appContext.config.globalProperties.$msg.difficultyWordsMiddle;
    else if (myState2.value === true) return app.appContext.config.globalProperties.$msg.difficultyWordsDifficult;
    else return "";
})
const isDragging = ref(false)
const startDrag = (event) => {
    isDragging.value = true
    event.dataTransfer.dropEffect = 'move'
    event.dataTransfer.effectAllowed = 'move'
}
const onDrop = (newState) => {
    myState.value = newState
    isDragging.value = false
    playSound()
    emit('update:modelValue',myState.value)
}
const onDragEnd = () => {
    isDragging.value = false
}
const exec = (e) => {
    switch (e.keyCode) {
        case 37: myState.value === true ? myState.value = null : myState.value = false; playSound(); emit('update:modelValue',myState.value); break;
        case 39: myState.value === false ? myState.value = null : myState.value = true; playSound(); emit('update:modelValue',myState.value); break;
    }
}
const onClick = (e) => { 
    if (myState.value === false) myState.value = null
    else if (myState.value === null) myState.value = true
    else if (myState.value === true) myState.value = false
    playSound()
    emit('update:modelValue',myState.value)
}
const playSound = () => { document.getElementById('gameSwitchAudio4').play() }
</script>
<template>
    <div class="relative">
        <audio id="gameSwitchAudio4" src="/audio/gameswitch4.mp3" preload="auto" />
        <div class="px-3 py-2 z-0 relative w-80 sm:w-[352px] lg:w-96 bg-neutral-100 rounded-xl border-2 border-neutral-300 hover:cursor-pointer" @click="onClick">
            <div class="relative w-14 outline-none" :tabindex="tabindex" @keydown="exec">
                <div class="relative z-10 w-14 h-6 bg-neutral-100 rounded-full border-2 border-neutral-300" />
                <div class="absolute z-20 left-1 top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-green-600 hover:cursor-pointer': myState2 === false }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(false)"
                    @dragenter.prevent @dragover.prevent />
                <div class="absolute z-20 left-5 top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-yellow-300 hover:cursor-pointer': (myState2 === null && !isDragging) }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(null)"
                    @dragenter.prevent @dragover.prevent />
                <div class="absolute z-20 left-9 top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-red-500 hover:cursor-pointer': myState2 === true }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(true)"
                    @dragenter.prevent @dragover.prevent />
            </div>
        </div>
        <div class="ml-2 mt-0.5 lg:mt-0 z-10 absolute left-[72px] top-[10px] text-sm lg:text-base"
            :class="{
                'text-green-700': myState2 === false,
                'text-yellow-400': myState2 === null,
                'text-red-500': myState2 === true
                }">
            {{ myMsg }}
        </div>
    </div>
</template>