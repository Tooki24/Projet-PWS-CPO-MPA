<?php
namespace App;
class chfRom
{
    public function convertiseur(int $num){
        $chiffreRom = "";

        for($i=1; $i<=$num; ++$i){
            $chiffreRom .= "I";
            if($i == 4){
                $chiffreRom = "IV";
            }
            if($i >= 5)
            {
                $chiffreRom = "V";
                if($i > 5)
                {
                    echo $chiffreRom .= "I";
                }
            }

        }
        return $chiffreRom;
    }
}