<!--
    Password field with an eye for showing or not the password.
-->
<script setup>
import { ref, computed } from 'vue'
import EyeSVG from '@/Components/SVG/EyeSVG.vue'
import EyeSlashSVG from '@/Components/SVG/EyeSlashSVG.vue'
const myProps = defineProps({
    modelValue: {
        type: String,
        default: ""
    },
    tabindex: {
        type: Number,
        default: 0
    },
    initiallyVisible : {
        type: Boolean,
        default: false
    },
    placeholder: {
        type: String,
        default: ""
    },
    textFieldClass: {
        type: String,
        default: ""
    }
})
const emit = defineEmits(['update:modelValue'])
const visible = ref(myProps.initiallyVisible)
const myType = computed(() => (visible.value) ? "text" : "password")
const myText = ref(myProps.modelValue)
const exec = () => { emit('update:modelValue',myText) }
const toggle = () => visible.value = !visible.value
</script>
<template>
    <div class="relative h-10 w-full z-0">
        <input :type="myType" v-model="myText" :tabindex="tabindex"
            class="z-10" :class="textFieldClass" :placeholder="placeholder"
            @change="exec" />
        <EyeSlashSVG v-if="visible" class="absolute top-2 right-3 z-20" @click="toggle" />
        <EyeSVG v-else class="absolute top-2 right-3 z-20" @click="toggle" />
    </div>
</template>