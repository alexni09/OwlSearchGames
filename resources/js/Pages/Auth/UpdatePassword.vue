<script setup>
import { getCurrentInstance, onMounted } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import PasswordEye from '@/Components/HTML/PasswordEye.vue'
const form = useForm({
    current_password: '',
    new_password: '',
    new_password_confirmation: ''
})
const app = getCurrentInstance()
const submitUpdate = () => {
    document.getElementById('processingButtonAudio').play()
    form.patch(route('updatePassword.update'), {
        onSuccess: () => {
            form.reset('current_password')
            form.reset('new_password')
            form.reset('new_password_confirmation')
            app.appContext.config.globalProperties.$setFlash(
                app.appContext.config.globalProperties.$msg.success,
                app.appContext.config.globalProperties.$msg.successUpdatePassword
            )
        }
    })
}
onMounted(() => {
    document.getElementById('update-password-current').focus()
})
</script>
<template>
    <Head :title="$msg.updatePassword" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <NarrowLayout>
        <form @submit.prevent="submitUpdate" class="py-1">
            <div class="flex justify-between place-items-center">
                <h3 class="mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.updatePassword }}</h3>
                <LocaleCycler />
            </div>
            <!-- current password -->
            <div>
                <label for="update-password-current" class="labelStyle">{{ $msg.passwordCurrent }}</label>
                <PasswordEye v-model="form.current_password" id="update-password-current" :placeholder="$msg.passwordCurrentPlaceholder" 
                textFieldClass="block mt-1 w-full rounded-md shadow-sm
                    bg-yellow-50 dark:bg-lime-50
                    focus:bg-amber-100 focus:dark:bg-lime-100
                    border-amber-100 dark:border-emerald-700
                    focus:ring focus:ring-amber-200 focus:dark:ring-emerald-800 focus:ring-opacity-50" />
                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>
            <!-- password -->
            <div class="mt-4">
                <label for="update-password" class="labelStyle">{{ $msg.passwordNew }}</label>
                <PasswordEye v-model="form.new_password" id="update-password" :placeholder="$msg.passwordNewPlaceholder" 
                textFieldClass="block mt-1 w-full rounded-md shadow-sm
                    bg-amber-100 dark:bg-lime-100
                    focus:bg-amber-200 focus:dark:bg-lime-200
                    border-amber-200 dark:border-emerald-700
                    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50" />
                <InputError :message="form.errors.new_password" class="mt-2" />
            </div>
            <!-- password confirmation -->
            <div class="mt-4">
                <label for="update-password-confirmation" class="labelStyle">{{ $msg.passwordConfirmation }}</label>
                <PasswordEye v-model="form.new_password_confirmation" id="update-password-confirmation" :placeholder="$msg.passwordConfirmationPlaceholder" 
                textFieldClass="block mt-1 w-full rounded-md shadow-sm
                    bg-amber-100 dark:bg-lime-100
                    focus:bg-amber-200 focus:dark:bg-lime-200
                    border-amber-200 dark:border-emerald-700
                    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50" />
                <InputError :message="form.errors.new_password_confirmation" class="mt-2" />
            </div>
            <!-- submit button -->
            <div class="mt-6 mb-1 flex flex-row-reverse">
                <ProcessingButton v-model="form.processing" class="w-36" >{{ $msg.save }}</ProcessingButton>
            </div>
        </form>
    </NarrowLayout>
</template>
<style lang="postcss" scoped>
.labelStyle {
    @apply block font-medium text-sm text-orange-800 dark:text-amber-100;
}
</style>