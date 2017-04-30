<section class="page-content">
    <section class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
                <h3>Ürün Kategorileri <a href="<?=panel_url('product/new-categori')?>" class="btn btn-success pull-right padding-5" title="Yeni Kategori Ekle"><i class="fa fa-plus margin-right-10"></i>Yeni Kategori Ekle</a></h3>
            </div>
            <div class="panel-body">
                <h4>Filtre : </h4>
                <div class="col-md-4 margin-bottom-20">
                    <div class="row">
                        <select name="group_id" class="form-control" id="group_id" required>
                            <option value="">Grup Seçiniz</option>
		                    <?php foreach ($group_list as $gl){
                                if(isset($_url[2])){
                            ?>
                                <option value="<?=$gl['group_id']?>" <?php  echo $id == $gl['group_id'] ? "selected" : ""; ?> ><?=$gl['group_name']?></option>
		                    <?php }else { ?>
                                <option value="<?=$gl['group_id']?>"><?=$gl['group_name']?></option>
                            <?php }; }; ?>
                        </select>
                    </div>
                </div>
      				<table class="table table-hover nowrap" id="sayfalar" width="100%">
      					<thead>
      					<tr>
      						<th>Fotoğraf</th>
      						<th>Kategori Adı</th>
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
      					</tr>
      					</tfoot>
      					<tbody>
      					<?php
      					foreach($pagelist as $pl ){
      						// img control
      						if($pl['categori_image'] != ''){
      							$imgx = explode(",",$pl['categori_image'])[0];
      							$image = $db->select("img_library")
      									 ->where("img_id", $imgx)
      									 ->run(true);
      							$img = $image['image_name'];
      						}else{
      							$img = 'https://placeholdit.imgix.net/~text?txtsize=10&txt=Grup%20Resmi%20bulunamad%C4%B1&w=80&h=70';
      						};
      						// stats control
      						if($pl['stats'] == 1){
      							$stat = '<span class="label label-success">aktif</span>';
      						}elseif($pl['stats'] == 2){
      							$stat = '<span class="label label-warning">taslak</span>';
      						}else {
      							$stat = '<span class="label label-danger">pasif</span>';
      						};
      						$id = "categori_".mbs_rand(4).$pl['categori_id']."-".mbs_rand(4);
      						/*
      							---> examle securty id parse  |
      							------------------------------|
      						    $id = "categori_".mbs_rand(4).$pl['categori_id']."-".mbs_rand(4);
      							$r =  explode("_",$id)[1];
      							$x = explode("-",$r)[0];
      							$run = substr($x,4);
      						*/
      					?>
      					<tr height="30">
      						<td><img src="<?=$img?>" class="img-responsive" alt="<?=$pl['categori_name']?>"></td>
      						<td><?=$pl['categori_name']?></td>
      						<td><?=$stat?></td>
      						<td class="text-right">
      							<a href="<?=panel_url()?>product/<?php if($pl['stats'] != '1'){ echo "categori_active"; }else{ echo "categori_passive"; }; ?>/<?=$id?>" class="label label-warning" style="padding:4px 5px;" title="<?php if($pl['stats'] != '1'){ echo "Aktif Yap"; }else{ echo "Pasif Yap"; }; ?>">
      							<?php if($pl['stats'] != '1'){ ?>
      								<i class="fa fa-eye"></i>
      							<?php }else { ?>
      								<i class="fa fa-eye-slash"></i>
      							<?php }; ?>
      							</a>
      							<a href="<?=panel_url()?>product-subcategori/<?=$id?>" class="label label-primary" style="margin-left:3px; padding:4px 5px;" title="Alt Kategori Listesi">
      								<i class="fa fa-list"></i>
      							</a>
      							<a href="<?=panel_url()?>product/categori-edit/<?=$id?>" class="label label-info" style="margin-left:3px; padding:4px 5px;" title="Düzenle">
      								<i class="fa fa-pencil"></i>
      							</a>
      							<a href="<?=panel_url("product/categori_delete/")?><?=$id?>" class="label label-danger" style="margin-left : 3px; padding:4px 8px;" title="Sil">
      								<i class="fa fa-trash"></i>
      							</a>
      						</td>
      					</tr>
      					<?php }; ?>
      					</tbody>
      				</table>
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
            zeroRecords : "<?php if(isset($_url[2])){ ?>Gruba Ait <?php }; ?> Kategori Bulunmamaktadır",
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

	$("#group_id").on("change",function () {
        var ti = $(this).val();
        if(ti == ""){
            $id = "";
        }else{
            $id = "categori_<?=mbs_rand(4)?>" + ti + "-<?=mbs_rand(4)?>";
        }
        location.href = "<?=panel_url("product-categori/")?>"+$id;
    })



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