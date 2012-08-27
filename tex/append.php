// push all data to the browser
ob_flush();
flush();

// Connect to the database
$db = mysql_connect('db.hostnet.nl','username','password'); 
mysql_select_db('deadfiles',$db);

// Collect the included files and put them into a string for SQL
$files = implode('\',\'',get_included_files());

// Create the SQL and execute
$query = "UPDATE aurora SET count = count + 1, first_hit = if( first_hit IS NULL, NOW(), first_hit)  WHERE file IN ('$files')";
mysql_query($query,$db);
mysql_close($db);