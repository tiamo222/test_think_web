<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	
	

//////////////// check data
function valid_email($email) { 
  // First, we check that there's one @ symbol, and that the lengths are right 
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) { 
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols. 
	 return $check_email = 1 ; 
   /// return false; 
  } 
  // Split it into sections to make life easier 
  $email_array = explode("@", $email); 
  $local_array = explode(".", $email_array[0]); 
  for ($i = 0; $i < sizeof($local_array); $i++) { 
     if (!ereg("^(([A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) { 
   ///   return false; 
	   return $check_email = 1 ; 
    } 
  }   
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name 
    $domain_array = explode(".", $email_array[1]); 
    if (sizeof($domain_array) < 2) { 
      ///  return false; // Not enough parts to domain 
		 return $check_email = 1 ; 
    } 
    for ($i = 0; $i < sizeof($domain_array); $i++) { 
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) { 
      ///  return false; 
	   return $check_email = 1 ; 
      } 
    } 
  } 
 ///  return true; 
   return $check_email = 0 ; 
} 



function function_random_password() {
    $chars = "abcdefghijkmnpqrstuvwxyz23456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;

}


?>