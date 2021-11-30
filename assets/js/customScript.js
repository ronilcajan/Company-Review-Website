var $window = $(window);
$window.on("load",function (){
    $(".preloader").fadeOut(500);
});

$('#basic').select2({
    theme: "bootstrap",
    dropdownParent: $('#addEstab')
});
$('#cate').select2({
    theme: "bootstrap",
    dropdownParent: $('#editEstab')
});

function editCat(that){
    id = $(that).attr('data-id');
    cname = $(that).attr('data-cname');
    desc = $(that).attr('data-desc');

    $('#cat_id').val(id);
    $('#cname').val(cname);
    $('#desc').val(desc);
}