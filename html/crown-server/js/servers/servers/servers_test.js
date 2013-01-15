steal('funcunit').then(function(){

module("Servers.Servers", { 
	setup: function(){
		S.open("//servers/servers/servers.html");
	}
});

test("Text Test", function(){
	equals(S("h1").text(), "Servers.Servers Demo","demo text");
});


});