<script setup>
import { ref, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import PlusSign from '@/Components/SVG/PlusSign.vue'
const myProps = defineProps({
    modelValue: { type:Boolean, default:false },
    myId: { type:Number }
})
const emit = defineEmits(['selectedId'])
const user = computed(() => usePage().props.auth.user)
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
            <h3 class="py-3 px-4 w-full font-medium items-start border-r-2 border-orange-700 dark:border-amber-200">{{ $msg.faqRegister1 }}</h3>
            <PlusSign @click="cycle" class="m-3 cursor-pointer" :class="{'rotate-135': isOpen}" />
        </div>
        <div v-show="isOpen" class="py-3 px-4 border-x-2 border-b-2 border-orange-700 dark:border-amber-200 rounded-b-lg transition-all">
            <div class="flex flex-row justify-evenly">
                <div class="flex flex-col">
                    <p class="font-normal">{{ $msg.faqRegister2 }}</p>
                    <img src="images/faq/score_example.png" class="mt-2 sm:mt-3" width="253" height="58">
                </div>
                <div class="w-8 xs:w-11 sm:w-16" />
                <div class="flex flex-col">
                    <img src="images/faq/score_stars.png" class="mt-1 mb-3 sm:mb-4" width="222" height="56">
                    <p class="font-normal">{{ $msg.faqRegister3 }}</p>
                </div>
            </div>
            <div class="mt-2 sm:mt-3">
                <Link v-if="user == null" :href="route('register.create')" class="font-semibold hover:underline text-base sm:text-lg">
                    {{ $msg.faqRegister4 }}
                </Link>
            </div>
        </div>
    </div>
</template>