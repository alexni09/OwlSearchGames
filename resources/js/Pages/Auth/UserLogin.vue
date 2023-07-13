<script setup>
import { onMounted } from 'vue'
import { Link, Head, useForm } from '@inertiajs/vue3'
import NarrowLayout from '@/Layouts/NarrowLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import CheckboxColorSVG from '@/Components/HTML/CheckboxColorSVG.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import PasswordEye from '@/Components/HTML/PasswordEye.vue'
import { useLocalStorage } from '@/Composables/useLocalStorage'
let { getLocal, removeLocal, setLocal } = useLocalStorage()
const localFolder = 'login'
const form = useForm({
    user_id: getLocal(localFolder, 'user_id'),
    password: '',
    rememberMe: JSON.parse(getLocal(localFolder, 'rememberMe', JSON.stringify(true)))
})
const submit = () => {
    document.getElementById('processingButtonAudio').play()
    form.post(route('login'), {
        onSuccess: () => {
            if (!form.rememberMe) {
                removeLocal(localFolder, 'user_id')
                removeLocal(localFolder, 'rememberMe')
            }
        },
        onFinish: () => {
            form.reset('password')
        }
    })
}
onMounted(() => {
    document.getElementById('login-userId').focus()
})
</script>
<template>
    <Head :title="$msg.login" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <NarrowLayout>
        <form @submit.prevent="submit">
            <div class="flex justify-between place-items-center">
                <h3 class="mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.login3 }}</h3>
                <LocaleCycler />
            </div>
            <div>
                <label for="login-userId" class="labelStyle">{{ $msg.userId }}</label>
                <input v-model="form.user_id" id="login-userId" type="text" class="userFieldStyle" :placeholder="$msg.userIdPlaceholder"
                    @change="setLocal(localFolder, 'user_id', form.user_id)">
                <InputError :message="form.errors.user_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="login-password" class="labelStyle">{{ $msg.password }}</label>
                <PasswordEye v-model="form.password" id="login-password" :placeholder="$msg.passwordPlaceholder" 
                textFieldClass="block mt-1 w-full rounded-md shadow-sm
                    bg-amber-100 dark:bg-lime-100
                    focus:bg-amber-200 focus:dark:bg-lime-200
                    border-amber-200 dark:border-emerald-700
                    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50" />
                <InputError :message="form.errors.password" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-between">
                <CheckboxColorSVG reverse v-model="form.rememberMe" 
                    @keyup="setLocal(localFolder, 'rememberMe', JSON.stringify(form.rememberMe))"
                    @click="setLocal(localFolder, 'rememberMe', JSON.stringify(form.rememberMe))">
                    {{ $msg.rememberMe }}
                </CheckboxColorSVG>
                <ProcessingButton v-model="form.processing" class="mb-1 w-36" >{{ $msg.login2 }}</ProcessingButton>
            </div>
        </form>
        <hr class="my-8 border-orange-800 dark:border-green-200">
        <div class="mb-2 flex flex-row-reverse">
            <Link :href="route('forgotpassword.edit')" as="button" type="button"
                class="px-5 py-2 bg-red-500 dark:bg-red-400 text-white uppercase rounded">{{ $msg.forgotMyPassword }}</Link>
        </div>
        <hr class="my-8 border-orange-800 dark:border-green-200">
        <div class="mb-2 flex flex-row justify-between items-center">
            <p class="text-orange-800 dark:text-amber-100">{{ $msg.noAccount }}</p>
            <Link :href="route('register.create')" as="button" type="button"
                class="px-9 py-2 bg-blue-600 text-white uppercase rounded">{{ $msg.register }}</Link>
        </div>
    </NarrowLayout>
</template>
<style lang="postcss" scoped>
.labelStyle {
    @apply block font-medium text-sm text-orange-800 dark:text-amber-100;
}
.userFieldStyle {
    @apply block mt-1 w-full rounded-md shadow-sm
    bg-amber-50 dark:bg-lime-50
    focus:bg-amber-100 focus:dark:bg-lime-100 
    border-amber-200 dark:border-emerald-700 
    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50;
}
</style>