<script setup>
import { onMounted, getCurrentInstance, ref, computed, watch, toRaw } from 'vue'
import { Link, Head, useForm, usePage } from '@inertiajs/vue3'
import HighDoubleLayout from '@/Layouts/HighDoubleLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import InputError from '@/Components/Laravel/InputError.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import SwitchTwoState from '@/Components/HTML/SwitchTwoState.vue'
import { useCan } from '@/Composables/useCan'
import { useChangeLocaleAxios } from '@/Composables/useChangeLocaleAxios'
let { changeLocaleAxios } = useChangeLocaleAxios()
let { can } = useCan()
const app = getCurrentInstance()
const changeLocale = (k) => {
    app.appContext.config.globalProperties.$setLocale(k)
    changeLocaleAxios(k)
}
const myProps = defineProps({
    locales: { type: Array },
    pronouns: { type: Array }
})
const user = computed(() => usePage().props.auth.user)
const showName = ref(Boolean(user.value.show_name))
const showPronoun = ref(Boolean(user.value.show_pronoun))
const initialLocale = String(user.value.locale_id)
const selectedLocale = ref(initialLocale)
const rawLocales = toRaw(myProps.locales)
const pronounFiltered = computed(() => {
    const raw = toRaw(myProps.pronouns)
    const fi = raw.filter(item => item['locale_id'] === Number(selectedLocale.value))
    return fi
})
const initialPronoun = String(user.value.pronoun_id)
const selectedPronoun = ref(initialPronoun)
const form = useForm({
    name: user.value.name,
    email: user.value.email,
    locale_id: initialLocale,
    pronoun_id: initialPronoun,
    show_name: showName.value,
    show_pronoun: showPronoun.value,
    show_email: Boolean(user.value.show_email),
    show_user_id: Boolean(user.value.show_user_id),
})
const submit = () => {
    document.getElementById('processingButtonAudio').play()
    form.patch(route('profile.edit'), {
        onSuccess: () => {
            if (form.isDirty) {
                app.appContext.config.globalProperties.$setFlash(
                    app.appContext.config.globalProperties.$msg.success,
                    app.appContext.config.globalProperties.$msg.successUpdateProfile
                )
            } else {
                app.appContext.config.globalProperties.$setFlash(
                    app.appContext.config.globalProperties.$msg.information,
                    app.appContext.config.globalProperties.$msg.infoNotUpdateProfile,
                    'info'
                )
            }
        }
    })
}
onMounted(() => {
    document.getElementById('profile-userName').focus()
})
watch(selectedLocale, () => {
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
    form.pronoun_id = Number(selectedPronoun.value)
})
watch(showName, () => {
    form.show_name = showName.value
    if (!showName.value) { 
        showPronoun.value = false
        form.show_pronoun = false
    }
})
watch(showPronoun, () => {
    form.show_pronoun = showPronoun.value
})
</script>
<template>
    <Head :title="$msg.profileEdit" />
    <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
    <HighDoubleLayout>
        <template #one>
            <div class="flex justify-between items-start">
                <h3 class="mt-1 mb-2 text-lg text-orange-700 dark:text-amber-100 font-semibold">{{ $msg.profileEdit }}</h3>
                <LocaleCycler class="mt-1" />
            </div>
            <form @submit.prevent="submit">
                <div class="mt-1">
                    <label for="profile-userName" class="labelStyle">{{ $msg.userName }}</label>
                    <input v-model="form.name" id="profile-userName" type="text" class="fieldStyle" :placeholder="$msg.userNamePlaceholder">
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="profile-email" class="labelStyle">{{ $msg.email }}</label>
                    <input v-model="form.email" id="profile-userName" type="text" class="fieldStyle" :placeholder="$msg.emailPlaceholder">
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="profile-locale" class="labelStyle">{{ $msg.localePreferred }}</label>
                    <select v-model="selectedLocale" id="profile-locale" class="fieldStyle">
                        <option value="0">-- {{ $msg.localeSelect }} --</option>
                        <option v-for="locale in locales" :value="locale.id" :key="locale.id">
                            {{ locale.name }}
                        </option>
                    </select>
                    <InputError :message="form.errors.locale_id" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="profile-pronoun" class="labelStyle">{{ $msg.pronoun }}</label>
                    <select v-model="selectedPronoun" id="profile-pronoun" class="fieldStyle">
                        <option value="0">-- {{ $msg.pronounSelect }} --</option>
                        <option v-for="pronoun in pronounFiltered" :value="pronoun.id" :key="pronoun.id">
                            {{ pronoun.pronoun }}
                        </option>
                    </select>
                    <InputError :message="form.errors.pronoun_id" class="mt-2" />
                </div>
                <div class="switchStyle">
                    <span class="mr-3 text-orange-700 dark:text-amber-100">{{ $msg.showName }}</span>
                    <SwitchTwoState v-model="showName" />
                </div>
                <div class="switchStyle">
                    <span class="mr-3 text-orange-700 dark:text-amber-100" :class="{ 'line-through': !showName, 'text-gray-400': !showName }">{{ $msg.showPronoun }}</span>
                    <SwitchTwoState v-if="showName" v-model="showPronoun" />
                </div>
                <div class="switchStyle">
                    <span class="mr-3 text-orange-700 dark:text-amber-100">{{ $msg.showEmail }}</span>
                    <SwitchTwoState v-model="form.show_email" />
                </div>
                <div class="switchStyle">
                    <span class="mr-3 text-orange-700 dark:text-amber-100">{{ $msg.showUserId }}</span>
                    <SwitchTwoState v-model="form.show_user_id" />
                </div>
                <div class="mt-4 mb-2 flex flex-row-reverse">
                    <ProcessingButton v-model="form.processing" class="w-36" >{{ $msg.save }}</ProcessingButton>
                </div>
            </form>
        </template>
        <template #two v-if="can('profile.delete')" >
            <div class="flex flex-col">
                <p class="mb-4 text-orange-800 dark:text-amber-100">{{ $msg.profileDeletePreText }}</p>
                <div class="flex flex-row-reverse">
                    <Link :href="route('profile.predelete')" method="post" as="button" type="button"
                        class="mt-1 mb-2 w-[208px] px-3 py-2 bg-red-500 text-amber-50 font-semibold text-sm 
                        flex justify-center place-items-center
                        uppercase rounded">{{ $msg.profileDelete }}</Link>
                </div>
            </div>
        </template>
    </HighDoubleLayout>
</template>
<style lang="postcss" scoped>
.labelStyle {
    @apply block font-medium text-sm text-orange-700 dark:text-amber-100;
}
.fieldStyle {
    @apply block mt-1 w-full rounded-md shadow-sm 
    bg-amber-50 dark:bg-lime-50
    focus:bg-amber-100 focus:dark:bg-lime-100 
    border-amber-200 dark:border-emerald-700 
    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50;
}
.switchStyle {
    @apply mt-4 flex flex-row place-items-center;
}
</style>