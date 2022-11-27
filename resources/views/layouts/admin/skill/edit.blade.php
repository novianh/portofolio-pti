@extends('layouts.master')

@section('css')
    <style>
        #trix-toolbar-1 .trix-button {
            background: #ddd !important;
        }
    </style>
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="min-h-screen max-h-fit bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 ">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Edit Skill
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700">
                            <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
								@method('PUT')
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Skill Name</span>
                                    <input name="name" id="name"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('name')) border border-red-500 @endif"
                                        autofocus placeholder="Web Design..." value="{{ old('name') ?? $skill->name }}" />

                                    @error('name')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @enderror
                                </label>

                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                                    <textarea name="desc" id="desc"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('desc')) border border-red-500 @endif"
                                        placeholder="I like to..." rows="3">{{ old('desc') ?? $skill->desc}}</textarea>

                                    @error('desc')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('desc') }}
                                        </p>
                                    @enderror
                                </label>

                                <div for="" class=" block text-sm mt-4">
                                    <span class=" text-gray-700 dark:text-gray-400">Icon</span>
                                    <div class="flex w-96 h-auto">
                                        <div for="dropzone-file"
                                            class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800  @if ($errors->has('image')) border-red-500 @endif">
                                            <input name="image" type="file"
                                                class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                data-show-errors="true" data-allowed-file-extensions="jpeg jpg png svg"
                                                data-max-file-size-preview="3M" 
												data-default-file="{{ url('storage/skill/' . $skill->image) ?? '' }}" />
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
                                        Update Skill
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
