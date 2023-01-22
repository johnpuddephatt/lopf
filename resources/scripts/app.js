/* eslint-disable no-unused-vars */

import './gap-polyfill';
import './people-blocks';

import Vue from 'vue';
import groupMap from './components/map.vue';
import adfMap from './components/adf-map.vue';
import ciarMap from './components/ciar-map.vue';
import localleedsMap from './components/localleeds-map.vue';

Vue.component('group-map', groupMap);
Vue.component('adf-map', adfMap);
Vue.component('ciar-map', ciarMap);
Vue.component('localleeds-map', localleedsMap);

var vm = new Vue({
  el: '#app',
});

document.getElementById('main-menu-button').addEventListener('click', e => {
  e.currentTarget.innerText =
    e.currentTarget.innerText == 'Menu' ? 'Close menu' : 'Menu';
  document.body.scrollTop = 0;
  document.body.classList.toggle('overflow-hidden');
  document.getElementById('main-menu').classList.toggle('left-full');
  document.getElementById('main-menu').classList.toggle('left-0');
  document.getElementById('main-menu-container').scrollTop = 0;
});
