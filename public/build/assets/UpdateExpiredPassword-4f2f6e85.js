import{t as h,K as x,r as k,o as b,b as c,c as u,a as o,d as e,s as g,e as $,F as w,T as v,u as a,w as p,Z as y,j as n,i as P,f as V,m as C,p as S,q as E,x as B}from"./app-f8e7fef2.js";import{_ as I}from"./ApplicationLogoMedium-18b04f06.js";import{_ as U}from"./MustUpdateLocale-bc586917.js";import{a as N,_ as F}from"./SaveLocaleBeforeUnload-022b3a6b.js";import{_ as j}from"./LocaleCycler-624c3cab.js";import{_ as f}from"./InputError-8cfeaf92.js";import{P as A}from"./ProcessingButton-9752ead8.js";import{_}from"./PasswordEye-154205a3.js";import{A as D}from"./ArrowRectangleRight-d45ee8b8.js";import"./GlobeIcon-a7c8703c.js";const R={class:"w-full sm:max-w-md mt-6 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg"},L={key:0,class:"w-full sm:max-w-md mt-12 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg"},M={__name:"DoubleLayout",setup(l){const s=h(x().props.background),t=k(null);return b(()=>{t.value.style.backgroundImage="url('"+s.img+"')",t.value.style.backgroundPosition=s.position}),(m,r)=>(c(),u(w,null,[o(U),o(N),e("div",{class:"min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-orange-200 dark:bg-green-600 border-b border-amber-100 dark:border-emerald-600 w-full h-[480px] md:h-[640px] lg:h-[768px] 2xl:h-[900px] bg-cover",ref_key:"backgroundDiv",ref:t},[e("div",null,[o(I)]),e("div",R,[g(m.$slots,"one")]),m.$slots.two?(c(),u("div",L,[g(m.$slots,"two")])):$("",!0)],512)],64))}};const T=l=>(S("data-v-9115e670"),l=l(),E(),l),q=T(()=>e("audio",{id:"processingButtonAudio",src:"/audio/processingbutton1.mp3",preload:"auto"},null,-1)),K=["onSubmit"],Z={class:"flex justify-between items-start"},z={class:"mt-1 mb-2 pr-1 text-lg text-orange-800 dark:text-amber-100 font-semibold"},G={class:"mt-4"},H={for:"update-password",class:"labelStyle"},J={class:"mt-4"},O={for:"update-password-confirmation",class:"labelStyle"},Q={class:"mt-6 mb-1 flex flex-row"},W={class:"mt-1 mb-4 text-orange-700 dark:text-amber-100"},X={class:"mb-1"},Y={class:"ml-1"},ee={__name:"UpdateExpiredPassword",setup(l){const s=v({new_password:"",new_password_confirmation:""}),t=B(),m=()=>{document.getElementById("processingButtonAudio").play(),s.patch(route("passwordexpired.update"),{onSuccess:()=>{s.reset("new_password"),s.reset("new_password_confirmation"),t.appContext.config.globalProperties.$setFlash(t.appContext.config.globalProperties.$msg.success,t.appContext.config.globalProperties.$msg.successUpdatePassword)}})};return b(()=>{document.getElementById("update-password").focus()}),(r,d)=>(c(),u(w,null,[o(a(y),{title:r.$msg.passwordExpired},null,8,["title"]),q,o(M,null,{one:p(()=>[e("form",{onSubmit:V(m,["prevent"]),class:"py-1"},[e("div",Z,[e("h3",z,n(r.$msg.updateExpiredPassword),1),o(j,{class:"mt-1"})]),e("div",G,[e("label",H,n(r.$msg.passwordNew),1),o(_,{modelValue:a(s).new_password,"onUpdate:modelValue":d[0]||(d[0]=i=>a(s).new_password=i),id:"update-password",placeholder:r.$msg.passwordNewPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                        bg-amber-100 dark:bg-lime-100\r
                        focus:bg-amber-200 focus:dark:bg-lime-200\r
                        border-amber-200 dark:border-emerald-700\r
                        focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),o(f,{message:a(s).errors.new_password,class:"mt-2"},null,8,["message"])]),e("div",J,[e("label",O,n(r.$msg.passwordConfirmation),1),o(_,{modelValue:a(s).new_password_confirmation,"onUpdate:modelValue":d[1]||(d[1]=i=>a(s).new_password_confirmation=i),id:"update-password-confirmation",placeholder:r.$msg.passwordConfirmationPlaceholder,textFieldClass:`block mt-1 w-full rounded-md shadow-sm\r
                        bg-amber-100 dark:bg-lime-100\r
                        focus:bg-amber-200 focus:dark:bg-lime-200\r
                        border-amber-200 dark:border-emerald-700\r
                        focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50`},null,8,["modelValue","placeholder"]),o(f,{message:a(s).errors.new_password_confirmation,class:"mt-2"},null,8,["message"])]),e("div",Q,[o(A,{modelValue:a(s).processing,"onUpdate:modelValue":d[2]||(d[2]=i=>a(s).processing=i),class:"w-36"},{default:p(()=>[P(n(r.$msg.save),1)]),_:1},8,["modelValue"])])],40,K)]),two:p(()=>[e("p",W,n(r.$msg.passwordExpiredLogout),1),e("div",X,[o(a(C),{href:r.route("logout"),as:"button",type:"button",class:"w-36 px-4 py-2 bg-red-400 text-amber-50 font-semibold text-base flex justify-center place-items-center hover:underline uppercase rounded-sm"},{default:p(()=>[o(D,{class:"mx-1"}),e("span",Y,n(r.$msg.logout),1)]),_:1},8,["href"])])]),_:1})],64))}},pe=F(ee,[["__scopeId","data-v-9115e670"]]);export{pe as default};
