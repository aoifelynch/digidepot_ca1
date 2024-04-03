<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[url('./images/scatterGadgets.jpg')] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-lg text-left text-black dark:text-black">
                <b>{{ __("Search by Category") }}</b>
            </div>
            <div class="flex justify-between mx-10 my-5">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="../css/images/appleEcosystem.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Phones</h5>
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="../css/images/appleEcosystem.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Laptops</h5>
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="../css/images/appleEcosystem.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PC Parts</h5>
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="../css/images/appleEcosystem.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tablets</h5>
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="../css/images/appleEcosystem.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Accessories</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>