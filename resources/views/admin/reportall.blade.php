@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="p-3 p-lg-5 border bg-white">
                <div class="row mb-5">
                    <div style="width: 100%;">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var productNames = [];
        var productaty = [];
      
        // Loop through the products and populate the arrays
        @foreach ($productChart as $product)
            productNames.push('{{ $product['product_name'] }}');
            productaty.push('{{ $product['product_qty'] }}');
        @endforeach
        var ctx = document.getElementById('myChart').getContext('2d');

        // Define chart data
        var data = {
            labels: [productNames],
            datasets: [{
                label: 'รายงานสินค้าในร้าน',
                data: [productaty],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        };

        // Create a bar chart
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
        });
    </script>
@endsection
