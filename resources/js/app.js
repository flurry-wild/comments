import { createApp } from 'vue';

import App from './components/App.vue';
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

const app = createApp(App);

app.component('Panel', Panel);
app.component('Editor', Editor);
app.component('Button', Button);
app.component('Paginator', Paginator);

app.use(store);
app.use(PrimeVue);

app.mount("#app");
