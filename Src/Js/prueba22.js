const ctx1 = document.getElementById('doughnut');

const labels1 = ['Enero', 'Febrero', 'Marzo', 'Abril']; // esto lo pone uno o podemos hacerlo dinamico
const data = {
  labels: labels1,
  backgroundcolor: 'rgba(0, 247, 247, 0.2)',
  datasets: [{
    label: 'Ocultar',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: false,
    borderColor: 'rgb(238, 224, 30)',
    borderDashOffset: 10,
  }]
};

const config = {
    type: 'line',
    data: data,
    options: {
      color: 'rgb(3, 3, 3)',
      animations: {
        tension: {
          duration: 1000,
          easing: 'linear',
          from: 1,
          to: 0,
          loop: true
        }
      },
      scales: {
        y: { // defining min and max so hiding the dataset does not change scale range
          min: 0,
          max: 100
        }
      }
    }
  };

  new Chart(ctx1, config);