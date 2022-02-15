<?php
if (isset($_SESSION['previous'])) {
    if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        session_unset();
    }
}
?>