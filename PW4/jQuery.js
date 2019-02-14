$(document).load(function () {
	 	function loadData() {

		$.ajax({

			 url: "movies.xml",
			 dataType: "xml",
			 success: function(playlist) {
			    alert("file is loaded");
			        $(playlist).find('movie').each(function(){

						var title = $(this).find('title').text();
						var genre = $(this).find('genre').text();
						var director = $(this).find('director').text();
						var cast = $(this).find('cast').text();
						var description = $(this).find('synopsis').text();
						var rating = $(this).find('score').text();

						var info = '<li>Title: ' + title +
						', Genre: ' + genre + 
						', Director: ' + director + 
						', Cast: ' + cast +
						', Description: ' + description +
						', Rating: ' + rating +
						'</li>';
							$("ul").append(info);
					});
			 	},
			 error: function() { alert("error loading file");  }
	     });
	}
});


