<!--
    A Drag-and-drop five-state switch (for game difficulty).
-->
<script setup>
import { ref, computed, getCurrentInstance } from 'vue'
const myProps = defineProps({
    modelValue: {
        type: Number,
        default: 0,
        min: 0,
        max: 4
    },
    tabindex: {
        type: Number,
        default: 0
    }
})
const emit = defineEmits(['update:modelValue'])
const app = getCurrentInstance()
const myState = ref(myProps.modelValue)
const myMsg = computed(() => {
    if (myState.value === 0) return app.appContext.config.globalProperties.$msg.difficulty0;
    else if (myState.value === 1) return app.appContext.config.globalProperties.$msg.difficulty1;
    else if (myState.value === 2) return app.appContext.config.globalProperties.$msg.difficulty2;
    else if (myState.value === 3) return app.appContext.config.globalProperties.$msg.difficulty3;
    else if (myState.value === 4) return app.appContext.config.globalProperties.$msg.difficulty4;
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
        case 37: myState.value > 1 ? myState.value-- : myState.value = 0; playSound(); emit('update:modelValue',myState.value); break;
        case 39: myState.value < 3 ? myState.value++ : myState.value = 4; playSound(); emit('update:modelValue',myState.value); break;
    }
}
const onClick = (e) => { 
    myState.value < 4 ? myState.value++ : myState.value = 0
    playSound() 
    emit('update:modelValue',myState.value)
}
const playSound = () => { document.getElementById('gameSwitchAudio3').play() }
</script>
<template>
    <div class="relative">
        <audio id="gameSwitchAudio3" src="/audio/gameswitch3.mp3" preload="auto" />
        <div class="px-3 py-2 z-0 relative w-64 bg-neutral-100 rounded-xl border-2 border-neutral-300 hover:cursor-pointer" @click="onClick">
            <div class="relative w-[88px] outline-none" :tabindex="tabindex" @keydown="exec">
                <div class="relative z-10 w-[88px] h-6 bg-neutral-100 rounded-full border-2 border-neutral-300" />
                <div class="absolute z-20 left-1 top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-green-700 hover:cursor-pointer': myState === 0 }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(0)"
                    @dragenter.prevent @dragover.prevent />
                <div class="absolute z-20 left-5 top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-lime-400 hover:cursor-pointer': myState === 1 }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(1)"
                    @dragenter.prevent @dragover.prevent />
                <div class="absolute z-20 left-9 top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-orange-500 hover:cursor-pointer': myState === 2 }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(2)"
                    @dragenter.prevent @dragover.prevent />
                <div class="absolute z-20 left-[52px] top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-red-700 hover:cursor-pointer': myState === 3 }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(3)"
                    @dragenter.prevent @dragover.prevent />
                <div class="absolute z-20 left-[68px] top-1 h-4 w-4 rounded-full transition-all" 
                    :class="{'bg-fuchsia-950 hover:cursor-pointer': myState === 4 }" 
                    draggable="true" @dragstart="startDrag($event)" 
                    @dragend="onDragEnd"
                    @drop="onDrop(4)"
                    @dragenter.prevent @dragover.prevent />
            </div>
        </div>
        <div class="ml-2 mt-0.5 lg:mt-0 z-10 absolute left-[104px] top-[8px] text-sm lg:text-base"
            :class="{
                'text-green-700': myState === 0,
                'text-lime-400': myState === 1,
                'text-orange-500': myState === 2,
                'text-red-700': myState === 3,
                'text-fuchsia-950': myState === 4
                }">
            {{ myMsg }}
        </div>
    </div>
</template>