@extends('admin.layouts.base')
@section('contents')

<form action="{{ route('admin.restaurant.statistics.months', ['id' => $restaurant->id]) }}" method="GET">
<label for="month">Seleziona un mese:</label>
<select name="month" id="month" onchange="this.form.submit()">
    <option selected value="">Seleziona un mese:</option>
    @foreach ($labels as $index => $nomeMese)
        <option value="{{ $index + 1 }}">{{ $nomeMese }}</option>
    @endforeach
</select>
</form>

<canvas id="chartMonths" height="100px"></canvas>
    
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  
const labels = {{ json_encode($labels) }};
const data = {{ json_encode($data) }};
console.log(labels, data);

const chartData = {
    labels: labels,
    datasets: [{
        label: 'Total Orders',
        data: data,
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1,
    }],
};

const config = {
    type: 'bar',
    data: chartData,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1, // Imposta lo step dell'asse y
            },
        },
    },
};


    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        const myChart = new Chart(
            document.getElementById('chartMonths'),
            config
        );
    });
    

</script>