<?php

namespace App\Helper;

use Carbon\Carbon;

class Helper
{
    /**
     * Check if upload image from api is image
     *
     * @param  string  $extension
     * @return bool
     */
    public static function uploadExtensionValid(string $extension): bool
    {
        $extValid = strtolower($extension);
        if ($extValid !== 'png' && $extValid !== 'jpg' && $extValid !== 'jpeg') {
            return false;
        }

        return true;
    }

    /**
     * @return string
     * Retourne permission denied msg
     */
    public static function permissionDenied(): string
    {
        return "Vous n'avez pas le droit d'accéder à cette section!";
    }

    /**
     * @return string
     * Retourne une erreur est survenue
     */
    public static function errorMessage(): string
    {
        return 'Une erreur est survenue veuillez réessayer ultérieurement!';
    }

    /**
     * @param  mixed  $validator
     * @return string
     * Recoit le validator et retourn l'ensemble des error en string
     */
    public static function errorValidationMessage($validator): string
    {
        $errorMsg = '';
        $v = $validator->errors()->all();
        foreach ($v as $item) {
            $errorMsg .= $item."\n";
        }

        return $errorMsg;
    }

    /**
     * @return string
     * l'url complet vers noimg
     */
    public static function notificationImagePath(): string
    {
        return 'https://caba-info.com/img/noimg.png';
    }

    /**
     * @param  string  $date
     * @return string
     */
    public static function transformDatePickerToDatabaseDateFormat(string $date): string
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    /**
     * @param  string  $date
     * @param  bool  $time
     * @return string
     */
    public static function transformDatabaseDateToFrontDate(string $date, bool $time = false): string
    {
        if ($time) {
            return date('d-m-Y H:m:i', strtotime($date));
        } else {
            return date('d-m-Y', strtotime($date));
        }
    }
}
