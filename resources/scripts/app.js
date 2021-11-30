/* eslint-disable no-unused-vars */

import './gap-polyfill';
import './people-blocks';

import Vue from 'vue';
import groupMap from './components/map.vue';
import businessMap from './components/business-map.vue';

Vue.component('group-map', groupMap);
Vue.component('business-map', businessMap);

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
