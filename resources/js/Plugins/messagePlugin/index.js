import { reactive } from 'vue'
import { useLanguage } from '@/Composables/Lang/useLanguage'
export function messagePlugin(app, options) {
  /* Def's & Init's */
  const defaultFlashTimer = options != null && options.defaultFlashTimer != null ? options.defaultFlashTimer : 4000
  /* Main Object for The Menu */
  app.config.globalProperties.$localeInfo = reactive({
    'en': {
      name: 'English'
    },
    'pt': {
      name: 'Português'
    }
  })
  /* Initial Locale */
  const localeKeys = Object.keys(app.config.globalProperties.$localeInfo)
  let initialLocale = sessionStorage.getItem("localeBeforeUnload")
  if (initialLocale == null)
    initialLocale = options != null && options.initialLocale != null && localeKeys.includes(options.initialLocale) ? options.initialLocale : 'en'
  sessionStorage.removeItem("localeBeforeUnload")
  app.config.globalProperties.$locale = reactive({
    locale: initialLocale,
    canShow: true           /*  is it OK to show the language component ?  */
  })
  /* Language Messages */
  let { language } = useLanguage()
  app.config.globalProperties.$msg = reactive(language()[initialLocale])
  app.config.globalProperties.$setLocale = (lang) => {
    app.config.globalProperties.$locale.locale = lang
    const keys = Object.keys(app.config.globalProperties.$msg)
    for (let k of keys) app.config.globalProperties.$msg[k] = language()[lang][k]
  }
  /* Misc's */
  app.config.globalProperties.$misc = reactive({
    /*   Boolean properties, for showing or not a link on the navbar should go here:   */
    //
    /*   Flash message to be displayed next, if any.   */
    flashMessage: null
  })
  /* Is it OK to clear the flash message object ? */
  app.config.globalProperties.$canRemoveFlashMessage = true
  /* Method to set the flash message object */
  app.config.globalProperties.$setFlash = (title, text, icon = 'success', timer = defaultFlashTimer) => {
    app.config.globalProperties.$misc.flashMessage = {
      title: title,
      text: text,
      icon: icon,
      timer: timer
    }
    app.config.globalProperties.$canRemoveFlashMessage = false      /*  Skips on unmounting this component once.  */
  }
}