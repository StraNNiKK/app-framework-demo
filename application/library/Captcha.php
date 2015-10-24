<?php

class Captcha
{

    private $_name = 'authCode';

    private $_image = null;

    private $_fonts = array(
        'arial.ttf',
        'captcha.ttf',
        'comic.ttf',
        'cour.ttf',
        'impact.ttf',
        'sylfaen.ttf',
        'tahoma.ttf',
        'times.ttf',
        'verdana.ttf'
    );

    public function __construct($name = null)
    {
        $this->_name = is_null($name) ? $this->_name : $name;
    }

    protected function _generateKey()
    {
        return __CLASS__ . '_' . $this->_name;
    }

    protected function _generateCode($characters)
    {
        /* list all possible characters, similar looking characters and vowels have been removed */
        $possible = '23456789bcdfghjkmnpqrstvwxyz';
        
        $code = '';
        $i = 0;
        
        while ($i < $characters) {
            $code .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            $i ++;
        }
        
        return $code;
    }

    public function generate($params = array())
    {
        $width = (array_key_exists('width', $params) && intval($params['width']) > 0) ? intval($params['width']) : 120;
        $height = (array_key_exists('height', $params) && intval($params['height']) > 0) ? intval($params['height']) : 40;
        $characters = (array_key_exists('characters', $params) && intval($params['characters']) > 0) ? intval($params['characters']) : rand(4, 6);
        
        if (array_key_exists('font', $params)) {
            $this->font = $params['font'];
        } else {
            $key = array_rand($this->_fonts);
            $this->font = '/fonts/' . $this->_fonts[$key];
        }
        
        $code = $this->_generateCode($characters);
        
        /* font size will be 75% of the image height */
        $font_size = $height * 0.55;
        $image = @imagecreate($width, $height);
        if (! $image) {
            throw new Exception('Cannot initialize new GD image stream');
        }
        
        /* set the colours */
        $background_color = imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 255, 40, 0);
        $noise_color = imagecolorallocate($image, 100, 120, 180);
        
        /* generate random dots in background */
        for ($i = 0; $i < ($width * $height) / 3; $i ++) {
            imagefilledellipse($image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $noise_color);
        }
        
        /* generate random lines in background */
        for ($i = 0; $i < ($width * $height) / 150; $i ++) {
            imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $noise_color);
        }
        
        /* create textbox and add text */
        $textbox = imagettfbbox($font_size, 0, $_SERVER['DOCUMENT_ROOT'] . $this->font, $code);
        if (! $textbox) {
            throw new Exception('Error in imagettfbbox function');
        }
        $x = ($width - $textbox[4]) / 2;
        $y = ($height - $textbox[5]) / 2;
        
        try {
            imagettftext($image, $font_size, 0, $x, $y, $text_color, $_SERVER['DOCUMENT_ROOT'] . $this->font, $code);
        } catch (Exception $e) {
            throw new Exception('Error in imagettftext function');
        }
        
        $this->_image = $image;
        $_SESSION[strval($this->_generateKey())] = $code;
        
        return $this->_image;
    }

    public function check($code)
    {
        if (array_key_exists(strval($this->_generateKey()), $_SESSION)) {
            $session = $_SESSION[$this->_generateKey()];
            if ($session && $session == $code) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function show()
    {
        if ($this->_image) {
            /* output captcha image to browser */
            header('Content-Type: image/jpeg');
            imagejpeg($this->_image);
            imagedestroy($this->_image);
        } else {
            return null;
        }
    }
}