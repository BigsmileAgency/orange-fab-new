import Vue from 'vue';
import Router from 'vue-router';
import bodyLayout from '../layout/pages/body.vue';
import { i18n } from '../main';
import { TweenMax, ScrollToPlugin } from 'gsap/all';

var homeLayout = () => import('../layout/pages/home/home');
var whoweareLayout = () => import("../layout/pages/who_we_are/whoweare.vue");
var ourProgramLayout = () => import("../layout/pages/our_program/ourprogram.vue");
var startUpsLayout = () => import('../layout/pages/start_ups/start_ups.vue');
var newsLayout = () => import('../layout/pages/news/news.vue');
var faqLayout = () => import('../layout/pages/faq/faq.vue');
var joinUsLayout = () => import('../layout/pages/join_us/join_us.vue');

var stepsLayout = () => import('../layout/steps/layout/steps.vue');
var adminLayout = () => import('../layout/admin/admin');

Vue.use(Router);

var main_child = {
	path: '',
	name: 'main_child',
	component: homeLayout,
};

var home_child = {
	path: 'home',
	name: 'home_child',
	component: homeLayout,
};


var who_we_are_child = {
	path: 'who-we-are',
	name: 'who_we_are_child',
	component: whoweareLayout,
};


var Our_Program_child = {
	path: 'our-program',
	name: 'Our_Program_child',
	component: ourProgramLayout,
};

var startups_child = {
	path: 'start-ups',
	name: 'startups_child',
	component: startUpsLayout,
};

var news_child = {
	path: 'news',
	name: 'news_child',
	component: newsLayout,
};

var faq_child = {
	path: 'faq',
	name: 'faq_child',
	component: faqLayout,
};

var join_us_child = {
	path: 'applynow',
	name: 'join_us_child',
	component: joinUsLayout,
};

var steps_child = {
	path: 'steps',
	name: 'steps_child',
	beforeEnter: (to, from, next) => {
		if (sessionStorage.getItem('token')) {
			next();
		} else {
			next({ name: 'login_child', params: { lang: to.params.lang } });
		}
	},
	component: stepsLayout,
};

var admin_child = {
	path: 'admin',
	name: 'admin_child',
	component: adminLayout,
};

var main = {
	path: '/',
	component: bodyLayout,
	children: [main_child, home_child, who_we_are_child, Our_Program_child, startups_child, news_child, faq_child, join_us_child, steps_child, admin_child],
};

// var scrollBehavior = (to, from, savedPosition) => {
// 	if (to.hash) {
// 		TweenMax.to(window, 1, { scrollTo: {y: to.hash, offsetY: 0, autoKill: true} });
// 	} else {
// 		return { x: 0, y: 0 };
// 	}
// };

let router = new Router({
  mode: 'history',
	scrollBehavior (to, from, savedPosition) {
    if (to.hash) {
      return {
        selector: to.hash,
        offset: { x: 0, y: 100 },
        behavior: 'smooth',
      }
    }else {
      return { x: 0, y: 0 };
    }
  },
	//base: '/orange/fab',
	routes: [main, {path: "*", component: bodyLayout,children: [main_child, home_child, who_we_are_child, Our_Program_child, startups_child, news_child, faq_child, join_us_child, steps_child, admin_child],}],
});

function checkLang(lang, next) {
	if (lang == 'en' || lang == ' ') {
		i18n.locale = lang;
	} else {
		i18n.locale = 'en';
		router.push('/en');
	}
	next();
}

router.beforeEach((to, from, next) => {
	checkLang('en', next);
});

export default router;
