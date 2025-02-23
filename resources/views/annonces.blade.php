@extends('layouts.base')

@section('header')
<div class="border border-xs border-[#b2b2b2] rounded-full bg-gray-50 px-1 py-1 flex items-center">
    <div class="flex items-center gap-2 w-[300px] pl-0.5">
        <span class="">
            <svg x="0" y="0" viewbox="0 0 24 24" xml:space="preserve" width="25px" class="fill-gray-600">
                <path d="M10 14c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm3.5.9c-1 .7-2.2 1.1-3.5 1.1-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6c0 1.3-.4 2.5-1.1 3.4l5.1 5.1-1.5 1.5-5-5.1z"></path>
            </svg>
        </span>
        <div class="w-full">
            <input type="text" id="searchForEvents" placeholder="Search for annonces" class="h-[35px] w-full outline-none border-none text-sm/12">
        </div>
    </div>
    <div class="w-[1px] h-[38px] bg-[#B2B2B2]"></div>
    <div class="pl-2 relative flex items-center gap-2 w-[300px]">
        <span class="">
            <svg x="0" y="0" viewbox="0 0 24 24" xml:space="preserve" width="25px" class="fill-gray-600">
                <path d="M11.6 11.6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-7.6C8.5 4 6 6.5 6 9.6 6 13.8 11.6 20 11.6 20s5.6-6.2 5.6-10.4c0-3.1-2.5-5.6-5.6-5.6z"></path>
            </svg>
        </span>
        <div class="w-full">
            <input type="text" value="" id="cityValue" placeholder="Search for annonces" class="h-[35px] w-full outline-none border-none text-sm/12">
        </div>
        <div class="">
            <button type="submit" id="subSearchBtn" class="w-[38px] h-[38px] bg-[#f05537] rounded-full flex justify-center items-center cursor-pointer hover:bg-[#d63621]">
                <svg x="0" y="0" viewbox="0 0 24 24" xml:space="preserve" width="25px" class="fill-white">
                    <path d="M10 14c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm3.5.9c-1 .7-2.2 1.1-3.5 1.1-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6c0 1.3-.4 2.5-1.1 3.4l5.1 5.1-1.5 1.5-5-5.1z"></path>
                </svg>
            </button>
        </div>
        <div class="absolute bg-white w-full min-h-max overflow-y-auto top-[120%] right-0 rounded-sm border-1 border-gray-50">
            <ul class="flex flex-col" id="searchForCity"></ul>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="overlay" class="fixed top-0 left-0 bg-[#00000036] w-full h-full z-50 hidden"></div>
<main class="mx-auto p-6 flex flex-col gap-10 mb-6">

    <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
        <div class="col-span-full w-full">
            <div class="hidden mb-4" id="searchValue">
                <h5 class="text-xl text-darkblue font-unbounded">Search for
                    <span class="text-orange" id="userInputValue"></span>
                    in
                    <span class="text-orange" id="userInputCity"></span>
                </h5>
            </div>
            
            <div class="relative">
            
                <ul id="events__lists" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5 grid-rows-1">
                @foreach ($annonces as $annonce)   
                <li>
                        <a href="{{ route('annonce', $annonce->id) }}">
                            <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg h-full">
                                <img alt="" src="{{ asset('storage/app/private/public/annonces/' . $annonce->image) }}" class="h-44 w-full object-cover" />
                                <div class="bg-white p-4 sm:p-6 flex flex-col gap-2">


                                    <h3 class="text-lg text-gray-900">{{ date('Y-m-d', strtotime($annonce->created_at)) }}</h3>

                                    <p class="line-clamp-3 text-sm/relaxed text-gray-500">{{ $annonce->title }}</p>

                                    <div class="flex items-center gap-2">

                                        <span class="text-green-500 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="text-green-500 font-medium">Free</span>


                                    </div>
                                </div>
                            </article>
                        </a>
                    </li>
                    @endforeach
                </ul>
                
            </div>
           
            {{ $annonces->links() }}
        </div>
    </div>
</main>
@endsection