<script setup>
import { onMounted, getCurrentInstance, ref, computed, watch, toRaw } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import HighLayout from '@/Layouts/HighLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import SwitchTwoState from '@/Components/HTML/SwitchTwoState.vue'
import PasswordEye from '@/Components/HTML/PasswordEye.vue'
import { useChangeLocaleAxios } from '@/Composables/useChangeLocaleAxios'
import { useLocalStorage } from '@/Composables/useLocalStorage'
import { useSessionStorage } from '@/Composables/useSessionStorage'
let { changeLocaleAxios } = useChangeLocaleAxios()
const app = getCurrentInstance()
const changeLocale = (k) => {
    app.appContext.config.globalProperties.$setLocale(k)
    changeLocaleAxios(k)
}
let { getLocal, removeLocal, setLocal } = useLocalStorage()
let { getSession, removeSession, setSession } = useSessionStorage()
const localFolder = 'register-create'
const myProps = defineProps({
    locales: { type: Array },
    pronouns: { type: Array }
})
const rawLocales = toRaw(myProps.locales)
const pronounFiltered = computed(() => {
    const raw = toRaw(myProps.pronouns)
    const fi = raw.filter(item => item['locale_id'] === Number(selectedLocale.value))
    return fi
})
const form = useForm({
    user_id: getLocal(localFolder, 'user_id', ''),
    password: getSession(localFolder, 'password', ''),
    password_confirmation: getSession(localFolder, 'password_confirmation', ''),
    name: getLocal(localFolder, 'name', ''),
    email: getLocal(localFolder, 'email', ''),
    locale_id: Number(getLocal(localFolder, 'locale_id', '0')),
    pronoun_id: Number(getLocal(localFolder, 'pronoun_id', '0')),
    show_name: JSON.parse(getLocal(localFolder, 'show_name', "true")),
    show_pronoun: JSON.parse(getLocal(localFolder, 'show_pronoun', "true")),
    show_email: JSON.parse(getLocal(localFolder, 'show_email', "true")),
    show_user_id: JSON.parse(getLocal(localFolder, 'show_user_id', "true")),
    captcha: ''
})
const showName = ref(form.show_name)
const showPronoun = ref(form.show_pronoun)
const showEmail = ref(form.show_email)
const showUserId = ref(form.show_user_id)
const selectedLocale = ref(form.locale_id)
const selectedPronoun = ref(form.pronoun_id)
const submit = () => {
    document.getElementById('processingButtonAudio').play()
    form.post(route('register.store'), {
        onSuccess: () => {
            removeLocal(localFolder, 'user_id')
            removeSession(localFolder, 'password')
            removeSession(localFolder, 'password_confirmation')
            removeLocal(localFolder, 'name')
            removeLocal(localFolder, 'email')
            removeLocal(localFolder, 'locale_id')
            removeLocal(localFolder, 'pronoun_id')
            removeLocal(localFolder, 'show_name')
            removeLocal(localFolder, 'show_pronoun')
            removeLocal(localFolder, 'show_email')
            removeLocal(localFolder, 'show_user_id')
            app.appContext.config.globalProperties.$setFlash(
                app.appContext.config.globalProperties.$msg.success,
                app.appContext.config.globalProperties.$msg.successStoreProfile
            )
        }
    })
}
const htmlImgSrc = ref(null)
const captchaReload = async () => {
    htmlImgSrc.value = null
    form.captcha = ''
    await axios.get(route('captcha.reload')).then(response => { htmlImgSrc.value = response.data.url }).catch(error => { console.log(error) })
}
const errorCaptcha = computed(() => {
    return form.errors.captcha != null ? app.appContext.config.globalProperties.$msg.captchaValidation : undefined
})
onMounted(() => {
    captchaReload()
    document.getElementById('register-userId').focus()
})
watch(selectedLocale, () => {
    setLocal(localFolder, 'locale_id', selectedLocale.value)
    let loc_id = Number(selectedLocale.value)
    form.locale_id = loc_id
    if (loc_id > 0) {
        const loc = rawLocales.find(e => e['id'] === loc_id)
        changeLocale(loc['locale'])
    }
    selectedPronoun.value = "0"
    form.pronoun_id = 0
})
watch(selectedPronoun, () => {
    setLocal(localFolder, 'pronoun_id', selectedPronoun.value)
    form.pronoun_id = Number(selectedPronoun.value)
})
watch(showName, () => {
    form.show_name = showName.value
    setLocal(localFolder, 'show_name', JSON.stringify(form.show_name))
    if (!showName.value) { 
        showPronoun.value = false
        form.show_pronoun = false
    }
})
watch(showPronoun, () => {
    form.show_pronoun = showPronoun.value
    setLocal(localFolder, 'show_pronoun', JSON.stringify(form.show_pronoun))
})
watch(showEmail, () => {
    form.show_email = showEmail.value
    setLocal(localFolder, 'show_email', JSON.stringify(form.show_email))
})
watch(showUserId, () => {
    form.show_user_id = showUserId.value
    setLocal(localFolder, 'show_user_id', JSON.stringify(form.show_user_id))
})
watch(errorCaptcha, () => { captchaReload() })
/* Inner Style(s): */
const textFieldStyle = "block mt-1 w-full rounded-md shadow-sm bg-amber-100 dark:bg-lime-100 focus:bg-amber-200 focus:dark:bg-lime-200 border-amber-200 dark:border-emerald-700 focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50"
</script>
<template>
    <Head :title="$msg.registerNewUser" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <HighLayout>
        <form @submit.prevent="submit">
            <div class="flex justify-between items-start">
                <h3 class="mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold">{{ $msg.registerNewUser }}</h3>
                <LocaleCycler class="mt-1" />
            </div>
            <div>
                <label for="register-userId" class="labelStyle">{{ $msg.userId }}</label>
                <input v-model="form.user_id" id="register-userId" type="text" class="userFieldStyle" :placeholder="$msg.userIdPlaceholder"
                    @change="setLocal(localFolder, 'user_id', form.user_id)">
                <InputError :message="form.errors.user_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="register-password" class="labelStyle">{{ $msg.password }}</label>
                <PasswordEye v-model="form.password" id="register-password" :placeholder="$msg.passwordPlaceholder" 
                    :textFieldClass="textFieldStyle"
                    @change="setSession(localFolder, 'password', form.password)" />
                <InputError :message="form.errors.password" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="register-password-confirmation" class="labelStyle">{{ $msg.passwordConfirmation }}</label>
                <PasswordEye v-model="form.password_confirmation" id="register-password-confirmation" :placeholder="$msg.passwordConfirmationPlaceholder" 
                    :textFieldClass="textFieldStyle"
                    @change="setSession(localFolder, 'password_confirmation', form.password_confirmation)" />
                <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="register-userName" class="labelStyle">{{ $msg.userName }}</label>
                <input v-model="form.name" id="register-userName" type="text" class="fieldStyle" :placeholder="$msg.userNamePlaceholder"
                    @change="setLocal(localFolder, 'name', form.name)">
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="register-email" class="labelStyle">{{ $msg.email }}</label>
                <input v-model="form.email" id="register-email" type="text" class="fieldStyle" :placeholder="$msg.emailPlaceholder"
                    @change="setLocal(localFolder, 'email', form.email)">
                <InputError :message="form.errors.email" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="register-locale" class="labelStyle">{{ $msg.localePreferred }}</label>
                <select v-model="selectedLocale" id="register-locale" class="fieldStyle">
                    <option value="0">-- {{ $msg.localeSelect }} --</option>
                    <option v-for="locale in locales" :value="locale.id" :key="locale.id">
                        {{ locale.name }}
                    </option>
                </select>
                <InputError :message="form.errors.locale_id" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="register-pronoun" class="labelStyle">{{ $msg.pronoun }}</label>
                <select v-model="selectedPronoun" id="register-pronoun" class="fieldStyle">
                    <option value="0">-- {{ $msg.pronounSelect }} --</option>
                    <option v-for="pronoun in pronounFiltered" :value="pronoun.id" :key="pronoun.id">
                        {{ pronoun.pronoun }}
                    </option>
                </select>
                <InputError :message="form.errors.pronoun_id" class="mt-2" />
            </div>
            <div class="switchStyle">
                <span class="labelSpanStyle">{{ $msg.showName }}</span>
                <SwitchTwoState v-model="showName" />
            </div>
            <div class="switchStyle">
                <span class="labelSpanStyle" :class="{ 'line-through': !showName, 'text-gray-400': !showName }">{{ $msg.showPronoun }}</span>
                <SwitchTwoState v-if="showName" v-model="showPronoun" />
            </div>
            <div class="switchStyle">
                <span class="labelSpanStyle">{{ $msg.showEmail }}</span>
                <SwitchTwoState v-model="showEmail" />
            </div>
            <div class="switchStyle">
                <span class="labelSpanStyle">{{ $msg.showUserId }}</span>
                <SwitchTwoState v-model="showUserId" />
            </div>
            <div class="mt-4">
                <label for="register-captcha" class="labelSpanStyle">{{ $msg.captcha }}</label>
                <div class="flex flex-row place-items-center py-3">
                    <img v-if="htmlImgSrc !== null" :src="htmlImgSrc">
                    <div v-else class="animate-pulse w-56 h-9 border-2 border-slate-300 rounded-sm">
                        <div class="px-2 grid grid-cols-6 gap-2 h-full w-full items-center">
                            <div class="h-2 bg-slate-200 rounded-md col-span-3" />
                            <div class="h-2 bg-slate-200 rounded-md col-span-1" />
                            <div class="h-2 bg-slate-200 rounded-md col-span-2" />
                        </div>
                    </div>
                    <button class="ml-4 py-2 px-4 text-xl font-semibold w-fit
                        text-orange-700 dark:text-amber-100
                        border-2 border-orange-700 dark:border-amber-100 rounded-md cursor-pointer"
                        @click.prevent="captchaReload">&#8635;</button>
                </div>
                <input v-model="form.captcha" id="register-captcha" type="text" class="fieldStyle" :placeholder="$msg.captchaPlaceholder"
                    @keydown.enter.prevent="" @keydown.space.prevent="">
                <InputError :message="errorCaptcha" class="mt-2" />
            </div>
            <div class="mt-4 mb-1 flex flex-row-reverse">
                <ProcessingButton v-model="form.processing" :disabled="form.processing" class="w-36" >{{ $msg.save }}</ProcessingButton>
            </div>
        </form>
    </HighLayout>
</template>
<style lang="postcss" scoped>
.fieldStyle {
    @apply block mt-1 w-full rounded-md shadow-sm 
    bg-amber-50 dark:bg-lime-50
    focus:bg-amber-100 focus:dark:bg-lime-100 
    border-amber-200 dark:border-emerald-700 
    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50;
}
.labelStyle {
    @apply block font-medium text-sm text-orange-700 dark:text-amber-100;
}
.labelSpanStyle {
    @apply block mr-3 font-medium text-base text-orange-700 dark:text-amber-100;
}
.switchStyle {
    @apply mt-4 flex flex-row place-items-center;
}
.userFieldStyle {
    @apply block mt-1 w-full rounded-md shadow-sm
    bg-amber-50 dark:bg-lime-50
    focus:bg-amber-100 focus:dark:bg-lime-100 
    border-amber-200 dark:border-emerald-700 
    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50;
}
</style>