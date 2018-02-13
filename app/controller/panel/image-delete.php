<?php

if($_POST){
    $id =  post("id");
    $image = $db->select("img_library")->where("img_id",$id)->run(true);
    unlink(_base."/upload/".$image["image_name"]);
    unlink(_base."/upload/thumb/".$image["image_name"]);
    $delete = $db->delete("img_library")->where("img_id",$id)->done();
}