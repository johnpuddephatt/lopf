/* eslint-disable no-unused-vars */

import './gap-polyfill';
import './people-blocks';

import Vue from 'vue';
import groupMap from './components/map.vue';

Vue.component('group-map', groupMap);

var vm = new Vue({
  el: '#app',
});
