<?php 
    function get_list_users() {
        $result = db_fetch_array("SELECT * FROM `admin`");
        return $result;
    }

    function check_user(){
        $result = db_fetch_array("SELECT * FROM `admin`");
        foreach($result as $user){
            
        }
        return $user;
    }
    function get_list_user($username,$password,$email){
        $result = db_fetch_row("SELECT * FROM `admin` WHERE `admin_username` = '$username' AND `admin_password` = '$password' AND `admin_email` = '$email'");
        return $result;
    }



    function update_otp_admin($email,$otp_code){
        $table = "`admin`";
        $where = "`admin_email` = '$email'";
        db_update($table,$otp_code,$where);
    }

    function add_user_admin($infor_user_admin){
        $table = "`admin`";
        db_insert($table,$infor_user_admin);
    }

    function get_admin_by_id($id_admin){
        $result = 
        db_fetch_row("SELECT * FROM `admin` WHERE `admin_id` = '$id_admin'");
        return $result;
    }

    function update_admin_by_id($id,$infor_admin){
        $table = "`admin`";
        $where = "`admin_id` = '$id'";
        db_update($table,$infor_admin,$where);
    }

    function delete_admin_by_id($id){
        $table = "`admin`";
        $where = "`admin_id` = '$id'";
        db_delete($table,$where);
    }

    /** */


    function get_all_products(){
        $result = db_fetch_array("SELECT * FROM `product`");
        return $result;
    }

    function get_product_by_id($id){
        $result = 
        db_fetch_row("SELECT * FROM `product` 
        INNER JOIN `brand` ON product.id_brand = brand.brand_id  
        INNER JOIN `category` ON product.id_category = category.id_category
        WHERE `id_product` = $id");
        return $result;
    }

    function add_product($infor_product){
        $table = "`product`";
        db_insert($table, $infor_product);
    }

    function update_product_by_id($id,$infor_product){
        $table = "`product`";
        $where = "`id_product` = '$id'";
        db_update($table,$infor_product,$where);
    }

    function del_prodcut($id){
        $table = "`product`";
        $where = "`id_product` = '$id'";
        db_delete($table,$where);
    }

    /** */

    function get_all_categorys(){
        $result = db_fetch_array("SELECT * FROM `category`");
        return $result;
    }

    function add_categorys($infor_category){
        $table = "`category`";
        db_insert($table,$infor_category);
    }

    function get_category_by_id($id_category){
        $result = 
        db_fetch_row("SELECT * FROM `category` WHERE `id_category` = '$id_category'");
        return $result;
    }

    function update_category_by_id($id,$infor_category){
        $table = "`category`";
        $where = "`id_category` = '$id'";
        db_update($table,$infor_category,$where);
    }

    function delete_category_by_id($id){
        $table = "`category`";
        $where = "`id_category` = '$id'";
        db_delete($table,$where);
    }

    function check($id){
        $result = 
        db_fetch_row("SELECT * FROM `product` WHERE `id_category` = '$id'");
        return $result;
    }
    // brand
    function get_all_brand(){
        $result = db_fetch_array("SELECT * FROM `brand`");
        return $result;
    }


?>