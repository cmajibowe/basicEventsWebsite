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

    <!-- Admin links area -->
    <section class="adminPanel">

      <h3 class="eventCell">Select an option</h3>

      <div class="buttonContainer">
        <a href="/addEvent.php"><button accesskey="i" class="button">Add Event</button></a>
        <a href="/editEventAll.php"><button accesskey="o" class="button">Edit Event</button></a>
      </div>

    </section>

    <footer>
      <!-- Arrow allows user to instantly return to the top of the screen -->
      <a href="#top"><img src="img/arrowTop.png" alt="Up Arrow" /></a>
      <a href="#top"><p>Back to top</p></a>
    </footer>

  </body>

</html>