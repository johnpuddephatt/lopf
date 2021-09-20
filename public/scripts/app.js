(self.webpackChunk=self.webpackChunk||[]).push([[742],{492:function(n,t,e){"use strict";e(915),e(918);var r=e(538),o=(e(771),e(243)),a=e(193),i=e(856),s=e(352),l=e(727),c=e(380),u={name:"groupMap",props:["type"],components:{LControlAttribution:a.Z,LIconDefault:i.Z,LMap:s.Z,LTileLayer:l.Z,LMarker:c.Z},data:function(){return{view:"map",groups:[],search:null,selected:null,imagePath:null,zoom:12,center:(0,o.latLng)(53.7993475,-1.5032696),url:"https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png",attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>'}},computed:{filteredList:function(){var n=this,t=this.groups.filter((function(n){return n.address}));return this.search?t.filter((function(t){return t.title.rendered.toLowerCase().includes(n.search.toLowerCase())||t.address.address.toLowerCase().includes(n.search.toLowerCase())})):t}},mounted:function(){var n=this;this.imagePath="".concat(window.directory_uri.stylesheet_directory_uri,"/public/images/leaflet/");fetch("/wp-json/wp/v2/".concat(this.type,"?orderby=title&per_page=100&order=asc")).then((function(n){return n.json()})).then((function(t){return n.groups=t}))},methods:{scrollTo:function(n){this.selected=n,this.$refs["".concat(n,"-sidebar")][0].scrollIntoView({behavior:"smooth",block:"center",inline:"nearest"})}}},d=(e(737),(0,e(900).Z)(u,(function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",[e("div",{staticClass:"container max-w-5xl my-4"},[e("button",{staticClass:"px-4 mr-2 text-xl leading-loose rounded-full",class:"map"==n.view?"bg-blue text-white":"bg-sky-light",on:{click:function(t){n.view="map"}}},[n._v("\n      Map view\n    ")]),n._v(" "),e("button",{staticClass:"px-4 text-xl leading-loose rounded-full",class:"list"==n.view?"bg-blue text-white":"bg-sky-light",on:{click:function(t){n.view="list"}}},[n._v("\n      List view\n    ")])]),n._v(" "),"map"==n.view?e("div",{staticClass:"relative flex flex-col overflow-hidden border-t lg:flex-row"},[e("div",{staticClass:"relative flex-1 map-container"},[e("l-map",{ref:"myMap",attrs:{zoom:n.zoom,center:n.center,options:{attributionControl:!1}}},[e("l-control-attribution",{attrs:{position:"bottomleft"}}),n._v(" "),e("l-icon-default",{attrs:{"image-path":n.imagePath}}),n._v(" "),e("l-tile-layer",{attrs:{url:n.url,attribution:n.attribution}}),n._v(" "),n._l(n.filteredList,(function(t){return e("l-marker",{key:t.slug,ref:t.slug+"-marker",refInFor:!0,attrs:{"lat-lng":[t.address.lat,t.address.lng]},on:{click:function(e){return n.scrollTo(t.slug)}}})}))],2)],1),n._v(" "),e("div",{staticClass:"absolute top-0 bottom-0 right-0 w-1/4 max-w-sm overflow-y-auto divide-y shadow-2xl bg-sky-lightest map-sidebar bg-opacity-90"},[e("div",{staticClass:"mx-4 my-3"},[e("input",{directives:[{name:"model",rawName:"v-model",value:n.search,expression:"search"}],staticClass:"w-full px-3 py-2 leading-tight text-gray-700 border rounded-full shadow appearance-none focus:outline-none focus:shadow-outline",attrs:{type:"text",placeholder:"Search by name.."},domProps:{value:n.search},on:{input:function(t){t.target.composing||(n.search=t.target.value)}}})]),n._v(" "),n._l(n.filteredList,(function(t){return e("a",{key:t.slug,ref:t.slug+"-sidebar",refInFor:!0,staticClass:"block px-4 py-6 hover:bg-sky-light",class:{"bg-sky-light":n.selected==t.slug},attrs:{href:t.link}},[t.neighbourhood_network?e("p",{staticClass:"inline-block px-2 pt-0.5 -ml-0.5 mb-1 text-xs font-normal rounded-md bg-blue-lightest"},[n._v("\n          Neighbourhood network\n        ")]):n._e(),n._v(" "),e("h3",{staticClass:"font-bold",domProps:{innerHTML:n._s(t.title.rendered)}}),n._v(" "),t.address?e("div",{staticClass:"text-xs",domProps:{innerHTML:n._s(t.address.address)}}):n._e()])})),n._v(" "),n.filteredList.length?n._e():e("div",{staticClass:"p-4 rounded"},[n._v("\n        No groups to show you.\n      ")])],2)]):e("div",{staticClass:"container max-w-5xl my-4"},[e("div",{staticClass:"mt-8"},[e("input",{directives:[{name:"model",rawName:"v-model",value:n.search,expression:"search"}],staticClass:"w-full max-w-xl px-3 py-2 text-xl leading-tight text-gray-700 border rounded-full shadow appearance-none focus:outline-none focus:shadow-outline",attrs:{type:"text",placeholder:"Search by name.."},domProps:{value:n.search},on:{input:function(t){t.target.composing||(n.search=t.target.value)}}})]),n._v(" "),n._l(n.groups,(function(t){return e("a",{key:t.slug,ref:t.slug+"-sidebar",refInFor:!0,staticClass:"block py-8",class:{"bg-sky-light":n.selected==t.slug},attrs:{href:t.link}},[e("h3",{staticClass:"text-xl font-bold"},[e("span",{domProps:{innerHTML:n._s(t.title.rendered)}}),n._v(" "),t.neighbourhood_network?e("p",{staticClass:"inline-block px-2 pt-0.5 ml-3 text-base font-normal rounded-lg bg-blue-lightest"},[n._v("\n          Neighbourhood network\n        ")]):n._e()]),n._v(" "),t.address?e("div",{staticClass:"text",domProps:{innerHTML:n._s(t.address.address)}}):n._e()])}))],2)])}),[],!1,null,"68d0e716",null).exports);r.Z.component("group-map",d);new r.Z({el:"#app"});document.getElementById("main-menu-button").addEventListener("click",(function(n){n.currentTarget.innerText="Menu"==n.currentTarget.innerText?"Close menu":"Menu",document.body.scrollTop=0,document.body.classList.toggle("overflow-hidden"),document.getElementById("main-menu").classList.toggle("left-full"),document.getElementById("main-menu").classList.toggle("left-0"),document.getElementById("main-menu-container").scrollTop=0}))},915:function(){function n(n,e){var r="undefined"!=typeof Symbol&&n[Symbol.iterator]||n["@@iterator"];if(!r){if(Array.isArray(n)||(r=function(n,e){if(!n)return;if("string"==typeof n)return t(n,e);var r=Object.prototype.toString.call(n).slice(8,-1);"Object"===r&&n.constructor&&(r=n.constructor.name);if("Map"===r||"Set"===r)return Array.from(n);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return t(n,e)}(n))||e&&n&&"number"==typeof n.length){r&&(n=r);var o=0,a=function(){};return{s:a,n:function(){return o>=n.length?{done:!0}:{done:!1,value:n[o++]}},e:function(n){throw n},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var i,s=!0,l=!1;return{s:function(){r=r.call(n)},n:function(){var n=r.next();return s=n.done,n},e:function(n){l=!0,i=n},f:function(){try{s||null==r.return||r.return()}finally{if(l)throw i}}}}function t(n,t){(null==t||t>n.length)&&(t=n.length);for(var e=0,r=new Array(t);e<t;e++)r[e]=n[e];return r}!function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:t.createElement("b").style,r=(arguments.length>2&&void 0!==arguments[2]||(e.gap=0),arguments.length>3&&void 0!==arguments[3]?arguments[3]:new WeakMap),o=arguments.length>4&&void 0!==arguments[4]?arguments[4]:/^(normal|0px)+$/,a=arguments.length>5&&void 0!==arguments[5]?arguments[5]:function(n){if(!r.has(n)&&(r.set(n,!0),!n.shadowRoot)){var e=getComputedStyle(n);if(/^(inline-)?flex$/.test(e.display)&&!o.test(e.rowGap+e.columnGap)){var a=n.attachShadow({mode:"open"}),i=a.appendChild(t.createElement("style"));a.appendChild(t.createElement("slot"));!function n(){i.textContent="::slotted(*){margin:calc(".concat(e.rowGap,"/2) calc(").concat(e.columnGap,"/2)}slot{display:inherit;flex-direction:inherit;flex-wrap:inherit;margin:calc(").concat(e.rowGap,"/-2) calc(").concat(e.columnGap,"/-2);}"),requestAnimationFrame(requestAnimationFrame.bind(null,n))}()}}},i=arguments.length>6&&void 0!==arguments[6]?arguments[6]:function(){Array.from(t.all,a),new MutationObserver((function(t){var e,r=n(t);try{for(r.s();!(e=r.n()).done;){var o,i=n(e.value.addedNodes);try{for(i.s();!(o=i.n()).done;){var s=o.value;1===s.nodeType&&a(s)}}catch(n){i.e(n)}finally{i.f()}}}catch(n){r.e(n)}finally{r.f()}})).observe(t,{childList:!0,subtree:!0})};e.gap||i()}(document)},918:function(){var n;n=document.querySelectorAll(".wp-block-person .wp-block-columns"),Array.prototype.forEach.call(n,(function(n){var t=n.querySelector("button"),e=n.nextElementSibling;e.hidden=!0,t.onclick=function(){var n="true"===t.getAttribute("aria-expanded")||!1;t.setAttribute("aria-expanded",!n),e.hidden=n}}))},180:function(n,t,e){"use strict";e.r(t);var r=e(15),o=e.n(r),a=e(645),i=e.n(a)()(o());i.push([n.id,".map-container[data-v-68d0e716]{padding-top:56.25%}@media (orientation:portrait){.map-container[data-v-68d0e716]{padding-top:50vw}}.map-sidebar[data-v-68d0e716]{z-index:999}.vue2leaflet-map[data-v-68d0e716]{position:absolute;top:0;left:0;right:0;bottom:0}","",{version:3,sources:["webpack://./resources/scripts/components/map.vue"],names:[],mappings:"AAwMA,gCACE,kBAvMF,CAwME,8BAFF,gCAGI,gBArMF,CACF,CAwMA,8BACE,WArMF,CAwMA,kCACE,iBAAA,CACA,KAAA,CACA,MAAA,CACA,OAAA,CACA,QArMF",sourcesContent:["\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n.map-container {\n  padding-top: 56.25%;\n  @media (orientation: portrait) {\n    padding-top: 50vw;\n  }\n}\n\n.map-sidebar {\n  z-index: 999;\n}\n\n.vue2leaflet-map {\n  position: absolute;\n  top: 0;\n  left: 0;\n  right: 0;\n  bottom: 0;\n}\n"],sourceRoot:""}]),t.default=i},736:function(){},836:function(){},737:function(n,t,e){var r=e(180);r.__esModule&&(r=r.default),"string"==typeof r&&(r=[[n.id,r,""]]),r.locals&&(n.exports=r.locals);(0,e(346).Z)("654eb56e",r,!0,{})}},function(n){"use strict";var t=function(t){return n(n.s=t)};n.O(0,[126,692,941],(function(){return t(492),t(736),t(836)}));n.O()}]);
//# sourceMappingURL=app.js.map