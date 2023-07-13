<script setup>
import { computed } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import SimpleLayout from '@/Layouts/SimpleLayout.vue'
import LocaleCycler from '@/Components/Others/LocaleCycler.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import ArrowRectangleRight from '@/Components/SVG/ArrowRectangleRight.vue'
import EnvelopeClosed from '@/Components/SVG/EnvelopeClosed.vue'
import EmailNotes from '@/Components/Email/EmailNotes.vue'
const props = defineProps({
    status: {
        type: String
    }
});
const form = useForm({});
const submit = () => {
    document.getElementById('processingButtonAudio').play()
    form.post(route('verification.send'))
};
const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>
<template>
    <SimpleLayout>
        <Head :title="$msg.emailVerification" />
        <audio id="processingButtonAudio" src="/audio/processingbutton1.mp3" preload="auto" />
        <div class="text-orange-800 dark:text-amber-100 xl:max-w-2xl 2xl:max-w-2xl">
            <div class="flex justify-between items-start">
                <div class="mb-4 pr-5 text-base">{{ $msg.emailVerificationBigMessage }}</div>
                <LocaleCycler class="mt-1" />
            </div>
            <div class="mb-4 font-medium text-base" v-if="verificationLinkSent">{{ $msg.emailVerificationSmallMessage }}</div>
            <EmailNotes />
            <form @submit.prevent="submit">
                <div class="mt-4 flex items-center justify-between">
                    <ProcessingButton v-model="form.processing" :disabled="form.processing" class="w-96">
                        <div class="flex justify-center place-items-center uppercase rounded">
                            <EnvelopeClosed class="mx-1" />
                            <span class="ml-1">{{ $msg.emailVerificationResend }}</span>
                        </div>
                    </ProcessingButton>
                    <Link :href="route('logout')" as="button" type="button"
                        class="my-1 mx-2 w-[208px] px-3 py-2 bg-red-400 text-amber-50 font-semibold text-base 
                        flex justify-center place-items-center 
                        uppercase rounded">
                        <ArrowRectangleRight class="mx-1" />
                        <span class="ml-1">{{ $msg.logout }}</span>
                    </Link>
                </div>
            </form>
        </div>
    </SimpleLayout>
</template>