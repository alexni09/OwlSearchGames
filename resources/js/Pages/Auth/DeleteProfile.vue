<script setup>
import { getCurrentInstance } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import ProcessingButtonRed from '@/Components/HTML/ProcessingButtonRed.vue'
const app = getCurrentInstance()
const form = useForm({
})
const submit = () => {
    document.getElementById('deleteButtonAudio').play()
    form.delete(route('profile.destroy'), {
        onSuccess: () => {
            app.appContext.config.globalProperties.$setFlash(
                app.appContext.config.globalProperties.$msg.information,
                app.appContext.config.globalProperties.$msg.successDeleteProfile,
                'info'
            )
        }
    })
}
</script>
<template>
    <Head :title="$msg.profileDelete" />
    <audio id="deleteButtonAudio" src="/audio/redbutton.mp3" preload="auto" />
    <NarrowLayout>
        <form @submit.prevent="submit">
            <p class="mx-1 text-orange-800 dark:text-amber-100">{{ $msg.profileDeleteText }}</p>
            <div class="mt-4 mb-2 flex flex-row">
                <ProcessingButtonRed v-model="form.processing" class="w-full" >{{ $msg.deleteUserAccount }}</ProcessingButtonRed>
            </div>
        </form>
    </NarrowLayout>
</template>