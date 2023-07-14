<script setup>
import { getCurrentInstance } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
const myProps = defineProps(['locale','token'])
const form = useForm({
    'token': myProps.token
})
const app = getCurrentInstance()
app.appContext.config.globalProperties.$setLocale(myProps.locale)
const submit = () => {
    document.getElementById('processingButtonAudio').play()
    form.post(route('tokenexpired.resend'), {
        onSuccess: () => {
            app.appContext.config.globalProperties.$setFlash(
                app.appContext.config.globalProperties.$msg.success,
                app.appContext.config.globalProperties.$msg.successTokenExpiredResend
            )
        }
    })
}
</script>
<template>
    <Head :title="$msg.tokenExpired" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <NarrowLayout>
        <form @submit.prevent="submit" class="py-1">
            <div class="flex justify-between items-start">
                <h3 class="mt-1 mb-2 pr-1 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.tokenExpiredTitle }}</h3>
                <LocaleCycler class="mt-1" />
            </div>
            <p class="mt-1 mb-4 text-orange-700 dark:text-amber-100">{{ $msg.tokenExpiredText }}</p>
            <!-- submit button -->
            <div class="mt-6 mb-1 flex flex-row">
                <ProcessingButton v-model="form.processing" class="w-48" >{{ $msg.tokenExpiredButton }}</ProcessingButton>
            </div>
        </form>
    </NarrowLayout>
</template>