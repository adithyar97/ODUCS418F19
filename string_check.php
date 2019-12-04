<?php
$needle = "Washington";
$haystack = "0 WASHINGTON PL NA";
if (stripos($haystack, $needle) !== True){
    echo "Not found!";
}
else{
    echo "Found";
}
?>