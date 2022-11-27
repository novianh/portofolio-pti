@extends('layouts.site.postMaster')

@section('content')

            <div class="container py-6 md:py-10">
                <div class="mx-auto max-w-4xl">
                    <div class="">
                        <h1 class="pt-5 font-body text-3xl font-semibold text-primary sm:text-4xl md:text-5xl xl:text-6xl">
                            {{ $post->title ?? 'How to become a frontend developer' }}
                        </h1>
                        <div class="flex items-center pt-5 md:pt-10">

                            <div class="pl-0">
                                <span
                                    class="block pt-1 font-body text-xl font-bold text-grey-30">{{ date('d F Y', strtotime($post->created_at)) ?? '-' }}</span>
                            </div>
                        </div>
                        <div style="background-image:  url({{ asset('/storage/post/' . $post->image) ?? '/assets/img/post-01.png' }}) "
                            class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72 mt-12"></div>
                    </div>
                    <div class="prose max-w-none pt-8">
                        {!! $post->content ?? '-' !!}

                        <div
                            class="flex flex-col justify-center items-center border-t border-lila py-12 pt-12 md:flex-row md:items-start xl:pb-20">
                            <div class="ml-0 text-center md:w-full md:text-left">
                                <div
                                    class="mx-auto grid w-full grid-cols-1 gap-6 pt-12 sm:w-3/4 lg:w-full lg:grid-cols-1 xl:gap-10 pb-12">
                                    @foreach ($recommends as $post)
                                        <a href="{{ route('post.show', $post) }}" class="shadow"
                                            style="text-decoration: none">
                                            <div style="background-image:  url({{ asset('/storage/post/' . $post->image) ?? '/assets/img/post-01.png' }}) "
                                                class="group relative h-72 bg-cover bg-center bg-no-repeat sm:h-84 lg:h-64 xl:h-72">
                                                <span
                                                    class="absolute inset-0 block bg-gradient-to-b from-blog-gradient-from to-blog-gradient-to bg-cover bg-center bg-no-repeat opacity-10 transition-opacity group-hover:opacity-50"></span>
                                                <span
                                                    class="absolute right-0 bottom-0 mr-4 mb-4 block rounded-full border-2 border-white px-6 py-2 text-center font-body text-sm font-bold uppercase text-white md:text-base">Read
                                                    More</span>
                                            </div>
                                            <div class="bg-white py-6 px-5 xl:py-8">
                                                <span
                                                    class="block font-body text-lg font-semibold text-black capitalize">{{ $post->title ?? '-' }}</span>
                                                <span
                                                    class="block pt-2 font-body text-grey-20">{{ $post->excerpts ?? 'lorem' }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                    <div class="text-center">
                                        <a href="{{ route('blog.show') }}" class="flex text-lg font-bold text-center justify-center items-end text-grey-10 hover:text-black" style="text-decoration: none">
                                            View More
                                            <svg  class="ml-3 text-primary" style="width: 1.5rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="border-t border-lila pt-12">
                                    <h3 class="pt-12 font-body text-2xl font-bold text-secondary md:pt-0">
                                        {{ $user->last_name ?? 'Christy Smith' }}
                                    </h3>
                                    <p
                                        class="pt-5 font-body text-lg leading-8 text-secondary sm:leading-9 md:text-xl md:leading-9 lg:leading-9 xl:leading-9">
                                        {{ $user->about ?? '-' }}

                                    </p>
                                    <div class="flex items-center justify-center pt-5 md:justify-start">
                                        @foreach ($sc as $scd)
                                            <a href="{{ $scd->url }}" class="text-primary mr-3">
                                                {!! $scd->name_label !!}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    @endsection
