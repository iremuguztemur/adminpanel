<?php
$module = $_url[0];


# headeri getir
require view("includes/header");

#içeriği çağır
require view($module);

# footeri getir
require view("includes/footer");