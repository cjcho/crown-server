steal(	'jquery/controller',
		'jquery/view/ejs',
		'jquery/controller/view',
		function(){

/**
 * @class Servers.Servers
 */
$.Controller('Servers.Servers',
/** @Static */
{
	defaults : {}
},
/** @Prototype */
{
	'route' : function(){

		var options = {
			model: Servers.Models.Server,
			itemName: { singular: 'Server', plural: 'Servers'},
			numberOfRows: 25,
			showColumns:[
						{
							'label': 'IP Address',
							'linkToObject': true,
							'width': 10
						},
						{
							'label': 'Host Name',
							'linkToObject': true,
							'width': 10
						},
						{
							'label': 'Guest Name',
							'linkToObject': true,
							'width': 20
						},
						{
							'label': 'Info',
							'linkToObject': true,
							'width': 30
						},
						{
							'label': 'OS',
							'key': 'operating_system',
							'linkToObject': true,
							'width': 15
						},
						{
							'label': 'CPU RAM',
							'linkToObject': true,
							'width': 15
						}
						]
		} ;

		if(this.element.hasClass('crown_grid')) $(this.element).crown_grid('destroy') ;
		this.element.crown_grid(options) ;

		this.element.find('#filter').focus() ;

	},

	'servers/:id route': function(route){

		var options = {
			model: Servers.Models.Server,
			id: route.id,
			itemName: {singular: 'Server', plural: 'Servers'},
			fields: [
					{
						'label': 'IP Address',
						'tab': 'General',
						'editable': false,
						'section': 'IP Address'
					},
					{
						'label': 'Host Name',
						'tab': 'General',
						'section': 'General'
					},
					{
						'label': 'Guest Name',
						'tab': 'General',
						'section': 'General'
					},
					{
						'label': 'Info',
						'tab': 'General',
						'section': 'General'
					},
					{
						'label': 'Operating System',
						'tab': 'General',
						'section': 'Specifications'
					},
					{
						'label': 'CPU RAM',
						'tab': 'General',
						'section': 'Specifications'
					},
					{
						'label': 'Storage Fields',
						'tab': 'General',
						'section': 'Specifications'
					},
					{
						'label': 'Comment',
						'type': 'textarea',
						'tab': 'General',
						'section': 'Comment'
					}
					]
		} ;

		if(this.element.hasClass('crown_detail')) $(this.element).crown_detail('destroy') ;
		$(this.element).crown_detail(options) ;

	}

}) ;

});