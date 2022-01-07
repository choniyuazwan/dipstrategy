<?php
    class Session {

        public static function init() {
            if (session_id() == '') {
                session_start();
            }
        }

        public static function exist($key) {
            return isset($_SESSION[$key]);
        }

        public static function none($key) {
            return empty($_SESSION[$key]);
        }

        public static function get($key, $default = '') {
            return (isset($_SESSION[$key]) ? $_SESSION[$key] : $default);
        }

        public static function set($key, $value) {
            $_SESSION[$key] = $value;
        }

        public static function remove($key) {
            unset($_SESSION[$key]);
        }

        public static function destroy() {
            $_SESSION = array();

            if ($_SESSION) session_destroy();
        }
    }
