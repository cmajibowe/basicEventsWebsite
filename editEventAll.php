<?php
  
  include "includes/config.php";
  include "includes/dbconnect.php";
  db_connect();
  // Connects to the database

?>
<!doctype html>
<html id="top" lang="en">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="source.css">
    <title>Arts and Events</title>
  </head>

  <body>
    
    <!-- Div used to control the container, not used for styling -->
    <div class="headerNavIntroContainer">
      <!-- Any styling is done using the semantic tags -->
      <header>
        <h1>Arts and Events</h1>
      </header>

      <nav>
        <!-- Access keys using numbers for anyone that requires them -->
        <a href="/index.html" accesskey="1">Home</a>
        <a href="/viewEvents.php" accesskey="2">View Events</a>
        <a href="/admin.php" accesskey="3">Admin</a>
        <a href="/credits.html" accesskey="4">Credits</a>
        <a href="wireframe.pdf" accesskey="5" target="_blank">Wireframe</a>
      </nav>

    </div>

    <section class="editEventPanel">

      <h3 class="center">Select an event</h3>

      <?php
        // SQL to fetch the events
        $sql_statement = "SELECT eventID, eventTitle, eventDescription FROM AE_events ORDER BY eventTitle ASC";
        $users = $db_link->query($sql_statement) or die($db_link->error); 
      ?>

      <div class="editAll">
        <table >
          <tr>
            <td><u>Title</u></td>
            <td><u>Description</u></td>
            <td></td>
            <td></td>
          </tr>

        <?php
          while($user_row = $users->fetch_assoc()) {
        ?>

          <tr>
            <!-- Displays the relevent information on the events -->
            <td><?php echo $user_row['eventTitle']; ?></td>
            <td><?php echo $user_row['eventDescription']; ?></td>
            <td>
              <form action="editEvent.php" method="GET">
                <input name="id" type="hidden" value="<?php echo  $user_row['eventID'];?>" />
                <input name="edit" type="submit" value="Edit" />
              </form>
            </td>
          </tr>

        <?php 
        } ?>

        </table>
      </div>

    </section>

    <footer>
      <!-- Arrow allows user to instantly return to the top of the screen -->
      <a href="#top"><img src="img/arrowTop.png" alt="Up Arrow" /></a>
      <a href="#top"><p>Back to top</p></a>
    </footer>

  </body>

</html>