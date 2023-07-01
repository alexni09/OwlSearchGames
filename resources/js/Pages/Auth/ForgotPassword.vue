<script setup>
import { ref, onMounted, watchEffect } from 'vue'
import { useForm } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import SearchBox from '@/Components/Complex/SearchBox.vue'
import InputError from '@/Components/Laravel/InputError.vue'
const myProps = defineProps({
    method: {
        type: Number,
        default: 1
    },
    user_id: {
        type: String,
        default: ""
    },
    email: {
        type: String,
        default: ""
    }
})
const method = ref(myProps.method)
const maxMethod = 2
const cycle = () => { 
    method.value === maxMethod ? method.value = 1 : method.value++
    document.getElementById('cycleButtonAudio').play()
}
let userId = null
let email = null
if (method.value === 1) {
    userId = myProps.user_id == null ? ref('') : ref(myProps.user_id)
    email = ref('')
} else if (method.value === 2) {
    userId = ref('')
    email = myProps.email == null ? ref('') : ref(myProps.email)
}
const form = useForm({
    method: method.value,
    user_id: userId.value,
    email: email.value
})
const exec1 = (searchString) => {
    if (searchString.length >= 5) {
        form.method = 1
        form.user_id = searchString
        form.email = ''
        document.getElementById('submitAudio').play()
        form.post(route('forgotpassword.update'))
    }
}
const exec2 = (searchString) => {
    if (searchString.length >= 5) {
        form.method = 2
        form.user_id = ''
        form.email = searchString
        document.getElementById('submitAudio').play()
        form.post(route('forgotpassword.update'))
    }
}
onMounted(() => {
    if (method.value === 1) document.getElementById("userIdField").focus()
    else if (method.value === 2) document.getElementById("emailField").focus()
})
const refNarrowLayout = ref(null)
watchEffect(() => {
    if (refNarrowLayout.value !== null) {
        if (form.processing) {
            refNarrowLayout.value.parentNode.style.opacity = 0.6
        } else {
            refNarrowLayout.value.parentNode.style.opacity = 1
        }
    }
})
</script>
<template>
    <audio id="cycleButtonAudio" src="/audio/gameswitch4.mp3" preload="auto" />
    <audio id="submitAudio" src="/audio/positive_beep2.mp3" preload="auto" />
    <NarrowLayout>
        <div ref="refNarrowLayout" 
            class="relative z-0 w-full h-72 text-orange-700 dark:text-green-100 rounded-none border-none">
            <div class="absolute z-10 top-4 w-full">
                <div class="flex justify-between place-items-baseline">
                    <span class="font-semibold">{{ $msg.forgotYourPassword }}</span>
                    <span class="text-sm font-medium">({{ $msg.forgotPasswordOption }} {{ method }} {{ $msg.forgotPasswordOf }} {{ maxMethod }})</span>
                </div>
                <p class="text-base">{{ $msg.forgotYourPasswordNoProblem }}</p>
                <p v-if="method === 1" class="pb-4 text-base">{{ $msg.forgotYourPasswordUserId }}</p>
                <p v-if="method === 2" class="pb-4 text-base">{{ $msg.forgotYourPasswordEmail }}</p>
            </div>
            <div v-if="method === 1" class="absolute z-10 top-28">
                <SearchBox id="userIdField" :disabled="form.processing" :placeholder="$msg.forgotPasswordPlaceholderUserId" v-model="userId" @thisSearch="exec1" />
                <InputError :message="form.errors.user_id" class="mt-2" />
            </div>
            <div v-if="method === 2" class="absolute z-10 top-28">
                <SearchBox id="emailField" :disabled="form.processing" :placeholder="$msg.forgotPasswordPlaceholderEmail" v-model="email" @thisSearch="exec2" />
                <InputError :message="form.errors.email" class="mt-2" />
            </div>
            <div class="absolute z-10 bottom-4 w-full">
                <button class="mt-4 px-6 py-2 text-white bg-sky-500 uppercase font-semibold text-base rounded-lg" 
                :disabled="form.processing" @click="cycle">{{ $msg.forgotYourPasswordTrySomethingElse }}</button>
            </div>
            <div v-if="form.processing" class="absolute z-30 top-28 left-40">
                <span class="circleAnimation" />
            </div>
        </div>
    </NarrowLayout>
</template>
<style lang="postcss" scoped>
.circleAnimation {
    @apply inline-block animate-spin w-16 h-16 
    border-t-8 border-t-orange-100 dark:border-t-green-700
    border-r-8 border-r-orange-100 dark:border-r-green-700
    border-b-8 border-b-orange-100 dark:border-b-green-700
    border-l-8 border-l-orange-800 dark:border-l-green-200 
    rounded-full;
}
</style>