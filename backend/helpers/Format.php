<?php
/**
 * Format Class
 */
class Format
{
    public function formatDate($date)
    {
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textShorten($text, $limit = 400)
    {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . ".....";
        return $text;
    }

    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function slugify($str)
    {
        $slug = strtolower($str);
        $slug = str_replace(" ","-",$str);
        return $slug;
    }


    public function title()
    {
        $path  = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        //$title = str_replace('_', ' ', $title);
        if ($title == 'index') {
            $title = 'home';
        } elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }

    public static function getRouter(){
        $request = $_SERVER['REQUEST_URI'];
        $router = str_replace(BASE_PATH,'',$request);
        $router = explode('/',$router);
        return $router;
    }
    public static function getCategoryFromURL(){
        $router = Format::getRouter();
        if(sizeof($router)==1 && $router[0] == ""){
            return "home";
        }
        elseif(sizeof($router)==1 && $router[0] == "contact"){
            return "contact";
        }
        elseif(sizeof($router)==1 && $router[0] == "error"){
            return "error";
        }
        elseif(sizeof($router)<=3 && sizeof($router)>0){
            return $router[0];
        }
        else{
            return false;
        }
    }
    public static function getSubCategoryFromURL(){
        $router = Format::getRouter();
        if(sizeof($router)<=3 && sizeof($router)>1){
            return $router[1];
        }
        else{
            return false;
        }
    }
    public static function getProfileFromURL(){
        $router = Format::getRouter();
        if(sizeof($router)==3){
            return $router[2];
        }
        else{
            return false;
        }
    }
}
