<?php


require_once './DB.php';
require_once './status_codes.php';

class User {

    static function login($username, $passwordRaw) {
        if ($username == FALSE || $passwordRaw == FALSE || $username == NULL || $passwordRaw == NULL) {
            return ERROR_USERNAME_NOT_FOUND;
        }

        $password = hash('md5', $passwordRaw);

        $db = new DB();
        if (User::usernameExists($username) == TRUE) {
            $res = $db->query("SELECT password FROM users WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
            //print_r($res);
            $user = $res[0];
            if ($user['password'] == $password) {
                return SUCCESS_LOGIN;
            } else {
                return ERROR_INVALID_PASSWORD;
            }
        } else {
            return ERROR_USERNAME_NOT_FOUND;
        }
    }

    static function getID($username) {
        $db = new DB();
        $res = $db->query("SELECT id FROM users WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);
        return $res[0]['id'];
    }

    static function add($username, $passwordraw, $first_name, $last_name, $email) {
        $db = new DB();
        $usernameAvailable = User::usernameExists($username);
        $password = hash('md5', $passwordraw);

        if ($usernameAvailable == FALSE) {
            $res = $db->queryIns("INSERT INTO users(username,password, first_name, last_name, email)"
                    . " VALUES('$username','$password','$first_name','$last_name','$email')");
            echo $res;
        } else {

            echo "failed";
        }
    }

    static function usernameExists($username) {
        $db = new DB();
        $res = $db->query("SELECT count(username) AS usercount "
                        . "FROM users "
                        . "WHERE username='$username'")->fetchAll(PDO::FETCH_ASSOC);

        if ($res[0]['usercount'] > 0) {
            return true;
        }

        return false;
    }

}
