


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Javascript ID3 Reader</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <script src="dist/id3-minimized.js" type="text/javascript"></script>

  <!-- Can be handy for debugging -->
  <!--script src="../src/id3-debug.js" type="text/javascript"></script-->

</head>

<body>
  <div>
    <input type="file" id="file" onchange="loadFile(this)">
    <p><b>Title:</b> <span id="title"></span></p>
    <p><b>Artist:</b> <span id="artist"></span></p>
    <p><b>Album:</b> <span id="album"></span></p>
    <img id="picture" src="" alt= "picture extracted from ID3" />
  </div>

  <script>
    /**
     * Loading the tags using XHR.
     */
    //sample.mp3 sits on your domain
    ID3.loadTags("sample.mp3", function() {
      showTags("sample.mp3");
    }, {
      tags: ["title","artist","album","picture"]
    });

    /**
     * Loading the tags using the FileAPI.
     */
    function loadFile(input) {
      var file = input.files[0],
        url = file.urn || file.name;

      ID3.loadTags(url, function() {
        showTags(url);
      }, {
        tags: ["title","artist","album","picture"],
        dataReader: ID3.FileAPIReader(file)
      });
    }

    /**
     * Generic function to get the tags after they have been loaded.
     */
    function showTags(url) {
      var tags = ID3.getAllTags(url);
      console.log(tags);
      document.getElementById('title').textContent = tags.title || "";
      document.getElementById('artist').textContent = tags.artist || "";
      document.getElementById('album').textContent = tags.album || "";
      var image = tags.picture;
      if (image) {
        var base64String = "";
        for (var i = 0; i < image.data.length; i++) {
            base64String += String.fromCharCode(image.data[i]);
        }
        var base64 = "data:" + image.format + ";base64," +
                window.btoa(base64String);
        document.getElementById('picture').setAttribute('src',base64);
      } else {
        document.getElementById('picture').style.display = "none";
      }
    }
  </script>
</body>
</html>
