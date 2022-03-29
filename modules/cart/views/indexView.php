<?php
get_header();
get_contact();
get_header_template();
?>


<?php
    $act = !empty($_GET['act']) ? $_GET['act'] : "show";
    load_view("$act");
?>

<?php
get_footer_template();
get_copyright();
get_footer();
?>