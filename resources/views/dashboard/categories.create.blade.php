@extends('layouts.dashboard')
@section('title', 'Admin | Categories Management')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Slug</label>
            <input type="text" name="slug" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create</button>
    </form>
</div>

@endsection
@section('scripts')
    <script src="{{ mix('resources/js/categories.js') }}"></script>
@endsection