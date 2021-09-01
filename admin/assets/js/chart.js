doughnutChart = document.getElementById('doughnutChart').getContext('2d');

$.ajax({
    type: "POST",
    url: SITE_URL+"dashboard/getloans",
    dataType: "json",
    success: function(response) {
        console.log(response);
        var myDoughnutChart = new Chart(doughnutChart, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [response.total, response.active, response.paid],
                    backgroundColor: ['#1972E8','#6861CE','#31CE36']
                }],
        
                labels: [
                'Total Loans',
                'Active Loans',
                'Paid Loans'
                ]
            },
            options: {
                responsive: true, 
                maintainAspectRatio: false,
                legend : {
                    position: 'bottom'
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });
    }
});

