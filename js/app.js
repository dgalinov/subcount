$(document).read(function(){
    $.ajax({
        url: "http://localhost/subcount/Dashboard.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var subscribed = [];
            var email = [];

            for(var i in data) {
                email.push("Email "+data[i].id_company);
                subscribed.push(data[i].subscribed);
            }
            var chartdata = {
                labels: email,
                datasets : [
                    {
                        label : 'Email subscribed',
                        background: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.7)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: subscribed
                    }
                ]
            };
            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            })
        },
        error: function (data) {
            console.log(data);
        }
    })

});