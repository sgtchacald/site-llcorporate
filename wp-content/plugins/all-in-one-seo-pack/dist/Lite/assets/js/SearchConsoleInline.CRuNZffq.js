import{a as k,g as E,u as I,e as v,o as w}from"./links.Byq_3x2e.js";import"./default-i18n.DXRQgkn2.js";import{_ as A}from"./_plugin-vue_export-helper.BN1snXvA.js";import{u as x}from"./SearchConsole.CNymtxyF.js";import{g as M}from"./params.B3T1WKlC.js";import{_ as T}from"./Actionable.BIiqZHuY.js";import{v as c,o as i,k as f,l as y,C,t as g,a as S,c as p,B as u,E as P,F as b,b as d}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{W as B}from"./WpTable.D1U8FGR2.js";import{C as G}from"./Index.CXKd2N9v.js";import{C as N}from"./Table.JF4U36kH.js";import{c as D}from"./Caret.Ke5gylGO.js";const me=()=>({validateLinksPerIndex:e=>{1>e.target.value&&(e.target.value=1),5e4<e.target.value&&(e.target.value=5e4)}}),U=t=>{if(!t)return"";if(t=t.trim().replace(" ","%20"),t=t.replace(/[^a-z0-9-~+_.?#=!&;,/:%@$|*'()[\]\\x80-\\xff]/gi,""),t==="")return t;if(t.toLowerCase().startsWith("mailto:")||["%0d","%0a","%0D","%0A"].forEach(o=>{t=t.replace(new RegExp(o,"g"),"")}),t=t.replace(";//","://"),t.includes("[")||t.includes("]")){const e=new URL(t);let o="";e.protocol?o+=e.protocol+"//":t[0]==="/"&&(o+="//"),e.username&&(o+=e.username),e.password&&(o+=":"+e.password),(e.username||e.password)&&(o+="@"),e.hostname&&(o+=e.hostname),e.port&&(o+=":"+e.port);const r=t.replace(o,""),s=r.replace("[","%5B").replace("]","%5D");t=t.replace(r,s)}return t},z={setup(){const{strings:t}=x();return{optionsStore:k(),searchStatisticsStore:E(),rootStore:I(),settingsStore:v(),composableStrings:t}},mixins:[B],components:{CoreAlertActionable:T,CoreModal:G,CoreWpTable:N,SvgCircleCheck:D},props:{display:{type:Boolean,default:!1},sitemaps:{type:Array,default:()=>[]}},data(){return{resultsPerPage:5,pageNumber:1,loading:!1,bulkOptions:[{label:this.$t.__("Remove",this.$td),value:"remove"},{label:this.$t.__("Ignore",this.$td),value:"ignore"}],strings:w(this.composableStrings,{aioseoHasFoundSomeErrorsInSitemaps:this.$t.sprintf(this.$t.__("%1$s has found some errors in sitemaps that were previously submitted to Google Search Console. Since %1$s manages your sitemaps, these additional sitemaps can be removed.",this.$td),"AIOSEO"),allErrorsResolved:this.$t.__("All errors have been resolved",this.$td),removeSitemap:this.$t.__("Remove",this.$td),ignoreSitemap:this.$t.__("Ignore",this.$td),viewDetails:this.$t.__("Details",this.$td),sitemapErrors:this.$t.__("Sitemap Errors",this.$td),thereAreSitemapsWithErrors:this.$t.__("There are sitemaps with errors",this.$td)})}},methods:{escUrl:U,fetchData(){return Promise.resolve()},processBulkAction({action:t,selectedRows:e}){if(!e.length)return;const o=[];switch(Array.isArray(e)?e.forEach(r=>{o.push(this.rows[r].path)}):o.push(e.path),t){case"remove":this.loading=!0,this.searchStatisticsStore.deleteSitemap({sitemap:o}).finally(()=>{this.loading=!1});break;case"ignore":this.loading=!0,this.searchStatisticsStore.ignoreSitemap({sitemap:o}).finally(()=>{this.loading=!1});break}},deleteSitemap(t){this.loading=!0,this.searchStatisticsStore.deleteSitemap({sitemap:t}).finally(()=>{this.loading=!1})},ignoreSitemap(t){this.loading=!0,this.searchStatisticsStore.ignoreSitemap({sitemap:t}).finally(()=>{this.loading=!1})},canRemoveSitemap(t){return!this.rootStore.aioseo.data.sitemapUrls.includes(t.path)}},computed:{totals(){return{page:1,pages:Math.ceil(this.searchStatisticsStore.sitemapsWithErrors.length/this.resultsPerPage),total:this.searchStatisticsStore.sitemapsWithErrors.length}},rows(){const t=this.pageNumber===1?0:(this.pageNumber-1)*this.resultsPerPage;return this.searchStatisticsStore.sitemapsWithErrors.slice(t,t+this.resultsPerPage)},columns(){return[{slug:"sitemap",label:this.$t.__("Sitemap",this.$td)},{slug:"actions",label:this.$t.__("Actions",this.$td),width:"220px"}]}}},O={class:"aioseo-modal-body"},R={key:0},F=["href"],L=["onClick"],V=["href"],$=["onClick"],H={key:1,class:"no-errors"};function Y(t,e,o,r,s,n){const l=c("core-alert-actionable"),_=c("core-wp-table"),m=c("svg-circle-check"),h=c("core-modal");return i(),f(h,{show:o.display,onClose:e[0]||(e[0]=a=>t.$emit("close")),classes:["aioseo-sitemaps-errors-modal"]},{headerTitle:y(()=>[C(g(s.strings.sitemapErrors),1)]),body:y(()=>[S("div",O,[r.searchStatisticsStore.sitemapsWithErrors.length>0?(i(),p("div",R,[u(l,{title:s.strings.thereAreSitemapsWithErrors,text:s.strings.aioseoHasFoundSomeErrorsInSitemaps,type:"yellow",size:"small"},null,8,["title","text"]),u(_,{id:"sitemapErrorsTable",columns:n.columns,rows:n.rows,"bulk-options":s.bulkOptions,totals:n.totals,showSearch:!1,loading:s.loading,onPaginate:t.processPagination,onProcessBulkAction:n.processBulkAction},{sitemap:y(({row:a})=>[S("a",{href:n.escUrl(a.path),target:"_blank",rel:"noopener"},g(a.path),9,F)]),actions:y(({row:a})=>[S("a",{href:"#",onClick:P(()=>n.ignoreSitemap(a.path),["prevent"])},g(s.strings.ignoreSitemap),9,L),a.detailsUrl!==""?(i(),p(b,{key:0},[C(" | "),S("a",{href:n.escUrl(a.detailsUrl),target:"_blank",rel:"noopener"},g(s.strings.viewDetails),9,V)],64)):d("",!0),n.canRemoveSitemap(a)?(i(),p(b,{key:1},[C(" | "),S("a",{href:"#",class:"aioseo-sitemaps-errors-remove",onClick:P(()=>n.deleteSitemap(a.path),["prevent"])},g(s.strings.removeSitemap),9,$)],64)):d("",!0)]),_:1},8,["columns","rows","bulk-options","totals","loading","onPaginate","onProcessBulkAction"])])):(i(),p("div",H,[u(m),S("p",null,g(s.strings.allErrorsResolved),1)]))])]),_:1},8,["show"])}const W=A(z,[["render",Y]]),j={setup(){const{strings:t,redirectToGscSettings:e}=x();return{searchStatisticsStore:E(),settingsStore:v(),optionsStore:k(),composableStrings:t,redirectToGscSettings:e}},components:{CoreAlertActionable:T,SitemapsWithErrorsModal:W},data(){return{showErrorsModal:!1,strings:w(this.composableStrings,{yourSiteIsConnected:this.$t.__("Your site is connected directly to Google Search Console and your sitemaps are in sync.",this.$td)})}},mounted(){this.showErrorsModal=!!M()["open-modal"]}},q={class:"google-search-console-alerts"},J={key:1};function K(t,e,o,r,s,n){var m,h;const l=c("core-alert-actionable"),_=c("sitemaps-with-errors-modal");return i(),p("div",q,[!r.searchStatisticsStore.isConnected&&!((m=r.settingsStore.settings.dismissedAlerts)!=null&&m.searchConsoleNotConnected)?(i(),f(l,{key:0,title:s.strings.connectToGoogleToAddSitemaps,text:s.strings.aioseoCanNowVerify,button:s.strings.connectToGoogleSearchConsole,buttonType:"link",type:"yellow",size:"small","show-close":"",onClick:r.redirectToGscSettings,onCloseAlert:e[0]||(e[0]=()=>r.settingsStore.dismissAlert("searchConsoleNotConnected"))},null,8,["title","text","button","onClick"])):d("",!0),r.searchStatisticsStore.isConnected&&!((h=r.settingsStore.settings.dismissedAlerts)!=null&&h.searchConsoleSitemapErrors)?(i(),p("div",J,[r.searchStatisticsStore.sitemapsWithErrors.length>0?(i(),f(l,{key:0,title:s.strings.thereAreSitemapsWithErrors,text:s.strings.aioseoHasFoundSomeErrorsInSitemaps,button:s.strings.fixSitemapErrors,buttonType:"link",type:"yellow",size:"small","show-close":"",onCloseAlert:e[1]||(e[1]=()=>r.settingsStore.dismissAlert("searchConsoleSitemapErrors")),onClick:e[2]||(e[2]=()=>s.showErrorsModal=!0)},null,8,["title","text","button"])):d("",!0),u(_,{display:s.showErrorsModal,onClose:e[3]||(e[3]=a=>s.showErrorsModal=!1)},null,8,["display"])])):d("",!0)])}const he=A(j,[["render",K]]),Q={setup(){const{strings:t,redirectToGscSettings:e}=x();return{optionsStore:k(),searchStatisticsStore:E(),settingsStore:v(),rootStore:I(),composableStrings:t,redirectToGscSettings:e}},components:{CoreAlertActionable:T,SitemapsWithErrorsModal:W},data(){return{showErrorsModal:!1,strings:w(this.composableStrings,{yourSiteIsConnected:this.$t.__("Your site is connected directly to Google Search Console and your sitemaps are in sync.",this.$td)})}},computed:{showIsConnected(){return this.searchStatisticsStore.isConnected&&this.optionsStore.internalOptions.internal.searchStatistics.site.verified}}},X={class:"google-search-console-alerts-inline"};function Z(t,e,o,r,s,n){var m,h;const l=c("core-alert-actionable"),_=c("sitemaps-with-errors-modal");return i(),p("div",X,[n.showIsConnected?(i(),p(b,{key:0},[u(l,{text:s.strings.yourSiteIsConnected,type:"green",size:"small"},null,8,["text"]),r.searchStatisticsStore.sitemapsWithErrors.length>0&&((m=this.settingsStore.settings.dismissedAlerts)!=null&&m.searchConsoleSitemapErrors)?(i(),f(l,{key:0,text:s.strings.aioseoHasFoundSomeErrorsInSitemaps,button:s.strings.fixSitemapErrors,buttonType:"link",type:"yellow",size:"small",onClick:e[0]||(e[0]=()=>s.showErrorsModal=!0)},null,8,["text","button"])):d("",!0),u(_,{display:s.showErrorsModal,onClose:e[1]||(e[1]=a=>s.showErrorsModal=!1),sitemaps:r.searchStatisticsStore.sitemapsWithErrors},null,8,["display","sitemaps"])],64)):(h=this.settingsStore.settings.dismissedAlerts)!=null&&h.searchConsoleNotConnected?(i(),f(l,{key:1,text:s.strings.connectToGoogleToAddSitemaps,button:s.strings.connectToGoogleSearchConsole,buttonType:"link",type:"yellow",size:"small",onClick:r.redirectToGscSettings},null,8,["text","button","onClick"])):d("",!0)])}const de=A(Q,[["render",Z]]);export{he as S,de as a,me as u};
