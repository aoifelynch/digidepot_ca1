@extends('layouts.myApp')
@section('header')
<div class="flex items-center justify-center">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
        Shopping Cart
    </h2>
</div>
</div>

@endsection
@section('content')

<section class=" relative z-10 after:contents-[''] after:absolute after:z-0 after:h-full xl:after:w-1/3 after:top-0 after:right-0 after:bg-gray-50">
    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto relative z-10">
        <div class="grid grid-cols-12">
            <div class="col-span-12 xl:col-span-8 lg:pr-8 pt-14 pb-8 lg:py-24 w-full max-xl:max-w-3xl max-xl:mx-auto">
                <div class="flex items-center justify-between pb-8 border-b border-gray-300">
                    <h2 class="font-manrope font-bold text-3xl leading-10 text-black">Your Order</h2>
                    @php
                    $totalItemCount = 0;
                    @endphp

                    @foreach ($baskets as $basket)
                    @php
                    $totalItemCount += $basket->listings->count();
                    @endphp
                    @endforeach

                    <h2 class="font-manrope font-bold text-3xl leading-10 text-black">{{ $totalItemCount }} Items</h2>



                </div>
                <div class="grid grid-cols-12 mt-8 max-md:hidden pb-6 border-b border-gray-200">
                    <div class="col-span-12 md:col-span-7">
                        <p class="font-normal text-lg leading-8 text-gray-400">Product Details</p>
                    </div>
                    <div class="col-span-12 md:col-span-5">
                        <div class="grid grid-cols-5">
                            <div class="col-span-3 mr-28">
                                <p class="font-normal text-lg leading-8 text-gray-400 text-center">Price</p>
                            </div>
                            <div class="col-span-2 ml-16">
                                <p class="font-normal text-lg leading-8 text-gray-400 text-center">Action</p>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($baskets as $basket)
                @foreach ($basket->listings as $listing)
                <div class="flex flex-col min-[500px]:flex-row min-[500px]:items-center gap-5 py-6  border-b border-gray-200">

                    <div class="w-full md:max-w-[126px]">
                        <img class="mx-auto" src="{{ asset("storage/images/" . $listing->listing_image) }}" alt="{{ $listing->name }}" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 w-full">
                        <div class="md:col-span-2">
                            <div class="flex flex-col max-[500px]:items-center gap-3">
                                <h6 class="font-semibold text-xl leading-7 text-black">{{ $listing->title }}</h6>
                                <h6 class="font-semibold text-base leading-7 text-indigo-600">{{ $listing->category->name }}</h6>
                                <h6 class="font-normal text-base leading-7 text-gray-500">{{ $listing->condition }}</h6>
                            </div>
                        </div>
                        <div class="flex items-center max-[500px]:justify-center h-full max-md:mt-3">
                            <p class="font-bold text-lg leading-8 text-indigo-600 text-center">€{{ $listing->price }}</p>
                        </div>
                        <div class="flex items-center max-[500px]:justify-center md:justify-end max-md:mt-3 h-full">
                            <form action="{{ route('basket.remove', ['basketId' => $basket->id, 'listingId' => $listing->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                            </form>
                        </div>

                    </div>
                </div>
                @endforeach
                @endforeach
                <div class="flex items-center justify-end mt-8">
                    <button class="flex items-center px-5 py-3 rounded-full gap-2 border-none outline-0 font-semibold text-lg leading-8 text-indigo-600 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-indigo-300 hover:bg-indigo-50">
                        Add Coupon Code
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M12.7757 5.5L18.3319 11.0562M18.3319 11.0562L12.7757 16.6125M18.3319 11.0562L1.83203 11.0562" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class=" col-span-12 xl:col-span-4 bg-gray-50 w-full max-xl:px-6 max-w-3xl xl:max-w-lg mx-auto lg:pl-8 py-24">
                <h2 class="font-manrope font-bold text-3xl leading-10 text-black pb-8 border-b border-gray-300">
                    Order Summary</h2>
                <div class="mt-8">
                    <div class="flex items-center justify-between pb-6">
                        <p class="font-normal text-lg leading-8 text-black">{{ $totalItemCount }} Items</p>
                        @php
                        $totalPrice = 0;
                        @endphp

                        @foreach ($baskets as $basket)
                        @foreach ($basket->listings as $listing)
                        @php
                        $totalPrice += $listing->price;
                        @endphp
                        @endforeach
                        @endforeach

                        @php
                        $shippingPrice = $totalPrice + 5;
                        @endphp
                        <p class="font-medium text-lg leading-8 text-black">€{{ $totalPrice }}</p>
                    </div>
                    <form>
                        <label class="flex  items-center mb-1.5 text-gray-600 text-sm font-medium">Shipping
                        </label>
                        <div class="flex pb-6">
                            <div class="relative w-full">
                                <div class=" absolute left-0 top-0 py-3 px-4">
                                    <span class="font-normal text-base text-gray-300">Standary Delivery</span>
                                </div>
                                <input type="text" class="block w-full h-11 pr-10 pl-36 min-[500px]:pl-52 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-gray-400" placeholder="€5.00">
                                <button id="dropdown-button" data-target="dropdown-delivery" class="dropdown-toggle flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0 pl-2 " type="button">
                                    <svg class="ml-2 my-auto" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1.5L4.58578 5.08578C5.25245 5.75245 5.58579 6.08579 6 6.08579C6.41421 6.08579 6.74755 5.75245 7.41421 5.08579L11 1.5" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>

                            </div>
                        </div>
                        <label class="flex items-center mb-1.5 text-gray-400 text-sm font-medium">Promo Code
                        </label>
                        <div class="flex pb-4 w-full">
                            <div class="relative w-full ">
                                <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300">

                                </div>
                                <input type="text" class="block w-full h-11 pr-11 pl-5 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-500 focus:outline-gray-400 " placeholder="xxxx xxxx xxxx">
                                <button id="dropdown-button" data-target="dropdown" class="dropdown-toggle flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0 pl-2 " type="button"><svg class="ml-2 my-auto" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1.5L4.58578 5.08578C5.25245 5.75245 5.58579 6.08579 6 6.08579C6.41421 6.08579 6.74755 5.75245 7.41421 5.08579L11 1.5" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b border-gray-200">
                            <button class="rounded-full w-full bg-black py-3 px-4 text-white text-sm font-semibold text-center mb-8 transition-all duration-500 hover:bg-black/80">Apply</button>
                        </div>
                        <div class="flex items-center justify-between py-8">
                            <p class="font-medium text-xl leading-8 text-black">{{ $totalItemCount }} Items</p>
                            <p class="font-semibold text-xl leading-8 text-indigo-600">€{{ $shippingPrice }}</p>
                        </div>
                        <button class="w-full text-center bg-indigo-600 rounded-full py-4 px-6 font-semibold text-lg text-white transition-all duration-500 hover:bg-indigo-700">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection