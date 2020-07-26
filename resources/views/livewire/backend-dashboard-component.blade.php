<div>
  <h3 class="text-lg leading-6 font-medium text-gray-900">
    Summary
  </h3>
  <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    <div class="bg-white overflow-hidden shadow rounded-lg">
      <div class="px-4 py-5 sm:p-6">
        <dl>
          <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
            Total Clients
          </dt>
          <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
            {{ $clientCount }}
          </dd>
        </dl>
      </div>
    </div>
    <div class="bg-white overflow-hidden shadow rounded-lg">
      <div class="px-4 py-5 sm:p-6">
        <dl>
          <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
            Total Campaigns
          </dt>
          <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
            {{ $campaignCount }}
          </dd>
        </dl>
      </div>
    </div>
  </div>
</div>
