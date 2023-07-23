<script setup>
import { toRaw, ref, onMounted, computed, watch, getCurrentInstance } from 'vue'
import { Head, usePage, useForm } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import TrophyZinc from '@/Components/SVG/Trophy/TrophyZinc.vue'
import TrophyGold from '@/Components/SVG/Trophy/TrophyGold.vue'
import { useCan } from '@/Composables/useCan'
import { useSessionStorage } from '@/Composables/useSessionStorage'
let { can } = useCan()
let { getSession, removeSession, setSession } = useSessionStorage()
const localFolder = 'contact-form'
const app = getCurrentInstance()
const accumulatedScore = computed(() => Number(usePage().props.accumulatedScore))
const user = computed(() => usePage().props.auth.user)
const background = toRaw(usePage().props.background)
const backgroundDiv = ref(null)
const form = useForm({
    user_id: null,
    name: getSession(localFolder, 'name', !!user.value ? user.value.name : ''),
    email: getSession(localFolder, 'email', !!user.value ? user.value.email : ''),
    message: getSession(localFolder, 'message', ''),
    captcha: ''
})
setSession(localFolder, 'name', form.name)
setSession(localFolder, 'email', form.email)
setSession(localFolder, 'message', form.message)
const submit = () => {
    if (!!user.value) form.user_id = user.value.user_id
    document.getElementById('processingButtonAudio').play()
    form.post(route('contact.sendmail'), {
        onSuccess: () => {
            removeSession(localFolder, 'name')
            removeSession(localFolder, 'email')
            removeSession(localFolder, 'message')
            app.appContext.config.globalProperties.$setFlash(
                app.appContext.config.globalProperties.$msg.success,
                app.appContext.config.globalProperties.$msg.successEmailHasBeenSent
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
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
    captchaReload()
    if (!!user.value) document.getElementById('contact-message').focus()
    else document.getElementById('contact-name').focus()
})
watch(errorCaptcha, () => { captchaReload() })
</script>
<template>
    <Head :title="$msg.contactForm" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <CompleteLayout>
        <div class="py-12 w-full h-[1024px] bg-cover" ref="backgroundDiv">
            <div class="max-w-2xl sm:max-w-3xl md:max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-orange-50/80 dark:bg-green-800/80 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-amber-200 font-semibold">
                        <div class="flex flex-col justify-start">
                            <h1 class="mb-4 font-semibold text-2xl">{{ $msg.contactForm }}</h1>
                            <form @submit.prevent="submit">
                                <div>
                                    <label for="contact-name" class="labelStyle">{{ $msg.yourName }}</label>
                                    <input v-model="form.name" id="contact-name" type="text" class="fieldStyle" :placeholder="$msg.userNamePlaceholder"
                                        @change="setSession(localFolder, 'name', form.name)">
                                    <InputError :message="form.errors.name" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="contact-email" class="labelStyle">{{ $msg.yourEmail }}</label>
                                    <input v-model="form.email" id="contact-email" type="text" class="fieldStyle" :placeholder="$msg.emailPlaceholder"
                                        @change="setSession(localFolder, 'email', form.email)">
                                    <InputError :message="form.errors.email" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="contact-message" class="labelStyle">{{ $msg.yourMessage }}</label>
                                    <textarea v-model="form.message" id="contact-message" class="textAreaStyle" :placeholder="$msg.messagePlaceholder"
                                        maxlength="250" @change="setSession(localFolder, 'message', form.message)" />
                                    <InputError :message="form.errors.message" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="contact-captcha" class="labelSpanStyle">{{ $msg.captcha }}</label>
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
                                    <div class="flex flex-row justify-between items-baseline">
                                        <div class="flex flex-col justify-start">
                                            <input v-model="form.captcha" id="contact-captcha" type="text" class="captchaFieldStyle" :placeholder="$msg.captchaPlaceholder"
                                                maxlength="6" @keydown.enter.prevent="" @keydown.space.prevent="">
                                            <InputError :message="errorCaptcha" class="mt-2" />
                                        </div>
                                        <div class="flex flex-row-reverse">
                                            <ProcessingButton v-model="form.processing" :disabled="form.processing" class="w-36 h-fit" >{{ $msg.send }}</ProcessingButton>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </CompleteLayout>
    <div v-if="accumulatedScore != null && accumulatedScore > 0">
        <Teleport to="#score">
            <div class="flex flex-row place-items-center ml-8 sm:ml-1">
                <span class="scoreStyle">{{ $msg.score }}: </span>
                <span class="scoreStyle">{{ accumulatedScore }}</span>
                <TrophyGold v-if="can('trophy.gold')" class="trophyStyle" />
                <TrophyZinc v-else-if="can('trophy.silver')" class="trophyStyle" />
            </div>
        </Teleport>
    </div>
</template>
<style lang="postcss" scoped>
.captchaFieldStyle {
    @apply block mt-1 w-56 rounded-md shadow-sm 
    bg-amber-50 dark:bg-lime-50
    focus:bg-amber-100 focus:dark:bg-lime-100 
    border-amber-200 dark:border-emerald-700 
    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50;
}
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
.scoreStyle {
    @apply font-luckiestguy tracking-widest text-orange-500 dark:text-orange-400 lg:text-xl xl:text-2xl;
}
.textAreaStyle {
    @apply block mt-1 w-full rounded-md shadow-sm
    h-28 max-h-56
    bg-amber-50 dark:bg-lime-50
    focus:bg-amber-100 focus:dark:bg-lime-100 
    border-amber-200 dark:border-emerald-700 
    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50;
}
.trophyStyle {
    @apply ml-0.5 md:ml-1 lg:ml-2 xl:ml-3 2xl:ml-4;
}
</style>