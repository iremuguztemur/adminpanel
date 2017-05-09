<section class="page-content">
    <form action="<?=panel_url($_url[1]."/".$_url[2])?>" method="post">
    <section class="page-content-inner">
        <section class="panel panel-with-borders col-md-9">
            <div class="panel-heading">
                <h3>Kategori Ekle</h3>
            </div>
            <form action="" method="post">
            <div class="panel-body">
        				<form name="sayfa_form" action="" method="post" id="form1">
        					<div class="col-md-12">
        						<div class="row">
        							<div class="form-group">
        								<label for="">Kategori Adı :</label>
        								<input type="text" name="categori_name" class="form-control" required>
        							</div>
        							<div class="form-group">
        								<label for="">Açıklama :</label>
                        <textarea name="categori_description" class="form-control" rows="10"></textarea>
        							</div>
                        <input type="hidden" name="images" class="form-control">
        						</div>
        					</div>
        				</form>
            </div>
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
    <form class="" id="imgUpload" action="<?=panel_url("image_upload.php")?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            { image upload plugin }
          </div>
        </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary">Tamamla</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
        location.href = '<?=panel_url("product-categori")?>';
    },1500)
})
</script>


<?php }; ?>
