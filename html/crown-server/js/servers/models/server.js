steal('jquery/model', function(){

/**
 * @class Servers.Models.Server
 * @parent index
 * @inherits jQuery.Model
 * Wraps backend server services.  
 */
$.Model('Servers.Models.Server',
/* @Static */
{
	findAll: "/api/servers",
  	findOne : "/api/servers/{id}", 
  	create : "/api/servers",
 	update : "/api/servers/{id}",
  	destroy : "/api/servers/{id}"
},
/* @Prototype */
{});

})