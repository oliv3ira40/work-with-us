$(function() {

    function setCharAt(str, index, num, chr)
    {
        if(index > str.length-1) return str;
        return str.substr(0,index) + chr + str.substr(index+num);
    }
    
    var time_defition = $(".time_defition");
    if (time_defition.length > 0)
    {
        var options =  {
            onKeyPress: function(time_defition, event, currentField, options){
                var hours = parseInt(time_defition.substr(4, 2));
                var minutes = parseInt(time_defition.substr(7, 2));

                if (hours > 23) {
                    currentField.val(setCharAt(time_defition, 4, 2, 23));
                }
                
                if (minutes > 59) {
                    currentField.val(setCharAt(time_defition, 7, 2, 59));
                }
            },
        };

        time_defition.mask('000 00:00', options);
    }


    var mask_cpf = $(".mask_cpf");
    if (mask_cpf.length > 0)
    {
        mask_cpf.mask('000.000.000-00');
    }

    var mask_cnpj = $(".mask_cnpj");
    if (mask_cnpj.length > 0)
    {
        mask_cnpj.mask('00.000.000/0000-00');
    }

    var mask_telefone = $(".mask_telefone");
    if (mask_telefone.length > 0)
    {
        mask_telefone.on('input', function() 
        {
            var length_telefone = mask_telefone.val().replace(/\D/g, '').length;
            
            if (length_telefone <= 8) {
                console.log('0000-0000');
                
                mask_telefone.mask('0000-0000');
            } else if (length_telefone <= 9)
            {
                console.log('00000-0000');
                
                mask_telefone.mask('00000-0000');
            }
        });
    }

    // Mask Money
    var currency = $(".currency");
    if (currency.length > 0)
    {
        currency.maskMoney({
            prefix: "",
            decimal: ",",
            thousands: "."
        });
    }
});




// SILAS
// String.prototype.replaceContent=function(index, text) {
//     return this.substr(0, index) + text + this.substr((index+text.length));
// }
// Como usar 
// console.log( 'hello'.replaceContent(2, 'LL') );