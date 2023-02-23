<?php
require_once('lib/session.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
require_once('templates/header.php');



require_once('lib/jeuxData.php');
require_once('lib/tools.php');





var_dump($_SESSION)

?>


<?php
require('templates/footer.php');
?>