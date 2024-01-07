<?php

class BaseController
{
    public function initial($name)
    {
        $initial = "";
        $words = explode(" ", $name);

        foreach ($words as $index => $word) {
            $initial .= strtoupper(substr($word, 0, 1));

            if ($index == 1) {
                break;
            }
        }

        return $initial;
    }
}
