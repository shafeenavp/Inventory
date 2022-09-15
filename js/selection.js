var elements, selected ;

//Clear SKU Error Message when values changed
const input = document.getElementById('sku');
input.addEventListener('change', errorClear);

function errorClear(e)
{
    document.getElementById("skutaken").style.display = "none";
}

//Show the attributes when productType selected
function select(selected)
{
    var xmlhttp = new XMLHttpRequest();
    document.getElementById("dvdDiv").style.display = "none";
    document.getElementById("furnitureDiv").style.display = "none";
    document.getElementById("bookDiv").style.display = "none";
    document.getElementById("errtype").style.display = "none";

    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            var msg = $.trim(this.responseText);
            elements = msg.split('|');
            category = elements[0];
            document.getElementById(category).style.display = "block";
        }
    }
    xmlhttp.open("GET", "includes/validate.php?selectedType="+selected, true);
    xmlhttp.send();
}

//Check If the data entered is appropriate
function checkDataType(sku,name,price,selected)
{
    //price validation
    var re = /^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/
    if(!re.test(price))
    {
        document.getElementById("errtype").style.display = "block";
    }

    //validation of data of product type
    else if(elements)
    {
        var details = '';

        //get the data based on product type
        for (let i=1; i < elements.length; i++)
        {
            var temp = $.trim(document.getElementById(elements[i]).value);
            if (!temp)
            {
                return false;
            }
            details = details + temp + '|';
        }

        // ajax call to check if the data is correct or not
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200)
            {
                if($.trim(this.responseText) == 0)
                {
                    document.getElementById("errtype").style.display = "block";
                }
                else
                {
                    var attribute = $.trim(this.responseText);
                    jQuery(function()
                    {
                        //Call jquery function
                        $.submitForm(sku,name,price,selected,attribute);
                    });(jQuery);
                }
            }
        }

        //url construction for passing values to php file
        var url="includes/validate.php";
        url+="?selectedType="+selected;
        url+="&details="+details;

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
    return true;
}

//Submit the form data
$.submitForm = function(sku,name,price,productType,attribute)
{

    $.ajax({
        data:
        {
            sku:sku,
            name:name,
            price:price,
            productType:productType,
            attribute:attribute,
        },
        type: "POST",
        url: "includes/add-product-redirect.php",
        success: function(data)
        {
            if (data=='skuTaken')
            {
                document.getElementById("skutaken").style.display = "block";
            }
            else
            {
                window.location.href = "includes/get-data-redirect.php";
            }
        }
    });
};
