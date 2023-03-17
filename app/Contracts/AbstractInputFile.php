<?php

namespace App\Contracts;
abstract class  AbstractInputFile{

    const INPUT_TYPE_TEXT = "text";
    const INPUT_TYPE_NUMBER = "number";
    const INPUT_TYPE_SELECT = "select";
    const INPUT_TYPE_FILE = "file";
    const INPUT_TYPE_CHECKBOX = "checkbox";
    const INPUT_TYPE_RADIO = "radio";
    const INPUT_TYPE_PASSWORD = "password";


    public static function toArray()
    {
        return [
            self::INPUT_TYPE_TEXT => self::INPUT_TYPE_TEXT,
            self::INPUT_TYPE_NUMBER => self::INPUT_TYPE_NUMBER,
            self::INPUT_TYPE_SELECT => self::INPUT_TYPE_SELECT,
            self::INPUT_TYPE_FILE => self::INPUT_TYPE_FILE,
            self::INPUT_TYPE_CHECKBOX => self::INPUT_TYPE_CHECKBOX,
            self::INPUT_TYPE_RADIO => self::INPUT_TYPE_RADIO,
            self::INPUT_TYPE_PASSWORD => self::INPUT_TYPE_PASSWORD,
        ];
    }
    

}




