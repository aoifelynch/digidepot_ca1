@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Create Listing
</h2>

@endsection

@section('content')

<form enctype="multipart/form-data" action="{{ route('listing.store') }}" method="post" style="margin: 12px 40px 0px">
    @csrf
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- adds error message beside the text box --}}
        @if($errors->has('title'))
        <span class="text-red-400"> {{ $errors->first('title') }} </span>
        @endif
    </div>
        <div>
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <option disabled selected value></option>
            @forelse($categories as $c)

            <option value="{{ $c->id }}">{{ $c->name }}</option>

            @empty
            <h4>No Categories found!</h4>
            @endforelse
                
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('category_id'))
            <span class="text-red-400"> {{ $errors->first('category_id') }} </span>
            @endif
        </div>

    <div>
            <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition</label>
            <select name="condition" id="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected value></option>    
                <option value="New & Unused">New & Unused</option>
                <option value="Used, Like New">Used, Like New</option>
                <option value="Small Wear">Small Wear</option>
                <option value="Major Wear">Major Wear</option>
                <option value="Parts Only">Parts Only</option>
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('condition'))
            <span class="text-red-400"> {{ $errors->first('condition') }} </span>
            @endif
        </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input type="number" step=".01" name="price" id="price" value="{{ old('price') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- adds error message beside the text box --}}
        @if($errors->has('price'))
        <span class="text-red-400"> {{ $errors->first('price') }} </span>
        @endif
    </div>
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- adds error message beside the text box --}}
        @if($errors->has('description'))
        <span class="text-red-400"> {{ $errors->first('description') }} </span>
        @endif
    </div>
<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="listing_image">Image</label>
    <input
        type="file"
        name="listing_image"
        placeholder="Image"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        field="listing_image" />

</div>

    <div style="margin: 10px">
    <a href="{{ url()->previous() }}" class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-2 dark:bg-yellow-500 dark:hover:bg-yellow-600 focus:outline-none dark:focus:ring-yellow-800" >Back</a>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
</div>
</form>

@endsection