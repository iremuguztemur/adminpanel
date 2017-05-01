<section class="page-content">
    <form action="<?=panel_url($_url[1]."/".$_url[2]."/".url(3))?>" method="post">
    <section class="page-content-inner">
        <section class="panel panel-with-borders col-md-10">
            <div class="panel-heading">
                <h3>Ürün Ekle</h3>
            </div>
            <form action="" method="post">
            <div class="panel-body">
				<form name="sayfa_form" action="" method="post" id="form1">
					<div class="col-md-6">
						<div class="row">
							<div class="form-group">
                                <select name="group_id" class="form-control" id="groupid">
                                    <option value="">Grup Seçiniz</option>
                                    <?php foreach ($group_list as $gl) {?>
                                        <option value="<?=$gl['group_id']?>"><?=$gl['group_name']?></option>
                                    <?php }?>
                                </select>
							</div>
                            <div class="form-group">
                                <select name="categori_id" class="form-control" disabled="disabled" id="categori_id" required>
                                    <option value="">Kategori Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="subcategori_id" class="form-control" disabled id="subcategori_id" required>
                                    <option value="">Alt Kategori Seçiniz</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="product_name" class="form-control" placeholder="Ürün Adı" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="product_code" class="form-control" placeholder="Ürün Kodu">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="dmo_code" class="form-control" placeholder="DMO Kodu">
                                </div>
                            </div>
                            <div class="row margin-top-15">
                                <div class="col-md-6">
                                    <input type="text" name="product_price" class="form-control" placeholder="Ürün Fiyatı">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="dmo_price" class="form-control" placeholder="DMO Fiyatı">
                                </div>
                            </div>
                            <hr>
                            <h4 style="color:#1d1d1d; font-weight: 400;">Etiketler</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="select2-tags" name="tags[]" multiple>
                                        <option value="Masa">Masa</option>
                                        <option value="Dolap">Dolap</option>
                                        <option value="Sandalye">Sandalye</option>
                                    </select>
                                    <small>* Etiketi listede bulamıyorsanız yazarak ekleyebilirsiniz.</small>
                                </div>
                            </div>
						</div>
					</div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="item_title" class="form-control" placeholder="Ölçü Adı" />
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="item_width" class="form-control" placeholder="En" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="item_height" class="form-control" placeholder="Derinlik" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="item_size" class="form-control" placeholder="Boy" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="second_item_title" class="form-control" placeholder="Ölçü Adı" />
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="second_item_width" class="form-control" placeholder="En" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="second_item_height" class="form-control" placeholder="Derinlik" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="second_item_size" class="form-control" placeholder="Boy" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="summernote" name="product_text" placeholder="İçerik"></textarea>
                        </div>
                    </div>
                    <div class="col-md-5">
                    </div>
				</form>
            </div>
            <input type="hidden" name="images" class="form-control">
            </form>
        </section>
		<div class="col-md-2">
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
                            <div>
                                <img src="<?=_upload.$fixImage['imagename']?>" alt="">
                            </div>
							<a class="list-group-item" href="#add_gallery"><i class="fa fa-book margin-right-10"></i>Galeri Ekle</a>
							<a class="list-group-item" href="#add_documents"><i class="fa fa-paperclip margin-right-10"></i>Dosya Ekle</a>
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
        <button type="reset" class="btn btn-default" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary tamamla">Tamamla</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$(document).ready(function () {

    $('.summernote').summernote({
        height: 220
    });
    $('.select2-tags').select2({
        tags: true,
        placeholder: "Etiket Seçiniz, veya yeni etiket yazınız.",
        tokenSeparators: [',', ' ']
    });

    /* --------- */

    $("select#groupid").on("change",function(){
        $("#categori_id").removeAttr("disabled");
        var id = {
            'group_id' : $(this).val()
        };
        $.post("<?=panel_url("product/list_categori")?>",id,function(callback){
            if(callback != ''){
                $("#categori_id").html("<option value=''>Kategori Seçiniz</option>").append(callback);
            }
        })
    });

    /* --------- */

    $("select#categori_id").on("change",function(){
        $("#subcategori_id").removeAttr("disabled");
        var id = {
            'categori_id' : $(this).val()
        };
        $id = "categori_<?=mbs_rand(4)?>" + id.categori_id + "-<?=mbs_rand(4)?>";
        $.post("<?=panel_url("product/list_subcategori")?>",id,function(callback){
            if(callback != ''){
                $("#subcategori_id").html("<option value=''>Alt Kategori Seçiniz</option>").append(callback);
                $(".redirect_link").remove();
            }else{
                $(".redirect_link").remove();
                $("#subcategori_id").html("<option value=''>Alt Kategori Bulunamadı</option>").parent().append("<a href='<?=panel_url("product-subcategori")?>/" + $id + "' class='redirect_link' title=''>Alt Kategori Eklemek için Tıklayınız.</a>");
            }
            console.log(callback);
        })
    });
    var myUp = $('#image_content').clupload({
        width : 1300,
        height : 700,
        thumbRatio : 6,
        background : '#fff',
        quality : 100,
        file : {
            max : 6,
            maxSize : 1021, // kb
        },
        name: '',
        imageUpload : {
            url: '<?=panel_url("image-upload")?>',
            exData: {id :  '<?=$ximgid?>'}
        },
        success: function(form) {
        },
        error: function(data) {
            console.log(data);
        }
    });
})
</script>
<?php
    if(isset($cb['err'])){
?>

<script>
$(document).ready(function () {
    $.notify({
        title: '<strong><?=$cb["err"]["title"]?></strong>',
        message: '<?=$cb["err"]["message"]?>'
    },{
        type: '<?=$cb["err"]["type"]?>'
    });

    setTimeout(function () {
        location.href = '<?=panel_url("product-subcategori/"."categori_".mbs_rand(4).$select_categori['categori_id']."-".mbs_rand(4))?>';
    },1500);





})
</script>


<?php }; ?>
<script src="<?=panel_asset_url('clupload/js/jquery.clupload.js')?>"></script>