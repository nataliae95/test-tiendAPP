@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <h1>Panel de Control</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>19</h3>
                        <p>Marcas Registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sharp fa-solid fa-tags"></i>
                    </div>
                    <a href="{{ route('marca.index') }}" class="small-box-footer">Ver mas
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>19</h3>
                        <p>Productos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-store"></i>
                    </div>
                    <a href="{{ route('producto.index') }}" class="small-box-footer">Ver mas
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <br />
        <br />
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body ">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    jQuery(function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Marcas', 'Productos'],
                datasets: [{
                    label: 'Usuarios (Últimos 2 años)',
                    data: [{!!$marcas!!},{!!$productos!!}],
                    backgroundColor: [
                        'rgba(26, 176, 188)',
                        'rgba(243, 180, 14)'
                    ],
                    hoverOffset: 2
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                height: 50,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>
@stop
