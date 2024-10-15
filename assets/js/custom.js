
$(document).ready(function(){

    var base_url = 'http://localhost/uk-17/';

    // change status start here
    $(".changestatus").click(function(){
        var changestatus = $(this);
        var hreftype    = changestatus.attr('data-pagetype');
        var catstatus   = changestatus.attr('data-status');
        var catid       = changestatus.attr('data-uid');
        var tablename   = changestatus.attr('data-tablename');
        var csrftoken   = changestatus.attr('data-csrftoken'); 
        var csrfname    = changestatus.attr('data-csrfname'); 
        var ses_user_id = changestatus.attr('data-sesid');

        $.ajax({
            type: "POST",
            url: base_url+"changestatus",
            data: {'ses_user_id':ses_user_id,'hreftype':hreftype,'catstatus':catstatus,'catid':catid,'tablename':tablename,[csrfname]: csrftoken},
            cache: false, 
            success: function(res){
                location.reload(); 
            }
          }); 
    })
    // End here

    // delete global function


    // end here

   
});

function deleteglobal()
{
    
}