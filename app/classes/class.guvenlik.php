<?php
/**
 * Created by DELTA ARGE.
 * User: Hapyman
 * Date: 10.03.2017
 * Time: 15:01
 */
class guvenlik {

    /**
     * @param string $mod = "sistemkapali" || "bakimmodu"
     * @param string $d = 1 or 0
     * @param string $b = 1 or 0
     * @return string|void
     */
    public static function control_this_page ($mod = '', $d = "1", $b ="0" ){
        if($d != 1 && $mod == 'sitekapali') {
            return $mod;
        }else if($b != 0 && $mod == 'bakimmodu'){
            return $mod;
        }
    }
}














