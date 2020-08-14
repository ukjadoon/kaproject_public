@extends('layouts.app')

@section('content')
<div class="relative bg-gray-50">
  <div class="relative bg-white shadow" x-data="{mobile: false}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
        <div class="w-0 flex-1 flex">
          <a href="/" class="inline-flex">
            <img class="h-8 w-auto sm:h-10" src="/img/ka-logo.png" alt="Byggkostnad logo">
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <button x-on:click="mobile = !mobile" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10">
          <a href="#vara-tjanster" class="text-gray-500 inline-flex items-center space-x-2 text-base leading-6 font-medium hover:text-gray-900 transition ease-in-out duration-150">
            Våra tjänster
          </a>
          <a href="#rekommendationer" class="text-base leading-6 font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
            Rekommendationer
          </a>
          <a href="#kontakt" class="text-base leading-6 font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
            Kontakt
          </a>
        </nav>
        <div class="hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
          <span class="inline-flex rounded-md shadow-sm">
            <a href="{{ route('login') }}" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
              Logga in
            </a>
          </span>
        </div>
      </div>
    </div>

    <!--
      Mobile menu, show/hide based on mobile menu state.

      Entering: "duration-200 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div class="absolute top-0 inset-x-0 z-10 p-2 transition transform origin-top-right md:hidden"
      x-show="mobile"
      x-transition-enter="duration-300 ease-linear transition-opacity transition-scale"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="duration-100 ease-in"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
    >
      <div class="rounded-lg shadow-lg">
        <div class="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
          <div class="pt-5 pb-6 px-5 space-y-6">
            <div class="flex items-center justify-between">
              <div>
                <img class="h-8 w-auto" src="/img/ka-logo.png" alt="Byggkostnad logo">
              </div>
              <div class="-mr-2">
                <button x-on:click="mobile = !mobile" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="py-6 px-5 space-y-6">
            <div class="space-y-6">
              <span class="w-full flex rounded-md shadow-sm">
                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                  Logga in
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <main class="lg:relative">
    <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
      <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
        <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
            Nå kunder i hela landet. 
            
          <br class="xl:hidden">
          <span class="text-red-600">Effektiva prisvärda annonser på nätet</span>
        </h2>
        <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
          <div class="rounded-md shadow">
            <a href="#kontakt" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
              Kontakt oss
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
      <img class="absolute inset-0 w-full h-full object-cover" src="/img/construction_buildings.jpg" alt="Construction project">
    </div>
  </main>
</div>

