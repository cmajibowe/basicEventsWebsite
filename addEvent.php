<?php
  session_start();

  include "includes/config.php";
  include "includes/dbconnect.php";
  db_connect();
  // Connects to the database

  // Variiable initialisation
  $errorMsg = "";
  $eventValid = false;

  // Checks to see if the form has been submitted
  if(isset($_GET['addSubmit'])) {
    
    // Collecting the variables from the form
    $title = $_GET['title'];
    $strDate = $_GET['strDate'];
    $endDate = $_GET['endDate'];
    $category = $_GET['category'];
    $venue = $_GET['venue'];
    $desc = $_GET['desc'];
    $price = $_GET['price'];

    // Executing the SQL statement
    $sql_statement = "
    SELECT eventTitle 
    FROM AE_events 
    WHERE eventTitle = '$title'";

    $users = $db_link->query($sql_statement) or die($db_link->error);
    $user_row = $users->fetch_assoc();
    
    // Slight validation then adds the record
    if($title == '') 
    {
      $errorMsg = "No title entered.";
    } // Checks to see if a title was entered
    else 
    {
      $sql_statement = "
      INSERT INTO AE_events (eventTitle, eventDescription, venueID, catID, eventStartDate, eventEndDate, eventPrice) 
      VALUE ('$title', '$desc', '$venue', '$category', '$strDate', '$endDate', '$price')";

      $users = $db_link->query($sql_statement) or die($db_link->error);

      $eventValid = true;
    }
      
  } // End of if statement

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

    <!-- Section for displaying the entered data -->
    <section class="addEventPanel">

    <?php
      if($eventValid == true)
      {
    ?>

      <h2 class="addEventTitle">Event Added</h2>

        <div>
          <p>Event Title: <?php echo $title ?></p>
        </div>

        <div>
          <p>Start Date: <?php echo $strDate ?></p>
        </div>

        <div>
          <p>End Date: <?php echo $endDate ?></p>
        </div>

        <div>
          <p>Category: <?php echo $category ?></p>
        </div>

        <div>
          <p>Venue: <?php echo $venue ?></p>
        </div>

        <div>
          <p>Price: <?php echo $price ?></p>
        </div>

        <div>
          <p>Description: <?php echo $desc ?></p>
        </div>

        <?php

          $sql_statement = "
          SELECT catDesc 
          FROM AE_category
          WHERE catID = '$category'";

          $events = $db_link->query($sql_statement) or die($db_link->error);
          $event_row = $events->fetch_assoc();

          $imgTitle = $event_row['catDesc'];

        ?>

        <div>
          <img src="<?php echo ('img/' . $imgTitle . '.png'); ?>" />
        </div>
        
        <div class="eventButtons">
          <a href="/viewEvents.php"><button type="submit" name="confirmEvent" class="button">View Events</button></a>
        </div> <!--Submit Row Div End-->

    <?php
      }
      else
      {
    ?>
    <!-- Area to enter the new events details -->

      <h2 class="addEventTitle">Add Event</h2>

      <form method="get" action="addEvent.php">

      <?php echo $errorMsg; ?>

        <div class="formDiv">
          <label class="formLabel">Event Title</label>
          <input class="formInput" name="title" required/>
        </div>

        <div class="formDiv">
          <label class="formLabel">Start Date</label>
          <input class="formInput" type="date" name="strDate" required/>
        </div>

        <div class="formDiv">
          <label class="formLabel">End Date</label>
          <input class="formInput" type="date" name="endDate" required/>
        </div>

        <div class="formDiv">
          <label class="formLabel">Price</label>
          <input class="formInput" name="price" required/>
        </div>

        <div class="formDiv">
          <label class="formLabel">Category</label>
          <select class="formInput" name="category" required>

            <?php
              for ($i=1; $i < 10; $i++) 
              { 

                $x = ("c" . $i);

                $sql_statement = "
                SELECT catID, catDesc 
                FROM AE_category
                WHERE catID = '$x'";

                $events = $db_link->query($sql_statement) or die($db_link->error);
                $event_row = $events->fetch_assoc();

                $catID = $event_row['catID'];
                $catDesc = $event_row['catDesc'];


                ?>

                <option value="<?php echo $catID; ?>"><?php echo $catDesc; ?></option>

                <?php
              }
            ?>

          </select>
        </div>

        <div class="formDiv">
          <label class="formLabel">Venue</label>
          <select class="formInput" name="venue" required>

            <?php
              for ($i=1; $i < 12; $i++) 
              { 

                $x = ("v" . $i);

                $sql_statement = "
                SELECT venueID, venueName 
                FROM AE_venue
                WHERE venueID = '$x'";

                $events = $db_link->query($sql_statement) or die($db_link->error);
                $event_row = $events->fetch_assoc();

                $venID = $event_row['venueID'];
                $venDesc = $event_row['venueName'];

                ?>

                <option value="<?php echo $venID; ?>"><?php echo $venDesc; ?></option>

                <?php
              }
            ?>

          </select>
        </div>

        <div class="formDiv">
          <label class="formLabel">Description</label>
          <textarea class="formInput" name="desc" id="detailsize" cols="60" rows="7" maxlength="500" required></textarea>
        </div>

        <div class="formDiv">
          <input type="submit" class="button" name="addSubmit" value="Add Event">
        </div> <!--Submit Row Div End-->
      </form>

      <?php
        }
      ?>
    </section>

    <footer>
      <!-- Arrow allows user to instantly return to the top of the screen -->
      <a href="#top"><img src="img/arrowTop.png" alt="Up Arrow" /></a>
      <a href="#top"><p>Back to top</p></a>
    </footer>

  </body>

</html>