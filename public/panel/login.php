<section class="page-content">
<div class="page-content-inner single-page-login-beta" style="background-image: url(<?=asset_url('images/3.jpg')?>)">
    <!-- Login Beta Page -->
    <div class="single-page-block-header">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="javascript: history.back();"> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="single-page-block">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-page-block-inner">
                    <div class="single-page-block-form">
                        <?php if (isset($error)):?>
                        <div class="alert alert-danger" role="alert" style="width: 100%; margin-bottom: 20px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <?=$error?>
                        </div>
                        <?php endif; ?>
                        <h3 class="text-center">
                            Yönetim Paneli
                            <span class="small">Hoşgeldiniz..</span>
                        </h3>
                        
                        <br />
                        <form id="form-validation" name="form-validation" method="POST">
                            <div class="form-group">
                                <label class="form-label">Kullanıcı Adı</label>
                                <input class="form-control"
                                       placeholder="Kullanıcı Adı"
                                       name="username"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Şifre</label>
                                <input class="form-control password"
                                       name="password"
                                       type="password"
                                       placeholder="Password">
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="send-form" value="1" class="btn btn-primary width-150 margin-inline">Giriş Yap</button>
                            </div>
                        </form>
                    </div>
                    <div class="single-page-block-sidebar" style="background-image: url(<?=asset_url('images/7.jpg')?>)">
                        <div class="single-page-block-sidebar--shadow"><!-- --></div>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div class="main-backdrop"><!-- --></div>
<script>
$(document).ready(function(){
    $('body').addClass('single-page');
})
</script>