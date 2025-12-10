<div>
    <div class="row"> 
        <div class="col-12">
            <div class="card"> 
                <div class="card-body"> 
                    <h4 class="card-title">Dashboard Guru</h4>
                    <p class="card-description">Selamat datang di dashboard guru</p>

                    <h1>Assalaamualaikum, Guru {{ Auth()->user()->name }}!</h1> 
                </div> 
                <div class="card-body"> 


                   
                    <div class="mt-3">
                        <livewire:clock timezone="Asia/Jakarta" format="H:i:s" />
                    </div> 

                </div> 
                <div class="container py-4">

    <h3 class="fw-bold mb-3">Persentase Setoran Per Hari</h3>

    <canvas id="percentageChart" height="110"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('percentageChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($percentageDaily->pluck('tgl')),
            datasets: [{
                label: 'Persentase (%)',
                data: @json($percentageDaily->pluck('persen')),
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true, max: 100 }
            }
        }
    });
</script>

            </div> 

        </div>
    </div>
</div>
