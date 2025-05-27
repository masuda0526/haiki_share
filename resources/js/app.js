/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import AreaSelectComponent from './components/AreaSelectComponent.vue';
import CategorySelectComponent from './components/CategorySelectComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';
import ImgInputComponent from './components/ImgInputComponent.vue';
import ProductCardContainerComponent from './components/ProductCardContainerComponent.vue';
import ProductCardItemComponent from './components/ProductCardItemComponent.vue';
import ProductItemLandscapeComponent from './components/ProductItemLandscapeComponent.vue';
import ProductListForSListComponent from './components/ProductListForSListComponent.vue';
import ProductListLandscapeComponent from './components/ProductListLandscapeComponent.vue';
import SearchBoxComponent from './components/SearchBoxComponent.vue';
import store from './Store/index';

window.Vue = require('vue').default;
Vue.config.productionTip = false;  // 本番モードの警告を非表示にする
Vue.config.devtools = true;       // Vue Devtoolsを有効にする（開発モード）
if (process.env.NODE_ENV === 'development') {
    Vue.config.devtools = true;  // 開発モードでのみVue Devtoolsを有効にする
  }


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('area-select-component', require('./components/AreaSelectComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    components:{
        'area-select-component':AreaSelectComponent,
        'product-item-land':ProductItemLandscapeComponent,
        'product-list-land':ProductListLandscapeComponent,
        'product-list-slist':ProductListForSListComponent,
        'search-box-component':SearchBoxComponent,
        'product-card-item':ProductCardItemComponent,
        'product-card-container':ProductCardContainerComponent,
        'img-input':ImgInputComponent,
        'category-input':CategorySelectComponent,
        // 'humberger-menu':HumbergerComponent,
        'header-component':HeaderComponent,
    }
});

