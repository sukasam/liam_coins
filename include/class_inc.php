<?php
    class Token {
        public static function generate(){
            return $_SESSION['_token'] = base64_encode(openssl_random_pseudo_bytes(32));
        }
        public static function check($token){
            if(isset($_SESSION['_token']) && $token === $_SESSION['_token']){
                unset($_SESSION['_token']);
                return true;
            }
            return false;
        }
    }
?>