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
                <div class="mx-auto hidden" id="loading">
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="flex flex-col p-2 bg-gray-700 rounded gap-2">
                    <select class="w-full text-center text-white rounded p-2 border bg-gray-600 border-gray-800" id="impulse">
                        <option value="">Escolha um ponto da sala ou uma HRTF</option>
                        @foreach($room['measurements'] as $measurement)
                            <option class="uppercase" value="{{ asset('storage/'.$measurement['path']) }}">{{ $measurement['name'] }} ({{ $measurement['type'] }})</option>
                        @endforeach
                        @foreach($hrtfs as $hrtf)
                            <option class="uppercase" value="{{ asset('storage/'.$hrtf['path']) }}">{{ $hrtf['name'] }}</option>
                        @endforeach
                    </select>
                    <p class="text-center text-sm text-white">ou</p>
                    <label for="file-response">
                        <p class="text-center text-blue-400 text-sm">faça upload de um arquivo (.wav ou .mp3)</p>
                    </label>
                    <input type="file" class="hidden" id="file-response">
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
                        track.disconnect();


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
                            track.disconnect();
                            track.connect(analyser).connect(audioContext.destination);
                        }

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
                    track.disconnect();
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
            
            document.getElementById('file-impulse').addEventListener(
                'change',
                () => {
                const file = document.getElementById('file-impulse').files[0];
                
                const url = URL.createObjectURL(file)

                document.getElementById('impulse').value = url
            })

            document.getElementById('song').addEventListener(
                'change',
                async (event) => {
                    const path = event.target.value;
                    document.getElementById('loading').classList.remove('hidden');
                    const file = await fetch(path);
                    const url = URL.createObjectURL(await file.blob())
                    document.getElementById('loading').classList.add('hidden');
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

