steal( 'jquery/controller',
	   'jquery/view/ejs',
	   'jquery/controller/view',
	   'servers/models' )
.then( './views/init.ejs', 
       './views/server.ejs', 
       function($){

/**
 * @class Servers.Server.List
 * @parent index
 * @inherits jQuery.Controller
 * Lists servers and lets you destroy them.
 */
$.Controller('Servers.Server.List',
/** @Static */
{
	defaults : {}
},
/** @Prototype */
{
	init : function(){
		this.element.html(this.view('init',Servers.Models.Server.findAll()) )
	},
	'.destroy click': function( el ){
		if(confirm("Are you sure you want to destroy?")){
			el.closest('.server').model().destroy();
		}
	},
	"{Servers.Models.Server} destroyed" : function(Server, ev, server) {
		server.elements(this.element).remove();
	},
	"{Servers.Models.Server} created" : function(Server, ev, server){
		this.element.append(this.view('init', [server]))
	},
	"{Servers.Models.Server} updated" : function(Server, ev, server){
		server.elements(this.element)
		      .html(this.view('server', server) );
	}
});

});