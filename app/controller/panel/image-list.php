<?php

if ( $_POST ){
    $id = post("id");
    $module = post("module");

    $images = $db->select("img_library")->where("gallery_id", $id)->where("module", $module)->run();
foreach ($images as $image)
{ ?>
    <div class="col-md-3" style="margin-bottom: 15px;">
        <img src="<?=_siteurl."/upload/".$image['image_name']?>" class="img-responsive" alt="">
        <div style=" position: absolute; bottom:5px; right: 15px">
            <a class="btn btn-danger delete-this" style="padding: 1px 6px"  data-id="<?=$image["img_id"]?>">Sil <i class="fa fa-trash" style="padding: 0"></i></a>
        </div>
    </div>
<?php }
}else{
    echo  "no data posted !";
}
?>