<?php
  include "includes/config.php";
  include "includes/dbconnect.php";
  db_connect();
  // DB connection

  // SQL gets the number of records
  $sql_statement = "SELECT eventID FROM AE_events ORDER BY eventID DESC LIMIT 1";
  $events = $db_link->query($sql_statement) or die($db_link->error);
  $event_row = $events->fetch_assoc();

  // Variable initalisation
  $id = $event_row['eventID'];
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
        <a href="#" accesskey="2">View Events</a>
        <a href="/admin.php" accesskey="3">Admin</a>
        <a href="/credits.html" accesskey="4">Credits</a>
        <a href="wireframe.pdf" accesskey="5" target="_blank">Wireframe</a>
      </nav>

    </div>

    <!-- Section holds the events list -->
    <section class="viewEventsSection">

      <h3 class="eventCell">View Events</h3>

      <?php
        // SQL to fetch the events
        $sql_statement = "
        SELECT eventTitle, eventDescription, eventStartDate, eventEndDate, eventPrice, catDesc, venueName 
        FROM AE_events 
        JOIN AE_category ON AE_events.catID = AE_category.catID
        JOIN AE_venue on AE_events.venueID = AE_venue.venueID
        ORDER BY eventTitle ASC";

        $users = $db_link->query($sql_statement) or die($db_link->error); 
      ?>

      <div class="editAll">
        <table >
          <tr>
            <td><u>Title</u></td>
            <td><u>Description</u></td>
            <td><u>Start Date</u></td>
            <td><u>End Date</u></td>
            <td><u>Price</u></td>
            <td><u>Category</u></td>
            <td><u>Venue</u></td>
          </tr>

        <?php
          while($user_row = $users->fetch_assoc()) {
        ?>

          <tr>
            <!-- Displays the relevent information on the events -->
            <td><?php echo $user_row['eventTitle']; ?></td>
            <td><?php echo $user_row['eventDescription']; ?></td>
            <td><?php echo $user_row['eventStartDate']; ?></td>
            <td><?php echo $user_row['eventEndDate']; ?></td>
            <td><?php echo $user_row['eventPrice']; ?></td>
            <td><?php echo $user_row['catDesc']; ?></td>
            <td><?php echo $user_row['venueName']; ?></td>
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