--popuploginprac is the popup overlay register file it will take email,user,password 
and validate each parameter (email is still WIP) user and email will be verified unique
and password and confirm will be verified to match the program then goes to...
 
--USA2SA_registerlogin which registers the user in the database then sends an 
email(this is currently commented out as verify is WIP) the link in the email will 
go to...

--verify.php which will verify the hash in the email matches the database entry and 
set the user to be verified

After all WIP is complete I will implement the popup register on you're pages and then
move on to popup login which is not nearly as time consuming because of no AJAX.

**One thing we will have to change to save the state of the username login is make
every page a php page that echoes the html if you want an example for clarity look at
the popuploginprac.php.