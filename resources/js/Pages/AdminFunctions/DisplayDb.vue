<script setup>
import { ref, onMounted, toRaw } from 'vue'
import { Head, Link, usePage } from '@inertiajs/vue3'
import CompleteLayout from '@/Layouts/CompleteLayout.vue'
import { useCan } from '@/Composables/useCan'
const myProps = defineProps({
    columns: { type:Array },
    rows: { type:Array }
})
let { can } = useCan()
const background = toRaw(usePage().props.background)
const backgroundDiv = ref(null)
onMounted(() => {
    backgroundDiv.value.style.backgroundImage = "url('" + background.img + "')"
    backgroundDiv.value.style.backgroundPosition = background.position
})
</script>
<template>
    <Head title="Display DB" />
    <CompleteLayout>
        <div class="py-12 w-full lg:h-[768px] 2xl:h-[900px] bg-cover bg-center h-[480px] md:h-[640px]" 
             ref="backgroundDiv">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-orange-50 dark:bg-green-800 bg-opacity-80 dark:bg-opacity-80 shadow-sm rounded-lg">
                    <div class="p-6 text-orange-800 dark:text-amber-100">
                        <h1 v-if="can('admin.generic')" class="mb-6 text-3xl font-semibold">Display DB</h1>
                        <div v-if="can('admin.generic')" class="mb-6">
                            <h2 v-if="!rows || rows.length === 0" class="mb-6 text-lg font-semibold">{{ $msg.noRecords }}</h2>
                            <table v-if="rows && rows.length > 0" class="p-2 border-collapse border border-gray-600 rounded-lg">
                                <tr class="bg-gray-400 text-gray-900 font-semibold">
                                    <th v-for="(c,kc) in columns" :key="kc" class="p-1 border-x border-gray-600 rounded-lg">{{ c }}</th>
                                </tr>
                                <tr v-for="(r,kr) in rows" :key="kr"
                                    class="text-gray-800"
                                    :class="{'bg-white': kr % 6 < 3, 'bg-gray-200': kr % 6 > 2}">
                                    <td v-for="(c,kc) in columns" :key="kc" class="p-1 border-x border-gray-400 rounded-lg">{{ r[c] }}</td>
                                </tr>
                            </table>
                        </div>
                        <Link v-if="can('admin.generic')" :href="route('querydb.show')"
                            class="w-64 text-center uppercase px-6 py-2 bg-blue-600 text-white rounded">{{ $msg.newQuery }}</Link>
                        <h2 v-if="!can('admin.generic')" class="mb-4 text-2xl font-semibold text-red-500 dark:text-red-400">{{ $msg.unauthorized }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </CompleteLayout>
</template>