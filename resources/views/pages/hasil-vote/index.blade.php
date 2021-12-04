<x-app-layout>
    <x-slot name="header_content">
        <h1>Hasil vote</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Hasil Pemilihan
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4">
                                <canvas id="voteChart" width="250" height="250"></canvas>
                                    <script>
                                        window.onload = function() {
                                            const ctx = document.getElementById('voteChart').getContext('2d');
                                            const candidateNames = <?php echo $namesJson; ?>;
                                            const candidateVotes = <?php echo $votesJson; ?>;
                                            const voteChart = new Chart(ctx, {
                                                type: 'doughnut',
                                                data: {
                                                    labels: candidateNames,
                                                    datasets:[{
                                                        label: 'Jumlah vote',
                                                        data: candidateVotes,
                                                        backgroundColor: [
                                                            'rgb(255, 99, 132)',
                                                            'rgb(54, 162, 235)',
                                                            'rgb(255, 205, 86)'
                                                        ],
                                                        hoverOffset: 4
                                                    }]
                                                },
                                                options: {

                                                }
                                            })
                                        };
                                    </script>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                @foreach($votes as $v)
                                    <div>
                                        <strong class="inline text-xl">{{$v['name']}}: </strong>
                                        <p class="inline text-xl">{{$v['count']}} votes</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
