<?
session_start();

unset($_SESSION["ss_session_gen"]);

unset($_SESSION["ss_admin_userid"]);
unset($_SESSION["ss_id_user"]);
unset($_SESSION["ss_user_username"]);
unset($_SESSION["ss_user_password"]);
unset($_SESSION["ss_user_checked"]);




/*
unset($_SESSION["ss_orderid"]);
unset($_SESSION["ss_shoppingcart_id"]);
*/

session_destroy();
header("Location:../backoffice/login.php?report=logout")



?>