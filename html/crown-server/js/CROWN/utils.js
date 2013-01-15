/**
* Puts given string in lowercase and replaces spaces with dashes
* Useful for ids, classes and urls
* @param {string} string with capital letters and spaces
* @return {type} returns lower-cased-and-dashed-string.
*/
var strToLowerDashed = function(str){
	return str.replace(/ /g, '-').toLowerCase();
}

/**
* Puts given string in lowercase and replaces spaces with underscores
* @param {string} string with capital letters and spaces
* @return {type} returns lower-cased-and-underscored-string.
*/
var strToLowerUnderscored = function(str){
	return str.replace(/ /g, '_').toLowerCase();
}

/**
* Parses a pretty route
* @param {mixed} infinite list with strings/integers in the desired order
* @return {type} returns url
*/
var url = function(){
	var url = '#!' ;
	
	$.each(arguments, function(key, value){
		url = url + strToLowerDashed(value + '') + '/' ;
	}) ;

	return url ;
}