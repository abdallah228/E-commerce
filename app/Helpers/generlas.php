<?php

define('PAGINATION_COUNT',15);

function getFolder(){

    return app()->getLocale() == 'ar'? 'css-rtl' : 'css';
    
}//end function

//images
function uploadImage($folder,$image){
    $image->store('/admin/images/', $folder);
    $filename = $image->hashName();
    return  $filename;
 }

