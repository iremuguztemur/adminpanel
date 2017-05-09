<section class="page-content">
    <section class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
                <h3>Sayfa Kategorileri <a href="<?=panel_url('pages/new-categori')?>" class="btn btn-success pull-right padding-5"><i class="fa fa-plus margin-right-10"></i>Yeni Kategori Ekle</a></h3>
            </div>
            <div class="panel-body">
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
      							<a href="<?=panel_url()?>pages/<?php if($pl['stats'] != '1'){ echo "categori_active"; }else{ echo "categori_passive"; }; ?>/<?=$id?>" class="label label-warning" style="padding:4px 5px;" title="<?php if($pl['stats'] != '1'){ echo "Aktif Yap"; }else{ echo "Pasif Yap"; }; ?>">
      							<?php if($pl['stats'] != '1'){ ?>
      								<i class="fa fa-eye"></i>
      							<?php }else { ?>
      								<i class="fa fa-eye-slash"></i>
      							<?php }; ?>
      							</a>
      							<a href="<?=panel_url()?>page/<?=$id?>" class="label label-primary" style="margin-left:3px; padding:4px 5px;" title="Ürün Listesi">
      								<i class="fa fa-list"></i>
      							</a>
      							<a href="<?=panel_url()?>pages/categori-edit/<?=$id?>" class="label label-info" style="margin-left:3px; padding:4px 5px;" title="Düzenle">
      								<i class="fa fa-pencil"></i>
      							</a>
      							<a href="<?=panel_url("pages/categori_delete/")?><?=$id?>" class="label label-danger sil" style="margin-left : 3px; padding:4px 8px;" title="Sil">
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
            zeroRecords : "Kategori Bulunamadı",
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

  $(".sil").on("click",function(){
    $link = $(this).attr("href");
    swal({
        title: "Kategori Silmek Üzeresiniz",
        text: "Bu kategoriyi silmek istediğinizden eminmisiniz ? ",
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
          location.href= $link ;
        } else {
          swal("İptal Edildi", "Kategori Silme İptal Edildi", "error");
        }
      });
      return false;
  })


});
</script>
<?php if(isset( $_url[2] )){
    echo url(2);
    if(url(2) == 'basarili'){
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
