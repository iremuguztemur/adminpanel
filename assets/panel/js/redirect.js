$(document).ready(function(){
	$(".left-menu-list").find('a[href="logout"]').on("click",function() {
		var url = $(this).attr("href");
		swal({
		  title: "Eminmisiniz ?",
		  text: "Çıkış Yapmak Üzeresiniz",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Çıkış yap",
		  closeOnConfirm: false
		},
		function(){
			swal({
			  title: "Başarılı",
			  text: "Çıkış Yapıldı Yönlendiriliyorsunuz",
			  timer: 2000,
			  showConfirmButton: false
			});
		  setTimeout(function(){
		  	location.href = url;
		  },1500);
		});
		return false;
	});
});