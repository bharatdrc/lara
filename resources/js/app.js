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
 	has(field){
 		return this.errors.hasOwnProperty(field);
 	}
 	clean(){
 		delete this.error;
 	}
 }

class Form{
 	constructor(data){
 		this.originaldata = data;
 		for(let field in data){
 			this[field] = data[field];
 		}
 		this.formerrors = new Error()
 	}
 	data(){

 		let data = Object.assign({}, this.originaldata);
 		delete data.formerrors;
 		delete data.originaldata;
 		return data;
 	}
 	onFail(error){
 		this.formerrors.save(error.response.data.errors)
 	}
 	onSucess(response){
 		console.log(response.data.success);
 		this.reset();
 	}
 	onSubmit(){

 		formthis=this;
 		/*e.preventDefault();*/
 		return new Promise(function(resolve, reject){
 			axios.post('http://meet.com/en/storevueform', formthis.data())
			.then(function (response) {
			   formthis.onSucess(response);
			   resolve(response);
			})
			.catch(function (error) {
				formthis.onFail(error);
				reject(error);
			});
 		});

 	}

 	reset(){
 		this.originaldata.name='';
 		this.originaldata.address='';
 	}


 }

new Vue({
    el: '#app',
    data:{
    	form: new Form({name:'',address:''}),
    },
    methods:{
    	onSubmit(e){
	 		e.preventDefault();
			this.form.onSubmit()
			.then(function(data){
				console.log('in then promise');
			})
			.catch(function(errors){
				console.log('in catch promise');
			});
	 	}
    }
});



/*simple way

new Vue({
    el: '#app',
    data:{
    	name :'',
    	address :'',
    	formerrors : new Error()
    },
    methods:{
    	onSubmit:function(e){
    		e.preventDefault();
    		vuethis = this;
    		axios.post('http://meet.com/en/storevueform', this.$data)
			.then(function (response) {
			   vuethis.onSucess(response);
			})
			.catch(function (error) {
				vuethis.formerrors.save(error.response.data.errors);
			});
    	},
    	onSucess:function(response){
    		console.log(response.data.success);
    		this.name ='';
    		this.address ='';
    	}

    }
});
*/

window.moment = require('moment/moment');
//import 'bootstrap-datetimepicker-npm/src/js/bootstrap-datetimepicker.js';


//require('bootstrap-datetimepicker-npm');

require('eonasdan-bootstrap-datetimepicker');