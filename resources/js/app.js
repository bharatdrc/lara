/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//import $ from 'jquery';
//window.$ = window.jQuery = $;
var $ = require("jquery");

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 class Error{
 	constructor(){
 		this.errors ={};
 	}
 	get(field)
 	{
 		if(this.errors[field]){
 			return this.errors[field][0];
 		}
 	}
 	save(error)
 	{
 		this.errors = error;
 	}
 } 

new Vue({
    el: '#app',
    data:{
    	name :'',
    	address :'',
    	formerrors : new Error()
    },	
    methods:{
    	onSubmit:function(){
    		axios.post('http://meet.com/en/storevueform', this.$data)
			.then(function (response) {
			   console.log(response);
			})
			.catch(function (error) {
				console.log(this.formerrors);
				this.formerrors.save(error.response.data.errors); 
				
/*			   console.log(error);*/
			});
    	}
    	/*axios.get('/storevueform')
		  .then(function (response) {
		    // handle success
		    console.log(response.data);
		  })
		  .catch(function (error) {
		    // handle error
		    console.log(error);
		  })
		  .finally(function () {
		    // always executed
		  });*/
    }
});

window.moment = require('moment/moment');
//import 'bootstrap-datetimepicker-npm/src/js/bootstrap-datetimepicker.js';


//require('bootstrap-datetimepicker-npm');

require('eonasdan-bootstrap-datetimepicker');