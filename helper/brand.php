<?php
function get_list_brand()
{
    $result = db_fetch_array("SELECT * FROM `brand`");
    return $result;
}



