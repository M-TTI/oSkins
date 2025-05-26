<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Skins') }}
            </h2>
            <h2>
                @if (auth()->user()->is_admin)
                    <x-primary-button>
                        <a href="{{ route('skin.create') }}">Add a skin</a>
                    </x-primary-button>
                @endif
            </h2>
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center space-x-4 py-4">
                        @foreach($skins as $skin)
                            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 border-b border-gray-200 space-y-2">
                                    <h2>{{ $skin->name }}</h2>
                                    <x-secondary-button>
                                        <a href="{{ route('skin.show', $skin->id) }}">View Details</a>
                                    </x-secondary-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
