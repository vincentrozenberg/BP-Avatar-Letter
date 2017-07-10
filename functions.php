<?php

add_filter('bp_core_fetch_avatar_no_grav', '__return_true'); //removes the standard "mystery man" gravatar 

function set_avatar_based_on_first_letter( $avatar, $params ) {
  $user_id = $params['item_id'];
  $name_field = 1; //profile field id

    $name = xprofile_get_field_data(  $name_field, $user_id ); //get the profile field
    $name = substr($name, 0, 1); //get the first letter
    $name = strtolower( $name ); //make lowercase

        $avatar = get_bloginfo('template_url') . '/images/avatar/'.$name.'.png'; //a.png, b.png, etc.

    return $avatar;
}
add_filter( 'bp_core_default_avatar_user', 'set_avatar_based_on_first_letter', 10, 2 );
