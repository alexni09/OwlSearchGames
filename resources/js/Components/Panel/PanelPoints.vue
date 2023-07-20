<script setup>
import { ref } from 'vue'
import PlusSign from '@/Components/SVG/PlusSign.vue'
const myProps = defineProps({
    modelValue: { type:Boolean, default:false },
    myId: { type:Number }
})
const emit = defineEmits(['selectedId'])
const isOpen = ref(myProps.modelValue)
const cycle = () => { 
    isOpen.value = !isOpen.value
    if (isOpen.value) emit('selectedId',myProps.myId)
}
</script>
<template>
    <div class="w-full h-fit flex flex-col bg-orange-100 dark:bg-green-800 text-sm sm:text-base">
        <div class="flex justify-between border-2 border-orange-700 dark:border-amber-200 rounded-t-lg"
            :class="{'rounded-b-lg': !isOpen}" >
            <h3 class="py-3 px-4 w-full font-medium items-start border-r-2 border-orange-700 dark:border-amber-200">{{ $msg.faqPoints1 }}</h3>
            <PlusSign @click="cycle" class="m-3 cursor-pointer" :class="{'rotate-45': isOpen}" />
        </div>
        <div v-show="isOpen" class="py-3 px-4 border-x-2 border-b-2 border-orange-700 dark:border-amber-200 rounded-b-lg transition-all">
            <p class="font-normal">{{ $msg.faqPoints2 }}</p>
        </div>
    </div>
</template>