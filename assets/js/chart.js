
doughnutChart = document.getElementById('doughnutChart').getContext('2d'),
doughnutChart1 = document.getElementById('doughnutChart1').getContext('2d'),

$.ajax({
    type: "POST",
    url: SITE_URL+"dashboard/getEstab",
    dataType: "json",
    success: function(response) {
        console.log(response);
        new Chart(doughnutChart, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [response.total, response.active, response.inactive],
                    backgroundColor: ['#1972E8','#31CE36', '#6861CE',]
                }],
        
                labels: [
                'Total Establishment',
                'Active Establishment',
                'Inactive Establishment'
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

$.ajax({
    type: "POST",
    url: SITE_URL+"dashboard/getUsers",
    dataType: "json",
    success: function(response) {
        console.log(response);
        new Chart(doughnutChart1, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [response.total, response.admin, response.members],
                    backgroundColor: ['#1D7BF2','#F2545C', '#FCAF4A',]
                }],
        
                labels: [
                'Total Users',
                'Admin Users',
                'Members'
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