<?php


class Validator
{
    /**
     * @param $text string
     * @param null $size int
     * @return bool
     * This method checks the length of the entered text if the number of characters is specified.
     * If the number of characters is not specified, the method returns the text filtered using the filter_var() function
     * with the FILTER_SANITIZE_STRING flag
     */
    public static function text ($text, $size=null) {
        $text = filter_var($text, FILTER_SANITIZE_STRING);
        if ($size == null) {
        } elseif (mb_strlen($text) > $size) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $email string
     * @return bool
     * This method checks the correctness of the entered email address using the
     * filter_var() function
     */
    public static function email ($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $pass string
     * @param $len int
     * @return bool
     * This method checks the length of the entered password,
     * the length of the password is set as the second parameter when calling
     * the method.
     */
    public static function pass ($pass, $len) {
        $pass = strlen($pass);
        if ($pass < $len) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $login string
     * @param $len int
     * @return bool
     *This method checks the length of the entered login, the length of
     *the login is set by the second parameter when calling the method.
     */
    public static function login ($login, $len) {
        $login = strlen($login);
        if ($login > $len || $login < 1) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $number int
     * @param $min int
     * @param $max int
     * @return bool
     * This method checks if the entered number falls within
     * the range of the minimum and maximum values.
     */
    public static function numberminmax ($number, $min, $max) {
        $number = filter_var($number,FILTER_VALIDATE_INT, array('options' => array('min_range' => $min, 'max_range' => $max)));
        if (!$number) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $number int
     * @param $min int
     * @return bool
     * This method checks if the entered number is less than the minimum.
     */
    public static function numbermin ($number, $min) {
        if (!filter_var($number,FILTER_VALIDATE_INT, array('options' => array('min_range' => $min)))) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $number int
     * @param $max int
     * @return bool
     * This method checks if the entered number is greater than the maximum.
     */
    public static function numbermax ($number, $max) {
        $number = filter_var($number,FILTER_VALIDATE_INT, array('options' => array('max_range' => $max)));
        if (!$number) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $tel string
     * @return bool
     * This method is the correctness of the entered phone,
     * it is possible to enter only numbers and signs + and -
     */
    public static function tel ($tel) {
        $tel = preg_match('/^[+0-9-]+$/', $tel);
        if (!$tel) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $url string
     * @return bool
     * This method checks the correctness of the entered URL address using the filter_var() function
     */
    public static function url ($url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $date string
     * @return bool
     * This method checks that the entered date is correct in yyyy-mm-dd format according to the Gregorian calendar
     */
    public static function date ($date) {
        $date = explode('-', $date);
        $date = checkdate($date[1], $date[2], $date[0]);
        if (!$date) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $file file
     * @param $type string
     * @return bool
     * This method checks the extension of the loaded document.
     * Extensions must be specified as the second parameter, separated by commas.
     */
    public static function file ($file, $type) {
        $tmp = explode('.', $file['name']);
        $tmp = end ($tmp);
        $types = explode(',', str_replace(" ", '', $type));
        $match = in_array($tmp, $types);
            if(!$match) {
                return false;
            } else {
                return true;
            }
    }

}