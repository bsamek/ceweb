<?php

// declare a simple class loader; it will fail if it cannot find
// the classes in the expected location.
function classloader($className) {
    $pathToClass = dirname(__FILE__) . "/classes/" . $className . ".php";
    require($pathToClass);
}

// register the classloader
spl_autoload_register('classloader');

// define the LDAP server and OU
$ldapserver = "ldaps://ldap.simmons.edu/";
$baseou= "ou=People,dc=simmons,dc=edu";

// get list of authorized users
if(file_exists('authorized.php'))
	require('authorized.php');
elseif(file_exists('../authorized.php'))
	require('../authorized.php');
else echo 'Unable to find authorized.php';

// construct the authorization and authentication mechanisms
$authenticator = new LDAPAuthenticationStrategy($ldapserver, $baseou);
$authorizer = new FixedAuthorizationStrategy($authorized);

?>
