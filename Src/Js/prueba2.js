const ctx = document.getElementById('barchart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Pollo', 'Puerco', 'Chivo', 'Borrego'],
      datasets: [{
        label: 'Ocultar',
        data: [12, 19, 3, 5],
        borderWidth: 1,
        
        
      }]
     

    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      color: 'rgb(0, 0, 0)',
      
    }
  });