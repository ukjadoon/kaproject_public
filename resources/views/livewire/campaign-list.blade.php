<div>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul>
            @foreach($campaigns as $campaign)
            <li>

                <a href="{{ route('backend-campaign-edit', ['campaignId' => $campaign['id']]) }}"
                    class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div>
                                    <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                                        {{ $campaign['name'] }}</div>
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                        <span class="truncate">{{ $this->getClientsForCampaign($campaign['id']) }}</span>
                                    </div>
                                </div>
                                <div class="hidden md:block">
                                    <div>
                                        <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                                        <a href="{{ route('campaign-landing', ['code' => $campaign['code']]) }}" target="_blank" class="hover:underline">Preview link</a></div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ Carbon\Carbon::parse($campaign['created_at'])->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

</div>
