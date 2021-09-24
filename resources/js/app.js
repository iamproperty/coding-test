import Vue from 'vue'
import App from './App.vue'

require('./bootstrap');


window.onload = function () {
  var myAppElement = document.getElementById('app');
  if(myAppElement)  (new Vue(App)).$mount('#app')
}