<div class="bg-gray-100">
  <div class="pt-12 sm:pt-16 lg:pt-20">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
    </div>
  </div>
  <div class="mt-8 bg-white pb-16 sm:mt-12 sm:pb-20 lg:pb-28">
    <div class="relative">
      <div class="absolute inset-0 h-1/2 bg-gray-100"></div>
      <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto rounded-lg shadow-lg overflow-hidden lg:max-w-none lg:flex">
          <div class="bg-white px-6 py-8 lg:flex-shrink-1 lg:p-12">
            <a name="vara-tjanster"></a>
            <h3 class="text-2xl leading-8 font-extrabold text-gray-900 sm:text-3xl sm:leading-9">
              Du når alla som bygger i din kommun även om dom bor på andra sidan landet.
            </h3>
            <div class="mt-8">
              <div class="flex items-center">
                <h4 class="flex-shrink-0 pr-4 bg-white text-sm leading-5 tracking-wider font-semibold uppercase text-red-600">
                  Kontrollansvariga som får vara med i byggkostnad.se har
                </h4>
                <div class="flex-1 border-t-2 border-gray-200"></div>
              </div>
              <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                <li class="flex items-start lg:col-span-1">
                  <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <p class="ml-3 text-md font-semibold leading-5 text-gray-700">
                    Offertpriser under medelvärdet för regionen
                  </p>
                </li>
                <li class="mt-5 flex items-start lg:col-span-1 lg:mt-0">
                  <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <p class="ml-3 text-md font-semibold leading-5 text-gray-700">
                    Giltiga försäkringar
                  </p>
                </li>
                <li class="mt-5 flex items-start lg:col-span-1 lg:mt-0">
                  <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <p class="ml-3 text-md font-semibold leading-5 text-gray-700">
                    Kontrollerade referenser
                  </p>
                </li>
                <li class="mt-5 flex items-start lg:col-span-1 lg:mt-0">
                  <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <p class="ml-3 text-md font-semibold leading-5 text-gray-700">
                    Certifiering och är listade hos Boverket
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="bg-red-800">
  <div class="max-w-screen-xl mx-auto md:grid md:grid-cols-2 md:px-6 lg:px-8">
    <div class="py-12 px-4 sm:px-6 md:flex md:flex-col md:py-16 md:pl-0 md:pr-10 md:border-r md:border-red-900 lg:pr-16">
      <a name="rekommendationer"></a>
      <blockquote class="mt-8 md:flex-grow md:flex md:flex-col">
        <div class="relative text-lg leading-7 font-medium text-white md:flex-grow">
          <svg class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-red-600" fill="currentColor" viewBox="0 0 32 32">
            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
          </svg>
          <p class="relative">
            Jag skapar nya kontakter varje vecka. Detta var över min förväntan. Jag behövde inte ändra något i min vardag, så enkelt.
          </p>
        </div>
        <footer class="mt-8">
          <div class="flex">
            <div class="ml-4">
              <div class="text-base leading-6 font-medium text-white">Lars Hallin</div>
              <div class="text-base leading-6 font-medium text-red-200">Plan & Bygglovsgruppen AB</div>
            </div>
          </div>
        </footer>
      </blockquote>
    </div>
    <div class="py-12 px-4 border-t-2 border-red-900 sm:px-6 md:py-16 md:pr-0 md:pl-10 md:border-t-0 md:border-l lg:pl-16">
      <blockquote class="mt-8 md:flex-grow md:flex md:flex-col">
        <div class="relative text-lg leading-7 font-medium text-white md:flex-grow">
          <svg class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-red-600" fill="currentColor" viewBox="0 0 32 32">
            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
          </svg>
          <p class="relative">
            Min tveksamhet har bytts ut mot förundran. Detta är den kostnadseffektivaste marknadsföring jag har gjort
          </p>
        </div>
        <footer class="mt-8">
          <div class="flex">
            <div class="ml-4">
              <div class="text-base leading-6 font-medium text-white">Bo Berglund</div>
              <div class="text-base leading-6 font-medium text-red-200">Berglunds Byggkontroll</div>
            </div>
          </div>
        </footer>
      </blockquote>
    </div>
  </div>
</section>

<div class="bg-white">
  <div class="max-w-screen-xl mx-auto py-8 px-4 overflow-hidden sm:px-6 lg:px-8">
    <!--div class="mt-8 flex justify-center">
      <a href="#" class="text-gray-400 hover:text-gray-500">
        <span class="sr-only">Facebook</span>
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
        </svg>
      </a>
    </div-->
    <div class="mt-8 text-center text-base leading-6 text-gray-500 font-semibold">
        <a name="kontakt"></a>
        <h3 class="text-5xl pb-8 font-extrabold text-gray-900">Kontakt</h3>
        <p>BD Bl & Dp AB</p>

        <p>Mailbox 1412</p>

        <p>Vasagatan 56</p>

        <p>411 37 Göteborg</p>
        <p>F: +46736341174</p>
        <p><a href="mailto:info@bldp.se" class="underline">info@bldp.se</a></p>
    </div>
    <div class="mt-8">
      <p class="text-center text-base leading-6 text-gray-400">
        &copy; {{ now()->year }} Byggkostnad All rights reserved.
      </p>
    </div>
  </div>
</div>






<!--div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <livewire:city-selector />
    </div>
</div-->
@endsection
