//js servers/scripts/doc.js

load('steal/rhino/rhino.js');
steal("documentjs").then(function(){
	DocumentJS('servers/servers.html', {
		markdown : ['servers']
	});
});