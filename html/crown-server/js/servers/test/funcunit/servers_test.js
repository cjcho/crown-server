steal("funcunit", function(){
	module("servers test", { 
		setup: function(){
			S.open("//servers/servers.html");
		}
	});
	
	test("Copy Test", function(){
		equals(S("h1").text(), "Welcome to JavaScriptMVC 3.2!","welcome text");
	});
})