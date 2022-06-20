<?php 

namespace App\Libraries;

class CustomLibrary {
    
    public function uuid() {
        return sprintf( 
            // https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
            
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
            
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
            
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    // generated dengan date
    public function generateCode($kode, $inisial)
    {
        $dateNow = date("Ymd");
        if ($kode) {
            $substrKode = substr($kode, 9);
            $changeDate = substr($kode, 3, -4);
            if ($changeDate == $dateNow) {
                $generated = sprintf('%04d', $substrKode+1);
                $generatedKode = "$inisial$dateNow$generated";
            } else {
                $generatedKode = "$inisial".$dateNow."0001";
            }
        } else {
            $generatedKode = "$inisial".$dateNow."0001";
        }

        return $generatedKode;
    }

    // generated tanpa date
    public function generateCode1($kode, $inisial)
    {
        if ($kode) {
            $substrKode = substr($kode, 3);
            $generated = sprintf('%04d', $substrKode+1);
            $generatedKode = "$inisial$generated";
        } else {
            $generatedKode = $inisial."0001";
        }

        return $generatedKode;
    }

}

?>