
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semesters') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Display the list of semesters--}}
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Semesters
                    </div>
                    <div class="mt-6 text-gray-500">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Semester</th>
                                    <th class="px-4 py-2">Start Date</th>
                                    <th class="px-4 py-2">End Date</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semesters as $semester)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $semester->semester->name }} ({{ $semester->semester->year }})
                                            @if ($semester->is_current == 1)
                                                <span class="text-xs bg-green-200 text-green-800 rounded-full px-2 py-1">Current Semester</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">{{ $semester->semester->start_date }}</td>
                                        <td class="border px-4 py-2">{{ $semester->semester->end_date }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="" class="text-blue-500">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
