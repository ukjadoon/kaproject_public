<!-- Profile dropdown -->
<div class="ml-3 relative" x-data="{dropdown: false}">
    <div>
        <button class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline"
            id="user-menu" aria-label="User menu" aria-haspopup="true" @click="dropdown = ! dropdown">
            <img class="h-8 w-8 rounded-full"
                src="https://picsum.photos/seed/picsum/50"
                alt="">
        </button>
    </div>
    <!--
              Profile dropdown panel, show/hide based on dropdown state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" x-show.transition="dropdown" @click.away="dropdown = false">
        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
            aria-labelledby="user-menu">
            <!--a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"
                                    role="menuitem">Your Profile</a-->
            <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"
                role="menuitem">Settings</a>
            <a href="{{ route('backend-logout') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150"
                role="menuitem">Sign out</a>
        </div>
    </div>
</div>
