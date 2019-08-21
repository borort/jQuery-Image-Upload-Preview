$(function() {

      // on the submit event, generate a image from the canvas and save the data in the hidden field
     document.getElementById('form').addEventListener("submit",function(){
        var img_array = [];
        var i = 0;
        $(".thumb-image").each(function(i) {
           imgsrc = this.src;
           img_array.push('"'+imgsrc+'"');
           i+=1;
        });
        document.getElementById('base64').value = '['+img_array+']';
     },false);

     // preventing page from redirecting
     $("html").on("dragover", function(e) {
         e.preventDefault();
         e.stopPropagation();
         $("#uploadfile").css("background-color", "#fff");
     });

     // Drag over
     $('.upload-area').on('dragover', function (e) {
         e.stopPropagation();
         e.preventDefault();
         $("#uploadfile").css("background-color", "#eee");
     });

     // Open file selector on div click
     $("#uploadfile").click(function(){
         $("#file-input").click();
     });

     // Drop files
     $('.upload-area').on('drop', function (e) {
         e.stopPropagation();
         e.preventDefault();
         e.dataTransfer = e.originalEvent.dataTransfer;

         $("#uploadfile").css("background-color", "#fff");
         document.querySelector('#file-input').files = e.originalEvent.dataTransfer.files;
         $('#file-input').trigger('change');
     });


     $('#file-input').on('change', function() {
       previewImages();
     });


});

function previewImages() {

    var preview = document.querySelector('#preview');
    if (document.querySelector('#file-input').files) {
      [].forEach.call(document.querySelector('#file-input').files, readAndPreview);
    }

    function readAndPreview(file) {

      // Make sure `file.name` matches our extensions criteria
      if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
        return alert(file.name + " is not an image");
      } // else...

      var reader = new FileReader();
      reader.addEventListener("load", function() {
          /*var image = new Image();
          image.height = 100;
          image.title  = file.name;
          image.src    = this.result;
          image.className  = "thumbnail thumb-image";
          */
          //preview.appendChild(image);

          //var image = '<div><img src="'+this.result+'" class="thumbnail thumb-image"><br><a href="#">Delete</a></div>';
          var image = $("<div style='display:inline-block; margin-right: 1em; position:relative;'><img src='"+this.result+"' style='height: 200px; width:200px; object-fit: cover; object-position: center; ' class='img-thumbnail thumb-image'><a href='#' style='position: absolute; top: 10px; right: 10px' class='btn btn-danger btn-sm btn-delete'>x</a><br><br></div>");

          $('#preview').append(image);
          $('.btn-delete').click(function(){
            $(this).parent('div').remove();
          });
      });

      reader.readAsDataURL(file);

    }

}
