
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Passport components
 */
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

/**
 * App Components
 */
Vue.component('video-thumb', require('./components/VideoThumb.vue'));

/**
 * Vue Router for to work with routes in app
 */
import router from './routes';

// beforeEach route scroll to top
router.beforeEach((to, from, next) => {
    window.scrollTo(0, 0);
    next(true);
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/**
 * Vue Instance
 */
const app = new Vue({
    router,
    el: '#app',
    methods: {
        slug(str) {
            if (!str) return '';
            return str.toLowerCase()
                .replace(/[^\w\s-]/g, '') // remove non-word [a-z0-9_], non-whitespace, non-hyphen characters
                .replace(/[\s_-]+/g, '-') // swap any length of whitespace, underscore, hyphen characters with a single -
                .replace(/^-+|-+$/g, ''); // remove leading, trailing -
        }
    },
    data: {
        auth: Laravel.Auth,
        channel: Laravel.Channel
    }
});
