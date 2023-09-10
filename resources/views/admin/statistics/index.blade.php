@extends('admin.layouts.base')

@section('contents')

<h1>Laravel 9 ChartJS Chart Example - ItSolutionStuff.com</h1>
<canvas id="myChart" height="100px"></canvas>
    
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var orders =  {{ Js::from($data) }};
    // let scaleY = 10 * Math.ceil(maxMonthOrders / 10) + 10;

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: orders,
        }]
    };

    const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        min: 0,
                        max: 100
                    }
                },
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 0.55,
                        to: 0.5,
                        loop: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    },
                },
                elements: {
                    bar: {
                        borderRadius: 7
                    },
                    point: {
                        hitRadius: 40,
                        hoverRadius: 10,
                        radius: 5,
                        pointStyle: 'circle'
                    }
                }
            }
        };

    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        console.log(data);
    });

</script>