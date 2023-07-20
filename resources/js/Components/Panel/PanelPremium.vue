<script setup>
import { ref, computed, getCurrentInstance } from 'vue'
import PlusSign from '@/Components/SVG/PlusSign.vue'
const myProps = defineProps({
    modelValue: { type:Boolean, default:false },
    myId: { type:Number }
})
const emit = defineEmits(['selectedId'])
const app = getCurrentInstance()
const imageControls = computed(() => {
    if (app.appContext.config.globalProperties.$locale.locale === 'en') return 'images/faq/controls_en.png'
    else if (app.appContext.config.globalProperties.$locale.locale === 'pt') return 'images/faq/controls_pt.png'
    else return null
})
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
            <h3 class="py-3 px-4 w-full font-medium items-start border-r-2 border-orange-700 dark:border-amber-200">{{ $msg.faqPremium1 }}</h3>
            <PlusSign @click="cycle" class="m-3 cursor-pointer" :class="{'rotate-135': isOpen}" />
        </div>
        <div v-show="isOpen" class="py-3 px-4 flex flex-col border-x-2 border-b-2 border-orange-700 dark:border-amber-200 rounded-b-lg transition-all">
            <p class="font-normal mb-2">{{ $msg.faqPremium2 }}</p>
            <p class="font-normal mb-2">{{ $msg.faqPremium3 }}</p>
            <p class="font-normal mb-2">{{ $msg.faqPremium4 }}</p>
            <img :src="imageControls" class="mb-2">
            <p class="font-normal italic">{{ $msg.faqPremium5 }}</p>
        </div>
    </div>
</template>