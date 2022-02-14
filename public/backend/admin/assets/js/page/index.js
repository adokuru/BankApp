"use strict";

var my_url = $('#my_url').val();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    type: 'POST',
    url: my_url,
    dataType: 'json',
    success: function(response) {
        let usd = ' <span>&#36;</span>';

        $('#total_users').html(response.user.total ?? 0);
        $('#active_users').html(response.user.active ?? 0);
        $('#email_verified').html(response.user.mail_verified ?? 0);
        $('#phone_verified').html(response.user.phone_verified ?? 0);
        $('#total_deposit').html(response.deposits.deposit ?? 0).append(usd);

        $('#number_of_fixed_deposit').html(response.fixed_deposit.number_of_deposit ?? 0);
        $('#fixed_deposit_queue').html(response.fixed_deposit.queue ?? 0);
        $('#fixed_deposit_completed').html(response.fixed_deposit.complete ?? 0);
        $('#fixed_deposit_cancelled').html(response.fixed_deposit.cancelled ?? 0);
        $('#fixed_deposit_amount').html(response.fixed_deposit.total_amount ?? 0).append(usd);
        $('#fixed_deposit_return').html(response.fixed_deposit.total_return ?? 0).append(usd);
        $('#fixed_deposit_interest').html(response.fixed_deposit.total_interest ?? 0).append(usd);


        $('#loan_pending').html(response.loan.pending ?? 0);
        $('#loan_queue').html(response.loan.queue ?? 0);
        $('#loan_given').html(response.loan.given ?? 0).append(usd);
        $('#loan_complete').html(response.loan.complete ?? 0).append(usd);

        $('#total_deposit_number').html(response.deposit.number ?? 0);
        $('#total_deposit_amount').html(response.deposit.amount ?? 0).append(usd);
        $('#total_deposit_charge').html(response.deposit.charge ?? 0).append(usd);

        $('#other_bank_total').html(response.other_bank.total_number ?? 0);
        $('#other_bank_approved').html(response.other_bank.approved ?? 0);
        $('#other_bank_reject').html(response.other_bank.reject ?? 0);
        $('#other_bank_pending').html(response.other_bank.pending ?? 0);
        $('#other_bank_amount').html(response.other_bank.amount ?? 0).append(usd);
        $('#other_bank_charge').html(response.other_bank.charge ?? 0).append(usd);
        $('#withdraw_total').html(response.withdraw.total ?? 0).append(usd);
        $('#withdraw_approved').html(response.withdraw.approved ?? 0);
        $('#withdraw_pending').html(response.withdraw.pending ?? 0);
        $('#withdraw_reject').html(response.withdraw.reject ?? 0);
        $('#withdraw_charge').html(response.withdraw.charge ?? 0).append(usd);
        $('#bill_complete').html(response.bill.complete ?? 0);
        $('#bill_pending').html(response.bill.pending ?? 0);
        $('#bill_total').html(response.bill.total ?? 0).append(usd);

        $('#pening_support').html(response.statics.pending_support);
        $('#pending_withdraw').html(response.statics.total_pening_withdraw);
        $('#pending_deposit').html(response.statics.pending_deposit);
        $('#total_issue').html(response.statics.total_issues);
        $('#deposit_sum').html(response.transactions.deposit_sum).append(usd);
        $('#all_transaction_count').html(response.transactions.all_transaction_count);

        var dates = [];
        var totals = [];

        $.each(response.transactions.deposit_transactions, function(index, value) {
            var dat = value.month + ' ' + value.year;
            var total = value.amount;

            dates.push(dat);
            totals.push(total);
        });
        deposit_transactions(dates, totals);


        var date = [];
        var total = [];

        $.each(response.transactions.all_transaction, function(index, value) {
            var dats = value.month + ' ' + value.year;
            var totals = value.transaction;

            date.push(dats);
            total.push(totals);
        });
        all_transactions(date, total);


    },
    error: function(xhr, status, error) {

    }
})

var balance_chart = document.getElementById("deposit_transactions").getContext('2d');

var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

function deposit_transactions(dates, totals) {

    var myChart = new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Total Amount',
                data: totals,
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });

}


var balance_chart1 = document.getElementById("all_transactions").getContext('2d');

var balance_chart_bg_color1 = balance_chart.createLinearGradient(0, 0, 0, 70);
balance_chart_bg_color1.addColorStop(0, 'rgba(63,82,227,.2)');
balance_chart_bg_color1.addColorStop(1, 'rgba(63,82,227,0)');

function all_transactions(dates, totals) {

    var myChart = new Chart(balance_chart1, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Total Transactions',
                data: totals,
                backgroundColor: balance_chart_bg_color1,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });

}