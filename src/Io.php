<?php
    class Io {

        public static function html($data) {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        public static function js($link) {
            echo '<script src="'.$link.'" type="text/javascript"></script>';
        }

        public static function css($link, $media = 'all') {
            echo '<link href="'.$link.'" rel="stylesheet" type="text/css" media="'.$media.'"/>';
        }

        public static function sql($data, $purifier = true) {
            $purifier = HTMLPurifier_Config::createDefault();
            $purifier->set('Core.Encoding', 'UTF-8');
            $purifier->set('HTML.Doctype', 'HTML 4.01 Transitional');
            $purifier = new HTMLPurifier($purifier);

            return $purifier->purify($data);
        }

        public static function password_verify($data,$datacompare) {
            return password_verify(sha1(md5(sha1(md5(sha1(md5(base64_encode(md5($data)))))))), $datacompare);
        }

        public static function password_encrypt($data) {
            return password_hash(sha1(md5(sha1(md5(sha1(md5(base64_encode(md5($data)))))))),1);
        }

        public static function datetime($data) {
            return strtotime($data) == 0 || $data == '0000-00-00 00:00:00' ? '' : date('Y-m-d H:i:s', strtotime($data));
        }

        public static function encode($data) {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }

        public static function decode($data) {
            return base64_decode(str_pad(strtr($data, '-_', '+/'), mb_strlen($data) % 4, '=', STR_PAD_RIGHT));
        }

        public static function url($data) {
            return urlencode($data);
        }

        public static function json($data) {
            return json_encode($data);
        }

        public static function ajax() {
            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }

        public static function slug($string, $separator = '-') {
            $flip = $separator == '-' ? '_' : '-';

            $string = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $string);
            $string = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', strtolower($string));
            $string = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $string);

            return trim($string, $separator);
        }

        public static function random($length = 16, $type = 'alphabet-numeric') {
            $alphabet = 'abcdefghijklmnopqrstuvwxyz';
            $numeric = '0123456789';
            $symbol = '!@#$%^&*()~_-=+{}[]|:;<>,.?/"';

            switch ($type) {
                case 'all':
                    $pool = $alphabet . strtoupper($alphabet) . $numeric . $symbol;
                    break;

                case 'alphabet':
                    $pool = $alphabet . strtoupper($alphabet);
                    break;

                case 'alphabet-numeric':
                    $pool = $alphabet . strtoupper($alphabet) . $numeric;
                    break;

                case 'distinct':
                    $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                    break;

                case 'numeric':
                    $pool = $numeric;
                    break;

                case 'symbol':
                    $pool = $symbol;
                    break;

                default:
                    $pool = $type;
                    break;
            }

            $crypto = function ($min, $max)
            {
                $range = $max - $min;

                if ($range < 0) {
                    return $min;
                }

                $log = log($range, 2);
                $byte = ($log / 8) + 1;
                $bit = $log + 1;
                $filter = (1 << $bit) - 1;

                do {
                    $random = hexdec(bin2hex(openssl_random_pseudo_bytes($byte)));
                    $random = $random & $filter;
                } while ($random >= $range);

                return $min + $random;
            };

            $token = '';

            for ($i = 0; $i < $length; $i ++) {
                $token .= $pool[$crypto(0, mb_strlen($pool))];
            }

            return $token;
        }

        public static function trim($data , $length = 150, $ellipses = true, $strip_html = true) {
            if ($strip_html) {
                $data  = strip_tags($data);
            }

            $data = preg_replace('/\s+/', ' ', $data);

            if (strlen($data) <= $length) {
                return $data;
            }

            $last_space = strrpos(substr($data , 0, $length), ' ');
            $trimmed_text = substr($data , 0, $last_space);

            if ($ellipses) {
                $trimmed_text .= '...';
            }

            return trim($trimmed_text);
        }

        public static function mark($string, $search) {
            $occurrence = substr_count(strtolower($string), strtolower($search));
            $newstring = $string;
            $match = array();

            for ($i = 0; $i < $occurrence; $i++) {
                $match[$i] = stripos($string, $search, $i);
                $match[$i] = substr($string, $match[$i], strlen($search));
                $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
            }

            $newstring = str_replace('[#]', '<mark>', $newstring);
            $newstring = str_replace('[@]', '</mark>', $newstring);

            return $newstring;
        }

        public static function parameter($parameter) {
            if (isset($_POST[$parameter])) {
                $value = $_POST[$parameter];
            } elseif (isset($_GET[$parameter])) {
                $value = $_GET[$parameter];
            } else {
                $value = null;
            }

            return $value;
        }

        public static function redirect($url = null, $code = false, $timer = 0) {
            $http = array(
                100 => "HTTP/1.1 100 Continue",
                101 => "HTTP/1.1 101 Switching Protocols",
                200 => "HTTP/1.1 200 OK",
                201 => "HTTP/1.1 201 Created",
                202 => "HTTP/1.1 202 Accepted",
                203 => "HTTP/1.1 203 Non-Authoritative Information",
                204 => "HTTP/1.1 204 No Content",
                205 => "HTTP/1.1 205 Reset Content",
                206 => "HTTP/1.1 206 Partial Content",
                300 => "HTTP/1.1 300 Multiple Choices",
                301 => "HTTP/1.1 301 Moved Permanently",
                302 => "HTTP/1.1 302 Found",
                303 => "HTTP/1.1 303 See Other",
                304 => "HTTP/1.1 304 Not Modified",
                305 => "HTTP/1.1 305 Use Proxy",
                307 => "HTTP/1.1 307 Temporary Redirect",
                400 => "HTTP/1.1 400 Bad Request",
                401 => "HTTP/1.1 401 Unauthorized",
                402 => "HTTP/1.1 402 Payment Required",
                403 => "HTTP/1.1 403 Forbidden",
                404 => "HTTP/1.1 404 Not Found",
                405 => "HTTP/1.1 405 Method Not Allowed",
                406 => "HTTP/1.1 406 Not Acceptable",
                407 => "HTTP/1.1 407 Proxy Authentication Required",
                408 => "HTTP/1.1 408 Request Time-out",
                409 => "HTTP/1.1 409 Conflict",
                410 => "HTTP/1.1 410 Gone",
                411 => "HTTP/1.1 411 Length Required",
                412 => "HTTP/1.1 412 Precondition Failed",
                413 => "HTTP/1.1 413 Request Entity Too Large",
                414 => "HTTP/1.1 414 Request-URI Too Large",
                415 => "HTTP/1.1 415 Unsupported Media Type",
                416 => "HTTP/1.1 416 Requested range not satisfiable",
                417 => "HTTP/1.1 417 Expectation Failed",
                500 => "HTTP/1.1 500 Internal Server Error",
                501 => "HTTP/1.1 501 Not Implemented",
                502 => "HTTP/1.1 502 Bad Gateway",
                503 => "HTTP/1.1 503 Service Unavailable",
                504 => "HTTP/1.1 504 Gateway Time-out"
            );

            if ($code) header($http[$code]);

            if (is_null($url)) {
                if ($timer) {
                    header('Refresh:'.$timer.'; url='.$_SERVER['REQUEST_URI']);
                } else {
                    header('Location: '.$_SERVER['REQUEST_URI']);
                    exit();
                }
            } else {
                if ($timer) {
                    header('Refresh:'.$timer.'; url='.$url);
                } else {
                    header('Location: '.$url);
                    exit();
                }
            }
        }

        public static function agent($type = null) {
            $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
            if ($type == 'bot') {
                if (preg_match("/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent)) {
                    return true;
                }
            } else if ($type == 'browser') {
                if (preg_match ("/mozilla\/|opera\//", $user_agent)) {
                    return true;
                }
            } else if ($type == 'mobile') {
                if (preg_match("/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent)) {
                    return true;
                } else if (preg_match("/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent)) {
                    return true;
                }
            }

            return false;
        }

        public static function ip() {
            if (isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
            }

            $ip = filter_var($ip, FILTER_VALIDATE_IP);

            return ($ip === false) ? '0.0.0.0' : $ip;
        }
    }
