@extends('layouts.dashboard')

@section('content')
<section>
    <div class="w-full h-full bg-slate-100 pt-36">
        <div class="container px-4 mx-auto">
            <div class="max-w-2xl mx-auto bg-slate-200 rounded-lg shadow p-6 border-2 border-primary">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-semibold text-subtle">
                        Update Annonce: {{ $annonce->title }}
                    </h1>
                </div>

                <form action="{{ route('annonces.update', $annonce) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="block text-sm text-gray-500">Annonce Title:</label>
                        <input type="text" placeholder="Annonce Title" name="title" value="{{ $annonce->title }}"
                            class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" />
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm text-gray-500">Annonce Description:</label>
                        <input type="text" id="description" name="description" placeholder="Annonce Description"
                            value="{{ $annonce->description }}"
                            class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block text-sm text-gray-500">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" min="0" placeholder="Price"
                            value="{{ $annonce->price }}"
                            class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-sm text-gray-500">Image:</label>
                        <input type="file" id="image" name="image"
                            class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        @if($annonce->image)
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Current image:</p>
                            <img src="{{ asset('storage/uploads/annonces/' . $annonce->image) }}" alt="Current Image" class="w-24 mt-1">
                        </div>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label for="categorie_id" class="block text-sm text-gray-500">Category:</label>
                        <select name="categorie_id" id="categorie_id"
                            class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($annonce->categorie_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-sm text-gray-500">Status:</label>
                        <select name="status" id="status"
                            class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                            <option value="actif" @if($annonce->status == 'actif') selected @endif>Active</option>
                            <option value="draft" @if($annonce->status == 'draft') selected @endif>Draft</option>
                            <option value="archived" @if($annonce->status == 'archived') selected @endif>Archived</option>
                        </select>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit"
                            class="w-full py-2.5 border-2 border-blue-600 text-lg font-poppins tracking-widest bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg">
                            Update Annonce
                        </button>
                        <a href="{{ route('annonces.index') }}"
                            class="w-full py-2.5 text-center border-2 border-gray-600 text-lg font-poppins tracking-widest bg-gray-600 hover:bg-gray-500 text-white font-bold rounded-lg">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection