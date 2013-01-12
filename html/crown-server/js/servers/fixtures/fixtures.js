// map fixtures for this application

steal("jquery/dom/fixture", function(){
	
	$.fixture.make("server", 5, function(i, server){
		var descriptions = ["grill fish", "make ice", "cut onions"]
		return {
			name: "server "+i,
			description: $.fixture.rand( descriptions , 1)[0]
		}
	})
})