<section class="page-content">
    <section class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
                <h3>SLIDERS</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover nowrap" id="sayfalar" width="100%">
                    <thead>
                    <tr>
                        <th style="min-width : 300px">Başlık</th>
                        <th>Açıklama</th>
                        <th width="100">Durum</th>
                        <th width="100" class="text-right">İşlem</th>
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
                        // stats control
                        if($pl['stats'] == 1){
                            $stat = '<span class="label label-success">aktif</span>';
                        }elseif($pl['stats'] == 2){
                            $stat = '<span class="label label-warning">taslak</span>';
                        }else {
                            $stat = '<span class="label label-danger">pasif</span>';
                        };
                        $idx = "banner_".mbs_rand(4).$pl['id']."-".mbs_rand(4);
                        /*
                            ---> examle securty id parse  |
                            ------------------------------|
                            $r =  explode("_",$id)[1];
                            $x = explode("-",$r)[0];
                            $run = substr($x,4);
                        */
                        ?>
                        <tr>
                            <td><?=$pl['title']?></td>
                            <td><?=$pl['description']?></td>
                            <td><?=$stat?></td>
                            <td class="text-right">
                                <a href="<?=panel_url("banner")?>/<?php echo $pl['stats'] == 0 ? "banner_active" : "banner_passive"; ?>/<?=$idx?>" class="label label-warning" style="padding:4px 5px;" title="<?php if($stat != 0){ echo "Aktif Yap"; }else{ echo "Pasif Yap"; }; ?>">
                                    <?php if($pl['stats'] == 0){ ?>
                                        <i class="fa fa-eye"></i>
                                    <?php }else { ?>
                                        <i class="fa fa-eye-slash"></i>
                                    <?php }; ?>
                                </a>
                                <a href="<?=panel_url("banner/edit/").$idx?>" class="label label-info" style="margin-left:3px; padding:4px 5px;" title="Düzenle">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="<?=panel_url("banner/banner_delete/").$idx?>" class="label label-danger sil" style="margin-left : 3px; padding:4px 8px;" title="Sil">
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
                zeroRecords : "Slider Bulunamadı",
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
                    title: "Slider Silmek Üzeresiniz",
                    text: "Bu slideri silmek istediğinizden eminmisiniz ? ",
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
                        swal("İptal Edildi", "Slider Silme İptal Edildi", "error");
                    }
                });
            return false;
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
                setTimeout(function(){
                    location.href = "<?=panel_url("banners/").url(2)?>";
                },1000);
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

                setTimeout(function(){
                    location.href = "<?=panel_url("banners/").url(2)?>";
                },1000);
            })
        </script>
    <?php    }; }; ?>
