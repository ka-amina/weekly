@extends('layouts.base')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">
    <section class="relative overflow-hidden bg-slate-950 rounded-3xl h-[400px] max-w-3xl mx-auto">
        <div class="absolute top-0 left-0 w-full h-full">
            <img class="object-cover w-full h-full" src="/assets/upload/{{ $annonce->image }}" alt="">
        </div>
    </section>

    <div class="max-w-3xl mx-auto mt-12">
        <div class="flex flex-col gap-10">
            <div class="">
                <div class="flex items-center gap-2">
                    <span class="text-xl font-medium text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="text-xl font-medium text-indigo-600">{{ date('l, F d', strtotime($annonce->created_at)) }}</span>
                </div>
            </div>

            <div>
                <h1 class="text-4xl md:text-5xl font-unbounded font-bold text-slate-900">{{ $annonce->title }}</h1>
            </div>

            <div class="w-full">
                <p class="text-lg md:text-xl font-medium text-slate-700">{{ $annonce->description }}</p>
            </div>

            <div class="pt-5">
                <div class="pb-5">
                    <h4 class="text-2xl font-medium font-unbounded text-slate-900">About this event</h4>
                </div>
                <div class="w-full">
                    <p class="text-slate-700">{{ $annonce->content }}</p>
                </div>
            </div>
            {{ $comments->links() }}

            @foreach($comments as $comment)
            <article class="p-6 rounded-lg bg-slate-50 border border-slate-200">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-600 flex justify-center items-center text-white">
                            {{ collect(explode(' ', $comment->name))->map(fn($word) => strtoupper($word[0]))->join('') }}
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-medium font-unbounded text-slate-900">
                                {{ $comment->name }}
                            </span>
                            <time class="text-xs text-slate-500 font-unbounded">
                                {{ $comment->created_at->diffForHumans() }}
                            </time>
                        </div>
                    </div>
                </div>
                <p class="text-slate-700 mt-3">{{ $comment->content }}</p>
            </article>
            @endforeach

            

            <div class="mt-6">
                <form action="{{ route('comments.store', $annonce->id) }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <textarea 
                            name="comment" 
                            rows="3" 
                            placeholder="Write your comment..." 
                            class="w-full p-4 border-2 border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-slate-900 placeholder-slate-400"
                        ></textarea>

                        <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-4 px-6 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition-colors duration-300">
                            Submit Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>

       
    </div>
</main>
@endsection