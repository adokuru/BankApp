 "use strict";

 var user_info=$('#user_info').val();
 var transaction_url=$('#transaction_url').val();
 
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $.ajax({
    type: 'POST',
    url:  user_info,
    dataType: 'json',
    success: function(response){ 
        
        window.setTimeout(function () {
            let transactions = response.transactions;
            let deposit = response.total_deposit ?? 0;
            let withdraw = response.total_withdraw ?? 0;
            let amount = response.amount ?? 0;
            $('.loader').css('display','none');
            $('#balance').text('$' + amount);
            $('#deposit').text('$' + deposit);
            $('#withdraw').text('$' + withdraw);
            if (transactions.length != 0) {
                $.each( transactions, function( i, transaction ) {
                    let view_href = transaction_url + '/' + transaction.id;
                    let date = new Date(transaction.created_at).getDate();
                    date += '-' + new Date(transaction.created_at).getMonth() + 1;
                    date += '-' +  new Date(transaction.created_at).getFullYear();
                    
                    let html = `<tr>`;
                    html += `<td>${i+1}</td>`;
                    html += `<td>${transaction.trxid}</td>`;
                    html += `<td>${transaction.amount}</td>`;
                    html += `<td>${transaction.balance}</td>`;
                    html += `<td>${transaction.fee}</td>`;
                    html += `<td>${transaction.type}</td>`;
                    html += `<td>${transaction.status == 1 ? 'Success' : (transaction.status == 2 ? 'Pending' : 'Rejected') }</td>`;
                    html += `<td>${date}</td>`;
                    html += `<td><a class="btn btn-primary" href=${view_href}>View</a></td>`;
                    html += `</tr>`;
                    $('.transactions').append(html);
                });
            }else{
                let html = `<tr>`;
                html += `<td colspan=8 class='text-center'>No Data</td>`;
                html += `</tr>`;  
                $('.transactions').append(html);
            }    
        }, 1000 );	
    },
    error: function(xhr, status, error) 
    {
        location.reload();
    }
})