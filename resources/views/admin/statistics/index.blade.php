@extends('admin.layouts.base')

@section('contents')


{{-- <form action="{{ route('admin.restaurant.statistics', ['id' => $restaurant->id]) }}" method="GET">
    <label for="month">Seleziona un mese:</label>
    <select name="month" id="month" onchange="this.form.submit()">
        <option selected value="">Seleziona un mese:</option>
        @foreach ($labels as $index => $nomeMese)
            <option value="{{ $index + 1 }}">{{ $nomeMese }}</option>
        @endforeach
    </select>
</form> --}}
<canvas id="myChart" height="100px"></canvas>
    
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  
    var labels =  {{ Js::from($labels) }};
    var orders =  {{ Js::from($data) }};
    console.log(orders, labels);

    const data = {
        labels: labels,
        datasets: [{
            label: 'Orders in this year',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: orders,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };


    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    });
    

</script>