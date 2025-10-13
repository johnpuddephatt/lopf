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

document.getElementById('main-menu-button').addEventListener('click', (e) => {
  e.currentTarget.innerText =
    e.currentTarget.innerText == 'Menu' ? 'Close menu' : 'Menu';
  document.body.scrollTop = 0;
  document.body.classList.toggle('overflow-hidden');
  document.getElementById('main-menu').classList.toggle('left-full');
  document.getElementById('main-menu').classList.toggle('left-0');
  document.getElementById('main-menu-container').scrollTop = 0;
});

// find all forms with a class of 'hf-form', and prevent them from being submitted for 10 seconds after the page loads
// do this be preventing the submit action on the form

document.querySelectorAll('form.hf-form').forEach((form) => {
  form.querySelector('input[type="submit"]').disabled = true;
  form.querySelector('input[type="submit"]').value = 'Please wait...';
  form.addEventListener('submit', (e) => {
    if (!form.classList.contains('hf-form--enabled')) {
      e.preventDefault();
      alert('Please wait a few seconds before submitting the form.');
      return false;
    }
  });

  setTimeout(() => {
    form.classList.add('hf-form--enabled');
    form.querySelector('input[type="submit"]').disabled = false;
    form.querySelector('input[type="submit"]').value = 'Submit';
  }, 10000);
});
