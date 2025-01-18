const ctx3 = document.getElementById('grafic3');

const data3 = {
    labels: [
      'Red',
      'Green',
      'Yellow',
      'Grey',
      'Blue'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [11, 16, 7, 3, 14],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(75, 192, 192)',
        'rgb(255, 205, 86)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 235)'
      ],
      borderColor: ['rgb(0, 0, 0)'],
      borderWidth: 0,
      
    }]
  };

  
const config3 = {
    type: 'polarArea',
    data: data3,
    options: {
      color: 'rgb(10, 10, 10)',
      borderDash: [10],	
    }
  };

  new Chart(ctx3, config3);
 