<?php

include_once './DB.php';
include_once 'User.class.php';

class Stock {

    public static function add($barcode, $name,$color,$price_pkg,$yarn_count,$strength, $absorbency) {
        $qry = "INSERT INTO `material_details` VALUES ( '$barcode', '$name','$color','$price_pkg','$yarn_count','$strength','$absorbency')";
        $db = new DB();
        return $db->queryIns($qry);
    }

    public static function getAll($username, $password) {
        $auth = User::login($username, $password);

        $db = new DB();
        if ($auth == SUCCESS_LOGIN) {

            $qry = "SELECT *FROM current_stock NATURAL JOIN material_details";
            return $db->query($qry)->fetchAll(PDO::FETCH_ASSOC);

        } else {
            return $auth;
        }
    }

}
