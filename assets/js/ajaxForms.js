$("#create_user_form").validate({
    rules: {
        confirmpassword: {
            equalTo: "#password"
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});

$("#category_form").validate({
    rules: {
        confirmpassword: {
            equalTo: "#password"
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});
$("#establishment_form").validate({
    rules: {
        confirmpassword: {
            equalTo: "#password"
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});
$("#edit_establishment_form").validate({
    rules: {
        confirmpassword: {
            equalTo: "#password"
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
});