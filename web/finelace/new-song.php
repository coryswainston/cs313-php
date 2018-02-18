<?php
require 'modules/header.php';
 ?>
 <main>
   <form action="database/add-song.php" method="post" enctype="multipart/form-data">
     <input type="text" name="song_title" placeholder="Song Title"><br>
     <input type="text" name="song_artist" placeholder="Artist"><br>
     <input type="file" name="fileToUpload" id="fileToUpload"><br>
     <input type="submit" class="admin-button" value="Upload Song" name="submit">
   </form>
 </main>
<?php require 'modules/footer.php'; ?>
