// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.

// import 'es6-promise/auto'
import "babel-polyfill";
import Vue from "vue";
import App from "./App";
import router from "./router";
import ElementUI from "element-ui";
import locale from 'element-ui/lib/locale/lang/en'
import checkView from "vue-check-view";
import "element-ui/lib/theme-chalk/index.css";
import VueI18n from "vue-i18n";
// import { fr } from "./lang/fr";
// import { nl } from "./lang/nl";
import { en } from "./lang/en";
import store from "./store/store";
import VueAnalytics from "vue-analytics";
import VueHead from 'vue-head'

var messages = {...en };

Vue.use(VueHead);

Vue.use(VueAnalytics, {
  id: "UA-131770849-1",
  router,
  disableScriptLoader: true,
  set: [{ field: "anonymizeIp", value: true }]
});

Vue.config.productionTip = false;
Vue.use(ElementUI, { locale });
Vue.use(checkView);
Vue.use(VueI18n);
Vue.config.lang = 'en'

export var i18n = new VueI18n({
  locales: ['en'],
  defaultLocale: 'en',
  messages
});

/* eslint-disable no-new */
new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount("#app");
