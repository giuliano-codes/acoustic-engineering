<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col gap-4 px-4">
            <form class="flex flex-col gap-2" wire:poll.5s="updateDate">
                <div class="flex flex-col gap-2">
                    <label class="text-white">Data de Início:</label>
                    <input type="date" class="rounded">
                    <label class="text-white">Data Final:</label>
                    <input type="date" class="rounded">
                </div>
                <div>
                    <button type="submit" class="text-center bg-gray-300 w-full rounded">Pesquisar</button>
                </div>
            </form>
            <div wire:ignore>
                <div class="w-full max-w-6xl overflow-scroll lg:overflow-hidden lg:m-auto">
                    <canvas id="time_chart" class="w-full bg-gray-300">
                    </canvas>
                    <canvas id="chart" class="w-full bg-gray-300 my-4">
                    </canvas>
                    <script>
                        function createChart(finalArray) {
                            let chart = new Chart("chart", {
                            type: "bar",
                            data: {
                                datasets: [{
                                data: finalArray,
                                }],
                                labels: ['20', '25', '31,5', '40', '50', '63', '80', '100', '125', '160', '200', '250', '315', '400', '500', '630', '800', '1k', '1,25k', '1,6k', '2k', '2,5k', '3,15k', '4k', '5k', '6,3k', '8k', '10k', '12,5k', '16k', '20k']
                            },
                            options: {
                                legend: {
                                display: false
                                },
                                responsive: true,
                                scales: {
                                    yAxes: [{
                                    display: true,
                                    ticks: {
                                        max: 150,
                                        min: 0,
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Amplitude (dB)'
                                    }
                                    }],
                                    xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Frequência (Hz)'
                                    }
                                    }]
                                }
                                }
                            });

                            return chart;
                        }

                        function createTimeChart(finalArray) {
                            let chart = new Chart("time_chart", {
                            type: "line",
                            data: {
                                datasets: [{
                                data: finalArray,
                                fill: false,
                                tension: 0
                                }],                                
                            },
                            options: {
                                legend: {
                                display: false
                                },
                                responsive: true,
                                scales: {
                                    yAxes: [{
                                    display: true,
                                    ticks: {
                                        max: 150,
                                        min: 0,
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Amplitude (NPS)'
                                    }
                                    }],
                                    xAxes: [{
                                    type: 'time',
                                    time: {
                                        unit: 'hour'
                                    },
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Tempo'
                                    }
                                    }]
                                }
                                }
                            });

                            return chart;
                        }
                    </script>
                </div>
            </div>
        </div>
        <script>
            let chartObj;
            let chartObjTime;

            document.addEventListener('livewire:initialized', () => {
                @this.on('create-chart', (event) => {
                    console.log(event)
                    if (typeof chartObj !== 'undefined') {
                        chartObj.data.datasets[0].data = event.data;
                        chartObj.update();
                    } else {
                        chartObj = createChart(event.data);
                    }

                    if (typeof chartObjTime !== 'undefined') {
                        chartObjTime.data.datasets[0].data = event.time_data.datas;
                        chartObjTime.update();
                    } else {
                        chartObjTime = createTimeChart(event.time_data.datas);
                    }
                });
            });
        </script>
    </div>
</div>