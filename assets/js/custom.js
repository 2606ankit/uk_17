
$(document).ready(function(){

    var base_url = 'http://localhost/uk-17/';

    // change status start here
    $(".changestatus").click(function(){

        var changestatus = $(this);
        var hreftype = changestatus.attr('data-pagetype');
        var catstatus = changestatus.attr('data-status');
        var catid = changestatus.attr('data-uid');
        var tablename = changestatus.attr('data-tablename');

        $.ajax({
            type: "POST",
            url: base_url+"changestatus",
            data: {'hreftype':hreftype,'catstatus':catstatus,'catid':catid,'tablename':tablename},
            cache: false,
            dataType: 'json',
            success: function(res){
                alert(res);
            }
          }); 
    })
    // End here

   
});