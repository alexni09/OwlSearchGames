import{t as h,K as x,r as k,o as b,b as c,c as u,a as o,d as s,k as g,e as $,F as w,T as v,u as a,w as p,Z as y,j as n,i as P,f as V,q as C,A as S,B,l as E}from"./app-e9d4431e.js";import{_ as I}from"./ApplicationLogoMedium-e82d6a09.js";import{_ as U}from"./MustUpdateLocale-ffea2e7f.js";import{a as N,_ as A}from"./SaveLocaleBeforeUnload-edc0e70d.js";import{_ as f}from"./InputError-fe9cbf8d.js";import{P as F}from"./ProcessingButton-4683725c.js";import{_}from"./PasswordEye-84762d27.js";import{A as D}from"./ArrowRectangleRight-398f3813.js";const j={class:"w-full sm:max-w-md mt-6 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg"},R={key:0,class:"w-full sm:max-w-md mt-12 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg"},L={__name:"DoubleLayout",setup(l){const e=h(x().props.background),t=k(null);return b(()=>{t.value.style.backgroundImage="url('"+e.img+"')",t.value.style.backgroundPosition=e.position}),(m,r)=>(c(),u(w,null,[o(U),o(N),s("div",{class:"min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-orange-200 dark:bg-green-600 border-b border-amber-100 dark:border-emerald-600 w-full h-[480px] md:h-[640px] lg:h-[768px] 2xl:h-[900px] bg-cover",ref_key:"backgroundDiv",ref:t},[s("div",null,[o(I)]),s("div",j,[g(m.$slots,"one")]),m.$slots.two?(c(),u("div",R,[g(m.$slots,"two")])):$("",!0)],512)],64))}};const M=l=>(S("data-v-327b77f4"),l=l(),B(),l),T=M(()=>s("audio",{id:"processingButtonAudio",src:"/audio/processingbutton1.mp3",preload:"auto"},null,-1)),q=["onSubmit"],K={class:"mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold"},Z={class:"mt-4"},z={for:"update-password",class:"labelStyle"},G={class:"mt-4"},H={for:"update-password-confirmation",class:"labelStyle"},J={class:"mt-6 mb-1 flex flex-row"},O={class:"mt-1 mb-4 text-orange-700 dark:text-amber-100"},Q={class:"mb-1"},W={class:"ml-1"},X={__name:"UpdateExpiredPassword",setup(l){const e=v({new_password:"",new_password_confirmation:""}),t=E(),m=()=>{document.getElementById("processingButtonAudio").play(),e.patch(route("passwordexpired.update"),{onSuccess:()=>{e.reset("new_password"),e.reset("new_password_confirmation"),t.appContext.config.globalProperties.$setFlash(t.appContext.config.globalProperties.$msg.success,t.appContext.config.globalProperties.$msg.successUpdatePassword)}})};return b(()=>{document.getElementById("update-password").focus()}),(r,d)=>(c(),u(w,null,[o(a(y),{title:r.$msg.passwordExpired},null,8,["title"]),T,o(L,null,{one:p(()=>[s("form",{onSubmit:V(m,["prevent"]),class:"py-1"},[s("h3",K,n(r.$msg.updateExpiredPassword),1),s("div",Z,[s("label",z,n(r.$msg.passwordNew),1),o(_,{modelValue:a(e).new_password,"onUpdate:modelValue":d[0]||(d[0]=i=>a(e).new_password=i),id:"update-password",placeholder:r.$msg.passwordNewPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                        bg-amber-100 dark:bg-lime-100\r
                        focus:bg-amber-200 focus:dark:bg-lime-200\r
                        border-amber-200 dark:border-emerald-700\r
                        focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),o(f,{message:a(e).errors.new_password,class:"mt-2"},null,8,["message"])]),s("div",G,[s("label",H,n(r.$msg.passwordConfirmation),1),o(_,{modelValue:a(e).new_password_confirmation,"onUpdate:modelValue":d[1]||(d[1]=i=>a(e).new_password_confirmation=i),id:"update-password-confirmation",placeholder:r.$msg.passwordConfirmationPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                        bg-amber-100 dark:bg-lime-100\r
                        focus:bg-amber-200 focus:dark:bg-lime-200\r
                        border-amber-200 dark:border-emerald-700\r
                        focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),o(f,{message:a(e).errors.new_password_confirmation,class:"mt-2"},null,8,["message"])]),s("div",J,[o(F,{modelValue:a(e).processing,"onUpdate:modelValue":d[2]||(d[2]=i=>a(e).processing=i),class:"w-36"},{default:p(()=>[P(n(r.$msg.save),1)]),_:1},8,["modelValue"])])],40,q)]),two:p(()=>[s("p",O,n(r.$msg.passwordExpiredLogout),1),s("div",Q,[o(a(C),{href:r.route("logout"),as:"button",type:"button",class:"w-36 px-4 py-2 bg-red-400 text-amber-50 font-semibold text-base flex justify-center place-items-center hover:underline uppercase rounded-sm"},{default:p(()=>[o(D,{class:"mx-1"}),s("span",W,n(r.$msg.logout),1)]),_:1},8,["href"])])]),_:1})],64))}},ne=A(X,[["__scopeId","data-v-327b77f4"]]);export{ne as default};
