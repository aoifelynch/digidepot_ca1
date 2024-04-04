@extends('layouts.myApp')
@section('header')
<div class="flex flex-wrap items-center justify-between ">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Categories
    </h2>

    <div class="flex md:order-2">
        <a href="{{ route('category.create') }}" style="margin-left: 5px" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">Create</a>
    </div>
</div>

</div>

@endsection
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="margin: 12px 40px 0px">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>


            <tbody>
                @forelse($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->name }}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('category.show', $category->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                </tr>
                @empty
                <h4>No Categories found!</h4>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection