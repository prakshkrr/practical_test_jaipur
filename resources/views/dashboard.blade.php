<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="space-y-4">

    <p class="text-lg font-bold">
        You're logged in as: {{ auth()->user()->role }}
    </p>

    {{-- Sales & Manager --}}
    @if(auth()->user()->hasAnyRole(['Sales','Manager']))
        <a href="{{ route('short-urls.create') }}"
           style="display:inline-block; background-color:#16a34a; color:white; padding:10px 20px; border-radius:6px; text-decoration:none;">
            Create Short URL
        </a>
    @endif

    {{-- Everyone except SuperAdmin --}}
    @if(!auth()->user()->hasRole('SuperAdmin'))
        <a href="{{ route('short-urls.index') }}"
           style="display:inline-block; background-color:#1f2937; color:white; padding:10px 20px; border-radius:6px; text-decoration:none;">
            View Short URLs
        </a>
    @endif

   {{-- SuperAdmin --}}
    @if(auth()->user()->hasRole('SuperAdmin'))

        <a href="{{ route('companies.index') }}"
        style="display:inline-block; background-color:#2563eb; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; margin-right:10px;">
            Manage Companies
        </a>

        <a href="{{ route('companies.create') }}"
        style="display:inline-block; background-color:#7c3aed; color:white; padding:10px 20px; border-radius:6px; text-decoration:none;">
            Create Company
        </a>

    @endif

</div>



</x-app-layout>
