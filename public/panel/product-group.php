<section class="page-content">
    <section class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
                <h3>Ürün Grupları <a href="<?=panel_url('product/new-group')?>" class="btn btn-success pull-right padding-5"><i class="fa fa-plus margin-right-10"></i>Yeni Kategori Ekle</a></h3>
            </div>
            <div class="panel-body">
      				<table class="table table-hover nowrap" id="sayfalar" width="100%">
      					<thead>
      					<tr>
      						<th>Fotoğraf</th>
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
      					</tr>
      					</tfoot>
      					<tbody>
      					<?php
      					foreach($pagelist as $pl ){
      						// img control
      						if($pl['image'] != ''){
      							$imgx = explode(",",$pl['group_image'])[0];
      							$image = $db->select("img_library")
      									 ->where("img_id", $imgx)
      									 ->run(true);
      							$img = $image['image_name'];
      						}else{
      							$img = 'https://placeholdit.imgix.net/~text?txtsize=10&txt=Urun%20Resmi%20bulunamad%C4%B1&w=80&h=70';
      						};
      						// stats control
      						if($pl['stats'] == 1){
      							$stat = '<span class="label label-success">aktif</span>';
      						}elseif($pl['stats'] == 2){
      							$stat = '<span class="label label-warning">taslak</span>';
      						}else {
      							$stat = '<span class="label label-danger">pasif</span>';
      						};
      						$id = "page_".mbs_rand(4).$pl['page_id']."-".mbs_rand(4);
      						/*
      							---> examle securty id parse  |
      							------------------------------|
      							$r =  explode("_",$id)[1];
      							$x = explode("-",$r)[0];
      							$run = substr($x,4);
      						*/
      					?>
      					<tr height="30">
      						<td><img src="<?=$img?>" class="img-responsive" alt="<?=$pl['group_name']?>"></td>
      						<td><?=$pl['group_name']?></td>
      						<td><?=$stat?></td>
      						<td class="text-right">
      							<a href="product/<?php if($stat != 'aktif'){ echo "active"; }else{ echo "passive"; }; ?>/<?=$id?>" class="label label-warning" style="padding:4px 5px;" title="<?php if($stat != 'aktif'){ echo "Aktif Yap"; }else{ echo "Pasif Yap"; }; ?>">
      							<?php if($stat == 'aktif'){ ?>
      								<i class="fa fa-eye"></i>
      							<?php }else { ?>
      								<i class="fa fa-eye-slash"></i>
      							<?php }; ?>
      							</a>
      							<a href="product/list/<?=$id?>" class="label label-primary" style="margin-left:3px; padding:4px 5px;" title="Alt Sayfa Listesi">
      								<i class="fa fa-list"></i>
      							</a>
      							<a href="product/edit/<?=$id?>" class="label label-info" style="margin-left:3px; padding:4px 5px;" title="Düzenle">
      								<i class="fa fa-pencil"></i>
      							</a>
      							<a href="product/delete/<?=$id?>" class="label label-danger" style="margin-left : 3px; padding:4px 8px;" title="Sil">
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
            zeroRecords : "Grup Bulunamadı",
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
});
</script>
