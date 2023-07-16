import{t as L,K as q,r as g,o as R,b as f,c as y,a as n,d as l,s as H,F as P,y as K,T as Z,z as b,u as r,w as A,Z as G,j as i,g as N,v as I,B as E,k as D,n as Q,l as W,e as X,i as Y,f as ee,p as se,q as oe,x as le}from"./app-f498b017.js";import{a as ae,_ as re}from"./LocaleCycler-9208f080.js";import{_ as te}from"./MustUpdateLocale-529a74cf.js";import{_ as ne,u as ie}from"./SaveLocaleBeforeUnload-0420f5f1.js";import{_}from"./InputError-68c9ef71.js";import{P as de}from"./ProcessingButton-280fb2ec.js";import{_ as C}from"./SwitchTwoState-75b93829.js";import{_ as M}from"./PasswordEye-357f4b1e.js";import{u as me}from"./useLocalStorage-896d7344.js";import{u as ue}from"./useSessionStorage-6e2da231.js";import{_ as pe}from"./_plugin-vue_export-helper-c27b6911.js";const ce={class:"w-full sm:max-w-md mt-6 px-6 py-4 bg-orange-100/80 dark:bg-green-800/80 shadow-md overflow-hidden sm:rounded-lg"},_e={__name:"HighLayout",setup(c){const S=L(q().props.background),$=g(null);return R(()=>{$.value.style.backgroundImage="url('"+S.img+"')",$.value.style.backgroundPosition=S.position}),(w,x)=>(f(),y(P,null,[n(te),n(ne),l("div",{class:"min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-orange-200 dark:bg-green-600 border-b border-amber-100 dark:border-emerald-600 w-full h-[1280px] bg-cover",ref_key:"backgroundDiv",ref:$},[l("div",null,[n(ae)]),l("div",ce,[H(w.$slots,"default")])],512)],64))}};const ge=c=>(se("data-v-1e301039"),c=c(),oe(),c),fe=ge(()=>l("audio",{id:"processingButtonAudio",src:"/audio/processingbutton1.mp3",preload:"auto"},null,-1)),we=["onSubmit"],he={class:"flex justify-between items-start"},ve={class:"mt-1 mb-2 text-lg text-orange-800 dark:text-amber-100 font-semibold"},be={for:"register-userId",class:"labelStyle"},ye=["placeholder"],Se={class:"mt-4"},$e={for:"register-password",class:"labelStyle"},Ve={class:"mt-4"},Ne={for:"register-password-confirmation",class:"labelStyle"},ke={class:"mt-4"},Ue={for:"register-userName",class:"labelStyle"},Ce=["placeholder"],Pe={class:"mt-4"},Ie={for:"register-email",class:"labelStyle"},Le=["placeholder"],xe={class:"mt-4"},Be={for:"register-locale",class:"labelStyle"},Fe={value:"0"},Je=["value"],Oe={class:"mt-4"},Ae={for:"register-pronoun",class:"labelStyle"},Ee={value:"0"},De=["value"],Me={class:"switchStyle"},Re={class:"labelSpanStyle"},je={class:"switchStyle"},Te={class:"switchStyle"},ze={class:"labelSpanStyle"},qe={class:"switchStyle"},He={class:"labelSpanStyle"},Ke={class:"mt-4 mb-1 flex flex-row-reverse"},Ze={__name:"RegisterNewUser",props:{locales:{type:Array},pronouns:{type:Array}},setup(c){const S=c;let{changeLocaleAxios:$}=ie();const w=le(),x=t=>{w.appContext.config.globalProperties.$setLocale(t),$(t)};let{getLocal:d,removeLocal:m,setLocal:u}=me(),{getSession:B,removeSession:F,setSession:J}=ue();const a="register-create",j=L(S.locales),T=K(()=>L(S.pronouns).filter(s=>s.locale_id===Number(h.value))),e=Z({user_id:d(a,"user_id",""),password:B(a,"password",""),password_confirmation:B(a,"password_confirmation",""),name:d(a,"name",""),email:d(a,"email",""),locale_id:Number(d(a,"locale_id","0")),pronoun_id:Number(d(a,"pronoun_id","0")),show_name:JSON.parse(d(a,"show_name","true")),show_pronoun:JSON.parse(d(a,"show_pronoun","true")),show_email:JSON.parse(d(a,"show_email","true")),show_user_id:JSON.parse(d(a,"show_user_id","true"))}),p=g(e.show_name),V=g(e.show_pronoun),k=g(e.show_email),U=g(e.show_user_id),h=g(e.locale_id),v=g(e.pronoun_id),z=()=>{document.getElementById("processingButtonAudio").play(),e.post(route("register.store"),{onSuccess:()=>{m(a,"user_id"),F(a,"password"),F(a,"password_confirmation"),m(a,"name"),m(a,"email"),m(a,"locale_id"),m(a,"pronoun_id"),m(a,"show_name"),m(a,"show_pronoun"),m(a,"show_email"),m(a,"show_user_id"),w.appContext.config.globalProperties.$setFlash(w.appContext.config.globalProperties.$msg.success,w.appContext.config.globalProperties.$msg.successStoreProfile)}})};R(()=>{document.getElementById("register-userId").focus()}),b(h,()=>{u(a,"locale_id",h.value);let t=Number(h.value);if(e.locale_id=t,t>0){const o=j.find(s=>s.id===t);x(o.locale)}v.value="0",e.pronoun_id=0}),b(v,()=>{u(a,"pronoun_id",v.value),e.pronoun_id=Number(v.value)}),b(p,()=>{e.show_name=p.value,u(a,"show_name",JSON.stringify(e.show_name)),p.value||(V.value=!1,e.show_pronoun=!1)}),b(V,()=>{e.show_pronoun=V.value,u(a,"show_pronoun",JSON.stringify(e.show_pronoun))}),b(k,()=>{e.show_email=k.value,u(a,"show_email",JSON.stringify(e.show_email))}),b(U,()=>{e.show_user_id=U.value,u(a,"show_user_id",JSON.stringify(e.show_user_id))});const O="block mt-1 w-full rounded-md shadow-sm bg-amber-100 dark:bg-lime-100 focus:bg-amber-200 focus:dark:bg-lime-200 border-amber-200 dark:border-emerald-700 focus:ring focus:ring-amber-300 focus:dark:ring-emerald-900 focus:ring-opacity-50";return(t,o)=>(f(),y(P,null,[n(r(G),{title:t.$msg.registerNewUser},null,8,["title"]),fe,n(_e,null,{default:A(()=>[l("form",{onSubmit:ee(z,["prevent"])},[l("div",he,[l("h3",ve,i(t.$msg.registerNewUser),1),n(re,{class:"mt-1"})]),l("div",null,[l("label",be,i(t.$msg.userId),1),N(l("input",{"onUpdate:modelValue":o[0]||(o[0]=s=>r(e).user_id=s),id:"register-userId",type:"text",class:"userFieldStyle",placeholder:t.$msg.userIdPlaceholder,onChange:o[1]||(o[1]=s=>r(u)(a,"user_id",r(e).user_id))},null,40,ye),[[I,r(e).user_id]]),n(_,{message:r(e).errors.user_id,class:"mt-2"},null,8,["message"])]),l("div",Se,[l("label",$e,i(t.$msg.password),1),n(M,{modelValue:r(e).password,"onUpdate:modelValue":o[2]||(o[2]=s=>r(e).password=s),id:"register-password",placeholder:t.$msg.passwordPlaceholder,textFieldClass:O,onChange:o[3]||(o[3]=s=>r(J)(a,"password",r(e).password))},null,8,["modelValue","placeholder"]),n(_,{message:r(e).errors.password,class:"mt-2"},null,8,["message"])]),l("div",Ve,[l("label",Ne,i(t.$msg.passwordConfirmation),1),n(M,{modelValue:r(e).password_confirmation,"onUpdate:modelValue":o[4]||(o[4]=s=>r(e).password_confirmation=s),id:"register-password-confirmation",placeholder:t.$msg.passwordConfirmationPlaceholder,textFieldClass:O,onChange:o[5]||(o[5]=s=>r(J)(a,"password_confirmation",r(e).password_confirmation))},null,8,["modelValue","placeholder"]),n(_,{message:r(e).errors.password_confirmation,class:"mt-2"},null,8,["message"])]),l("div",ke,[l("label",Ue,i(t.$msg.userName),1),N(l("input",{"onUpdate:modelValue":o[6]||(o[6]=s=>r(e).name=s),id:"register-userName",type:"text",class:"fieldStyle",placeholder:t.$msg.userNamePlaceholder,onChange:o[7]||(o[7]=s=>r(u)(a,"name",r(e).name))},null,40,Ce),[[I,r(e).name]]),n(_,{message:r(e).errors.name,class:"mt-2"},null,8,["message"])]),l("div",Pe,[l("label",Ie,i(t.$msg.email),1),N(l("input",{"onUpdate:modelValue":o[8]||(o[8]=s=>r(e).email=s),id:"register-email",type:"text",class:"fieldStyle",placeholder:t.$msg.emailPlaceholder,onChange:o[9]||(o[9]=s=>r(u)(a,"email",r(e).email))},null,40,Le),[[I,r(e).email]]),n(_,{message:r(e).errors.email,class:"mt-2"},null,8,["message"])]),l("div",xe,[l("label",Be,i(t.$msg.localePreferred),1),N(l("select",{"onUpdate:modelValue":o[10]||(o[10]=s=>h.value=s),id:"register-locale",class:"fieldStyle"},[l("option",Fe,"-- "+i(t.$msg.localeSelect)+" --",1),(f(!0),y(P,null,D(c.locales,s=>(f(),y("option",{value:s.id,key:s.id},i(s.name),9,Je))),128))],512),[[E,h.value]]),n(_,{message:r(e).errors.locale_id,class:"mt-2"},null,8,["message"])]),l("div",Oe,[l("label",Ae,i(t.$msg.pronoun),1),N(l("select",{"onUpdate:modelValue":o[11]||(o[11]=s=>v.value=s),id:"register-pronoun",class:"fieldStyle"},[l("option",Ee,"-- "+i(t.$msg.pronounSelect)+" --",1),(f(!0),y(P,null,D(r(T),s=>(f(),y("option",{value:s.id,key:s.id},i(s.pronoun),9,De))),128))],512),[[E,v.value]]),n(_,{message:r(e).errors.pronoun_id,class:"mt-2"},null,8,["message"])]),l("div",Me,[l("span",Re,i(t.$msg.showName),1),n(C,{modelValue:p.value,"onUpdate:modelValue":o[12]||(o[12]=s=>p.value=s)},null,8,["modelValue"])]),l("div",je,[l("span",{class:Q(["labelSpanStyle",{"line-through":!p.value,"text-gray-400":!p.value}])},i(t.$msg.showPronoun),3),p.value?(f(),W(C,{key:0,modelValue:V.value,"onUpdate:modelValue":o[13]||(o[13]=s=>V.value=s)},null,8,["modelValue"])):X("",!0)]),l("div",Te,[l("span",ze,i(t.$msg.showEmail),1),n(C,{modelValue:k.value,"onUpdate:modelValue":o[14]||(o[14]=s=>k.value=s)},null,8,["modelValue"])]),l("div",qe,[l("span",He,i(t.$msg.showUserId),1),n(C,{modelValue:U.value,"onUpdate:modelValue":o[15]||(o[15]=s=>U.value=s)},null,8,["modelValue"])]),l("div",Ke,[n(de,{modelValue:r(e).processing,"onUpdate:modelValue":o[16]||(o[16]=s=>r(e).processing=s),disabled:r(e).processing,class:"w-36"},{default:A(()=>[Y(i(t.$msg.save),1)]),_:1},8,["modelValue","disabled"])])],40,we)]),_:1})],64))}},ts=pe(Ze,[["__scopeId","data-v-1e301039"]]);export{ts as default};
