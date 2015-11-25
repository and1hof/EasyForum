<?php
// prepare config file
$config = "config.php";
$fh     = fopen($config, 'w') or die("ERROR: config.php does not exist.");
// grab form data
$mysqlUsername  = $_POST['mysqlUsername'];
$mysqlPassword  = $_POST['mysqlPassword'];
$adminUsername  = $_POST['adminUsername'];
$adminPassword  = $_POST['adminPassword'];
$adminPassword2 = $_POST['adminPassword2'];
$forumName      = $_POST['forumName'];
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
echo "config.php successfully configured, and MySQL database has been populated.";


