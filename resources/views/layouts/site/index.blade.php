@extends('layouts.site.master')
@section('site-content')
    <div>
        <div id="home" x-intersect.half="shownStep = 'home'" class="relative bg-cover bg-center bg-no-repeat py-8"
            style="background-image: url(/assets/img/bg-hero.jpg)">
            <div
                class="absolute inset-0 z-20 bg-gradient-to-r from-hero-gradient-from to-hero-gradient-to bg-cover bg-center bg-no-repeat">
            </div>

            <div class="container relative z-30 pt-20 pb-12 sm:pt-56 sm:pb-48 lg:pt-64 lg:pb-48">
                <div class="flex flex-col items-center justify-center lg:flex-row">
                    <div class="rounded-full border-8 border-primary shadow-xl">
                    </div>
                    <div class="pt-8 sm:pt-8 lg:pl-8 lg:pt-0">
                        <h1 class="text-center font-header text-4xl text-white sm:text-left sm:text-5xl md:text-6xl">
                            Hello I'm {{ $profile->last_name }}!
                        </h1>
                        <h2 class="pt-5 text-center font-header text-2xl text-white sm:text-left sm:text-2xl md:text-2xl ">
                            <p style="max-width: 60rem">{{ $profile->about ?? '' }}</p>
                        </h2>
                        <div class="flex flex-col justify-center pt-3 sm:flex-row sm:pt-5 lg:justify-start">
                            <div class="flex items-center justify-center pl-0 sm:justify-start md:pl-1">
                                <p class="font-body text-lg uppercase text-white">Let's connect</p>
                                <div class="hidden sm:block">
                                    <i class="bx bx-chevron-right text-3xl text-yellow"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0 text-white">
                                @foreach ($sc as $scd)
                                    
                                <a class="mr-3" href="{{ $scd->url }}">
                                    {!! $scd->name_label !!}
                                </a>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="bg-grey-50" id="about" x-intersect.half="shownStep = 'about'">
            <div class="container flex flex-col items-center py-16 md:py-20 lg:flex-row">
                <div class="w-full text-center sm:w-3/4 lg:w-3/5 lg:text-left">
                    <h2 class="font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                        Who am I?
                    </h2>
                    <h4 class="pt-6 font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl capitalize">
                        <p>I'm {{ $profile->last_name ?? '-' }}, a {{ $profile->ability ?? 'Junior Web Development' }}</p>
                    </h4>
                    <p class="pt-6 font-body leading-relaxed text-grey-20 ">
                        {{ $profile->about ?? '-' }}
                    </p>
                    <div class="flex flex-col justify-center pt-6 sm:flex-row lg:justify-start">
                        <div class="flex items-center justify-center sm:justify-start">
                            <p class="font-body text-lg font-semibold uppercase text-grey-20">
                                Connect with me
                            </p>
                            <div class="hidden sm:block">
                                <i class="bx bx-chevron-right text-2xl text-primary"></i>
                            </div>
                        </div>
                        <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0 text-primary">
                            @foreach ($sc as $scdd)
                                    
                                <a class="mr-3" href="{{ $scdd->url }}">
                                    {!! $scdd->name_label !!}
                                </a>
                                @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="w-full pl-0 pt-10 sm:w-3/4 lg:w-2/5 lg:pl-12 lg:pt-0">
                    <div>
                        <div class="flex items-end justify-between">
                            <h4 class="font-body font-semibold uppercase text-black">
                                HTML & CSS
                            </h4>
                            <h3 class="font-body text-3xl font-bold text-primary">85%</h3>
                        </div>
                        <div class="mt-2 h-3 w-full rounded-full bg-lila">
                            <div class="h-3 rounded-full bg-primary" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="pt-6">
                        <div class="flex items-end justify-between">
                            <h4 class="font-body font-semibold uppercase text-black">Python</h4>
                            <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                        </div>
                        <div class="mt-2 h-3 w-full rounded-full bg-lila">
                            <div class="h-3 rounded-full bg-primary" style="width: 70%"></div>
                        </div>
                    </div>
                    <div class="pt-6">
                        <div class="flex items-end justify-between">
                            <h4 class="font-body font-semibold uppercase text-black">
                                Javascript
                            </h4>
                            <h3 class="font-body text-3xl font-bold text-primary">98%</h3>
                        </div>
                        <div class="mt-2 h-3 w-full rounded-full bg-lila">
                            <div class="h-3 rounded-full bg-primary" style="width: 98%"></div>
                        </div>
                    </div>
                    <div class="pt-6">
                        <div class="flex items-end justify-between">
                            <h4 class="font-body font-semibold uppercase text-black">PHP</h4>
                            <h3 class="font-body text-3xl font-bold text-primary">85%</h3>
                        </div>
                        <div class="mt-2 h-3 w-full rounded-full bg-lila">
                            <div class="h-3 rounded-full bg-primary" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container py-16 md:py-20" id="services" x-intersect.half="shownStep = 'services'">
            <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                Here's what I'm good at
            </h2>
            <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                These are the services Ioffer
            </h3>

            <div class="grid grid-cols-1 gap-6 pt-10 sm:grid-cols-2 md:gap-10 md:pt-12 lg:grid-cols-3">
                @foreach ($skills as $skill)
                    <div class="group rounded px-8 py-12 shadow hover:bg-primary">
                        <div class="mx-auto h-24 w-24 text-center xl:h-28 xl:w-28">
                            <div class="hidden group-hover:block">
                                <img src="{{ url('storage/skill/' . $skill->image) ?? '/assets/img/icon-development-white.svg' }}"
                                    alt="development icon" class="skill-img" />
                            </div>
                            <div class="block group-hover:hidden">
                                <img src="{{ url('storage/skill/' . $skill->image) ?? '/assets/img/icon-development-black.svg' }}"
                                    alt="development icon" />

                            </div>
                        </div>
                        <div class="text-center">
                            <h3
                                class="pt-8 text-lg font-semibold uppercase text-primary group-hover:text-yellow lg:text-xl">
                                {{ $skill->name ?? 'WEB DEVELOPMENT' }}
                            </h3>
                            <p class="text-grey pt-4 text-sm group-hover:text-white md:text-base">
                                {{ $skill->desc ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="bg-grey-50" id="portfolio" x-intersect.half="shownStep = 'portfolio'">
            <div class="container py-16 md:py-20 ">
                <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                    Check out my Portfolio
                </h2>
                <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                    Here's what I have done with the past
                </h3>

                <div class="mt-8 mx-auto grid w-full grid-cols-1 gap-8 pt-12 sm:w-3/4 md:gap-10 lg:w-full lg:grid-cols-2">
                    @foreach ($projects as $project)
                        <a href="{{ $project->url }}" class="mx-auto transform transition-all hover:scale-105 md:mx-0">
                            <img src="{{ asset('storage/project/' . $project->image) ?? '/assets/img/portfolio-apple.jpeg' }}"
                                class="w-full shadow" alt="portfolio image" />
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="container py-16 md:py-20" id="work" x-intersect.half="shownStep = 'work'">
            <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                My experience
            </h2>
            <h3 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                Here's what I did before freelancing
            </h3>

            <div class="relative mx-auto mt-12 flex w-full flex-col lg:w-2/3">
                <span class="left-2/5 absolute inset-y-0 ml-10 hidden w-0.5 bg-grey-40 md:block"></span>

                @foreach ($exps as $exp)
                <div class="mt-8 flex flex-col text-center md:flex-row md:text-left">
                    <div class="md:w-2/5">
                        <div class="flex justify-center md:justify-start">
                            <span class="shrink-0">
                                <img src="{{ asset('/storage/job/'.$exp->image) ?? '/assets/img/logo-spotify.svg' }}" class="h-auto w-32" alt="company logo" />
                            </span>
                            <div class="relative ml-3 hidden w-full md:block">
                                <span
                                    class="absolute inset-x-0 top-1/2 h-0.5 -translate-y-1/2 transform bg-grey-70"></span>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-3/5">
                        <div class="relative flex md:pl-18">
                            <span
                                class="absolute left-8 top-1 hidden h-4 w-4 rounded-full border-2 border-grey-40 bg-white md:block"></span>

                            <div class="mt-1 flex">
                                <i class="bx bxs-right-arrow hidden text-primary md:block"></i>
                                <div class="md:-mt-1 md:pl-8">
                                    <span class="block font-body font-bold text-grey-40">{{  Carbon\Carbon::parse($exp->start_at)->format('F Y')  ?? 'Apr 2015' }} - {{  Carbon\Carbon::parse($exp->end_at)->format('F Y') ?? 'Mar 2018' }}</span>
                                    <span class="block pt-2 font-header text-xl font-bold uppercase text-primary">{{$exp->company_name ?? 'Frontend
                                        Developer'}}</span>
                                        <small class="font-semibold text-grey-10">( {{$exp->role ?? 'Frontend
                                            Developer'}} )</small>
                                    <div class="pt-2">
                                        <span class="block font-body text-black">{{ $exp->desc ??'-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </section>

        <div class="bg-cover bg-top bg-no-repeat pb-16 md:py-16 lg:py-24"
            style="background-image: url(/assets/img/experience-figure.png)" id="statistics">
            <div class="container py-8">

            </div>
        </div>

        <section class="bg-grey-50" id="blog" x-intersect.half="shownStep = 'blog'">
            <div class="container py-16 md:py-20">
                <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                    I also like to write
                </h2>
                <h4 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                    Check out my latest posts!
                </h4>
                <div class="mx-auto grid w-full grid-cols-1 gap-6 pt-12 sm:w-3/4 lg:w-full lg:grid-cols-3 xl:gap-10">
                    @foreach ($posts as $post)
                        <a href="{{ route('post.show', $post) }}" class="shadow">
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
                                    class="block font-body text-lg font-semibold text-black">{{ $post->title ?? '-' }}</span>
                                <span class="block pt-2 font-body text-grey-20">{{ $post->excerpts ?? 'lorem' }}</span>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="mt-8">
                    <a href="{{ route('blog.show') }}" class="flex text-lg font-bold text-center justify-center items-end text-grey-10 hover:text-black">
                        View More
                        <svg  class="ml-3 text-primary" style="width: 1.5rem" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="container py-16 md:py-20" id="contact" x-intersect.half="shownStep = 'contact'">
            <h2 class="text-center font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl">
                Here's a contact form
            </h2>
            <h4 class="pt-6 text-center font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl">
                Have Any Questions?
            </h4>
            <form class="mx-auto w-full pt-10 sm:w-3/4" action="{{ route('site.contact') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col md:flex-row">
                    <input
                        class="mr-3 w-full rounded border-grey-50 px-4 py-3 font-body text-black md:w-1/2 lg:mr-5 @if ($errors->has('name')) border border-primary @endif"
                        placeholder="Name" type="text" id="name" name="name" value="{{ old('name') }}" />

                    <input
                        class="mt-6 w-full rounded border-grey-50 px-4 py-3 font-body text-black md:mt-0 md:ml-3 md:w-1/2 lg:ml-5  @if ($errors->has('email')) border border-primary @endif"
                        placeholder="Email" type="text" id="email" name="email"
                        value="{{ old('email') }}" />
                </div>
                @error('name')
                    <p class="italic text-sm text-primary mt-2">
                        {{ $errors->first('name') }}
                    </p>
                @enderror
                @error('email')
                    <p class="italic text-sm text-primary mt-2">
                        {{ $errors->first('email') }}
                    </p>
                @enderror
                <textarea
                    class="mt-6 w-full rounded border-grey-50 px-4 py-3 font-body text-black md:mt-8 @if ($errors->has('message')) border border-primary @endif"
                    placeholder="Message" id="message" cols="30" rows="10" name="message"> {{ old('message') }}</textarea>
                @error('email')
                    <p class="italic text-sm text-primary mt-2">
                        {{ $errors->first('message') }}
                    </p>
                @enderror
                <button type="submit"
                    class="mt-6 flex items-center justify-center rounded bg-primary px-8 py-3 font-header text-lg font-bold uppercase text-white hover:bg-grey-20">
                    Send
                    <i class="bx bx-chevron-right relative -right-2 text-3xl"></i>
                </button>
            </form>
            <div class="flex flex-col pt-16 lg:flex-row">
                @foreach ($nsc as $nsc)
                    
                <div class="w-full border-l-2 border-t-2 border-r-2 border-b-2 border-grey-60 px-6 py-6 sm:py-8 lg:w-1/3">
                    <div class="flex items-center">
                        {!! $nsc->name_label ?? '<i class="bx bx-phone text-2xl text-grey-40"></i>' !!}
                        <p class="pl-2 font-body font-bold uppercase text-grey-40 lg:text-lg">
                            My {{ $nsc->name ?? 'Phone' }}
                        </p>
                    </div>
                    <p class="pt-2 text-left font-body font-bold text-primary lg:text-lg">
                        {{ $nsc->url ?? '(+62) 813 5797 8850' }}
                    </p>
                </div>
                @endforeach

            </div>
        </section>

        <div class="bg-primary">
            <div class="container flex flex-col justify-between py-6 sm:flex-row">
                <p class="text-center font-body text-white md:text-left">
                    © Copyright 2022. All right reserved, ATOM.
                </p>
                <div class="flex text-white items-center justify-center pt-5 sm:justify-start sm:pt-0">
                    @foreach ($sc as $scd)
                        
                    <a class="mr-3" href="{{ $scd->url }}">
                        {!! $scd->name_label !!}
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>

        <script src="/js/svg-inject.min.js"></script>
        <script>
            let o = SVGInject(document.querySelectorAll("img.skill-img"));

            o.then(function(value) {
                let path = document.querySelectorAll("path")
                for (var i = 0; i < path.length; i++) {
                    path[i].setAttribute("fill", '#fff');
                }

                let polygon = document.querySelectorAll("polygon")
                for (var i = 0; i < polygon.length; i++) {
                    polygon[i].setAttribute("fill", '#fff');
                }
                let rect = document.querySelectorAll("rect")
                for (var i = 0; i < rect.length; i++) {
                    rect[i].setAttribute("fill", '#fff');
                }
                let circle = document.querySelectorAll("circle")
                for (var i = 0; i < circle.length; i++) {
                    circle[i].setAttribute("fill", '#fff');
                }
            });
        </script>
    @endsection
