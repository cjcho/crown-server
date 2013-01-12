steal("funcunit/qunit", "servers/fixtures", "servers/models/server.js", function(){
	module("Model: Servers.Models.Server")
	
	test("findAll", function(){
		expect(4);
		stop();
		Servers.Models.Server.findAll({}, function(servers){
			ok(servers)
	        ok(servers.length)
	        ok(servers[0].name)
	        ok(servers[0].description)
			start();
		});
		
	})
	
	test("create", function(){
		expect(3)
		stop();
		new Servers.Models.Server({name: "dry cleaning", description: "take to street corner"}).save(function(server){
			ok(server);
	        ok(server.id);
	        equals(server.name,"dry cleaning")
	        server.destroy()
			start();
		})
	})
	test("update" , function(){
		expect(2);
		stop();
		new Servers.Models.Server({name: "cook dinner", description: "chicken"}).
	            save(function(server){
	            	equals(server.description,"chicken");
	        		server.update({description: "steak"},function(server){
	        			equals(server.description,"steak");
	        			server.destroy();
						start();
	        		})
	            })
	
	});
	test("destroy", function(){
		expect(1);
		stop();
		new Servers.Models.Server({name: "mow grass", description: "use riding mower"}).
	            destroy(function(server){
	            	ok( true ,"Destroy called" )
					start();
	            })
	})
})