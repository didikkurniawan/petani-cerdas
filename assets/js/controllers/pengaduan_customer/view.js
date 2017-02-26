$(document).ready(function () {
  $('textarea[name=pesan]').summernote({
    height: 200
  });

  $('textarea[name=pesan]').summernote('disable');
});

$('#back').click(function (event){
    window.location.href = site_url + 'pengaduan_customer';
});
