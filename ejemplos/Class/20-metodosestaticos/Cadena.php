<?php
class Cadena {
    public static function largo($cad) {
        return strlen($cad);
    }

    public static function mayusculas($cad) {
        return strtoupper($cad);
    }

    public static function minusculas($cad) {
        return strtolower($cad);
    }
}
?>