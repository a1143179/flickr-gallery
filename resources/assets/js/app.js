
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



const app = new Vue({
    el: '#app',
    data: {
    	'photos': [],
    	'photoInfo': {
    		'title': '',
    		'url': '',
    		'description': ''
    	}
    },
    methods : {
    	deleteCategory: function(event) {
    		$.ajax({
    			'url': '/category/' + $(event.currentTarget).data('cat-id'),
    			'type': 'DELETE',
    			'data': {
    				'_method': 'DELETE'    			
	    		}, 
	    		success: function(res) {
	    			window.location.reload();
	    		}
    		});
    	},
    	
    	createCategory: function(event) {
    		var that = this;
    		$.post('/category', {
    			'name': $('input[name="newCategoryName"]').val()
    		}, function(res){
    			that.loadCategories();
    		});
    	},
    	
    	editCategory: function(event) {
    		window.location = '/category/' + $(event.currentTarget).data('cat-id') + '/edit';
    	},
    	
    	showFlickr: function(event) {
    		$('#initial').hide();
    		var catName = $(event.currentTarget).data('cat-name');
    		$.ajax({
    			'url': '/flickr/search',
    			'type': 'POST',
    			'data': {'catName': catName},
    			'success': function(res) {
    				app.photos = res;
    				$('#photoList').show();
    				$('#photoDetails').hide();
    			}
    		});
    		
    		
    	},
    	
    	flickrInfo: function(event) {
    		$.ajax({
    			'url': '/flickr/photo-info',
    			'type': 'POST',
    			'dataType': 'json',
    			'data': {
    				'id': $(event.currentTarget).attr('data-id')
    			},
    			'success': function(res) {
    				app.photoInfo = res;
    				$('#photoList').hide();
    				$('#photoDetails').show();
    			}
    		});
    	},
    	
    	backToList: function(event) {
    		$('#photoDetails').hide();
    		$('#photoList').show();
    	}
    	
    },
    
    
    
    
    
});
