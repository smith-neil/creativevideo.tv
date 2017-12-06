<?php

function remove_menus() 
{ 
   remove_menu_page( 'edit.php' );
   remove_menu_page( 'edit-comments.php' );
}
add_action('admin_menu', 'remove_menus');