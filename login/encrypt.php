<?php
function encryption($string){
    $encryptedString = openssl_encrypt($string, "AES-128-CTR","pmat", 1,'230200204046');
    return $encryptedString;
}
function decryption($string){
    $decryptedString= openssl_decrypt($string, "AES-128-CTR","pmat", 1,'230200204046');
    return $decryptedString;
}
?>