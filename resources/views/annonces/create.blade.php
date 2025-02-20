@extends('layouts.dashboard')
@section('content')
<section id="create-category-popup">
    <div id="create-category-popup-container"
        class=" inset-0 flex items-center justify-center bg-white bg-opacity-50 overflow-auto">
        <div class="bg-slate-200 shadow-md rounded-lg max-w-2xl my-16 w-full">

            <div class="relative bg-slate-200 border-2 border-primary rounded-lg shadow">
                <button id="creation-popup-close" type="button"
                    class="absolute top-3 right-2.5 cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"><svg
                         class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            cliprule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close popup</span>
                </button>

                <div class="p-5">

                    <div class="text-center">
                        <p class="mb-1 text-2xl font-semibold leading-10 text-subtle">
                            Create a new Annonce
                        </p>
                    </div>

                    <form class="mx-8 4 lg:mx-0 font-poppins font-semibold tracking-wide"
                    action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="w-full mt-8">
                            <label for="title" class="block text-sm text-gray-500">Annonce Title:</label>
                            <input type="text" placeholder="Annonce Title" name="title"
                                class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" />
                        </div>

                        <div class="mt-8">
                            <label for="description" class="block text-sm text-gray-500">Annonce Description:</label>
                            <input type="text" id="description" name="description" placeholder="Annonce Description"
                                class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        </div>

                        <div class="mt-8">
                            <label for="price" class="block text-sm text-gray-500">Price:</label>
                            <input type="number" id="price" name="price" step="0.01" min="0" placeholder="Price"
                                class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        </div>

                        <div class="mt-8">
                            <label for="image" class="block text-sm text-gray-500">Image (File):</label>
                            <input type="file" id="image" name="image"
                                class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        </div>

                        <div class="mt-8">
                            <label for="categorie_id" class="block text-sm text-gray-500">Category:</label>
                            <select name="categorie_id" id="categorie_id" class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-8">
                            <label for="status" class="block text-sm text-gray-500">Status:</label>
                            <select name="status" id="status" class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                <option value="actif">Active</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        <!-- Submit button -->
                        <button type="submit"
                            class="mt-8 py-2.5 w-full border-2 border-blue-600 text-lg font-poppins tracking-widest  bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg text-subtle">
                            Create Annonce
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection