<section class="page-content">
    <section class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
                <h3>Ürünler</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-12">
                  <h4>Filtrele :</h4>
                  <hr>
                  <div class="row">
                      <div class="col-md-3">
                        <label for="kategori">Ürün Kategorisi</label>
                          <select class="form-control" name="product_categori" id="product_categori">
                              <option value="#">Ürün Kategorisini Seçin</option>
                              <?php foreach ($group_list as $pl){
	                              $categori_list = $db->select("product_categori")->where("group_id",$pl['group_id'])->orderby("categori_id","ASC")->run();
                              ?>
                              <optgroup label="<?=$pl['group_name']?>">
                                  <?php foreach ( $categori_list as $cl ){ ?>
                                      <?php if( isset($c)){ ?>
                                          <option value="<?=$cl['categori_id']?>" <?php echo $cat_id == $cl['categori_id'] ? "selected" : "";  ?>  ><?=$cl['categori_name']?></option>
                                      <?php }else{ ?>
                                          <option value="<?=$cl['categori_id']?>"  ><?=$cl['categori_name']?></option>

                                      <?php } ?>
                                  <?php }; ?>
                              </optgroup>
                                <?php }; ?>
                          </select>
                      </div>
	                  <?php if(isset($c) && ( $c == 'categori' || $c == 'subcategori' ) ){ ?>
                      <div class="col-md-3">
                        <label for="grup">Ürün Alt Kategori</label>
                          <select class="form-control" name="product_subcategori" id="product_subcategori">
                              <option value="#">Ürün Alt Kategori Seçin</option>
                                <?php foreach ( $listAlt as $sc ){ ?>
                                    <option value="<?=$sc['subcategori_id']?>"  <?php echo ($c == 'subcategori' && $sc['subcategori_id'] == $id ) ? "selected" : "" ; ?> ><?=$sc['subcategori_name']?></option>
                                <?php }; ?>
                          </select>
                      </div>
	                  <?php } ?>
                  </div>
              </div>
      				<table class="table table-hover nowrap" id="sayfalar" width="100%">
      					<thead>
      					<tr>
      						<th>DMO Kodu</th>
      						<th>Ürün Kodu</th>
      						<th>Ürün Adı</th>
      						<th>Durum</th>
      						<th class="text-right">İşlem</th>
      					</tr>
      					</thead>
      					<tfoot>
      					<tr height="30">
      						<th></th>
      						<th></th>
      						<th></th>
      						<th></th>
      						<th></th>
      					</tr>
      					</tfoot>
      					<tbody>
      					<?php
      					foreach($pagelist as $pl ){
      						// stats control
      						if($pl['stats'] == 1){
      							$stat = '<span class="label label-success">aktif</span>';
      						}elseif($pl['stats'] == 2){
      							$stat = '<span class="label label-warning">taslak</span>';
      						}else {
      							$stat = '<span class="label label-danger">pasif</span>';
      						};
      						$idx = "product_".mbs_rand(4).$pl['product_id']."-".mbs_rand(4);
      						/*
      							---> examle securty id parse  |
      							------------------------------|
      							$r =  explode("_",$id)[1];
      							$x = explode("-",$r)[0];
      							$run = substr($x,4);
      						*/
      					?>
      					<tr>
      						<td><?=$pl['dmo_code']?></td>
      						<td><?=$pl['product_code']?></td>
      						<td><?=$pl['product_name']?></td>
      						<td><?=$stat?></td>
      						<td class="text-right">
      							<a href="product/<?php if($stat != 0){ echo "active"; }else{ echo "passive"; }; ?>/<?=$idx?>" class="label label-warning" style="padding:4px 5px;" title="<?php if($stat != 0){ echo "Aktif Yap"; }else{ echo "Pasif Yap"; }; ?>">
      							<?php if($stat == 'aktif'){ ?>
      								<i class="fa fa-eye"></i>
      							<?php }else { ?>
      								<i class="fa fa-eye-slash"></i>
      							<?php }; ?>
      							</a>
      							<a href="product/edit/<?=$idx?>" class="label label-info" style="margin-left:3px; padding:4px 5px;" title="Düzenle">
      								<i class="fa fa-pencil"></i>
      							</a>
      							<a href="product/delete/<?=$idx?>" class="label label-danger" style="margin-left : 3px; padding:4px 8px;" title="Sil">
      								<i class="fa fa-trash"></i>
      							</a>
      						</td>
      					</tr>
      					<?php }; ?>
      					</tbody>
      				</table>
            </div>
            <div class="panel-footer">

            </div>
        </section>
    </section>
</section>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#sayfalar').DataTable({
		responsive	: true,
		searching	: false,
		columnDefs	: [
			{
				width 	: "6%",
				targets	: 0
			}
	    ],
		language: {
            lengthMenu 	: "",
            zeroRecords : "Ürün Bulunamadı",
            info		: "",
            infoEmpty	: "",
            infoFiltered: "",
			oPaginate	: {
				sFirst		: "İlk Sayfa",
				sPrevious	: "Geri",
				sNext		: "İleri",
				sLast		: "Son Sayfa"
			}
        },
	});

	/*--------------- */

    $("#product_categori").on("change",function () {
        var ti = $(this).val();
        if(ti == ""){
            $id = "";
        }else{
            $id = "categori_<?=mbs_rand(4)?>" + ti + "-<?=mbs_rand(4)?>";
            location.href = "<?=panel_url("products/")?>"+$id;
        }
    });

    /*--------------- */

    $("#product_subcategori").on("change",function () {
        var ti = $(this).val();
        if(ti == ""){
            $id = "";
        }else{
            $id = "subcategori_<?=mbs_rand(4)?>" + ti + "-<?=mbs_rand(4)?>";
            location.href = "<?=panel_url("products/")?>"+$id;
        }
    });

});
</script>
<?php if(isset( $_url[3] )){
echo $_url[3];
if($_url[3] == 'basarili'){
?>
<script>
$(document).ready(function () {
    $.notify({
        title: '<strong>Başarılı</strong>,',
        message: 'İşlem başarılı bir şekilde gerçekleştirilmiştir.'
    },{
        type: 'success'
    });
})
</script>
<?php }else{ ?>
    <script>
        $(document).ready(function () {
            $.notify({
                title: '<strong>Hata</strong>,',
                message: 'İşlem sırasında bir hata oluştu.'
            },{
                type: 'danger'
            });
        })
    </script>
<?php    }; }; ?>