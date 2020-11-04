<h1>Basic Events Website</h1>
<p>This website was created back in 2017 when I started University. It's a simple website which is written using HTML, CSS, PHP and mySQL. 
The brief for the project is below and to see this website in action you can access it at <a href="basiceventswebsite.jacobbowerman.com" target="_blank">basiceventswebsite.jacobbowerman.com</a></p>

<p>Pre-task – home page
If you have previously completed part A of the assignment, you should have already made a home page. Otherwise, you will need to create a basic one now (named index.html). Keep it very simple as if you did not create the home page for assignment part A it will not be marked for this part of the assignment. It just needs to include a navigation area with 5 links: “home”, “view events”, “admin”, “credits” and “wireframe”. 

Note that if you did not create the wireframe pdf as part of assignment part A, you do NOT need to create a wireframe now - no marks will be awarded for it for this part of the assignment if you do. The wireframe link should be only a “dummy” one, i.e. link only to the home page itself. 

Task 1 pre-task - download the an sql file and set-up the required database tables
An SQL script, artsEnts.sql, has been provided on Blackboard in the Assessment section that contains the SQL statements required to create three database tables called ‘AE_category’, ‘AE_events’, and ‘AE_venue’ and to add a number of records to them in MySQL. You will need these tables and records for various tasks.

1.	Download the file artsEnts.sql from Blackboard
2.	Import it using phpMyAdmin to create the MySQL database tables referred to above.





Task 1 - view events page
On this page details of all of the events will be displayed to view. To achieve this write a PHP script. This script should:
•	Query the contents of the database records and dynamically create a web page which displays a listing of all of the events currently held in the AE_events table. Full details of each event should be shown
•	Order records on title and display the category description and venue name
•	Format and style the listing (its layout etc.) in an appropriate way using HTML and CSS. For full marks divs or a table should be used in an appropriate way. The page needs to be completely accessible and to fit aesthetically with the rest of the design
•	Produce web output that validates as HTML5 compliant and conforms to the module’s ‘house standards’ on coding style (outlined in appendix I)
•	Be commented appropriately (we expect the PHP code to be commented). 
•	Not display system type attributes to the user, they’re of no interest to the user, so make sure you don’t display any of the ids used in the SQL tables, e.g. eventID, catID and venueID. Check you don’t.

Note that any PHP code that you include MUST be written by hand and not generated by a software tool and must use the methods covered in the module.

Task 2 – ‘admin’ page
This page will provide links to pages that allow an administrator of the site to edit details of the events currently listed and to add new events to a MySQL database. 

Note that in a real system you would probably want to restrict access to an admin pages. However, you are not required to do that for this assessment.

Task 3 - add a new event page
On this page a form should be supplied to allow the administrator to enter the details of a new event. Upon submission the form should activate a PHP server-script script (program) located on your newnumyspace web server space that adds the details entered by the user in the form as a new record in a database table AE_events (note that you do not need to add anything to the other tables) and generates a custom page that will be displayed within the browser to confirm the user has entered a new event.

The form should provide appropriate components to allow the user to:
•	Enter event title, description, start date, end date, and price
•	Select an event category. It should only be possible to choose one from Carnival, Theatre, Comedy, Exhibition, Festival, Family, Music, Sport, and Dance. 
•	Select a venue. It should only be possible to choose one from Theatre Royal, BALTIC Centre for Contemporary Art, Laing Art Gallery, The Biscuit Factory, Discovery Museum, HMS Calliope, Metro Radio Arena, Mill Volvo Tyne Theatre, PLAYHOUSE Whitley Bay, Shipley Art Gallery, and Seven Stories. 
•	Submit the form

Notes
•	it has not been specified what type of form components to use for the user input. It is for you to choose the components, but your choices should be appropriate and marks will be awarded for these choices
•	For best marks the categories and venues to choose would be created dynamically from the database records using PHP




