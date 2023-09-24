<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col relative">
            <div class="flex flex-col px-4 pt-4 pb-16 gap-4 bg-gray-800">
                <div>
                    <a class="block text-center bg-white rounded"href="{{ route('building', ['id' => $room['building']['id']]) }}">VOLTAR</a>
                </div>
                <audio src=""></audio>
                <div>
                    <p class="text-center font-bold text-white uppercase">{{ $room['building']['name'] }} - {{ $room['name'] }}</p>
                </div>
                <div class="flex flex-col p-2 bg-gray-700 rounded">
                    <select class="w-full text-center text-white rounded p-2 border bg-gray-600 border-gray-800" id="song">
                        <option value="">Escolha um sinal de entrada</option>
                        @foreach($songs as $song)
                            <option value="{{ asset('storage/'.$song) }}">{{ substr($song, 6) }}</option>
                        @endforeach
                    </select>
                    <p class="text-center text-sm text-white">ou</p>
                    <label for="file">
                        <p class="text-center text-blue-400 text-sm">faça upload de um arquivo (.wav ou .mp3)</p>
                    </label>
                    <input type="file" class="hidden" id="file">
                </div>
                <div class="flex flex-col p-2 bg-gray-700 rounded gap-2">
                    <select class="w-full text-center text-white rounded p-2 border bg-gray-600 border-gray-800" id="impulse">
                        <option value="">Escolha um ponto da sala</option>
                        @foreach($room['measurements'] as $measurement)
                            <option value="{{ asset('storage/'.$measurement['path']) }}">{{ $measurement['name'] }}</option>
                        @endforeach
                    </select>
                    <p class="text-center text-white font-bold">PLANTA BAIXA</p>
                    <iframe class="w-full h-60" src="{{ asset('storage/'.$room['blueprint_path']) }}"></iframe>
                </div>
                <div>
                    <div class="flex content-center w-full">
                        <p class="text-white font-bold m-auto">Ativar Convolução</p>
                    </div>
                    <div class="flex content-center w-full">
                        <label class="relative inline-flex items-center cursor-pointer m-auto">
                            <input type="checkbox" class="sr-only peer" name="active-convolution">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
                <div class="w-full max-w-6xl overflow-scroll lg:overflow-hidden lg:m-auto">
                    <canvas id="chart" class="w-full bg-gray-300">
                    </canvas>
                </div>
            </div>
            <div class="flex flex-col bg-transparent fixed bottom-0 left-0 w-full p-2">
                
                <div class="rounded-xl bg-gray-700 px-2 max-w-7xl w-full mx-auto">
                    <p class="text-center text-white text-sm font-bold" id="audioName"></p>
                    <div>
                        <input class="w-full h-1.5" type="range" id="timeRange" value=0 step="0.01">
                    </div>
                    <div class="flex flex-row justify-between px-1">
                        <p class="text-white text-xs w-20" id="currentTime">00:00</p>
                        <div class="flex flex-row justify-center">
                            <button id="play" data-playing="false" role="switch" aria-checked="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>
                            </button>                                          
                        </div>
                        <p class="text-white text-xs w-20 text-end" id="endTime">00:00</p>
                    </div>
                </div>
            </div>
            <script>
                const audioContext = new AudioContext()
                const audioElement = document.querySelector('audio');
                const track = audioContext.createMediaElementSource(audioElement);
                const playButton = document.getElementById('play');
                const convolutionButton = document.querySelector("input[name=active-convolution]");
                const analyser = audioContext.createAnalyser();
                analyser.fftSize = 1024;
                const bufferLength = analyser.frequencyBinCount;
                const dataArray = new Float32Array(bufferLength);

                let chart;
                let finalArray;
                let freqVector;
                let room;

                playButton.addEventListener(
                    "click",
                    async () => {
                    if (audioContext.state == "suspended") {
                        audioContext.resume();
                    }

                    if (playButton.dataset.playing == "false") {
                        audioElement.play();
                        playButton.dataset.playing = 'true';
                        playButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" /></svg>`

                        track.connect(analyser).connect(audioContext.destination);

                        analyser.getFloatFrequencyData(dataArray);

                        freqVector = createFreqVector(1024, 44100);
                        finalArray = formatDataArrayToPlot(freqVector, dataArray);
                        chart = createChart(finalArray);
                        updateChart();

                    } else {
                        audioElement.pause();
                        playButton.dataset.playing = 'false';
                        playButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" /></svg>`
                    }
                    }
                )
                

                convolutionButton.addEventListener(
                "change",
                async () => {
                if (convolutionButton.checked) {
                    $url = document.getElementById('impulse').value;
                    if ($url != '') {
                        room = await convolve($url);
                        track.disconnect();
                        track.connect(room).connect(analyser).connect(audioContext.destination);
                    } else {
                        convolutionButton.checked = false;
                    }
                } else {
                    room.disconnect();
                    track.connect(analyser).connect(audioContext.destination);
                }
                }
            )

            audioElement.addEventListener(
                "timeupdate",
                () => {
                    document.getElementById('currentTime').textContent = formatTime(audioElement.currentTime);
                    document.getElementById('endTime').textContent = formatTime(audioElement.duration);
                    document.getElementById('timeRange').min = 0;
                    document.getElementById('timeRange').max = audioElement.duration;
                    document.getElementById('timeRange').value = audioElement.currentTime;
                })

                audioElement.addEventListener(
                "ended",
                () => {
                audioElement.currentTime = 0;
                document.getElementById('currentTime').textContent = formatTime(audioElement.currentTime);
                document.getElementById('endTime').textContent = formatTime(audioElement.duration);
                document.getElementById('timeRange').min = 0;
                document.getElementById('timeRange').max = audioElement.duration;
                document.getElementById('timeRange').value = 0;

                playButton.dataset.playing = 'false';
                playButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" /></svg>`
                })
                
            document.getElementById('timeRange').addEventListener('input', (e) => {
                audioElement.currentTime = e.target.value;
            });

            document.getElementById('file').addEventListener(
                'change',
                () => {
                const file = document.getElementById('file').files[0];
                
                const url = URL.createObjectURL(file)

                audioElement.src = url

                document.getElementById('audioName').textContent = file.name
                })

                document.getElementById('song').addEventListener(
                'change',
                async (event) => {
                    const path = event.target.value;
                    const file = await fetch(path);
                    
                    const url = URL.createObjectURL(await file.blob())
                    audioElement.src = url
                    const name = path.split('/')
                    document.getElementById('audioName').textContent = name[name.length -1]
                }
            );



                const formatLogSticks = function(value, index, ticks) {
                switch (value) {
                case 20:
                    return 20;
                case 40:
                    return 40;
                case 60:
                    return 60;
                case 100:
                    return 100;
                case 200:
                    return 200;
                case 400:
                    return 400;
                case 1000:
                    return 1+' k';
                case 2000:
                    return 2+' k';
                case 4000:
                    return 4+' k';
                case 6000:
                    return 6+' k';
                case 10000:
                    return 10+' k';
                case 20000:
                    return 20+' k';
                default:
                    return '';
                }
            }

            function createChart(finalArray) {
                let chart = new Chart("chart", {
                type: "line",
                data: {
                    datasets: [{
                    data: finalArray,
                    }]
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
                            max: 0,
                            min: -90,
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Amplitude (dB)'
                        }
                        }],
                        xAxes: [{
                        display: true,
                        type: 'logarithmic',
                        ticks: {
                            max: 20000,
                            min: 20,
                            callback: formatLogSticks
                        },
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

            function createFreqVector(fftsize, samplerate) {
                const stepFreq = samplerate/fftsize;
                const maxFreq = samplerate/2;

                let vec = [];

                for (let aux = 0; aux < maxFreq; aux += stepFreq) {
                vec.push(aux); 
                }

                return vec;
            }

            function formatDataArrayToPlot(xAxis, yAxis) {
                let finalArray = [];

                xAxis.forEach((element, index) => {
                finalArray.push({x:element,y:yAxis[index]})
                })

                return finalArray;
            }

            function formatTime(seconds) {
                if (isNaN(seconds)) {
                    return "00:00";
                } else {
                    minutes = Math.floor(seconds / 60);
                    minutes = (minutes >= 10) ? minutes : "0" + minutes;
                    seconds = Math.floor(seconds % 60);
                    seconds = (seconds >= 10) ? seconds : "0" + seconds;
                    return minutes + ":" + seconds;
                }
                
            }

            async function convolve(filename) {
                let convolver = audioContext.createConvolver();

                let response = await fetch(filename);
                let arraybuffer = await response.arrayBuffer();
                convolver.buffer = await audioContext.decodeAudioData(arraybuffer);

                return convolver;
            }

            function updateChart() {
                requestAnimationFrame(updateChart);
                analyser.getFloatFrequencyData(dataArray);
                finalArray = formatDataArrayToPlot(freqVector, dataArray);
                chart.data.datasets[0].data = finalArray;
                chart.update();
            }
            </script>
        </div>
    </div>
</x-guest-layout>

