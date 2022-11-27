@extends('layouts.master')

@section('content')
    <div class="container px-6 mx-auto grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="min-h-screen max-h-fit bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Edit Experience
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700" method="POST">
                            <form action="{{ route('exp.update', $job) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Company or Institution Name</span>
                                    <input name="company_name" id="company_name"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('company_name')) border border-red-500 @endif"
                                        autofocus placeholder="Netflix..."
                                        value="{{ old('company_name') ?? $job->company_name }}" />

                                    @error('company_name')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('company_name') }}
                                        </p>
                                    @enderror
                                </label>
                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Role</span>
                                    <input name="role" id="role"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('role')) border border-red-500 @endif"
                                        autofocus placeholder="Front end..." value="{{ old('role') ?? $job->role }}" />

                                    @error('role')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('role') }}
                                        </p>
                                    @enderror
                                </label>

                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Date</span>
                                    <div date-rangepicker="" class="flex items-center">
                                        <div class="relative">
                                            <div
                                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input name="start_at" type="text" id="start_at"
                                                class="block w-full pl-10 p-2.5 rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none datepicker-input border-gray-200 date-job"
                                                placeholder="Select date start"
                                                value="{{ Carbon\Carbon::parse($job->start_at)->format('d-m-Y') }}">
                                        </div>
                                        <span class="mx-4 text-gray-500">to</span>
                                        <div class="relative">
                                            <div
                                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input name="end_at" type="text" id="end_at"
                                                class="block w-full pl-10 p-2.5 rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none datepicker-input border-gray-200 date-job"
                                                placeholder="Select date end"
                                                value="{{ Carbon\Carbon::parse($job->end_at)->format('d-m-Y') }}">
                                        </div>
                                    </div>
                                </label>

                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                                    <textarea name="desc" id="desc"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('desc')) border border-red-500 @endif"
                                        autofocus placeholder="I work...">{{ old('desc') ?? $job->desc }}</textarea>

                                    @error('desc')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('desc') }}
                                        </p>
                                    @enderror
                                </label>


                                <div for="" class=" block text-sm mt-4">
                                    <span class=" text-gray-700 dark:text-gray-400">Image</span>
                                    <div class="flex w-96 h-auto">
                                        <div for="dropzone-file"
                                            class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800  @if ($errors->has('image')) border-red-500 @endif">
                                            <input name="image" type="file"
                                                class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                data-show-errors="true" data-allowed-file-extensions="jpeg jpg png svg"
                                                data-max-file-size-preview="3M"
                                                data-default-file="{{ url('storage/job/' . $job->image) ?? '' }}" />
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
                                        Update job
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
@section('js')
<script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
@endsection