Other form features:
•	The form should contain appropriate accessibility features and guidance for users on how to fill out the form, including specifying which fields that are required, i.e. where you want the user to always enter data / make a choice (those that you don’t consider optional). Note that the guidance should indicate that at least two appropriate fields must be completed
•	The form should be styled appropriately using CSS.

Task 4 - Server-side script to process the ‘Add a new event’ page form input
Write a PHP server-side script, which processes the information sent from the ‘Add a new event’ form and adds the details entered in the form as a new record in the AE_events database table and produces a confirmation page. Note that any PHP code that you include MUST be written by hand and not generated by a software tool, must use the methods covered in the module and should be commented appropriately. 

The PHP script should:
o	Handle certain information security and validation issues – see task 6 for more details on the requirements for this
o	Insert the user input from the form created in task 3 as a new record to the AE_events table in the MySQL database
o	Produce feedback on the request to ‘add a new event’ as a confirmation page that is displayed in the browser using HTML. It should:
o	Display the event title, description, start date, end date, price, category and venue
o	Include image that is relevant to the choice of category
o	Be formatted and styled appropriately using CSS. This needs to be completely accessible and fit aesthetically with the rest of the design
o	Consist of web output that validates as HTML5 compliant and conforms to the module’s ‘house standards’ on coding style (outlined in appendix I)

Task 5 – facility to edit/update details of a record
Create a facility that allows the administrator of the site to edit details of an event currently held in the database. It should have the following components:
o	Choose an event to edit: the administrator should be able to choose an event from a list (for best marks created dynamically from the database records using PHP) of all the current events in the database. The list should be formatted in an appropriate way. For full marks divs or a table should be used rather than a select list and records should be ordered on title
o	Edit details of an event: after choosing an event to edit, the user should be able to edit the details of that event using a form and the event’s details should be amended in the MySQL database.

Ideally the form should initially display the current values for the event title, description, start date, end date, price, category and venue – with the category and venue as the default values in pre-defined lists that are dynamically generated from database content with one option for each of the categories and venues, respectively, in the database.  You should program this functionality without generating duplicate entries in the list.

Notes
o	Any PHP code that you include MUST be written by hand and not generated by a software tool, must use the methods covered in the module and should be commented appropriately
o	It is expected that any web output generated by PHP should
o	validate as HTML5 compliant and conform to the module’s ‘house standards’ on coding style (outlined in appendix I)
o	be formatted and styled appropriately using CSS. This needs to be completely accessible and fit aesthetically with the rest of the design
o	You should not display system type attributes to the user.
Task 6 - information security and validation issues
For all areas of functionality that involve the user entering /selecting data (such as the admin add a new event and edit an event), use appropriate server-side code (i.e. PHP and the methods covered in the module) to:
o	Prevent undefined index error notice messages following submission of the form
o	Prompt the user to enter data / make a choice if they do not do so for a required field
o	Escape any special characters that may have been entered by the users

Task 7 – credits page
In this page give your own name, id and email address.  Also if you have used source material from anywhere (text, graphics, or anything which is not your own work) you should acknowledge (reference) the source here with enough information for the source to be easily found (e.g. web addresses, book titles and authors, software names and publishers). If you created any of your own graphics you should also state this on your credits page. Note that the Harvard style of referencing should be used – see the Northumbria Skills Plus material provided by the library at http://nuweb.northumbria.ac.uk/library/skillsplus/topics.html?l3-1

Security considerations
The management at Arts and Events would like you to make them aware of any security considerations related to their web site for both them and their users and what steps you recommend that they could take to minimise any potential security risks. 

Add a sub-heading to your credits page called “Security considerations”. Under that heading, in no more than two paragraphs, discuss the security considerations related to the web site and what steps you recommend that they could take to minimise any potential security risks.  Within your discussion you should consider, for example, data protection and privacy, legal issues and any other relevant security matters. You should acknowledge (reference) any sources that you have read to help inform the discussion using the Harvard style of referencing.
</p>
