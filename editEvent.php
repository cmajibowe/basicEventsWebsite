<?php
  
  include "includes/config.php";
  include "includes/dbconnect.php";
  db_connect();
  // Database connections
  
  $eventID = $_GET['id'];
  // Gets the event to be edited's ID

  if(isset($_GET['editSubmit'])) {
    // Checks the form was entered

    $ntitle = $_GET['ntitle'];
    $nstrDate = $_GET['nstrDate'];
    $nendDate = $_GET['nendDate'];
    $nprice = $_GET['nprice'];
    $ncategory = $_GET['ncategory'];
    $nvenue = $_GET['nvenue'];
    $ndesc = $_GET['ndesc'];
    // Variable initalisation
    echo $ncategory;
    
    $edits = array(1 => $ntitle, 2 => $nstrDate, 3 => $nendDate, 4 => $nprice, 5 => $ncategory, 6 => $nvenue, 7=> $ndesc); 
    $col = array(1 =>"eventTitle", 2 =>"eventStartDate", 3 =>"eventEndDate", 4 =>"eventPrice", 5 =>"catID", 6 =>"venueID", 7 =>"eventDescription");
    // Puts all variables into an array and then puts all field names into an array

    foreach ($edits as $index => $value1) {
      $value2 = $col[$index];
        if(isset($value1) && $value1 != '') {
        $sql_statement = "UPDATE AE_events SET $value2 = '$value1' WHERE eventID = '$eventID'";  
        $users = $db_link->query($sql_statement) or die($db_link->error);
        // This then loops around the arrays assigning each value to a corresponding field name untill all values are added
      }
    }
  }

  // Gathers all the information on the event so the user can see what they are editing
  $sql_statement = "SELECT eventTitle, eventDescription, eventStartDate, eventEndDate, eventPrice, catID, venueID FROM AE_events WHERE eventID = '$eventID'";
  $users = $db_link->query($sql_statement) or die($db_link->error);
  $user_row = $users->fetch_assoc();

  // Stores the events information
  $title = $user_row['eventTitle'];
  $desc = $user_row['eventDescription'];
  $strDate = $user_row['eventStartDate'];
  $endDate = $user_row['eventEndDate'];
  $price = $user_row['eventPrice'];
  $category = $user_row['catID'];
  $venue = $user_row['venueID'];

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

      <div>
        <form action="editEvent.php" method="GET">

          <div>
            <label>Title
              <input type="text" placeholder="<?php echo $title; ?>" name="ntitle" />
            </label>
          </div>

          <div>
            <label>Start Date
              <input type="date" placeholder="<?php echo $strDate; ?>" name="nstrDate" />
            </label>
          </div>

          <div>
            <label>End Date
              <input type="date" placeholder="<?php echo $endDate; ?>" name="nendDate" />
            </label>
          </div>

          <div>
            <label>Price
              <input type="text" placeholder="<?php echo $price; ?>" name="nprice" />
            </label>
          </div>

          <div>
            <label class="formLabel">Category
              <select class="formInput"  name="ncategory" required>

              <!-- PHP to dynamically find the categories -->
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

                    <option <?php if($category == $catID) { echo "selected='selected'"; } ?> value="<?php echo $catID; ?>"><?php echo $catDesc; ?></option>

                    <?php
                  }
                ?>

              </select>
            </label>
          </div>

          <div>
            <label class="formLabel">Venue
              <select class="formInput" name="nvenue" required>

              <!-- Php to dynamically find the venue names -->
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

                    <option <?php if($venue == $venID) { echo "selected='selected'"; } ?> value="<?php echo $venID; ?>"><?php echo $venDesc; ?></option>

                  <?php
                    }
                  ?>

                </select>
              </label>
            </div>

          <div>
            <label>Description
              <textarea class="formInput" placeholder="<?php echo $desc; ?>" name="ndesc" cols="60" rows="7"></textarea>
            </label>
          </div>

          <div>
            <input name="id" type="hidden" value="<?php echo $eventID ?>" />
            <input type="submit" class="button" name="editSubmit" value="Update">
          </div> <!--Submit Row Div End-->

        </form>
      </div>

    </section>

    <footer>
      <!-- Arrow allows user to instantly return to the top of the screen -->
      <a href="#top"><img src="img/arrowTop.png" alt="Up Arrow" /></a>
      <a href="#top"><p>Back to top</p></a>
    </footer>

  </body>

</html>