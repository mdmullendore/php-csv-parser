readme.md
-----------------


// CSV Address Import


app task description:

1) Loads a CSV with the following columns: 
   first_name
   last_name
   add_line_1
   add_line_2
   city
   state
   postal_code

2) Upon loading the data into memory, it performs any data normalization/cleanup (e.g. changes "California" to "CA" or something similar).

3) Saves the data to a database, ensuring there are no duplicates

4) Renders the database to the screen (if a compiled windows application then it can a dump to a grid object or the like).


app built using the following:

- xampp
- php5
- MySQL
- HTML5
- css
- jquery
- bootstrap
- phpmyadmin


file structure and descriptions:

1) config.ini - database configuration
2) index.php - front end dev
3) connection.php - PDO connection class
4) csv_import.php - import, test file, convert state name, & test for duplicates
5) csv_export.php - export database into html table
6) css/bootstrap.min.css - responsive css framework for front end dev
7) javascript/jquery-1.11.3.min.js - jquery javascript library
8) javascript/alert.js - javascript for timed alert message from csv_import.php
9) MOCK_DATA.csv - use for testing csv upload