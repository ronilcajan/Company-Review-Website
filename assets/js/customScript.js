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

function editEstab(that){
    var id = $(that).attr('data-id');

    $.ajax({
        type: "POST",
        url: SITE_URL+"establishment/getEstab",
        dataType: "json",
        data: {id:id},
        success: function(response) {
            console.log(response.data);
            if(response.data.logo){
                $('#e_logo').attr('src', '../assets/uploads/'+response.data.logo);
            }
            if(response.data.image){
                $('#e_image').attr('src', '../assets/uploads/'+response.data.image);
            }

            $('#e_cat').val(response.data.category_id ); 
            $('#e_status').val(response.data.status ); 
            $('#e_name').val(response.data.name ); 
            $('#e_phone').val(response.data.phone ); 
            $('#e_email').val(response.data.email ); 
            $('#e_facebook').val(response.data.facebook_url ); 
            $('#e_website').val(response.data.website); 
            $('#e_address').val(response.data.address ); 
            $('#e_desc').val(response.data.description );
            $('#e_id').val(response.data.id );
        }
    });
}