jQuery(document).ready(function($){

    $('#openCustomerForm').click(function(){
        $('#customer-form').slideDown(300);
    });
    $('#closeCustomerForm').click(function(){
        $('#customer-form').slideUp(300);
    });
});
