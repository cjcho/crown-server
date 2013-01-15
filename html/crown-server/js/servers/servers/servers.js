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
	init : function(){

		var options = {
			model: Servers.Models.Server,
			itemName: { singular: 'Server', plural: 'Servers'},
			numberOfRows: 25,
			showColumns:[
						{
							'label': 'Host Name',
							'linkToObject': true
						},
						{
							'label': 'Guest Name',
							'linkToObject': true
						},
						{
							'label': 'IP Address',
							'linkToObject': true
						},
						{
							'label': 'Info',
							'linkToObject': true
						},
						{
							'label': 'OS',
							'key': 'operating_system',
							'linkToObject': true
						},
						{
							'label': 'CPU RAM',
							'linkToObject': true
						},
						{
							'label': 'Comment',
							'linkToObject': true
						}
						]
		} ;

		this.element.crown_grid(options) ;

	}
}) ;

});