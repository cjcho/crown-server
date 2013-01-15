steal(
	'jquery/controller/route',
	'//CROWN/utils.js',
	'//CROWN/Grid/Grid',
	'//CROWN/Detail/Detail',
	'./models/models.js',		// steals all your models
	'./servers/servers')
.then(
	'./servers.css',			// application CSS file
	function(){					// configure your application
		
		$('#content').servers_servers() ;

}) ;