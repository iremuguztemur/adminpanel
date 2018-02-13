<section class="page-content">
    <form action="<?=panel_url($_url[1]."/".$_url[2]."/".url(3))?>" method="post">
    <section class="page-content-inner">
        <section class="panel panel-with-borders col-md-9">
            <div class="panel-heading">
                <h3>Sayfa Düzenle -/ <u><?=$edit['page_name']?></u></h3>
            </div>
            <form action="" method="post">
            <div class="panel-body">
        				<form name="sayfa_form" action="" method="post" id="form1">
                      <div class="row">
                        <div class="form-group">
                          <select class="form-control" name="categori_id">
                            <option value="0">Kategori Seçiniz..</option>
                            <?php foreach ($group_list as $pl){ ?>
                                  <?php if(isset($_url[3])){ ?>
                                      <option value="<?=$pl['id']?>" <?=$pl['id'] == $edit['categories'] ? "selected" : "";?>  ><?=$pl['title']?></option>
                                  <?php }else { ?>
                                      <option value="<?=$pl['id']?>"><?=$pl['tit;e']?></option>
                                  <?php }; ?>
                            <?php }; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="text" name="page_name" class="form-control" value="<?=$edit['page_name']?>" placeholder="Ürün Adı">
                        </div>
                        <div class="form-group">
                          <textarea name="page_description" class="form-control" rows="8" cols="80" placeholder="Açıklama"><?=$edit['page_description']?></textarea>
                        </div>
                        <div class="form-group">
                          <textarea name="page_text" class="summernote" rows="8" cols="80" placeholder="Açıklama"><?=$edit['page_text']?></textarea>
                        </div>
                        <div class="form-group col-md-1">
                          <div class="row">
                            <div class="btn-group" style="width : 100%;" data-toggle="buttons">
                                <label class="btn btn-default-outline link" id="page_link" style="border-radius: 0;">
                                    <input type="checkbox" class="btn-link" name="link" value="1">
                                    Link
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-11">
                            <input type="text" style="min-height : 40px; box-shadow : none;" name="link_url" class="form-control input-link" disabled value="<?=$edit['page_link_url']?>" placeholder="LINK URL">
                        </div>
                        <div class="form-group col-md-1">
                          <div class="row">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default-outline link" id="video_link"  style="border-radius: 0;">
                                    <input type="checkbox" name="video" value="1">
                                    Video
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-11">
                            <input type="text" style="min-height : 40px; box-shadow : none;" name="video_url" class="form-control disabled" disabled value="<?=$edit['page_video_url']?>" placeholder="VIDEO URL">
                        </div>
                      </div>
	                </form>
            </div>
            <input type="hidden" name="images" class="form-control">
            </form>
        </section>
		<div class="col-md-3">
			<section class="panel panel-with-borders ">
				<div class="panel-heading" style="padding:10px">
						<button type="submit" class="btn btn-primary" href="#add_image" style="padding:5px; font-size : 13px;">
							Yayımla
						</button>
						<button class="btn btn-warning pull-right" href="#add_image" style="padding:5px; font-size : 13px;">
							Taslak Olarak Kaydet
						</button>
				</div>
				<div class="panel-body">
					<div class="row">
						<ul class="list-group">
							<a class="list-group-item" href="#add_image"  data-toggle="modal" data-target="#myModal"><i class="fa fa-picture-o margin-right-10"></i>Fotoğraf Ekle</a>
							<a class="list-group-item" id="list-photos" data-toggle="modal" data-target="#ListModal"><i class="fa fa-book margin-right-10"></i>Fotoğraflar</a>
<!--							<a class="list-group-item" href="#add_documents"><i class="fa fa-paperclip margin-right-10"></i>Dosya Ekle</a>-->
						</ul>
					</div>
				</div>
			</section>
		</div>
    </section>
    </form>
</section>
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form class="" id="img_upload" action="<?=panel_url("image-upload")?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 margin-bottom-15">
              <div id="image_content" class="clupload"></div>
          </div>
        </div>
        <div class="row margin-top-20" id="onizleme">
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" id="dismis-modal" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary tamamla">Tamamla</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="ListModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 margin-bottom-15" id="ImageContent">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$(document).ready(function () {


    $("#list-photos").on("click", function () {
        $urlImageLoad = '<?=panel_url("image-list")?>';
        $urlImageDelete = '<?=panel_url("image-delete")?>';
        dataImageGallery = {id :  '<?=$ximgid?>', module: "page"};
        $.post($urlImageLoad,dataImageGallery,function (res) {
            $("#ImageContent").html(res);
            $(".delete-this").on("click",function () {
                $id = $(this).data("id");
                $item = $(this);
                swal({
                    title: "Fotoğrafı Silmek Üzeresiniz",
                    text: "Bu fotoğrafı silmek istediğinizden eminmisiniz ? ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Evet, Sil",
                    cancelButtonText: "İptal",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        dataDeleteImage = {id : $id, module: "page"};
                        $.post($urlImageDelete,dataDeleteImage, function (res) {
                            $item.parent().parent().remove("div");
                            swal("Başarılı", "Fotoğrafi başarılı bir şekilde sildiniz", "success");
                        });
                    } else {
                        swal("İptal Edildi", "Fotoğraf Silme İptal Edildi", "error");
                    }
                });
            });
        });
    });


    $('.summernote').summernote({
        height: 220,
        placeholder: ' Ürün İçeriği '
    });

	/* click for button [ link | video ] */
    $(".link").on("click",function(){
        if($(this).attr("class") != 'btn btn-default-outline link active'){
          $(this).find("input").attr("checked","checked");
          $(this).removeClass("active");
          var inputName = $(this).find("input").attr("name");
          $("input[name='"+ inputName +"_url']").removeAttr("disabled");
        }else {
          $(this).find("input").removeAttr("checked");
          $(this).addClass("active");
          var inputName = $(this).find("input").attr("name");
            $("input[name='"+ inputName +"_url']").attr("disabled","disabled");
        };
    });

    <?php if($edit['page_video'] == 1){ ?>
      $("#video_link").trigger("click");
    <?php }; ?>

    <?php if($edit['page_link'] == 1){ ?>
      $("#page_link").trigger("click");
    <?php }; ?>

    var myUp = $('#image_content').clupload({
        width : 1920,
        height : 1080,
        thumbRatio : 4,
        background : '#fff',
        quality : 75,
        file : {
            max : 4,
            maxSize : 1021, // kb
        },
        name: '',
        imageUpload : {
            url: '<?=panel_url("image-upload")?>',
            exData: {id :  '<?=$ximgid?>', module: "page"}
        },
        success: function(form) {
            $("#dismis-modal").trigger("click");
            myUp.reset();
        },
        error: function(data) {
            console.log(data);
        }
    });
})
</script>
<?php if(isset($cb['err'])){ ?>

<script>
$(document).ready(function () {
    $.notify({
        title: '<strong><?=$cb["err"]["title"]?></strong>',
        message: '<?=$cb["err"]["message"]?>'
    },{
        type: '<?=$cb["err"]["type"]?>'
    });
    setTimeout(function () {
        location.href = '<?=panel_url("page/"."categori_".mbs_rand(4).$cb['err']['catID']."-".mbs_rand(4))?>';
    },1500);

})
</script>


<?php }; ?>
<script src="<?=panel_asset_url('clupload/js/jquery.clupload.js')?>"></script>
