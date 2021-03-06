<div>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
  <ul>
    @forelse($clients as $client)
    <li>
      <a href="{{ route('backend-client-edit', ['id' => $client['id']]) }}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
        <div class="flex items-center px-4 py-4 sm:px-6">
          <div class="min-w-0 flex-1 flex items-center">
            <div class="flex-shrink-0">
              <img class="h-12 w-12 rounded-full" src="{{ isset($client['photo']) ? $client['photo'] : 'https://picsum.photos/seed/picsum/100' }}" alt="">
            </div>
            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
              <div>
                <div class="text-sm leading-5 font-medium text-indigo-600 truncate">{{ $client['name'] }}</div>
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                  <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                  </svg>
                  <span class="truncate">{{ $client['email'] }}</span>
                </div>
              </div>
              <div class="hidden md:block">
                <div>
                  <div class="text-sm leading-5 text-gray-900">
                    Cities: {{ $this->getCitiesForClient($client['id']) }}
                  </div>
                  <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    {{ $client['contact_number'] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </a>
    </li>
    @empty
    <li class="text-lg font-semibold text-gray-400 h-18 min-h-full">
      <div class="flex justify-center items-center">
        <span class="py-5">No Clients</span>
      </div>
    </li>
    @endforelse
  </ul>
</div>

</div>
