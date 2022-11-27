@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                                    <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so
                                        be careful what you share.</p>
                                </div>

                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form action="{{ route('profile.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $profile->id ?? '' }}">
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                            <a href="#" id="edit_profile"
                                                class=" inline-flex justify-center rounded-md border border-transparent bg-lime-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg> Edit</a>
                                            <div id="form">
                                                <label class="block text-sm font-medium text-gray-700">Photo</label>
                                                <div class="mt-1 flex items-center">
                                                    <span
                                                        class="inline-block h-20 w-20 overflow-hidden rounded-full bg-gray-100">

                                                        @if (!$profile)
                                                            <svg class="h-full w-full text-gray-300" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                            </svg>
                                                        @else
                                                            <img id="preview-image-before-upload"
                                                                src="{{ url('storage/profile/' . $profile->image) }}"
                                                                alt="" width="100%">
                                                        @endif
                                                    </span>
                                                    <label for="profile_upload"
                                                        class="btn ml-5 relative cursor-pointer rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2">
                                                        <span>Change</span>
                                                        <input id="profile_upload" name="profile_upload" type="file"
                                                            class="inp sr-only @if ($errors->has('profile_upload'))  @endif ">
                                                    </label>
                                                </div>
                                                @error('profile_upload')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('profile_upload') }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="gap-6">

                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Fullname</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="last_name" id="last_name"
                                                        value="{{ $profile->last_name ?? '' }}"
                                                        class="inp block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @if ($errors->has('last_name')) border border-red-500 @endif "
                                                        placeholder="your fullname">
                                                </div>

                                                @error('last_name')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('last_name') }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="gap-6">

                                                <label for="ability"
                                                    class="block text-sm font-medium text-gray-700">Ability</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="ability" id="ability"
                                                        value="{{ $profile->ability ?? '' }}"
                                                        class="inp block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @if ($errors->has('ability')) border border-red-500 @endif "
                                                        placeholder="web developer & ....">
                                                </div>
                                                @error('ability')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('ability') }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="desc"
                                                    class="block text-sm font-medium text-gray-700">About</label>
                                                <div class="mt-1">
                                                    <textarea id="about" name="about" rows="4"
                                                        class="inp block p-3 w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @if ($errors->has('skill')) border border-red-500 @endif "
                                                        placeholder="Lorem ipsum dolor sit amet, consectetur ...">{{ $profile->about ?? '' }}</textarea>
                                                </div>
                                                @error('about')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('about') }}
                                                    </p>
                                                @enderror
                                                <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                    profile. URLs are hyperlinked.</p>
                                            </div>


                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit" id="btn"
                                                class="btn inline-flex justify-center rounded-md border border-transparent bg-purple-600 py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none cursor-pointer focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(e) {
            $(".inp").prop('disabled', true).addClass("border-none");
            $(".btn").prop('disabled', true).addClass("cursor-not-allowed");
            $("#edit_profile").click(function() {
                $(".inp").prop('disabled', false).removeClass("border-none");
                $(".btn").prop('disabled', false).removeClass("cursor-not-allowed").addClass(
                    "hover:bg-indigo-700");

            });

            $('#profile_upload').change(function() {
                console.log('ok');
                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

        });
    </script>
@endsection