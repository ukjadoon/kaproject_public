<!-- Static sidebar for desktop -->
<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-white">
        <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-9 w-auto" src="/img/ka-logo.png" alt="byggkostnad">
        </div>
        <div class="mt-5 h-0 flex-1 flex flex-col overflow-y-auto">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <nav class="flex-1 px-2 bg-white">
                <a href="{{ route('backend-dashboard') }}"
                    class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('backend-dashboard') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                    <svg class="mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('backend-municipalities') }}"
                    class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('backend-municipalities') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                    <!--svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg-->
                    <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Municipalities
                </a>
                <a href="{{ route('backend-clients') }}"
                    class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('backend-clients') || request()->routeIs('backend-client-create') || request()->routeIs('backend-client-edit') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Clients
                </a>
                <!--a href="#"
                    class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                    <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Calendar
                </a-->
                <a href="{{ route('backend-campaigns') }}"
                    class="group flex items-center px-2 py-2 text-sm leading-5 font-medium {{ request()->routeIs('backend-campaigns') || request()->routeIs('backend-campaign-create') || request()->routeIs('backend-campaign-edit') ? 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200' : 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100' }} rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Campaigns
                </a>
                <!--a href="{{ route('backend-reports') }}"
                    class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                    <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500 transition ease-in-out duration-150"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Reports
                </a-->
            </nav>
        </div>
    </div>
</div>
