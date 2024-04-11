<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $listing->category->name }}
            </h2>
        </div>
    </x-slot>

    <div class="flex relative z-20 items-center overflow-hidden">
        <div class="container mx-auto px-6 flex relative py-16">
            <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20">
                <div class="w-11/12">
                    <a href="{{ url()->previous() }}" class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Back</a>
                </div>
                <h1 class="font-bebas-neue uppercase text-6xl sm:text-8xl font-black flex flex-col leading-none dark:text-white text-gray-800 mt-5">
                    {{ $listing->title }}
                </h1>
                <div class="grid grid-cols-2 gap-20 place-items-center inline-flex justify-between mr-10 mt-4">
                    <p class="text-3xl text-gray-700 dark:text-white">
                        €{{ $listing->price }}
                    </p>
                    <p class="text-xl text-green-700 dark:text-green">
                        <b>{{ $listing->condition }}</b>
                    </p>
                </div>
                <p class="text-sm sm:text-base text-gray-700 dark:text-white mb-5 mt-7">
                    <b>Listed by: {{ $listing->user_id }}</b>
                </p>
                <p class="mt-2 text-sm sm:text-base text-gray-700 dark:text-white mb-5 mr-8">
                    {{ $listing->description }} Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>

                <div id="notification" class="notification hidden bg-white border border-gray-300 shadow-lg rounded-lg py-2 px-4 fixed bottom-5 left-1/2 transform -translate-x-1/2 z-50">
                    Item was added to cart
                </div>

                @if (Auth::check() && $listing->user_id !== Auth::id())
                <div class="w-11/12 px-2 mt-3">
                    <form id="addToCartForm" action="{{ route('basket.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                        <button type="submit" onclick="displayNotification()" class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                    </form>
                </div>
                @endif


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var notification = document.getElementById('notification');

                        // Check if the notification should be displayed
                        var shouldDisplayNotification = localStorage.getItem('displayNotification');

                        if (shouldDisplayNotification) {
                            // Show the notification
                            notification.classList.remove('hidden');
                            notification.classList.add('block');

                            // Remove the flag from local storage after displaying the notification
                            localStorage.removeItem('displayNotification');

                            // Automatically hide the notification after 3 seconds
                            setTimeout(function() {
                                notification.classList.add('hidden');
                                notification.classList.remove('block');
                            }, 3000); // 3000 milliseconds = 3 seconds
                        }
                    });

                    // Function to display notification
                    function displayNotification() {
                        // Set the flag in local storage to indicate that the notification should be displayed
                        localStorage.setItem('displayNotification', true);
                    }
                </script>


                @if (Auth::check() && $listing->user_id === Auth::id())
                <div class="flex justify-between w-11/12 px-2">
                    <a href="{{ route('listing.edit', $listing->id) }}" class="flex-1 bg-blue-900 dark:bg-blue-600 text-white py-2 px-4 rounded-full font-bold hover:bg-blue-800 dark:hover:bg-blue-700 text-center" style="margin-top:5px;">Edit</a>

                    <form action="{{ route('listing.destroy', $listing->id) }}" method="post" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-900 dark:bg-red-600 text-white py-2 px-4 rounded-full font-bold hover:bg-red-800 dark:hover:bg-red-700 text-center" style="margin-top:5px;">Delete</button>
                    </form>
                </div>
                @endif



            </div>
            <div class="hidden sm:block sm:w-1/3 lg:w-3/5 relative">
                <img src="{{ asset("storage/images/" . $listing->listing_image) }}" alt="{{ $listing->name }}" />
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="bg-white sm:py-10 md:container md:mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 font-body">You might also like...</h2>
            <div class="flex container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    @forelse($listing_all as $listing)
                    <div class="bg-white rounded-lg shadow-lg p-8">

                        <a href="{{ route('listing.show', $listing->id) }}">
                            <div class="relative overflow-hidden">
                                <img class="object-cover w-full h-full rounded" src="{{ asset("storage/images/" . $listing->listing_image) }}" alt="{{ $listing->name }}" />
                                <h3 class="text-xl font-bold text-gray-900 mt-4">{{ $listing->title }}</h3>
                        </a>
                        <p class="text-green-500 text-sm mt-2">{{ $listing->condition }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-900 font-bold text-lg">€{{ $listing->price }}</span>
                            <a href="{{ route('listing.show', $listing->id) }}">
                                <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">See More</button>
                            </a>

                        </div>
                    </div>
                </div>
                @empty
                <h4 class="text-center">No Listings found!</h4>
                @endforelse
            </div>
        </div>

    </div>

    <footer class="bg-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-lg ">
            <div class="text-center grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Brand Center</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Discord Server</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Facebook</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Licensing</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">iOS</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Android</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Windows</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">MacOS</a>
                        </li>
                    </ul>
                </div>
            </div>
    </footer>
    <div class="px-4 py-6 bg-gray-50 dark:bg-gray-700 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2023 <a href="https://flowbite.com/">DigiDepot™</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Facebook page</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                    <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                </svg>
                <span class="sr-only">Discord community</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Twitter page</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">GitHub account</span>
            </a>
        </div>
    </div>
    </div>


</x-app-layout>