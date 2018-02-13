<?php

if(!file_exists(view($modal))){
    $page = '404';
}else{
    $page = $modal;
}

# call header
require statics("header");

# call page content
require view($page);

# call footer
require statics("footer");