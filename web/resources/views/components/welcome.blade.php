<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome to your College Bus Management System!
    </h1>

    <p class="mt-4 text-gray-500">
        You're logged in as: {{ Auth::user()->name }}
    @if (Auth::user()->hasRole('admin'))
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
            Admin
        </span>
    @else
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
           Student
        </span>
    @endif
    </p>


    @if (Auth::user()->hasRole('student'))
        <p class="mt-4 text-gray-500">
            You are assigned to bus: {{ Auth::user()->busBoardingPoint->bus->bus_no }}
        </p>
    @endif


</div>

{{--<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">--}}
{{--    <div>--}}
{{--        <div class="flex items-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />--}}
{{--            </svg>--}}
{{--            <h2 class="ms-3 text-xl font-semibold text-gray-900">--}}
{{--                <a href="https://laravel.com/docs">Logs </a>--}}
{{--            </h2>--}}
{{--        </div>--}}

{{--        <p class="mt-4 text-gray-500 text-sm leading-relaxed">--}}
{{--            Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.--}}
{{--        </p>--}}

{{--        <p class="mt-4 text-sm">--}}
{{--            <a href="https://laravel.com/docs" class="inline-flex items-center font-semibold text-indigo-700">--}}
{{--                Explore the documentation--}}

{{--                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">--}}
{{--                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </p>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <div class="flex items-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">--}}
{{--                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />--}}
{{--            </svg>--}}
{{--            <h2 class="ms-3 text-xl font-semibold text-gray-900">--}}
{{--                <a href="https://laracasts.com">Fee Details</a>--}}
{{--            </h2>--}}
{{--        </div>--}}

{{--        <p class="mt-4 text-gray-500 text-sm leading-relaxed">--}}
{{--            Your fee details are available here. You can check your fee details and pay your fees online. You can also check your fee payment history.--}}
{{--        </p>--}}

{{--        <table class="table-auto">--}}
{{--            <thead>--}}
{{--                <tr>--}}
{{--                    <th class="px-4 py-2">Student Name</th>--}}
{{--                    <th class="px-4 py-2">Fee Amount</th>--}}
{{--                    <th class="px-4 py-2">Payment Status</th>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                <tr>--}}
{{--                    <td class="border px-4 py-2">John Doe</td>--}}
{{--                    <td class="border px-4 py-2">1000</td>--}}
{{--                    <td class="border px-4 py-2">Paid</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td class="border px-4 py-2">Jane Doe</td>--}}
{{--                    <td class="border px-4 py-2">2000</td>--}}
{{--                    <td class="border px-4 py-2">Not Paid</td>--}}
{{--                </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        <p class="mt-4 text-sm">--}}
{{--            <a href="https://laracasts.com" class="inline-flex items-center font-semibold text-indigo-700">--}}
{{--                Start watching Laracasts--}}

{{--                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">--}}
{{--                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </p>--}}
{{--    </div>--}}


{{--</div>--}}
