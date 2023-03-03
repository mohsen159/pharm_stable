
<?php

/* set this information in database logout  */

session_start();
session_unset();
session_destroy();
header("Location: /login.php");
//echo '<html>  <body>  <script>  window.history.back() </script>  </body>  </html>';
exit();



?>