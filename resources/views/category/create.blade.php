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
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- adds error message beside the text box --}}
        @if($errors->has('name'))
        <span class="text-red-400"> {{ $errors->first('name') }} </span>
        @endif
    </div>
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="category_image">Image</label>
        <input type="file" name="category_image" placeholder="Image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" field="anime_image" />
    </div>

    <div style="margin: 10px">
        <a href="{{ url()->previous() }}" class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-2 dark:bg-yellow-500 dark:hover:bg-yellow-600 focus:outline-none dark:focus:ring-yellow-800">Back</a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
    </div>
</form>

@endsection