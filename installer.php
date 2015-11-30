<?php

/*
 * Prepare this configuration file.
 * This file will include global variables, and 
 * a boolean representing if the config has already been run or not (should only ever run once).
*/
$config = "config.php";
$fh     = fopen($config, 'w') or die("ERROR: config.php does not exist.");

/*
 * Gather data from the config form.
*/
$mysqlUsername  = $_POST['mysqlUsername'];
$mysqlPassword  = $_POST['mysqlPassword'];
$mysqlDB        = $_POST['mysqlDB'];
$mysqlPort      = $_POST['mysqlPort'];
$adminUsername  = $_POST['adminUsername'];
$adminPassword  = $_POST['adminPassword'];
$adminPassword2 = $_POST['adminPassword2'];
$adminEmail     = $_POST['adminEmail'];
$forumName      = $_POST['forumName'];

/*
 * Validate the inputs.
*/
if ($adminPassword != $adminPassword2) {
	echo "ERROR: Passwords don't match!";
	die;
} else {
	$adminPassword = sha1($adminPassword); // encrypt the password
}
/*
 * Connect to the database using the credentials provided.
*/
$servername = getenv('IP');
$username   = $mysqlUsername;
$password   = $mysqlPassword;
$database   = $mysqlDB;
$dbport     = $mysqlPort;
    
$database = new mysqli($servername, $username, $password, $database, $dbport);

if ($database->connect_error) {
    echo "ERROR: Failed to connect to MySQL";
	die;
}

/* 
 * Set up the database tables.
*/
$database->query("CREATE TABLE moderators (
	moderatorId INT,
	PRIMARY KEY(moderatorId))");
	
$database->query("CREATE TABLE threads (
	dateCreated DATE NOT NULL,
	likes INT NOT NULL,
	threadId INT,
	title VARCHAR(45) NOT NULL,
	moderatorId INT REFERENCES Moderator(moderatorId),
	PRIMARY KEY(threadId)
)");

$database->query("CREATE TABLE users (
	userId INT AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	email VARCHAR(30) NOT NULL,
	avatar VARCHAR(250) DEFAULT '/avatar.png',
	description VARCHAR(250),
	administrator BOOLEAN NOT NULL DEFAULT 0,
	moderator BOOLEAN NOT NULL DEFAULT 0,
	PRIMARY KEY(userId)
)");

$database->query("CREATE TABLE threadComments (
	commentId INT,
	content VARCHAR(200) NOT NULL,
	title VARCHAR(45) NOT NULL,
	threadId INT REFERENCES Thread(threadId),
	userId INT REFERENCES User(userId),
	postDate DATE NOT NULL,
	PRIMARY KEY(commentId)
)");

$database->query("CREATE TABLE messages (
	messageId INT,
	content VARCHAR(60),
	fromUserId INT REFERENCES User(userId),
	toUserId INT REFERENCES User(userId),
	PRIMARY KEY(messageId)
)");	

/*
 * Generate admin user using provided credentials.
*/
$cmd = "INSERT INTO users
    	VALUES(0 , '".$adminUsername."', '".$adminPassword."', '".$adminEmail."','empty','empty', 1, 0)"; 
$database->query($cmd);

/*
 * Configure config.php to reflect global data 
 * and provide confirmation that initial config was successful.
*/
$isConfigured   = "true"; 
$label1         = "forumName";
$label2         = "isConfigured";
$label3         = "mysqlUsername";
$label4         = "mysqlPassword";
$label5         = "mysqlDB";
$label6         = "mysqlPort";

$var_str1 = var_export($forumName, true);
$var_str2 = var_export($isConfigured, true);
$var_str3 = var_export($mysqlUsername, true);
$var_str4 = var_export($mysqlPassword, true);
$var_str5 = var_export($mysqlDB, true);
$var_str6 = var_export($mysqlPort, true);

$configData = "
<?php\n\n
$$label1 = $var_str1;\n\n
$$label2 = $var_str2;\n\n
$$label3 = $var_str3;\n\n
$$label4 = $var_str4;\n\n
$$label5 = $var_str5;\n\n
$$label6 = $var_str6;\n\n
?>";

fwrite($fh, $configData);
fclose($fh);

/*
 * Once successfully configured, redirect to the root URL.
*/
?>
<meta http-equiv="refresh" content="0; url=/" />

