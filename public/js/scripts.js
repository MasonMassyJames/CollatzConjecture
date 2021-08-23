/*!
* Collatz Conjecture Generator - by MMJ
* Copyright 2021
* Licensed under MIT
*/

$(document).ready(function () {

  // Avoid send form when user press enter
  $(document).on("keydown", "form", function(event) { 
    if (event.key == "Enter") {
      event.preventDefault();
      $('#fake_submit_btn').trigger('click');
    }
  });

  // Handle user input immission
  $('.check_input').on('keydown', function (e) { 
    if (
      !(e.key).match(/^\d+$/) 
      && e.key !== 'ArrowLeft'
      && e.key !== 'ArrowRight'
      && e.key !== 'Backspace'
      && e.key !== 'Delete'
      ) {
      e.preventDefault();
      return;
    }
  });

  // Format user input
  $('.check_input').on('keyup', function (e) { 
    let val = $(this).val();
    val = val.replace(/\'/g, "");

    let formattedVal = val.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1\'');

    $(this).val(formattedVal);

  });

  // On click of submit form button
  $('#fake_submit_btn').click(function (e) { 

    $('#number_input')[0].setCustomValidity('');
    $('#limit_input')[0].setCustomValidity('');
    
    let _number = $('#number_input').val();
    let _limit = $('#limit_input').val();

    // ajax call
    $.ajax({
      type: "POST",
      url: "app/function.php",
      data: {
        'number' : _number,
        'limit' : _limit
      },

      success: function (res) {

        try {
          data = JSON.parse(res);
        } catch (error) {
          Swal.fire({
            icon: "error",
            title: "Ops",
            html: "<p>Something went wrong.</p>",
            allowEscapeKey: true,
            showConfirmButton: true,
          });
          return;
        }

        if (data.status === 'API_error') {
          Swal.fire({
            icon: "error",
            title: "Ops",
            html: "<p>" + data.api_output + "</p>",
            allowEscapeKey: true,
            showConfirmButton: true,
          });
        } else if (data.status !== 'ok') {
          $('#'+data.field)[0].setCustomValidity(data.status);
        } else {
          updateSequenceChart(data.numbers);
          updateEvenOddChart(data.even, data.odd);
        }

        $('#submit_btn').trigger('click');

      }
    });    
  });

  // Submit form
  $('#cc_form').submit(function (e) { 
    e.preventDefault();
  });

  generateSequenceChart();
  generateEvenOddChart();
});

// ########################
// ###  Sequence CHART  ###
// ########################
  var sequenceChart;
  function generateSequenceChart(){  

    // Setup
      const labels = [];
      const data = {
        labels: [],
        datasets: [{
          label: 'Value',
          backgroundColor: 'rgb(46, 85, 113)',
          borderColor: 'rgb(46, 85, 113)',
          data: [],
        }]
      };
    // end Setup

    // Config
      const config = {
        type: 'line',
        data,
        options: {
          responsive: true,
          plugins: {
            zoom: {
              zoom: {
                wheel: {
                  enabled: true,
                },
                pinch: {
                  enabled: true
                },
                mode: 'xy',
              },
              limits: {
                x: {min: 'original', max: 'original', minRange: 1},
                y: {min: 'original', max: 'original', minRange: 1}
              },
              pan: {
                enabled: true,
              }
            }
          }
        }
      };
    // end Config

    // Render
      sequenceChart = new Chart(
        document.getElementById('sequenceChart'),
        config
      );
  }

  function updateSequenceChart(numbers){

    sequenceChart.resetZoom();

    // Empty chart container
    sequenceChart.data.labels = [];
    sequenceChart.data.datasets.forEach((dataset) => {
        dataset.data = [];
    });

    let nrs = Object.values(numbers);
    const keys = Object.keys(numbers); 

    sequenceChart.data.labels = keys;
    sequenceChart.data.datasets.forEach((dataset) => {
        dataset.data = nrs;
    });
    sequenceChart.update();

    

    // go to anchor
    var target = $('#view_chart');

    $('html, body').animate({
      scrollTop: target.offset().top
    }, 1000);

  }

// ########################
// ###  Odd Even CHART  ###
// ########################
var evenOddChart;
function generateEvenOddChart(){  

  // Setup    
    const data = {
      labels: [''],
      datasets: [
        {
          label: 'Even',
          data: [0],
          backgroundColor: 'rgb(4, 107, 158)',
          borderColor: 'rgb(4, 107, 158)',
          display: false,
        },
        {
          label: 'Odd',
          data: [0],
          backgroundColor: 'rgb(106, 190, 233)',
          borderColor: 'rgb(106, 190, 233)',
        },
      ]
    };
  // end Setup

  // Config
    const config = {
      type: 'bar',
      data: data,
      options: {
        responsive: true,
        maintainAspectRatio: false,
        indexAxis: 'y',
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide
        elements: {
          bar: {
            borderWidth: 2,
          }
        },
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
          title: {
            display: true,
            text: 'Even - Odd'
          }
        }
      },
    };
  // end Config

  // Render
    evenOddChart = new Chart(
      document.getElementById('evenOddChart'),
      config
    );
}

function updateEvenOddChart(even, odd){

  // Empty chart container
  evenOddChart.data.datasets.forEach((dataset) => {
      dataset.data = [];
  });

  evenOddChart.data.datasets[0].data = [even];
  evenOddChart.data.datasets[1].data = [odd];

  evenOddChart.update();

}