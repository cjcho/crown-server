steal(	'jquery/controller',
		'jquery/view/ejs',
		'jquery/controller/view',
		'jquery/dom/form_params')
.then(	'./views/init.ejs',
		'//Bootstrap/bootstrap-tab')  // bootstrap tabs plugin 
.then(
		'//CROWN/crown.css',
		'./detail.css',
		function($){

/**
 * @class CROWN.Grid
 * @parent index
 * @inherits jQuery.Controller
 * Lists schools and lets you destroy them.
 */
$.Controller('CROWN.Detail',
/** @Static */
{
	defaults: {}
},
/** @Prototype */
{
	model: null,
	id: null,
	tabs: [],
	
	init: function(el, options){
		this.model = options.model ;
		this.id = options.id ;
		this.headerLeft = options.headerLeft ;
		this.headerRight = options.headerRight ;
		this.footerRight = options.footerRight ;
		this.footerLeft = options.footerLeft ;
		
		this.itemName = options.itemName ;

		// organize the fields by tab and section
		var collection = [] ;
		$.each(options.fields, function(field_index, field_val){ // for each field
			//If field doesn't have a specific key, give them a general one
			if(!field_val.hasOwnProperty('key')) {
				field_val.key = strToLowerUnderscored(field_val.label) ;
			}

			//Field is editable by default
			if(!field_val.hasOwnProperty('editable')){
				field_val.editable = true ;
			}

			//Field is text by default
			if(!field_val.hasOwnProperty('type')){
				field_val.type = 'text' ;
			}

			var tab = null,
				tabExist = false;

			var collectionLength = collection.length ;
			// see if the field's tab exists already
			for(i = 0; i < collectionLength; i++){
				if(collection[i].name === field_val.tab) {
					tabExist = true ;
					tab = collection[i] ;
				}
			}

			if(!tabExist) { // if the field's tab is not yet in the collectio§n...
				// create tab object
				var newTab = {
					name: field_val.tab, 
					sections: []
				} ;
				
				// create a section object
				var newSection = {
					name: field_val.section, 
					fields: []
				} ;

				// add the field to the section
				newSection.fields[newSection.fields.length] = field_val ;

				// add the section to the tab
				newTab.sections[newTab.sections.length] = newSection ;

				// add the tab to the collection
				collection[collection.length] = newTab ;
			}
			else { // if the tab is already in the collection
				var section = null, 
					sectionExist = false,
					collectionSectionsLength = tab.sections.length ;

				for(i = 0; i < collectionSectionsLength; i++){
					// see if the field's section is in the tab's collection
					if(tab.sections[i].name === field_val.section) {
						sectionExist = true ;
						section = tab.sections[i] ;
					}
				}

				if(!sectionExist) { // if the field's section is not yet in the collection...
					// create section object
					section = {name: field_val.section, fields:[]};

					// add the field to the section
					section.fields[section.fields.length] = field_val ;

					// add the section to the tab
					tab.sections[tab.sections.length] = section ;
				}
				else { // if the section is already in the collection...
					// simply add the field to it
					section.fields[section.fields.length] = field_val ;
				}
			}
		});
		
		this.tabs = collection ;

		this.element.html(this.view('init', {
			given: this,
			tabs: this.tabs,
			model: this.model.findOne({id:this.id})
		})) ;
	},

	'.nav a click': function () {
		$(this).tab('show');
	},

	'.save click': function(){		
		var modelObj = new this.model({id:this.id}) ;
		modelObj.attrs(this.element.find('form').formParams()) ;
		modelObj.save();
	}

}); // $.Controller

}); // .then