@extends('layouts.dashboard')


@section('content')
<section>
    <div class="w-full  h-full ">

        <div class=" w-full h-full bg-slate-100">
            <div id="tableData" class="container px-4 pt-36 ml-auto">
                <div class="flex flex-col lg:flex-row justify-between items-center gap-3">
                    <div class="flex flex-col lg:flex-row justify-center items-center gap-x-3 ">
                        <h1 class="text-5xl md:text-6xl font-supermercado font-medium text-subtle "><span
                                class="text-primary">Annonces</span></h1>
                        <span
                            class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $countAnnonces }}</span>
                    </div>
                    <button id="create-category-toggler"
                        class="py-1.5 px-8 m-1 text-2xl text-center bg-green-600 hover:bg-green-500 font-buttons rounded-lg text-white lg:inline-block  self-center border-2 border-secondary"><a href="{{ route('annonces.create') }}">Create a new Annonce</a></button>
                </div>

                <div class="flex flex-col mt-6 mx-4">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:pr-8 lg:pr-12">
                            <div class="overflow-hidden mb-4 border border-gray-200 md:rounded-lg">
                                <table class="min-w-full divide-y  divide-gray-200 ">
                                    <thead class="bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-white">
                                                <div class="flex items-center gap-x-3">
                                                    <span>Name</span>
                                                </div>
                                            </th>


                                            {{-- <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">Posted By</th> --}}

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                                Created at</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-right rtl:text-right text-white">
                                                actions</th>
                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-100 divide-y divide-gray-700  ">

                                        @foreach ($annonces as $annonce)
                                        <tr>
                                            <td
                                                class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">

                                                    <div class="flex items-center gap-x-2">
                                                        <div>
                                                            <h2 class="font-medium text-gray-800  ">
                                                                {{ $annonce->title }}
                                                            </h2>
                                                            <p
                                                                class="text-sm font-normal text-gray-600 ">
                                                                {{ $annonce->user->name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td class="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">{{{ $annonce->user->name }}}</td> --}}

                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $annonce->created_at }}
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">
                                                    <form action="{{ route('annonces.destroy', $annonce) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-500 cursor-pointer transition-colors duration-200  hover:text-red-500 focus:outline-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    <button data-annonce-id="{{ $annonce->id }}"
                                                        class="edit-category text-gray-500 cursor-pointer transition-colors duration-200 hover:text-yellow-500 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Modal To Update a Category --}}

                                        <div id="update-category-popup-{{ $annonce->id }}" class="hidden">
                                            <div id="update-category-popup-container"
                                                class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-50 overflow-auto">
                                                <div class="bg-slate-200 shadow-md rounded-lg max-w-2xl w-full">

                                                    <div
                                                        class="relative bg-slate-200 border-2 border-primary rounded-lg shadow">
                                                        <button id="update-popup-close" data-annonce-id="{{ $annonce->id }}" type="button"
                                                            class="update-popup-close absolute top-3 cursor-pointer right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    cliprule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close popup</span>
                                                        </button>




                                                        <div class="p-5">

                                                            <div class="text-center">
                                                                <p
                                                                    class="mb-1 text-2xl font-semibold leading-10 text-subtle">
                                                                    Update Category : {{ $annonce->name }}
                                                                </p>
                                                            </div>
                                                            <form class="mx-8 4 lg:mx-0 font-poppins font-semibold tracking-wide"
                                                                action="{{ route('annonces.update', $annonce) }}"
                                                                method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="w-full mt-8">
                                                                    <label for="title" class="block text-sm text-gray-500">Annonce Title:</label>
                                                                    <input type="text" placeholder="Annonce Title" name="title" value="{{ $annonce->title }}"
                                                                        class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" />
                                                                </div>

                                                                <div class="mt-8">
                                                                    <label for="description" class="block text-sm text-gray-500">Annonce Description:</label>
                                                                    <input type="text" id="description" name="description" placeholder="Annonce Description"
                                                                        value="{{ $annonce->description }}"
                                                                        class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                </div>

                                                                <div class="mt-8">
                                                                    <label for="price" class="block text-sm text-gray-500">Price:</label>
                                                                    <input type="number" id="price" name="price" step="0.01" min="0" placeholder="Price"
                                                                        value="{{ $annonce->price }}"
                                                                        class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                </div>

                                                                <div class="mt-8">
                                                                    <label for="image" class="block text-sm text-gray-500">Image (File):</label>
                                                                    <input type="file" id="image" name="image"
                                                                        class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" value="{{  $annonce->image }}">
                                                                    <!-- <small class="text-gray-500">Current image: <img src="{{ asset('storage/' . $annonce->image) }}" alt="Current Image" class="w-24 mt-2"></small> -->
                                                                </div>

                                                                <div class="mt-8">
                                                                    <label for="categorie_id" class="block text-sm text-gray-500">Category:</label>
                                                                    <select name="categorie_id" id="categorie_id" class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                        @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}" @if($annonce->categorie_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mt-8">
                                                                    <label for="status" class="block text-sm text-gray-500">Status:</label>
                                                                    <select name="status" id="status" class="block mt-2 w-full placeholder-gray-500 rounded-lg border border-gray-700 bg-white px-5 py-2.5 text-subtle focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                                                        <option value="actif" @if($annonce->status == 'actif') selected @endif>Active</option>
                                                                        <option value="draft" @if($annonce->status == 'draft') selected @endif>Draft</option>
                                                                        <option value="archived" @if($annonce->status == 'archived') selected @endif>Archived</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Submit button -->
                                                                <button type="submit"
                                                                    class="mt-8 py-2.5 w-full border-2 border-blue-600 text-lg font-poppins tracking-widest bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg text-subtle">
                                                                    Update Annonce
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{ $annonces->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal To Create a Category --}}



@endsection
@section('scripts')
<script>
    // Function to display the update modal
    function showModal(annonceId) {
        var modal = document.getElementById("update-category-popup-" + annonceId);
        if (modal) {
            modal.classList.remove("hidden");
        }
    }

    // Function to hide the update modal
    function hideModal(annonceId) {
        var modal = document.getElementById("update-category-popup-" + annonceId);
        if (modal) {
            modal.classList.add("hidden");
        }
    }

    // Add event listeners for the edit buttons
    var editButtons = document.querySelectorAll(".edit-category");
    editButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var annonceId = button.getAttribute("data-annonce-id"); // Using data-annonce-id to get the id
            showModal(annonceId);
        });
    });

    // Add event listeners for closing the modal
    var closeButtons = document.querySelectorAll(".update-popup-close");
    closeButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var annonceId = button.getAttribute("data-annonce-id");
            hideModal(annonceId);
        });
    });

    // Hide modal when clicking outside the update modal
    // Add proper event delegation for modal closing
    document.addEventListener('click', function(event) {
        var updateContainers = document.querySelectorAll('[id^="update-category-popup-container"]');
        updateContainers.forEach(function(container) {
            if (event.target === container) {
                var annonceId = container.closest('[id^="update-category-popup-"]').getAttribute('id').replace('update-category-popup-', '');
                hideModal(annonceId);
            }
        });
    });
</script>

@endsection