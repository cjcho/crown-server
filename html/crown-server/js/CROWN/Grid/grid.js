steal( 'jquery/controller',
	   'jquery/view/ejs',
	   'jquery/controller/view' )
.then( './views/init.ejs', 
		'//Bootstrap/bootstrap',    	// bootstrap
		'//Bootstrap/bootstrap.css')	// bootstrap CSS file
.then(
		'//CROWN/crown.css',
		'./grid.css',
       function($){

/**
 * @class CROWN.Grid
 * @parent index
 * @inherits jQuery.Controller
 * The one and only CROWN grid.
 */
$.Controller('CROWN.Grid',
/** @Static */
{
	defaults : {}
},
/** @Prototype */
{
	//The defaults.
	model: null,
	numberOfRows: 25,
	itemName: {singular : 'Undefined', plural : 'undefined'},
	
	//The one and only init function. In the beginning there was just a html element, and then God init()'s the grid.
	init : function(el, options){
		this.model = options.model;
		this.itemName = options.itemName ;
		
		//The parameters to send to the server
		this.findParams = {
			limit: 0,
			offset: 0,
			sort: [{}],
			filter: []
		} ;

		this.showSearch = true ;
		if(options.showSearch !== null) this.showSearch = options.showSearch ;

		this.showAdd = true ;
		if(options.showAdd !== null) this.showAdd = options.showAdd ;

		if(options.numberOfRows) this.numberOfRows = options.numberOfRows; //setting numberOfRows is optional
		
		//Setting defaults for each field
		this.fields = [] ;
		this.keys = [] ;

		var optionsShowColumnsLength = options.showColumns.length - 1 ;
		for (i = 0 ; i <= optionsShowColumnsLength; i++) {

			var field = options.showColumns[i] ;

			if(!field.key) {
				field.key = strToLowerUnderscored(field.label) ;
			}

			this.keys.push(field.key) ;
			this.fields.push(field) ;
		}

		//setting the findParams to send to the server
		this.findParams.retrievalNumber = this.numberOfRows;
		this.findParams.sortColumn = this.keys[0]; //sort on the first column by default
		this.findParams.filterColumns = this.keys; //filter on all columns by default

		this.element.html(this.view('init', {given:this})) ; //render the header
		this.render(); //render the table body

		//Set up scrolling listener. Using proxy to keep context. Scroll event can't be delegated like normal jmvc events, more info read: https://forum.javascriptmvc.com/topic/why-is-the-scroll-processor-not-included-in-controller
		$(window).scroll($.proxy(this.scroll, this)) ;
	},

	//The almight render function. Replaces the table body with new content based on the findParams
	render : function (){
		this.element.find('tbody').html(this.view('table', {
	 		                        	models : this.model.findAll(this.findParams), //get the latest content from the server
										given: this //just give everything we have.
                					})) ;
	},

	//Event listener. Fires when the user types in the search field
	'#filter keyup': function(el){
		//use whatever is in the search field as the filterString findParam

		this.findParams.filter = [] ;

		for (var i = this.keys.length - 1; i >= 0; i--) {
			if(this.keys[i]){
				var filter = {
					property: this.keys[i],
					value: this.element.find('#filter').val()
				}

				this.findParams.filter[this.findParams.filter.length] = filter ;
			}
		}
		
		this.render(); //reload the table
	},

	//Event listener. Fires when someone clicks the table header, used to sort the selected column
	'th click': function( el ){ 

		//If this column is already selected
		if($(el).hasClass('selected')){
			//If the current sort direction is ascending
			if(this.findParams.sort[0].direction == 'asc'){
				//Change it to sort in descending direction
				this.findParams.sort[0].direction = 'desc' ;
				
				//Switch around the arrow icon
				$(el).find('i').removeClass('icon-chevron-down') ;
				$(el).find('i').addClass('icon-chevron-up') ;
			}
			else{ //If the current sort direction is descending
				//Change it to sort ascending
				this.findParams.sort[0].direction = 'asc' ;
				
				//Switch around the arrow icon
				$(el).find('i').removeClass('icon-chevron-up') ;
				$(el).find('i').addClass('icon-chevron-down') ;
			}
		}
		else{ //If the column is not already selected
			
			$('th').removeClass('selected') ; //Remove all other possible selections
			$(el).addClass('selected') ; //Select only this one
			
			//Reset to default
			this.findParams.sort[0].direction = 'asc' ;
			
			//Reset arrow icon to default
			$(el).find('i').removeClass('icon-chevron-up') ;
			$(el).find('i').addClass('icon-chevron-down') ;
			
			//update the property to sort on
			this.findParams.sort[0].property = $(el).data('key') ;
		}

		//refresh the data
		this.render();
	},
	
	//Adds more rows to the grid
	addMoreRows: function() {
		//Increment the number of rows to retrieve
		this.findParams.retrievalNumber = this.findParams.retrievalNumber + this.numberOfRows ;
		
		//Refresh the data
		this.render() ;
	},
	
	//Function to fire when the page scrolls. Event is binded in init, see for the reason why there
	scroll: function(){
		//The page reached the bottom of the window
		if($(window).scrollTop() == $(document).height() - $(window).height()){
			//Add more rows
			this.addMoreRows();
		}
	},
	
	//Event listener. If this button is gets clicked it will invoke the addMoreRows function
	'.load-more-results click': function(){
		this.addMoreRows();
	}

});

});