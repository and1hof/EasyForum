<?php
// prepare config file
$config = "config.php";
$fh     = fopen($config, 'w') or die("ERROR: config.php does not exist.");
// grab form data
$mysqlUsername  = $_POST['mysqlUsername'];
$mysqlPassword  = $_POST['mysqlPassword'];
$mysqlHost = $_POST['mysqlHost'];
$adminUsername  = $_POST['adminUsername'];
$adminPassword  = $_POST['adminPassword'];
$adminPassword2 = $_POST['adminPassword2'];
$adminEmail = $_POST['adminEmail'];
$forumName      = $_POST['forumName'];
$database = new mysqli($mysqlHost,$mysqlUsername,$mysqlPassword, 'dejarc');
if ($database->connect_errno) {
    echo "Failed to connect to MySQL";
	exit;
}
$isConfigured   = "true"; // don't let non-admin use this installer from now on.

// check to make sure mysql data has been added.
if (strlen($mysqlUsername) == 0 || strlen($mysqlPassword) == 0 
    || strlen($adminUsername) == 0 || strlen($adminPassword) == 0 
    || strlen($adminPassword2) == 0 || strlen($forumName) == 0) {
	echo "ERROR: One or more configuration fields where not filled in!";
	die;
}
// check to ensure admin password is legit.
if ($adminPassword != $adminPassword2) {
	echo "ERROR: Admin passwords to not match.";
	die;
}
if (mysqli_connect_errno()) {
echo 'Error: Could not connect to database. Please try again later.';
exit;
}
$database->query("CREATE TABLE Moderator(
	moderatorId INT,
	PRIMARY KEY(moderatorId))");
$stmt = "INSERT INTO Moderator VALUES(1)";
if(!$database->query($stmt)) {
	echo "wasn't able to connect to the database";
	exit;
} 
$database->query("CREATE TABLE Thread(
	dateCreated DATE NOT NULL,
	likes INT NOT NULL,
	threadId INT,
	title VARCHAR(45) NOT NULL,
	moderatorId INT REFERENCES Moderator(moderatorId),
	PRIMARY KEY(threadId)
)");
$database->query("CREATE TABLE User (
	userId INT AUTO_INCREMENT,
	username VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	email VARCHAR(30) NOT NULL,
	avatar VARCHAR(100),
	description VARCHAR(100),
	administrator BOOLEAN NOT NULL,
	moderator BOOLEAN NOT NULL,
	PRIMARY KEY(userId)
)");
$cmd = "INSERT INTO User
    	VALUES(0 , '".$adminUsername."', '".$adminPassword."', '".$adminEmail."','empty','empty', 1, 1)"; 
if(!$database->query($cmd)) {
	echo "wasn't able to connect to the database";
	exit;
} 
$database->query("CREATE TABLE threadComment(
	commentId INT,
	content VARCHAR(200) NOT NULL,
	title VARCHAR(45) NOT NULL,
	threadId INT REFERENCES Thread(threadId),
	userId INT REFERENCES User(userId),
	postDate DATE NOT NULL,
	PRIMARY KEY(commentId)
)");
$database->query("CREATE TABLE message(
	messageId INT,
	content VARCHAR(60),
	fromUserId INT REFERENCES User(userId),
	toUserId INT REFERENCES User(userId),
	PRIMARY KEY(messageId)
)");	

// now write config file
$label1 = "forumName";
$label2 = "isConfigured";
$label3 = "mysqlUsername";
$label4 = "mysqlPassword";

$var_str1 = var_export($forumName, true);
$var_str2 = var_export($isConfigured, true);
$var_str3 = var_export($mysqlUsername, true);
$var_str4 = var_export($mysqlPassword, true);

$configData = "
<?php\n\n
$$label1 = $var_str1;\n\n
$$label2 = $var_str2;\n\n
$$label3 = $var_str3;\n\n
$$label4 = $var_str4;\n\n
?>";

fwrite($fh, $configData);
fclose($fh);

// success message to user.
//echo "config.php successfully configured, and MySQL database has been populated.";
?>
<meta http-equiv="refresh" content="0; url=feed.php" />

