$(document).ready(function() {
    $(".update_active").click(function() {

        if($(this).attr("aria-pressed") == ' true '){
            $(this).closest('td').find(".active-false").prop("checked", true);
        }else{
            $(this).closest('td').find(".active-true").prop("checked", true);
        }
    });
});
