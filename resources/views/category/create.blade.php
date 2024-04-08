@extends('layouts.myApp')
@section('header')
<div class="flex flex-wrap items-center justify-between ">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Categories
    </h2>

    <div class="flex md:order-2">
        <a href="{{ url()->previous() }}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-400 dark:hover:bg-blue-500 focus:outline-none dark:focus:ring-blue-600" style="margin-left: 5px">Back</a>
    </div>
</div>

</div>
@endsection
@section('content')

<form enctype="multipart/form-data" action="{{ route('category.store') }}" method="post" style="margin: 12px 40px 0px">
    @csrf
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- adds error message beside the text box --}}
        @if($errors->has('name'))
        <span class="text-red-400"> {{ $errors->first('name') }} </span>
        @endif
    </div>
    <input type="file" name="category_image" placeholder="Category Image" class="w-full mt-6" field="category_image" />

    <div class="px-4 sm:px-0 flex py-5">
        <div>
            <form action="{{ route('category.store') }}" method="POST">

                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">
                    <span>
                        Create
                    </span>
                </button>
            </form>
        </div>
    </div>

</form>

@endsection