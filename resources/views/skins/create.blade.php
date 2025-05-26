<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Skin') }}
        </h2>
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
                    <form method="post" action="{{ route('skin.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="space-y-2">
                            <div>
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required class="rounded-md">
                            </div>
                            <div>
                                <label for="author">Author:</label>
                                <input type="text" id="author" name="author" required class="rounded-md">
                            </div>
                            <div>
                                <label for="file">File:</label>
                                <input type="file" id="file" name="file" accept=".osk" required>
                            </div>
                            <div>
                                <x-primary-button type="submit">
                                    Add Skin
                                </x-primary-button>
                            </div>
                            <div>
                                <x-secondary-button>
                                    <a href="{{ route('skin.index') }}">Back to Skins</a>
                                </x-secondary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
