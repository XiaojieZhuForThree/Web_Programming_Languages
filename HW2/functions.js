$(document).ready(function() {
  // use the ajax call to import the images to the page
  $.ajax({
    type: 'GET', 
    url: 'js/data.json', 
    dataType: 'json',
    success: function(data){
      $.each(data, function(index, obj){
        // add each img to the gallery class
        $('.gallery').before($('<img />', {
                // the source is in the square
                src: 'images/square/'+obj.path,
                alt: obj.title
          }));
        // the function for mouseenter
        $("img").mouseenter(function(){
            // set the img to gray
            $(this).addClass("gray"); 
            // use jquery call to generate a new div preview
            var div = $('<div/>',{id: 'preview'});  
            // generate a image file from the medium
            var fig = $('<img/>', { id: 'figure',
              src: 'images/medium/'+ obj.path,
              position: "absolute"
            });
            // add the image to the preview
            $(div).append(fig);
            // then add the caption
            $(div).append("<p>" + obj.title + '<br>' + "<i>" + obj.city + ", "+ obj.country + " [" + obj.taken + "]</i>" + "</p>");
            // append the preview to body
            $("body").append(div);
            $("#preview").show(); 
          });

        $("img").mousemove(function(e) {
            // when mouse moves, caliber the offsets
            $('#preview').offset({top:e.pageY + 20, left:e.pageX + 30});
          });
        // when mouse leave, remove the gray class and the preview div
        $("img").mouseleave(function(){
            $(this).removeClass("gray");
            $("#preview").remove();
          }); 

        });
    }
  });
});