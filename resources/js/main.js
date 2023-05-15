import { createApp } from 'vue';

import App from './components/App.vue';
import router from './router';
import PrimeVue from 'primevue/config';

import store from './store';

import Panel from 'primevue/panel';
import Editor from 'primevue/editor';
import Button from 'primevue/button';
import Paginator from 'primevue/paginator';

import 'primevue/resources/themes/md-light-indigo/theme.css';
import 'primeicons/primeicons.css';
import 'primeflex/primeflex.css';
import 'primevue/resources/primevue.css';
import 'bootstrap/dist/css/bootstrap.min.css';

const main = createApp(App);

main.component('Panel', Panel);
main.component('Editor', Editor);
main.component('Button', Button);
main.component('Paginator', Paginator);

main.use(store);
main.use(router);
main.use(PrimeVue);

main.mount("#app");
