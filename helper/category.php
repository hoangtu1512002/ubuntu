<?php
function get_list_category()
{
    $result = db_fetch_array("SELECT * FROM `category`");
    return $result;
}
