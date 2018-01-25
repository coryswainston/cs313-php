<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Form Team Activity</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="handler.php" method="post">
      <input type="text" name="name" placeholder="Name"></br>
      <input type="email" name="email" placeholder="Email"></br>
      <label>Major</label></br>
      <?php $majors = array('Computer Science', 'Web Design and Development',
                            'Computer Information Technology', 'Computer Engineering');
            foreach($majors as $major)
            {
              echo "<input type=\"radio\" name=\"major\" value=\"$major\">";
              echo "<label>$major</label></br>";
            }
      ?>
      <label>Comments</label></br>
      <textarea name="comments" rows="8" cols="80"></textarea>
      <?php $continents = array('North America', 'South America', 'Europe', 'Asia',
                            'Australia', 'Africa', 'Antarctica');
            foreach($continents as $continent)
            {
              echo "<input type=\"checkbox\" name=\"continents[]\" value=\"$continent\">";
              echo "<label>$continent</label></br>";
            }
      ?>
      <button type="submit" name="submit">Submit</button>
    </form>
  </body>
</html>
