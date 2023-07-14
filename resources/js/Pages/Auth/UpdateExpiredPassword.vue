<script setup>
import { getCurrentInstance, onMounted } from 'vue'
import { Link, Head, useForm } from '@inertiajs/vue3'
import DoubleLayout from '@/Layouts/DoubleLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import PasswordEye from '@/Components/HTML/PasswordEye.vue'
import ArrowRectangleRight from '@/Components/SVG/ArrowRectangleRight.vue'
const form = useForm({
    new_password: '',
    new_password_confirmation: ''
})
const app = getCurrentInstance()
const submitUpdate = () => {
    document.getElementById('processingButtonAudio').play()
    form.patch(route('passwordexpired.update'), {
        onSuccess: () => {
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
    document.getElementById('update-password').focus()
})
</script>
<template>
    <Head :title="$msg.passwordExpired" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <DoubleLayout>
        <template #one>
            <form @submit.prevent="submitUpdate" class="py-1">
                <div class="flex justify-between items-start">
                    <h3 class="mt-1 mb-2 pr-1 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.updateExpiredPassword }}</h3>
                    <LocaleCycler class="mt-1" />
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
                <div class="mt-6 mb-1 flex flex-row">
                    <ProcessingButton v-model="form.processing" class="w-36" >{{ $msg.save }}</ProcessingButton>
                </div>
            </form>
        </template>
        <template #two>
            <p class="mt-1 mb-4 text-orange-700 dark:text-amber-100">{{ $msg.passwordExpiredLogout }}</p>
            <div class="mb-1">
                <Link :href="route('logout')" as="button" type="button"
                    class="w-36 px-4 py-2 bg-red-400 text-amber-50 font-semibold text-base 
                    flex justify-center place-items-center 
                    hover:underline uppercase rounded-sm">
                    <ArrowRectangleRight class="mx-1" />
                    <span class="ml-1">{{ $msg.logout }}</span>
                </Link>
            </div>
        </template>
    </DoubleLayout>
</template>
<style lang="postcss" scoped>
.labelStyle {
    @apply block font-medium text-sm text-orange-800 dark:text-amber-100;
}
</style>