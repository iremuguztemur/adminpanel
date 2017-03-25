/**
 * Created by Taner Tombaş on 23.03.2017.
 */
var list_create = function () {
    // Liste oluşturma fonksiyonları
    var data = {};
    return {

        load : function () {
            $("form[name=list_create]").on("submit",function () {
                data['url'] = $(this).attr("action");
                data['exdata'] = {
                    'list_name' : $("input[name=list_name]",this).val(),
                    'list_description' : $("textarea",this).val(),
                    'list_code' : $("input[name=list_code]",this).val(),
                    'list_create_date' : $("input[name=list_create_date]",this).val()
                };
                list_create.validForm(data);
                return false;
            });
        },
        validForm : function (d) {
            if(d['exdata']['list_name'] == ''){
                list_create.errs("Hata :","Liste adını boş bırakmayınız","list_name");
                return false;
            }
            list_create.send(d);
        },
        send : function (veriable) {
            //validasyonu geçerse buradan devam et !
            $.post(veriable['url'],veriable['exdata'],function (cb) {
                pJson = jQuery.parseJSON(cb);
                console.log(pJson);
                if(pJson['callback'] == 'true'){
                    list_create.errs("Başarılı !","Liste başarılı bir şekilde oluşturulmuştur.",'');
                }
            });
            return false;
        },
        errs: function (err,text,item) {
            swal({
                title: err,
                text: text,
                timer: 2000,
                showConfirmButton: false
            });
            if(item != '' || item != undefined){
                setTimeout(function () {
                    $("input[name="+ item +"]").focus();
                },2000);
            }
        }


    }
}();
$(document).ready(function () {
    list_create.load();
});