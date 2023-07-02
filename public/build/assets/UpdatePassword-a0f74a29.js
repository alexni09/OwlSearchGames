import{T as g,o as w,c as f,a,u as s,w as u,F as _,b,Z as h,d as o,j as l,i as k,f as P,A as V,B as $,l as y}from"./app-e9d4431e.js";import{_ as C}from"./NarrowLayout-c119b5d7.js";import{_ as p}from"./InputError-fe9cbf8d.js";import{P as v}from"./ProcessingButton-4683725c.js";import{_ as i}from"./PasswordEye-84762d27.js";import{_ as S}from"./SaveLocaleBeforeUnload-edc0e70d.js";import"./ApplicationLogoMedium-e82d6a09.js";import"./MustUpdateLocale-ffea2e7f.js";const B=n=>(V("data-v-745b5614"),n=n(),$(),n),U=B(()=>o("audio",{id:"processingButtonAudio",src:"/audio/processingbutton1.mp3",preload:"auto"},null,-1)),x=["onSubmit"],I={class:"mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold"},F={for:"update-password-current",class:"labelStyle"},N={class:"mt-4"},A={for:"update-password",class:"labelStyle"},E={class:"mt-4"},M={for:"update-password-confirmation",class:"labelStyle"},T={class:"mt-6 mb-1 flex flex-row-reverse"},j={__name:"UpdatePassword",setup(n){const e=g({current_password:"",new_password:"",new_password_confirmation:""}),m=y(),c=()=>{document.getElementById("processingButtonAudio").play(),e.patch(route("updatePassword.update"),{onSuccess:()=>{e.reset("current_password"),e.reset("new_password"),e.reset("new_password_confirmation"),m.appContext.config.globalProperties.$setFlash(m.appContext.config.globalProperties.$msg.success,m.appContext.config.globalProperties.$msg.successUpdatePassword)}})};return w(()=>{document.getElementById("update-password-current").focus()}),(r,d)=>(b(),f(_,null,[a(s(h),{title:r.$msg.updatePassword},null,8,["title"]),U,a(C,null,{default:u(()=>[o("form",{onSubmit:P(c,["prevent"]),class:"py-1"},[o("h3",I,l(r.$msg.updatePassword),1),o("div",null,[o("label",F,l(r.$msg.passwordCurrent),1),a(i,{modelValue:s(e).current_password,"onUpdate:modelValue":d[0]||(d[0]=t=>s(e).current_password=t),id:"update-password-current",placeholder:r.$msg.passwordCurrentPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                    bg-yellow-50 dark:bg-lime-50\r
                    focus:bg-amber-100 focus:dark:bg-lime-100\r
                    border-amber-100 dark:border-emerald-700\r
                    focus:ring focus:ring-amber-200 focus:dark:ring-emerald-800 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),a(p,{message:s(e).errors.current_password,class:"mt-2"},null,8,["message"])]),o("div",N,[o("label",A,l(r.$msg.passwordNew),1),a(i,{modelValue:s(e).new_password,"onUpdate:modelValue":d[1]||(d[1]=t=>s(e).new_password=t),id:"update-password",placeholder:r.$msg.passwordNewPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                    bg-amber-100 dark:bg-lime-100\r
                    focus:bg-amber-200 focus:dark:bg-lime-200\r
                    border-amber-200 dark:border-emerald-700\r
                    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),a(p,{message:s(e).errors.new_password,class:"mt-2"},null,8,["message"])]),o("div",E,[o("label",M,l(r.$msg.passwordConfirmation),1),a(i,{modelValue:s(e).new_password_confirmation,"onUpdate:modelValue":d[2]||(d[2]=t=>s(e).new_password_confirmation=t),id:"update-password-confirmation",placeholder:r.$msg.passwordConfirmationPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                    bg-amber-100 dark:bg-lime-100\r
                    focus:bg-amber-200 focus:dark:bg-lime-200\r
                    border-amber-200 dark:border-emerald-700\r
                    focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),a(p,{message:s(e).errors.new_password_confirmation,class:"mt-2"},null,8,["message"])]),o("div",T,[a(v,{modelValue:s(e).processing,"onUpdate:modelValue":d[3]||(d[3]=t=>s(e).processing=t),class:"w-36"},{default:u(()=>[k(l(r.$msg.save),1)]),_:1},8,["modelValue"])])],40,x)]),_:1})],64))}},L=S(j,[["__scopeId","data-v-745b5614"]]);export{L as default};
