<?php

   class document{

        var $url;
        
        public static function  redirect($url){

            echo "<script>document.location.href='$url'</script>";

        }

        public static function alert($text){

            echo "<script>alert('$text')</script>";

        }


   }

?>
