<?php


# docker run --rm -it -v "$(pwd)/php_oracle.php":/tmp/php_oracle.php -v "$(pwd)/docker-php-ext-xdebug.ini":/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini --add-host=host.docker.internal:host-gateway -e NLS_LANG=AMERICAN_AMERICA.AL32UTF8 paliari/apache-php8-oci8:1.3.0-dev-xdebug sh -c "php /tmp/php_oracle.php"

  // mb_internal_encoding("UTF-8");

  $login = "arm";
  $pass = "arm153";
  $db = "172.17.33.33:1521/ee.oracle.docker";
  $conn = oci_connect($login, $pass, $db);

  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  echo "Connected to Oracle\n";


  $stmt = oci_parse($conn, "select payerId, cShortName from tblPayer where rownum < 2");
  oci_execute($stmt);
  $row = oci_fetch_assoc($stmt);
  print_r($row);


  oci_close($conn);

?>
