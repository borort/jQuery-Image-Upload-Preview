<!DOCTYPE html>
<html lang="en">
<head>
  <title>jQuery Image Upload Preview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="style.css?v=<?=md5_file('style.css')?>" rel="stylesheet" type="text/css">
  <script src="script.js?v=<?=md5_file('script.js')?>" type="text/javascript"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <br><br>
          <h2> jQuery Image Upload Preview </h2>
          <hr>
          <form method="post" action="upload.php" name="form" id="form">
            <div id="preview" style="display: inline-block;">
              <div class="upload-area" id="uploadfile">
                  <span style="vertical-align: middle;">Drag and Drop image here<br/>Or<br/>Click to select image<br/>+</span>
                  <br>
              </div>
            </div>
            <input style="display:none;" class="form-control" name="file-input" id="file-input" type="file" multiple>
            <input type="hidden" class="form-control" name="base64" id="base64">
            <hr>
            <button class="btn btn-primary" type="submit">Upload</button>
          </form>
      </div>
    </div>
</div>
</body>
</html>
