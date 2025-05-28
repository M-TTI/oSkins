<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Skin') }}
                </h2>
                <x-secondary-button>
                    <a href="{{ route('skin.index') }}">Back to Skins</a>
                </x-secondary-button>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div>
                            <h2>Errors:</h2>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('skin.update', $skin->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="space-y-2">
                            <div>
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $skin->name) }}" required class="rounded-md">
                            </div>
                            <div>
                                <label for="author">Author:</label>
                                <input type="text" id="author" name="author" value="{{ old('author', $skin->author) }}" required class="rounded-md">
                            </div>
                            <div>
                                <label for="file">File (optional):</label>
                                <input type="file" id="file" name="file" accept=".osk">
                            </div>
                            <div>
                                <x-primary-button type="submit">
                                    Update Skin
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
