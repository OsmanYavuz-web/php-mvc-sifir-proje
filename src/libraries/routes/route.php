<?php

namespace Adamlar\Routes;

class Route
{

    public static $SiteUrl = [];


    public static function parse_url()
    {
        $dirname = dirname($_SERVER['SCRIPT_NAME']);
        $dirname = $dirname != '/' ? $dirname : null;
        $basename = basename($_SERVER['SCRIPT_NAME']);
        $request_uri = str_replace([$dirname, $basename], null, $_SERVER['REQUEST_URI']);

        return $request_uri;
    }


    public static function run($url, $callback, $method = 'get')
    {
        $method = explode('|', strtoupper($method));

        if(in_array($_SERVER['REQUEST_METHOD'], $method)) {

            $patterns = [
                '{url}'     => '([0-9a-zA-Z]+)',
                '{id}'      => '([0-9]+)',
                '{lang}'    => '([a-z]+)'
            ];
            $url = str_replace(array_keys($patterns), array_values($patterns), $url);
            $request_uri = self::parse_url();

            // Diğer Sayfalar
            if (preg_match('@^' . $url . '$@', $request_uri, $parameters)) {

                // Controller language
                //self::controllerLang($parameters);

                // Controller page
                self::controllerPage($callback, $parameters);

            }

        }



    }


    private static function controllerPage($callback, $parameters = []){
        unset($parameters[0]);

        if (is_callable($callback)) {
            call_user_func_array($callback, $parameters);
        }

        $controller = explode('@', $callback);
        $className = explode('/', $controller[0]);
        $className = end($className);

        $controllerFile = homeDir() . '/src/controller/' . strtolower($controller[0]) . '.php';
        $controllerFile = filePathReplace($controllerFile);

        if (file_exists($controllerFile)) {
            require $controllerFile;
            call_user_func_array([new $className, $controller[1]], $parameters);
        }

    }



}