<?php
//$_SERVER is a PHP superglobal that provides 
// server and execution environment information. 
// It contains an associative array of headers, paths, and script locations.
echo $_SERVER["PHP_SELF"];//	Current script name	/index.php
echo $_SERVER["REQUEST_METHOD"];//	HTTP request method	GET, POST
echo $_SERVER["REQUEST_URI"];//	Full URL after domain	/about.php?id=5
echo $_SERVER["QUERY_STRING"];//	Query parameters	id=5&name=John
echo $_SERVER["HTTP_HOST"];//	Hostname of the request	example.com
echo $_SERVER["HTTP_USER_AGENT"];//	Browser and OS details	Mozilla/5.0
echo $_SERVER["REMOTE_ADDR"];//	Client's IP address	192.168.1.100
echo $_SERVER["SCRIPT_NAME"];//	Current script file	/folder/page.php
echo $_SERVER["SERVER_NAME"];//	Server’s hostname	localhost
echo $_SERVER["SERVER_PORT"];//	Server's port number	80 or 443
echo $_SERVER["HTTP_REFERER"];//	Previous page URL (if available)	https://google.com
echo $_SERVER["HTTPS"];//	Checks if HTTPS is enabled	on or null
echo $_SERVER["DOCUMENT_ROOT"];//	Root directory of the website	/var/www/html/

echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];//Useful for creating dynamic links.
// Output: example.com/about.php?id=5

//If using a proxy, the real IP might be in HTTP_X_FORWARDED_FOR:
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"] ?? $_SERVER["REMOTE_ADDR"];

//Redirecting Users (HTTP_REFERER)
if (isset($_SERVER["HTTP_REFERER"])) {
    echo "Came from: " . $_SERVER["HTTP_REFERER"];
}

//Checking If HTTPS is Enabled
if (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off") {
    echo "Secure connection (HTTPS)";
} else {
    echo "Not secure (HTTP)";
}
