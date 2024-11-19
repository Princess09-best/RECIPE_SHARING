const salesChart = document.getElementById('salesChart').getContext('2d');
const categoryChart = document.getElementById('categoryChart').getContext('2d');
const funnelChart = document.getElementById('funnelChart').getContext('2d');

// Sales Chart
new Chart(salesChart, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
            label: 'No. Recipes per month',
            data: [300, 400, 350, 450, 500, 380, 410,600,800,250,900,340],
            backgroundColor: 'rgba(255, 140, 0, 0.6)',
        }]
    },
    options: {
        responsive: true,
    }
});

// Category Chart
new Chart(categoryChart, {
    type: 'doughnut',
    data: {
        labels: ['Baking Recipes', 'Fried recipes', 'Seafood recipes'],
        datasets: [{
            data: [25, 35, 40],
            backgroundColor: ['#FF8C00', '#8B0000', '#FFCE56'],
        }]
    },
    options: {
        responsive: true,
    }
});

// Top 5 users of system
new Chart(funnelChart, {
    type: 'bar',
    data: {
        labels: ['Jeffery', 'Eugenia', 'Doreen', 'Jane','Chloe'],
        datasets: [{
            label: 'Top 5 users of the system',
            data: [4562, 2562, 1262, 1000,700],
            backgroundColor: [
                '#CC5500',   
                '#FFA500',   
                '#A0522D',   
                '#FFBF00'    
            ],
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
