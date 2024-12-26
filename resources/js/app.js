import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import products from './components/products.vue';

const app = createApp({
    components: {
        ExampleComponent,
        products,
    },
});

app.mount('#app');

import axios from 'axios';

axios.defaults.baseURL = '/api';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default axios;
