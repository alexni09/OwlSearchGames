import{t as g,K as _,r as b,o as x,b as i,c as m,a as t,d as e,k as h,F as v,T as w,m as k,z as y,w as d,u as a,Z as $,j as r,e as V,f as B,q as S}from"./app-e9d4431e.js";import{_ as j}from"./ApplicationLogoMedium-e82d6a09.js";import{a as E,_ as A}from"./SaveLocaleBeforeUnload-edc0e70d.js";import{P as M}from"./ProcessingButton-4683725c.js";import{A as C}from"./ArrowRectangleRight-398f3813.js";import{E as N}from"./EmailNotes-3114075b.js";const R={class:"w-full sm:max-w-md md:max-w-lg lg:max-w-2xl mt-6 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg"},D={__name:"SimpleLayout",setup(l){const n=g(_().props.background),s=b(null);return x(()=>{s.value.style.backgroundImage="url('"+n.img+"')",s.value.style.backgroundPosition=n.position}),(c,u)=>(i(),m(v,null,[t(E),e("div",{class:"min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-orange-200 dark:bg-green-600 border-b border-amber-100 dark:border-emerald-600 w-full h-[480px] md:h-[640px] lg:h-[768px] 2xl:h-[900px] bg-cover",ref_key:"backgroundDiv",ref:s},[e("div",null,[t(j)]),e("div",R,[h(c.$slots,"default")])],512)],64))}},L={},P={xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6"},F=e("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"},null,-1),I=[F];function q(l,n){return i(),m("svg",P,I)}const z=A(L,[["render",q]]),K=e("audio",{id:"processingButtonAudio",src:"/audio/processingbutton1.mp3",preload:"auto"},null,-1),T={class:"text-orange-800 dark:text-amber-100 xl:max-w-2xl 2xl:max-w-2xl"},U={class:"mb-4 text-base"},Z={key:0,class:"mb-4 font-medium text-base"},G=["onSubmit"],H={class:"mt-4 flex items-center justify-between"},J={class:"flex justify-center place-items-center uppercase rounded"},O={class:"ml-1"},Q={class:"ml-1"},oe={__name:"VerifyEmail",props:{status:{type:String}},setup(l){const n=l,s=w({}),c=()=>{document.getElementById("processingButtonAudio").play(),s.post(route("verification.send"))},u=k(()=>n.status==="verification-link-sent");return(o,p)=>(i(),y(D,null,{default:d(()=>[t(a($),{title:o.$msg.emailVerification},null,8,["title"]),K,e("div",T,[e("div",U,r(o.$msg.emailVerificationBigMessage),1),a(u)?(i(),m("div",Z,r(o.$msg.emailVerificationSmallMessage),1)):V("",!0),t(N),e("form",{onSubmit:B(c,["prevent"])},[e("div",H,[t(M,{modelValue:a(s).processing,"onUpdate:modelValue":p[0]||(p[0]=f=>a(s).processing=f),disabled:a(s).processing,class:"w-96"},{default:d(()=>[e("div",J,[t(z,{class:"mx-1"}),e("span",O,r(o.$msg.emailVerificationResend),1)])]),_:1},8,["modelValue","disabled"]),t(a(S),{href:o.route("logout"),as:"button",type:"button",class:"my-1 mx-2 w-[208px] px-3 py-2 bg-red-400 text-amber-50 font-semibold text-base flex justify-center place-items-center uppercase rounded"},{default:d(()=>[t(C,{class:"mx-1"}),e("span",Q,r(o.$msg.logout),1)]),_:1},8,["href"])])],40,G)])]),_:1}))}};export{oe as default};