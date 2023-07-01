<script setup>
import { ref, onMounted, toRaw } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import ProcessingButton from '@/Components/HTML/ProcessingButton.vue'
import { useCan } from '@/Composables/useCan'
let { can } = useCan()
const form = useForm({
    query: ''
})
const submit = () => {
    form.patch(route('directdb.execute'), {
        onSuccess: () => {
            form.reset('query')
        }
    })
}
const background = toRaw(usePage().props.background)
const backgroundDiv = ref(null)
onMounted(() => {
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
})
</script>
<template>
    <Head title="Direct DB" />
    <CompleteLayout>
        <div class="py-12 w-full lg:h-[768px] 2xl:h-[900px] bg-cover bg-center h-[480px] md:h-[640px]" 
             ref="backgroundDiv">
            <div class="max-w-2xl sm:max-w-3xl md:max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-orange-50 dark:bg-green-800 bg-opacity-80 dark:bg-opacity-80 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-amber-100 font-semibold">
                        <h1 v-if="can('admin.generic')" class="mb-6 text-3xl font-semibold">Direct DB</h1>
                        <form v-if="can('admin.generic')" @submit.prevent="submit"
                            class="flex flex-col">
                            <textarea class="block w-full h-48 mb-4 text-gray-800 rounded" v-model="form.query" />
                            <ProcessingButton class="w-64 text-center uppercase px-6 py-2 bg-blue-600 text-white rounded"
                                v-model="form.processing" :disabled="form.processing"
                                @click="submit" @keydown.enter="submit">
                                {{ $msg.execute }}
                            </ProcessingButton>
                        </form>
                        <h2 v-if="!can('admin.generic')" class="mb-4 text-2xl font-semibold text-red-500 dark:text-red-400">$msg.unauthorized</h2>
                    </div>
                </div>
            </div>
        </div>
    </CompleteLayout>
</template>