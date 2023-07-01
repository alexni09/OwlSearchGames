<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue'
const props = defineProps({
    align: {
        default: 'right',
    },
    width: {
        default: '48',
    }
})
const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
}
onMounted(() => document.addEventListener('keydown', closeOnEscape))
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))
const widthClass = computed(() => {
    return {
        48: 'w-48',
    }[props.width.toString()];
})
const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'origin-top-left left-0';
    } else if (props.align === 'right') {
        return 'origin-top-right right-0';
    } else {
        return 'origin-top';
    }
})
const isDarkMode = computed(() => window.matchMedia && (window.matchMedia(`(prefers-color-scheme: dark)`) === true 
                                                     || window.matchMedia(`(prefers-color-scheme: dark)`).matches === true))
const open = ref(false)
</script>
<template>
    <div class="relative">
        <div class="flex" @click="open = !open">
            <span class="mr-1">
                <slot name="trigger" />
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 mt-6 fill-current" 
                :class="{ '-rotate-90':open, 'rotate-90':!open, 'text-amber-50':isDarkMode, 'text-emerald-700':!isDarkMode}">
                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
            </svg>
        </div>
        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>
        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 mt-2 rounded-md shadow-lg"
                :class="[widthClass, alignmentClasses]"
                style="display: none"
                @click="open = false"
            >
                <div class="py-1 rounded-md ring-1 ring-black ring-opacity-5" :class="{'bg-amber-50':!isDarkMode, 'bg-emerald-700':isDarkMode}">
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>