import{b as m,c as p,d as l,r as n,n as B,g as F,v as E,h as N,a as g,T as z,o as A,C as T,w as M,F as C,j as u,e as b,u as c,D as $,A as D,B as U}from"./app-e9d4431e.js";import{_ as Y}from"./NarrowLayout-c119b5d7.js";import{_ as V}from"./SaveLocaleBeforeUnload-edc0e70d.js";import{_ as I}from"./InputError-fe9cbf8d.js";import"./ApplicationLogoMedium-e82d6a09.js";import"./MustUpdateLocale-ffea2e7f.js";const j={},K={xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"2.5",class:"w-5 h-5 stroke-orange-800 dark:stroke-emerald-200 opacity-70"},L=l("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"},null,-1),O=[L];function R(i,r){return m(),p("svg",K,O)}const q=V(j,[["render",R]]),G={class:"h-12 bg-orange-100 dark:bg-green-800 text-orange-700 dark:text-green-200 relative"},H=["placeholder"],S={__name:"SearchBox",props:{modelValue:{type:String,default:""},placeholder:{type:String,default:""}},emits:["update:modelValue","thisSearch"],setup(i,{emit:r}){const s=i,_=5,v=4e3,d=s.modelValue,t=n(d),e=(a=!1)=>{a&&clearTimeout(o),a&&d!==""&&t.value.length<_?r("thisSearch",""):t.value.length<_||(!a||y!==t.value)&&r("thisSearch",t.value)};let y=Symbol(),w=0;const f=()=>w=Date.now();let o=null;B(t,()=>{r("update:modelValue",t.value),f(),o=setTimeout(()=>{Date.now()>=v+w&&(f(),e(),y=t.value)},v)});const h=n(null);return(a,x)=>(m(),p("div",G,[F(l("input",{type:"text",maxlength:"25",class:"relative mt-1 w-72 h-8 rounded-full py-5 cursor-text text-orange-700 dark:text-green-200 bg-amber-200 dark:bg-emerald-700 border-2 border-amber-800 dark:border-emerald-200 placeholder:text-amber-200 placeholder:dark:text-emerald-700 hover:placeholder:text-amber-700 hover:placeholder:dark:text-emerald-200 focus:placeholder:text-amber-700 focus:placeholder:dark:text-emerald-200 focus:border-amber-800 focus:dark:border-emerald-200 focus:ring focus:ring-amber-800 focus:dark:ring-emerald-100 focus:ring-opacity-50 outline-none","onUpdate:modelValue":x[0]||(x[0]=P=>t.value=P),onKeydown:x[1]||(x[1]=N(P=>e(!0),["enter"])),ref_key:"idInputField",ref:h,placeholder:i.placeholder},null,40,H),[[E,t.value]]),g(q,{class:"absolute z-20 right-[10px] top-[15px] cursor-default",onClick:e})]))}};const k=i=>(D("data-v-7940f927"),i=i(),U(),i),J=k(()=>l("audio",{id:"cycleButtonAudio",src:"/audio/gameswitch4.mp3",preload:"auto"},null,-1)),Q=k(()=>l("audio",{id:"submitAudio",src:"/audio/positive_beep2.mp3",preload:"auto"},null,-1)),W={class:"absolute z-10 top-4 w-full"},X={class:"flex justify-between place-items-baseline"},Z={class:"font-semibold"},ee={class:"text-sm font-medium"},oe={class:"text-base"},te={key:0,class:"pb-4 text-base"},se={key:1,class:"pb-4 text-base"},le={key:0,class:"absolute z-10 top-28"},ae={key:1,class:"absolute z-10 top-28"},re={class:"absolute z-10 bottom-4 w-full"},de=["disabled"],ne={key:2,class:"absolute z-30 top-28 left-40"},ie=k(()=>l("span",{class:"circleAnimation"},null,-1)),ue=[ie],ce={__name:"ForgotPassword",props:{method:{type:Number,default:1},user_id:{type:String,default:""},email:{type:String,default:""}},setup(i){const r=i,s=n(r.method),_=2,v=()=>{s.value===_?s.value=1:s.value++,document.getElementById("cycleButtonAudio").play()};let d=null,t=null;s.value===1?(d=r.user_id==null?n(""):n(r.user_id),t=n("")):s.value===2&&(d=n(""),t=r.email==null?n(""):n(r.email));const e=z({method:s.value,user_id:d.value,email:t.value}),y=o=>{o.length>=5&&(e.method=1,e.user_id=o,e.email="",document.getElementById("submitAudio").play(),e.post(route("forgotpassword.update")))},w=o=>{o.length>=5&&(e.method=2,e.user_id="",e.email=o,document.getElementById("submitAudio").play(),e.post(route("forgotpassword.update")))};A(()=>{s.value===1?document.getElementById("userIdField").focus():s.value===2&&document.getElementById("emailField").focus()});const f=n(null);return T(()=>{f.value!==null&&(e.processing?f.value.parentNode.style.opacity=.6:f.value.parentNode.style.opacity=1)}),(o,h)=>(m(),p(C,null,[J,Q,g(Y,null,{default:M(()=>[l("div",{ref_key:"refNarrowLayout",ref:f,class:"relative z-0 w-full h-72 text-orange-700 dark:text-green-100 rounded-none border-none"},[l("div",W,[l("div",X,[l("span",Z,u(o.$msg.forgotYourPassword),1),l("span",ee,"("+u(o.$msg.forgotPasswordOption)+" "+u(s.value)+" "+u(o.$msg.forgotPasswordOf)+" "+u(_)+")",1)]),l("p",oe,u(o.$msg.forgotYourPasswordNoProblem),1),s.value===1?(m(),p("p",te,u(o.$msg.forgotYourPasswordUserId),1)):b("",!0),s.value===2?(m(),p("p",se,u(o.$msg.forgotYourPasswordEmail),1)):b("",!0)]),s.value===1?(m(),p("div",le,[g(S,{id:"userIdField",disabled:c(e).processing,placeholder:o.$msg.forgotPasswordPlaceholderUserId,modelValue:c(d),"onUpdate:modelValue":h[0]||(h[0]=a=>$(d)?d.value=a:d=a),onThisSearch:y},null,8,["disabled","placeholder","modelValue"]),g(I,{message:c(e).errors.user_id,class:"mt-2"},null,8,["message"])])):b("",!0),s.value===2?(m(),p("div",ae,[g(S,{id:"emailField",disabled:c(e).processing,placeholder:o.$msg.forgotPasswordPlaceholderEmail,modelValue:c(t),"onUpdate:modelValue":h[1]||(h[1]=a=>$(t)?t.value=a:t=a),onThisSearch:w},null,8,["disabled","placeholder","modelValue"]),g(I,{message:c(e).errors.email,class:"mt-2"},null,8,["message"])])):b("",!0),l("div",re,[l("button",{class:"mt-4 px-6 py-2 text-white bg-sky-500 uppercase font-semibold text-base rounded-lg",disabled:c(e).processing,onClick:v},u(o.$msg.forgotYourPasswordTrySomethingElse),9,de)]),c(e).processing?(m(),p("div",ne,ue)):b("",!0)],512)]),_:1})],64))}},be=V(ce,[["__scopeId","data-v-7940f927"]]);export{be as default};
