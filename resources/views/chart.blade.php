<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row justify-content-center m-0">
        <div class="col-sm-10">
            <nav>
                <div class="row">
                    <div class="col-sm-12 pt-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-chart1-tab" data-bs-toggle="tab" data-bs-target="#nav-chart1" type="button"  role="tab" aria-controls="nav-chart1" aria-selected="true"><b>ColA Vs Slno</b></button>
                            <button class="nav-link myBtn" id="nav-chart2-tab" data-bs-toggle="tab" data-bs-target="#nav-chart2" type="button" role="tab"   aria-controls="nav-chart2" aria-selected="true"><b>ColB Vs Slno</b></button>
                            <button class="nav-link myBtn" id="nav-chart3-tab" data-bs-toggle="tab" data-bs-target="#nav-chart3" type="button" role="tab"   aria-controls="nav-chart3" aria-selected="true"><b>Avg(colA) Vs Date</b></button>
                            <button class="nav-link myBtn" id="nav-chart4-tab" data-bs-toggle="tab" data-bs-target="#nav-chart4" type="button" role="tab"   aria-controls="nav-chart4" aria-selected="true"><b>Avg(colB) Vs Date</b></button>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="tab-content pt-4 border" id="nav-tabContent" style="font-size: 10px !important;background-color: white" >
                <!-- {{-- Charts --}} -->
                <div class="tab-pane fade active show "  id="nav-chart1" role="tabpanel" aria-labelledby="nav-chart1-tab">
                    <canvas id="chart-1"></canvas>
                </div>
                <div class="tab-pane fade pb-5" id="nav-chart2" role="tabpanel"   aria-labelledby="nav-chart2-tab">
                    <canvas id="chart-2"></canvas>
                </div>
                <div class="tab-pane fade pb-5" id="nav-chart3" role="tabpanel"   aria-labelledby="nav-chart3-tab">
                    <canvas id="chart-3"></canvas>
                </div>
                <div class="tab-pane fade pb-5" id="nav-chart4" role="tabpanel"   aria-labelledby="nav-chart4-tab">
                    <canvas id="chart-4"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('chart-1');
        var cData = JSON.parse(`<?php echo $id; ?>`);
        var cCtc = JSON.parse(`<?php echo $colA; ?>`)
        new Chart(ctx, {
        type: 'bar',
        data: {
          labels: cData,
          datasets: [{
            label: "remove all",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856"],
            data: cCtc,
            borderWidth: 0
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script>
    <script>
        const ctx1 = document.getElementById('chart-2');
        var cData = JSON.parse(`<?php echo $id; ?>`);
        var cCtc = JSON.parse(`<?php echo $colB; ?>`)
        new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: cData,
          datasets: [{
            label: " ",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856"],
            data: cCtc,
            borderWidth: 0
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script>
    <script>
        const ctx2 = document.getElementById('chart-3');
        var cData = JSON.parse(`<?php echo $date; ?>`);
        var cCtc = JSON.parse(`<?php echo $avg_colA; ?>`);
        new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: cData,
          datasets: [{
            label: cCtc,
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856"],
            data: cCtc,
            borderWidth: 0
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script>
    <script>
        const ctx3 = document.getElementById('chart-4');
        var cData = JSON.parse(`<?php echo $date; ?>`);
        var cCtc = JSON.parse(`<?php echo $avg_colB; ?>`)
        new Chart(ctx3, {
        type: 'bar',
        data: {
          labels: cData,
          datasets: [{
            label: cCtc,
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856"],
            data: cCtc,
            borderWidth: 0
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script>
    {{-- <script>
        var cData = JSON.parse(`<?php echo $display_name; ?>`);
        var cCtc = JSON.parse(`<?php echo $display_value; ?>`);
        const ctx = document.getElementById('chart-2');
        // if (window.innerWidth <= 350) {
        //     Chart.defaults.font.size = 3;
        // } else if (window.innerWidth <= 480) {
        //     Chart.defaults.font.size = 5;
        // }else if (window.innerWidth <= 768) {
        //     Chart.defaults.font.size = 7;
        // } else if (window.innerWidth <= 1200) {
        //     Chart.defaults.font.size = 8;
        // } else {
        //     Chart.defaults.font.size = 10;
        // }
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: cData,
          datasets: [{
            label: "Remove All",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856",],
            data: cCtc,
            borderWidth: 1
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script>
    <script>
        var cData = JSON.parse(`<?php echo $display_name; ?>`);
        var cCtc = JSON.parse(`<?php echo $display_value; ?>`);
        const ctx = document.getElementById('chart-3');
        // if (window.innerWidth <= 350) {
        //     Chart.defaults.font.size = 3;
        // } else if (window.innerWidth <= 480) {
        //     Chart.defaults.font.size = 5;
        // }else if (window.innerWidth <= 768) {
        //     Chart.defaults.font.size = 7;
        // } else if (window.innerWidth <= 1200) {
        //     Chart.defaults.font.size = 8;
        // } else {
        //     Chart.defaults.font.size = 10;
        // }
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: cData,
          datasets: [{
            label: "Remove All",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856",],
            data: cCtc,
            borderWidth: 1
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script>
    <script>
        var cData = JSON.parse(`<?php echo $display_name; ?>`);
        var cCtc = JSON.parse(`<?php echo $display_value; ?>`);
        const ctx = document.getElementById('chart-4');
        // if (window.innerWidth <= 350) {
        //     Chart.defaults.font.size = 3;
        // } else if (window.innerWidth <= 480) {
        //     Chart.defaults.font.size = 5;
        // }else if (window.innerWidth <= 768) {
        //     Chart.defaults.font.size = 7;
        // } else if (window.innerWidth <= 1200) {
        //     Chart.defaults.font.size = 8;
        // } else {
        //     Chart.defaults.font.size = 10;
        // }
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: cData,
          datasets: [{
            label: "Remove All",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850","#c45856",],
            data: cCtc,
            borderWidth: 1
          }]
        },
        options: {
        scales: {
                y: {
                    beginAtZero: true,
                }
        }
        }
      });
    </script> --}}


</body>
</html>
