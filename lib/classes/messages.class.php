<?

class message{


        public static function error($text){

            echo '<div class="error"><b>'.$text.'</b></div>';

        }

        public static function warning($text){

            echo '<div class="warning"><b>'.$text.'</b></div>';

        }

        public static function success($text){

            echo '<div class="success"><b>'.$text.'</b></div>';

        }
        
        public static function info($text){

            echo '<div class="info"><b>'.$text.'</b></div>';

        }


}

?>
