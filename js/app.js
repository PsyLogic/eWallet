$(function(){

    // Global variables for elements body
    var wallet = $('#collapse-wallet .card-body table tbody'); 
    var transaction = $('#collapse-transaction .card-body table tbody'); 
    var payment = $('#collapse-payment .card-body table tbody'); 
    var customer = $('#collapse-customer .card-body table tbody'); 
    var shopping_cart = $('#collapse-shopping-cart .card-body table tbody'); 
    
    // Clear all body of result information
    function clearResult(){
        $('.collapse .card-body').html('');
    }

    // hide result information box until the form submited
    $('#result').hide();
    
    // sumbit form
    $('form').submit(function(e){

        e.preventDefault();
        $('#submit').html('Searching...');
        $('#submit').prop('disabled',true);

        $.ajax({
            type:'GET',
            url:'get_info.php',
            data:{transaction_id: $("#transaction_id").val()},
            success:function(response){
                $('#result').slideDown('slow');
                var data = $.parseJSON(response);
                var row ='';

                // Fill Wallet information
                row = '<tr><td>'+data[0].Wallet.id+'</td>\
                            <td>'+data[0].Wallet.financialstatus+'</td>\
                            <td>'+data[0].Wallet.fastcheckout+'</td>\
                            <td>'+data[0].Wallet.status+'</td>\
                            <td>'+data[0].Wallet.created+'</td>\
                            <td>'+data[0].Wallet.modified+'</td>\
                            </tr>';
                wallet.html(row);

                // Fill Transaction 
                row = '<tr><td>'+data[1].Transaction.id+'</td>\
                            <td>'+data[1].Transaction.description+'</td>\
                            <td>'+data[1].Transaction.cost+'</td>\
                            <td>'+data[1].Transaction.amount+'</td>\
                            <td>'+data[1].Transaction.amountrefunded+'</td>\
                            <td>'+data[1].Transaction.currency+'</td>\
                            </tr>';
                transaction.html(row);

                // Fill Payment
                row = '<tr><td>'+data[2].Payment.accountid+'</td>\
                            <td>'+data[2].Payment.externaltransactionid+'</td>\
                            <td>'+data[2].Payment.type+'</td>\
                            </tr>';
                payment.html(row);
                
                // Fill Customer

                row = '<tr><td>'+data[3].Customer.firstname+'</td>\
                            <td>'+data[3].Customer.lastname+'</td>\
                            <td>'+data[3].Customer.email+'</td>\
                            <td>'+data[3].Customer.address1+'</td>\
                            <td>'+data[3].Customer.housenumber+'</td>\
                            <td>'+data[3].Customer.city+'</td>\
                            <td>'+data[3].Customer.zipcode+'</td>\
                            <td>'+data[3].Customer.country+'</td>\
                            <td>'+data[3].Customer.locale+'</td>\
                            <td>'+data[3].Customer.amount+'</td>\
                            <td>'+data[3].Customer.currency+'</td>\
                            </tr>';
                customer.html(row);
                
                
                // Fill Shopping cart

                row='';
                $.each(data[4].ShoppingCart.item, function(ie,iv){
                    row += '<tr><td>'+iv["merchant-item-id"]+'</td>\
                            <td>'+iv["item-name"]+'</td>\
                            <td>'+iv["item-description"]+'</td>\
                            <td>'+iv["quantity"]+'</td>\
                            <td>'+iv["unit-price"]+'</td>\
                            <td>'+iv["tax-table-selector"]+'</td>\
                            </tr>';
                });

                shopping_cart.html(row);

                $('#submit').html('Get Info');
                $('#submit').prop('disabled',false);
            },
            error:function(response){
                console.log(response);
                $('#submit').html('Get Info');
                $('#submit').prop('disabled',false);
            }
        });
    });

    

})