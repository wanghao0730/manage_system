<?php
    function alert($str,$url){
        
        echo '<script>window.alert("'. $str .'");location.href="'. $url .'";</script>';
    }

