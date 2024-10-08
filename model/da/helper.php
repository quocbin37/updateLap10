<?php
class Helper
{

    public static function get_url($url = '')
    {
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);

        $app_path = explode('/', $uri);

        $base_path = isset($app_path[1]) ? $app_path[1] : '';

        // Kiểm tra nếu trang sử dụng HTTPS hay HTTP
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';

        return $protocol . $_SERVER['HTTP_HOST'] . '/' . $base_path . '/' . $url;
    }

    public static function redirect($url)
    {
        if (headers_sent()) {
            echo '<script>window.location.href="' . $url . '";</script>';
            exit();
        } else {
            header("Location:{$url}");
            exit();
        }
    }

    public static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function input_value($inputname, $filter = FILTER_DEFAULT)
    {
        $value = filter_input(INPUT_POST, self::test_input($inputname), $filter);
        if ($value == NULL)
            $value = filter_input(INPUT_GET, self::test_input($inputname), $filter);
        return $value;
    }
    public static function is_submit($hidden)
    {
        return (!empty(self::input_value('action')) && self::input_value('action') == $hidden);
    }
}
