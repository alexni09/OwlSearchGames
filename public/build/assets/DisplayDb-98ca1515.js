import{t as k,K as f,r as w,o as _,c as t,a as y,u as s,w as h,F as i,b as e,Z as v,d as n,e as a,j as l,k as m,l as D,i as B,m as C,n as N}from"./app-6d9e275a.js";import{C as V}from"./CompleteLayout-18d243e9.js";import{u as $}from"./useCan-6cf6b21a.js";import"./SaveLocaleBeforeUnload-83b645f9.js";import"./ArrowRectangleRight-7c7e3810.js";import"./MustUpdateLocale-ac3bed7d.js";const z={class:"mx-auto sm:px-6 lg:px-8"},A={class:"bg-orange-50 dark:bg-green-800 bg-opacity-80 dark:bg-opacity-80 shadow-sm rounded-lg"},F={class:"p-6 text-orange-800 dark:text-amber-100"},L={key:0,class:"mb-6 text-3xl font-semibold"},R={key:1,class:"mb-6"},j={key:0,class:"mb-6 text-lg font-semibold"},q={key:1,class:"p-2 border-collapse border border-gray-600 rounded-lg"},E={class:"bg-gray-400 text-gray-900 font-semibold"},I={key:3,class:"mb-4 text-2xl font-semibold text-red-500 dark:text-red-400"},G={__name:"DisplayDb",props:{columns:{type:Array},rows:{type:Array}},setup(r){let{can:d}=$();const b=k(f().props.background),u=w(null);return _(()=>{u.value.style.backgroundImage="url('"+b.img+"')",u.value.style.backgroundPosition=b.position}),(c,K)=>(e(),t(i,null,[y(s(v),{title:"Display DB"}),y(V,null,{default:h(()=>[n("div",{class:"py-12 w-full lg:h-[768px] 2xl:h-[900px] bg-cover bg-center h-[480px] md:h-[640px]",ref_key:"backgroundDiv",ref:u},[n("div",z,[n("div",A,[n("div",F,[s(d)("admin.generic")?(e(),t("h1",L,"Display DB")):a("",!0),s(d)("admin.generic")?(e(),t("div",R,[!r.rows||r.rows.length===0?(e(),t("h2",j,l(c.$msg.noRecords),1)):a("",!0),r.rows&&r.rows.length>0?(e(),t("table",q,[n("tr",E,[(e(!0),t(i,null,m(r.columns,(g,o)=>(e(),t("th",{key:o,class:"p-1 border-x border-gray-600 rounded-lg"},l(g),1))),128))]),(e(!0),t(i,null,m(r.rows,(g,o)=>(e(),t("tr",{key:o,class:N(["text-gray-800",{"bg-white":o%6<3,"bg-gray-200":o%6>2}])},[(e(!0),t(i,null,m(r.columns,(p,x)=>(e(),t("td",{key:x,class:"p-1 border-x border-gray-400 rounded-lg"},l(g[p]),1))),128))],2))),128))])):a("",!0)])):a("",!0),s(d)("admin.generic")?(e(),D(s(C),{key:2,href:c.route("querydb.show"),class:"w-64 text-center uppercase px-6 py-2 bg-blue-600 text-white rounded"},{default:h(()=>[B(l(c.$msg.newQuery),1)]),_:1},8,["href"])):a("",!0),s(d)("admin.generic")?a("",!0):(e(),t("h2",I,l(c.$msg.unauthorized),1))])])])],512)]),_:1})],64))}};export{G as default};
