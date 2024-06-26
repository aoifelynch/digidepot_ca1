@extends('layouts.myApp')
@section('header')
<div class="flex items-center justify-center">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
        Nice to see you, {{ Auth::user()->name }}
    </h2>
</div>
@endsection
@section('content')

<div class="px-12 mt-5 mb-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[url('./images/scatterGadgets.jpg')] bg-cover bg-no-repeat dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-center py-20 text-white dark:text-white">
                <b>
                    {{ __("Welcome to DigiDepot. The leading buy/sell marketplace in the IT industry.") }}
                </b>
                <br>
                {{ __("It is our goal to help decrease the amount of E-Waste on the planet by creating a secure
                    platform that allows users to resell and repurpose their electronics.") }}
            </div>

        </div>
    </div>

</div>
<div class="py-1 mb-5">
    <form class="max-w-md mx-auto w-full">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <form action="{{ route('listing.index') }}" method="GET" class="font-body w-full">
                <input type="search" name="query" id="default-search" class="font-body block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Items by Name..." required />
                <button type="submit" class="font-body absolute inset-y-0 right-2.5 bottom-2.5 bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-peach font-medium rounded-lg text-sm px-4 py-2 text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-2">Search</button>
            </form>
        </div>
    </form>
</div>
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-lg text-left text-black dark:text-black">
            <b>{{ __("Search by Category") }}</b>

        </div>
        <div class="max-w-7xl mt-5 container mx-auto grid grid-cols-5 gap-8">

            <div class="relative h-64">
                <a href="{{ route('category.index') }}">
                    <div class="absolute inset-0">
                        <img class="w-full h-full object-cover rounded-md" src="{{ asset("storage/images/phoneCategory.jpg") }}" />
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md"></div>
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h2 class="text-white text-3xl font-bold shadow-md">Phones</h2>
                    </div>
                </a>
            </div>
            <div class="relative h-64">
                <a href="{{ route('category.index') }}">
                    <div class="absolute inset-0">
                        <img class="w-full h-full object-cover rounded-md" src="{{ asset("storage/images/pcCategory.jpg") }}" />
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md"></div>
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h2 class="text-white text-3xl font-bold shadow-md">PC & Parts</h2>
                    </div>
                </a>
            </div>
            <div class="relative h-64">
                <a href="{{ route('category.index') }}">
                    <div class="absolute inset-0">
                        <img class="w-full h-full object-cover rounded-md" src="{{ asset("storage/images/tabletCategory.webp") }}" />
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md"></div>
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h2 class="text-white text-3xl font-bold shadow-md">Tablets</h2>
                    </div>
                </a>
            </div>
            <div class="relative h-64">
                <a href="{{ route('category.index') }}">
                    <div class="absolute inset-0">
                        <img class="w-full h-full object-cover rounded-md" src="{{ asset("storage/images/laptopCategory.webp") }}" />
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md"></div>
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h2 class="text-white text-3xl font-bold shadow-md">Laptops</h2>
                    </div>
                </a>
            </div>
            <div class="relative h-64">
                <a href="{{ route('category.index') }}">
                    <div class="absolute inset-0">
                        <img class="w-full h-full object-cover rounded-md" src="{{ asset("storage/images/keyboardCategory.webp") }}" />
                        <div class="absolute inset-0 bg-black opacity-50 rounded-md"></div>
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center">
                        <h2 class="text-white text-3xl font-bold shadow-md">Accessories</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
<br>
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-lg text-left text-black dark:text-black">
            <b>{{ __("Why Sell With Us?") }}</b>
            <p class="text-base">We do our best to ensure every user has the best possible selling/purchasing experience on our platform. See for yourself!</p>
        </div>
        <div class="flex justify-between mx-5 my-5">
            <div class="">
                <a href="#" class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ asset("storage/images/Trustpilot.png") }}" />
                </a>
            </div>
            <div class="">
                <a href="#" class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ asset("storage/images/Trustpilot.png") }}" />
                </a>
            </div>
            <div class="">
                <a href="#" class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ asset("storage/images/Trustpilot.png") }}" />
                </a>
            </div>
            <div class="">
                <a href="#" class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ asset("storage/images/Trustpilot.png") }}" />
                </a>
            </div>
        </div>
        <div class="mb-10 mx-auto flex justify-center items-center">
            <img src="{{ asset("storage/images/Trustpilot2.png") }}" />
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

@endsection