<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $skin->name }}
            </h2>
            <div class="flex justify-between items-center space-x-2">
                @if (auth()->user()->is_admin)
                    <x-primary-button>
                        <a href="{{ route('skin.edit', [$skin->id]) }}">Edit</a>
                    </x-primary-button>
                    <form method="post" action="{{ route('skin.destroy', [$skin->id]) }}" onsubmit="return confirm('Are you sure you want to delete this skin?');">
                        @csrf
                        @method('delete')
                        <x-danger-button type="submit">
                            Delete
                        </x-danger-button>
                    </form>
                @endif
            </div>
            <x-secondary-button>
                <a href="{{ route('skin.index') }}">Back to Skins</a>
            </x-secondary-button>
        </div>
    </x-slot>

    @if (session('success'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white text-center py-2 px-4 shadow-md rounded-lg w-1/4"
            x-init="setTimeout(() => show = false, 2000)">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-red-500 text-white text-center py-2 px-4 shadow-md rounded-lg w-1/4"
            x-init="setTimeout(() => show = false, 2000)">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-2">
                    <h1>{{ $skin->name }}</h1>
                    <p><strong>Author:</strong> {{ $skin->author }}</p>
                    <x-primary-button>
                        <a href="{{ route('skin.download', $skin->id) }}">Download</a>
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
