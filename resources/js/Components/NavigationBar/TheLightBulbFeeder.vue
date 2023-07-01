<script setup>
import 'animate.css'
import Swal from 'sweetalert2'
import { ref, computed, getCurrentInstance, toRaw } from 'vue'
import { usePage } from '@inertiajs/vue3'
import LightBulbVioletGray from '@/Components/SVG/LightBulb/LightBulbVioletGray.vue'
import LightBulbYellowGreen from '@/Components/SVG/LightBulb/LightBulbYellowGreen.vue'
import { useSetFeederOperationAxios } from '@/Composables/useSetFeederOperationAxios'
let { setFeederOperationAxios } = useSetFeederOperationAxios()
const isDarkMode = computed(() => window.matchMedia && (window.matchMedia(`(prefers-color-scheme: dark)`) === true 
                                                     || window.matchMedia(`(prefers-color-scheme: dark)`).matches === true))
const prefersReducedMotion = computed(() => window.matchMedia && ( window.matchMedia(`(prefers-reduced-motion: reduce)`) === true 
                                                                || window.matchMedia(`(prefers-reduced-motion: reduce)`).matches === true))
const app = getCurrentInstance()
const feederOperation = computed(() => usePage().props.feederOperation)
const minimumOperation = toRaw(usePage().props.minimumOperation)
const maximumOperation = toRaw(usePage().props.maximumOperation)
const isVaildOperation = computed(() => {
    if (feederOperation.value == null) return false
    if (feederOperation.value < minimumOperation) return false
    if (feederOperation.value > maximumOperation) return false
    return true
})
const hasBeenShown = ref(false)
const exec = () => {
    if (!isVaildOperation.value) return
    let popupIconColor = isDarkMode.value ? 'rgb(217 249 157)' : 'rgb(21 128 61)'  /* lime-200, green-700 */
    let popupTextColor = isDarkMode.value ? 'rgb(254 243 199)' : 'rgb(21 128 61)'  /* amber-100, green-700 */
    let popupBackground = isDarkMode.value ? 'rgb(21 128 61)' : 'rgb(254 243 199)'  /* green-700, amber-100 */
    let popupButtonColor = isDarkMode.value ? 'rgb(22 101 52)' : 'rgb(21 128 61)'  /*  green-600, green-700  */
    let popupHtml = null
    let popupIcon = null
    switch (feederOperation.value) {
        case 1:
            popupIcon = 'info'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupLoginRegister1
                        + '<a href="/login"><u>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupLoginRegister2
                        + '</u></a>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupLoginRegister3
                        + '<br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupLoginRegister4
                        + '<a href="/register"><u>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupLoginRegister5
                        + '</u>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupLoginRegister6
                        + '</a>'
            break
        case 2:
            popupIcon = 'success'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupGainAdvanced1
                        + '<br><big>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainAdvanced2
                        + '</big><br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainAdvanced3
                        + '<br><ul><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainAdvanced4
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainAdvanced5
                        + '</li></ul><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainAdvanced6
                        + '<br>'
            break
        case 3:
            popupIcon = 'success'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo1
                        + '<br><big>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo2
                        + '</big><br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo3
                        + '<br><ul><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo4
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo5
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo6
                        + '</li></ul><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremiumPromo7
                        + '<br>'
            break
        case 4:
            popupIcon = 'success'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremium1
                        + '<br><big>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremium2
                        + '</big><br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremium3
                        + '<br><ul><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremium4
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremium5
                        + '</li></ul><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGainPremium6
                        + '<br>'
            break
        case 5:
            popupIcon = 'success'
            popupHtml = '<big>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupBecameDonor1
                        + '</big><br>'
            break
        case 6:
            popupIcon = 'info'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupGoToAdvanced1
                        + '<br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToAdvanced2
                        + '<br><ul><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToAdvanced3
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToAdvanced4
                        + '</li></ul><br>'
            break
        case 7:
            popupIcon = 'info'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremiumPromo1
                        + '<br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremiumPromo2
                        + '<br><ul><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremiumPromo3
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremiumPromo4
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremiumPromo5
                        + '</li></ul><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremiumPromo6
                        + '<br>'
            break
        case 8:
            popupIcon = 'info'
            popupHtml = app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremium1
                        + '<br><br>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremium2
                        + '<br><ul><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremium3
                        + '</li><li>'
                        + app.appContext.config.globalProperties.$msg.lightBulbPopupGoToPremium4
                        + '</li></ul><br>'
            break
    }
    if (!hasBeenShown.value) {
        setFeederOperationAxios(feederOperation.value)
        setTimeout(() => { 
            hasBeenShown.value = true
        }, 2000)
    }
    if (!!prefersReducedMotion.value) {
        Swal.fire({
            icon: popupIcon,
            iconColor: popupIconColor,
            html: popupHtml,
            background: popupBackground, 
            color: popupTextColor,
            confirmButtonColor: popupButtonColor
        })
    } else {
        Swal.fire({
            icon: popupIcon,
            iconColor: popupIconColor,
            html: popupHtml,
            background: popupBackground, 
            color: popupTextColor,
            confirmButtonColor: popupButtonColor,
            showClass: { popup: 'animate__animated animate__fadeInDown' },
            hideClass: { popup: 'animate__animated animate__fadeOutUp' }
        })
    }
}
</script>
<template>
    <LightBulbYellowGreen v-if="isVaildOperation && !hasBeenShown" @click="exec" />
    <LightBulbVioletGray v-else @click="exec" />
</template>