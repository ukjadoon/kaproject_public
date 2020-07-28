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
                data-min-value="0"
                data-start-angle="90"
                data-ticks-angle="180"
                data-value-box="false"
                data-max-value="30000"
                data-major-ticks="0,5000,10000,15000,20000,25000,30000"
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
        </div>
    </div>

</div>
<div class="mt-4 flex justify-center">
    <iframe id="iframe" src="{{ route('iframe-client-landing-page', ['id' => $client->id]) }}" scrolling="no" onload="adjustIframe()" frameborder="0" allowtransparency="true" style="display: block; border: none; width: 100%; overflow:hidden;" target="_self"></iframe>
</div>
@endsection
<script>
    function getData() {
        return {
            price: {{ $price }},
            width: 1,
            stepSize: 1,
            modifyPrice() {
                let id=setInterval(frame, 35);
                let elem = document.getElementById("progress-bar");
                var self = this;
                self.stepSize = self.price/100;
                self.price = 25000/100;
                function frame() {
                    if (self.width >= 100) {
                        clearInterval(id);
                    } else {
                        self.price+=self.stepSize
                        self.width++;
                        elem.style.width = self.width + '%';
                    }
                }
            }
        }
    }

    function adjustIframe() {
        var iframe = document.getElementById('iframe');
        var iframeHeight = iframe.contentWindow.document.body.scrollHeight + 'px';
        //console.log();
        iframe.src = '{{ $client->homepage_url }}';
        iframe.style.height = iframeHeight;
    }
</script>
