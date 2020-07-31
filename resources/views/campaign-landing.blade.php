@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto sm:px-6 lg:px-4 px-4">
    <div class="flex flex-col justify-between mt-2 bg-white shadow-md sm:rounded-lg p-4 sm:p-8">
        <div class="flex flex-col items-center justify-between">
            <div class="flex-shrink-0 flex items-center mb-4">
                <img class="block lg:hidden h-9 w-auto"
                    src="/img/ka-logo.png" alt="byggkostnad logo">
                <img class="hidden lg:block h-9 w-auto"
                    src="/img/ka-logo.png" alt="byggkostnad logo">
            </div>
            <div>
                <canvas data-type="radial-gauge"
                data-width="200"
                data-height="200"
                data-units="SEK"
                data-min-value="{{ $price - 20000 }}"
                data-start-angle="90"
                data-ticks-angle="180"
                data-value-box="false"
                data-max-value="{{ $maxLimit }}"
                data-major-ticks="{{ $price - 20000 }},{{ $price - 15000 }},{{ $price - 10000  }},{{ $price - 5000 }},{{ $price }},{{ $maxLimit }}"
                data-minor-ticks="1"
                data-stroke-ticks="true"
                data-highlights='[
                    {"from": {{ $dangerFrom }}, "to": {{ $maxLimit }}, "color": "rgba(200, 50, 50, .75)"}
                ]'
                data-color-plate="#fff"
                data-border-shadow-width="0"
                data-borders="false"
                data-needle-type="arrow"
                data-needle-width="2"
                data-needle-circle-size="7"
                data-needle-circle-outer="true"
                data-needle-circle-inner="false"
                data-animation-duration="4500"
                data-animation-rule="linear"
                data-animated-value="true"
                data-animate-on-init="true"
                data-value="{{ $price }}"
                ></canvas>
            </div>
            <div class="-mt-10 z-10">
                <span class="text-red-700 font-semibold">Medelpriset för KA i din region är</span>
            </div>
        </div>
        <div class="w-full z-10" x-data="getData()" x-init="modifyPrice()">
            <div class="shadow w-full bg-gray-100 mt-0" x-cloak>
                <div 
                    id="progress-bar"
                    class="bg-red-600 text-xs leading-none py-1 text-center text-white text-xl font-semibold"
                    x-html="price + 'kr'"
                >
                </div>
            </div>
            <div class="text-center mt-4" x-show="showClient"
                x-transition:enter="transition ease-in duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            >
                <span class="font-semibold">Vi har hittat en billigare KA i din region</span><br />
                <span x-show="secondsLeft"><a href="{{ $client->homepage_url }}" class="font-semibold text-red-600">Klicka här</a> för att besöka deras hemsida omedelbart eller vänta...<span x-text="secondsLeft"></span> <span x-text="seconds"></span> för att bli omdirigerad automatiskt</span>
                <span x-show="!secondsLeft">omdirigerar...</span>
            </div>
        </div>
    </div>

</div>
@endsection
<script>
    function getData() {
        return {
            price: {{ $price }},
            width: 1,
            stepSize: 1,
            showClient: false,
            secondsLeft: 5,
            seconds: 'sekunder',
            modifyPrice() {
                let id=setInterval(frame, 35);
                let elem = document.getElementById("progress-bar");
                var self = this;
                self.stepSize = self.price/100;
                self.price = self.price/100;
                function frame() {
                    if (self.width >= 100) {
                        clearInterval(id);
                        self.showClient = true;
                        self.redirectCountdown();
                    } else {
                        self.price+=self.stepSize
                        self.width++;
                        elem.style.width = self.width + '%';
                    }
                }
            },
            redirectCountdown() {
                console.log('here');
                let id = setInterval(countdown, 1000);
                var self = this;
                function countdown() {
                    if (self.secondsLeft == 0) {
                        clearInterval(id);
                        window.location.href = "{{ $client->homepage_url }}"
                    } else {
                        self.secondsLeft--;
                        if (self.secondsLeft < 2) {
                            self.seconds = 'sekund';
                        }
                    }
                }
            }
        }
    }
</script>
