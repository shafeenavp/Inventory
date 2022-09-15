
$(document).on('click','#submit',function(e)
{
    event.preventDefault();
    var delSku = [];

    /*Initializing array with Checkbox checked values*/
    $("input[class='delete-checkbox']:checked").each(function()
    {
        delSku.push(this.value);
    });

    if(delSku.length>0)
    {
        //Delete items and reload page
        $.ajax({
        data:
        {
            delSku:delSku
        },
        type: "post",
        url: "includes/delete-redirect.php",
        success: function(data)
        {
            location.reload();
        }
        });
    }
});
