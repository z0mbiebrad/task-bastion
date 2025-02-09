<nav 
    x-data="{ 
        mobileMenuIsOpen: false,
        editClicked: false
        }" 
    x-on:click.away="mobileMenuIsOpen = false" 
    class="flex items-center justify-between bg-neutral-50 border-b border-neutral-300 px-6 py-4 dark:border-neutral-700 dark:bg-neutral-900" aria-label="penguin ui menu"
>
	<!-- Brand Logo -->
	<a href="#" class="text-lg font-bold text-neutral-900 dark:text-white">
        {{ $today }}
		<!-- <img src="./your-logo.svg" alt="brand logo" class="w-10" /> -->
	</a>

    <div class="flex items-center gap-6">   
        <li class="flex items-center">
            <a 
                @click="editClicked = !editClicked"
                wire:click="$dispatch('edit-toggle')"
                class="flex items-center font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-hidden focus:underline dark:text-neutral-300 dark:hover:text-white hover:cursor-pointer"
            >
                Edit Tasks 
                <svg x-show="editClicked" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>
        </li>

        <!-- Desktop Menu -->
        <ul class="hidden items-center gap-4 md:flex">
            
            <li>
                <a href="{{ route('login') }}" class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-hidden focus:underline dark:text-neutral-300 dark:hover:text-white">
                    Login
                </a>
            </li>
            <li>
                <a href="#" class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-hidden focus:underline dark:text-neutral-300 dark:hover:text-white">
                    Register
                </a>
            </li>
        </ul>
        <!-- Mobile Menu Button -->
        <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-neutral-600 dark:text-neutral-300 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
            <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <!-- Mobile Menu -->
        <ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 rounded-b-sm border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-20 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 md:hidden">
            @if (!auth()->check())
                <li class="py-4">
                    <a href="{{ route('login') }}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">
                        Login
                    </a>
                </li>
                <li class="py-4">
                    <a href="{{ route('register') }}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">
                        Register
                    </a>
                </li>
            @endif
        </ul>
    </div>

</nav>