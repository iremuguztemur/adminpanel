<section class="page-content">
    <section class="page-content-inner">
        <section class="panel panel-with-borders col-md-10">
            <div class="panel-heading">
                <h3>Grup Ekle</h3>
            </div>
            <form action="" method="post">
            <div class="panel-body">
				<form name="sayfa_form" action="" method="post" id="form1">
					<div class="col-md-6">
						<div class="row">
							<div class="form-group">
								<label for="">Grup Adı :</label>
								<input type="text" name="page_name" class="form-control">
							</div>
						</div>
					</div>
				</form>
            </div>
            </form>
        </section>
		<div class="col-md-2">
			<section class="panel panel-with-borders ">
				<div class="panel-heading" style="padding:10px">
						<a class="btn btn-primary" href="#add_image" style="padding:5px; font-size : 13px;">
							Yayımla
						</a>
						<a class="btn btn-warning pull-right" href="#add_image" style="padding:5px; font-size : 13px;">
							Taslak Olarak Kaydet
						</a>
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
</section>
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form class="" id="imgUpload" action="<?=panel_url("image_upload.php")?>" method="post">
        <div class="row">
          <div class="col-md-12 margin-bottom-15">
                <input type="file" name="file[]" width="100%" id="files" multiple>
          </div>
        </div>
        <div id="progress-wrp"><div class="progress-bar"></div ><div class="status">10%</div></div>
        <div class="row margin-top-20" id="onizleme">
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
