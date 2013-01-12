steal(
	'./servers.css', 			// application CSS file
	'./models/models.js',		// steals all your models
	'servers/server/create',
	'servers/server/list',
	function(){					// configure your application
		
		$('#servers').servers_server_list();
		$('#create').servers_server_create();
})