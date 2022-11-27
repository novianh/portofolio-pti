@extends('layouts.master')

@section('css')
    <style>
        #trix-toolbar-1 .trix-button {
            background: #ddd !important;
            /* force the background to be a light color since Trix icons do not support dark mode */
        }
    </style>
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="min-h-screen max-h-fit bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Update Project for Portofolio part
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700">
                            <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Project Name</span>
                                    <input name="name" id="name"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('name')) border border-red-500 @endif"
                                        autofocus placeholder="Build ..." value="{{ old('name') ?? $project->name }}" />

                                    @error('name')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @enderror
                                </label>
                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Project Url</span>
                                    <input name="url" id="url"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('url')) border border-red-500 @endif"
                                        autofocus placeholder="Build ..." value="{{ old('url') ?? $project->url}}" />

                                    @error('url')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('url') }}
                                        </p>
                                    @enderror
                                </label>

                                {{-- <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Date</span>
                                    <div date-rangepicker="" class="flex items-center">
                                        <div class="relative">
                                            <div
                                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <input name="start_at" type="text" id="start_at"
                                                class="block w-full pl-10 p-2.5 rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none datepicker-input border-gray-200 date-project"
                                                placeholder="Select date start" value="{{ old('start_at') ?? $start_at->start_at }}">
                                        </div>
                                        <span class="mx-4 text-gray-500">to</span>
                                        <div class="relative">
                                            <div
                                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <input name="end_at" type="text" id="end_at"
                                                class="block w-full pl-10 p-2.5 rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none datepicker-input border-gray-200 date-project"
                                                placeholder="Select date end" value="{{ old('start_at') ?? $end_at->end_at }}">
                                        </div>
                                    </div>
                                </label> --}}

                                <div for="" class=" block text-sm mt-4">
                                    <span class=" text-gray-700 dark:text-gray-400">Image</span>
                                    <div class="flex w-96 h-auto">
                                        <div for="dropzone-file"
                                            class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800  @if ($errors->has('image')) border-red-500 @endif">
                                            <input name="image" type="file"
                                                class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                data-show-errors="true" data-allowed-file-extensions="jpeg jpg png svg"
                                                data-max-file-size-preview="3M" 
                                                data-default-file="{{ url('storage/project/' . $project->image) ?? '' }}"/>
                                        </div>
                                    </div>
                                    @error('image')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('image') }}
                                        </p>
                                    @enderror
                                </div>


                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Update Project
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
