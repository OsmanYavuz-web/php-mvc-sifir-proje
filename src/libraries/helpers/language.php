<?php


namespace Adamlar\Helpers;


use Adamlar\Routes\Route;

class language extends Route
{

    /**
     * @var Ana dil kodu
     */
    public static $gLang;


    /**
     * @desc Dil sistemini yükler
     */
    public static function langLoad()
    {
        $patterns = [
            '{lang}' => '([a-z]+)'
        ];
        $request_uri = self::parse_url();
        $url = str_replace(array_keys($patterns), array_values($patterns), $request_uri);

        // Dil kodunu alır
        $lang = substr($url, 1, 2);

        // Dil kodu boşsa ana dile çevirir
        if (empty($lang)) {
            $lang = self::$gLang;
        }

        // dil dosyasını çağır
        global $lgTranslate;
        require self::langFileCheck($lang);
    }


    /**
     * @desc Dil dosyasının kontrolünü yapar
     * @param $lang
     * @return string
     */
    private static function langFileCheck($lang){
        $langFile = homeDir() . '/src/languages/' . $lang . '.php';
        if (file_exists($langFile)) {
            // dil dosyası varsa
            return homeDir() . '/src/languages/' . $lang . '.php';
        }else{
            // dil dosyası yoksa ana dilin dosyasını çağır
            return homeDir() . '/src/languages/' . self::$gLang . '.php';
        }
    }



}