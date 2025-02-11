<?php
    function thumb ($file) {
        $path = "src/img/photos/$file";

        if(is_null($file) || !file_exists($path)) {
            return "src/img/photos/unavailable.png";
        }
        else {
            return $path;
        }
    }

    function back() {
        return "<a href='index.php'><i class='material-icons'>arrow_back</i></a>";
    }

    function msg_success($msg) {
        $response = "<div class='success'><i class='material-icons'>check_circle</i> $msg</div>";
        return $response;        
    }

    function msg_warning($msg) {
        $response = "<div class='warning'><i class='material-icons'>info</i> $msg</div>";
        return $response;
    }
    
    function msg_error($msg) {
        $response = "<div class='error'><i class='material-icons'>error</i> $msg</div>";
        return $response;
    }
?>