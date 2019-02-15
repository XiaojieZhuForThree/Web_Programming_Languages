// the function used to retrieve and display data in the form of a table to the html page

// a boolean value to make sure that the function only execute once
var loaded = false;
function loadData() {
	// use the jQuery to define the function
	$.ajax({
		type: "GET",
		url: "movies.xml",
		dataType: "xml",
		success: function(playlist) {
			if (loaded) {
				return;
			}
			// append the table head
			$('#table').append('<tr><th>Title</th><th>Genre</th><th>Director</th><th>Cast</th><th>Short description</th><th>IMDB-rating</th></tr>')
			$(playlist).find('movie').each(function(){
				var genre = [];
				var cast = [];
				$(this).find('genre').each(function(i, v){
					genre.push($(v).text());
				});
				$(this).find('cast').find('person').each(function(i, v){
					cast.push($(v).attr('name') + "---" + $(v).attr('role'));
				});
				var data = {
					Title : $(this).find('title').text(),
					// get the data separated by comma
					Genre : genre.join(", "), 
					Director : $(this).find('director').text(),
					Cast : cast.join(", "),
					Description : $(this).find('synopsis').text(),
					Rating : $(this).find('score').text()
				};		        		

				var row = $('<tr />');
				// get all data into one row
				for (var name in data) {
					row.append($('<td>' + data[name] + '</td>'));									
				}
				$('#table').append(row);
			});
			loaded = true;
		},
		error: function() { alert("error loading file");  }
	});
}


