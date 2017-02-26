/**
 * Created by agungrizkyana on 12/10/16.
 */

$('textarea[name=summernote]').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,       // set maximum height of editor
    focus: true
});
$('textarea[name=summernote]').summernote('disable');

$('#back').click(function (event){
     window.location.href = site_url + 'master/alat';
});

