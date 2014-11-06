<?php

class KK {

    static public function teste_alex() {
        return "ALEX";
    }

    static public function _($key) {
        $full_key = "messages.{$key}";
        return trans($full_key);
    }

}
