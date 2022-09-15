
const app = Vue.createApp({
    data()
    {
        return{
            errors: false,
            errorMaxSize: false,
            skuNotValid: false,
            sku: null,
            name: null,
            price: null,
            productType: ''
        }
    },

    methods:
    {
        //Check whether all fields are entered, If done call(javascript) to check the user input is correct data type
        checkForm(e)
        {
            this.errors = false
            this.errorMaxSize = false
            this.skuNotValid = false
            const regexLetter = /[a-zA-Z]/;
            const regexNumber =/\d/;
            var sku = '';
            var name = '';
            var price = null;
            document.getElementById("errtype").style.display = "none";

            if (this.sku)
                sku = this.sku.replaceAll(" ", "");
            if (this.name)
                name = $.trim(this.name);
            if (this.price)
                price = $.trim(this.price);

            //validation
            if (!sku || !name || !price || !this.productType)
            {
                this.errors = true
            }
            else
            {
                if (!(regexLetter.test(sku) || regexNumber.test(sku)))
                {
                    this.skuNotValid = true
                }
                else
                {
                    if (sku.length > 15 || name.length > 50)
                    {
                        this.errorMaxSize = true
                    }
                    else
                    {
                        sku = sku.toUpperCase();
                        var err = checkDataType(sku,name,price,this.productType) //In selection.js
                        if(!err)
                            this.errors = true
                    }
                }
            }
            e.preventDefault();
        }

    }
})

app.mount('#product_form')
