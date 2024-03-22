
    @if (Auth::user()->hasRole('student'))
        <div
            class="grid grid-cols-12 gap-4"
        >
            {{-- Start --}}
                <div class="col-span-12 lg:col-span-8 xl:col-span-8">
                <div
                    class="card col-span-12 mt-12 bg-gradient-to-r from-blue-500 to-blue-600 p-5 sm:col-span-8 sm:mt-0 sm:flex-row h-full"
                >
                    <div class="flex justify-center lg:float-right">
                        <img
                            class="mt-4 h-48 lg:h-72"
                            src="{{ asset('images/bus.png') }}"
                            alt="image"
                        />
                    </div>
                    <div
                        class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left"
                    >
                        <h3 class="text-xl">
                            Good morning, <span class="font-semibold">{{ Auth::user()->name }}</span>

                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Admin
                        </span>
                        </h3>
                        <p class="mt-2 leading-relaxed">Have a nice day at college</p>
                        <p>System : <span class="font-semibold">UP</span></p>

                        <button
                            class="btn px-3 py-2 rounded-lg mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                        >
                            View Schedule
                        </button>
                    </div>
                </div>
            </div>
            {{-- End --}}

            {{-- Start --}}
            <div class="mt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4">
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6"
                >
                    <div
                        class="rounded-lg bg-info/10 px-4 pb-5 dark:bg-navy-800 sm:px-5"
                    >
                        <div class="flex items-center justify-between py-3">
                            <h2
                                class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
                            >
                                Profile
                            </h2>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <div class="avatar h-16 w-16">
                                    <img
                                        class="rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="image"
                                    />
                                </div>
                                <div>
                                    <p>Today</p>
                                    <p
                                        class="text-xl font-medium text-slate-700 dark:text-navy-100"
                                    >
                                        11:00
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h3
                                    class="text-lg font-medium text-slate-700 dark:text-navy-100"
                                >
                                    {{ Auth::user()->name }}
                                </h3>
                                <p class="text-xs text-slate-400 dark:text-navy-300">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <div class="space-y-3 text-xs+">
                                <div class="flex justify-between">
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Current Semester
                                    </p>
                                    <p class="text-right">Btech S4</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Last Login
                                    </p>
                                    <p class="text-right">{{ now()->format('d-m-Y') }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Registered Bus
                                    </p>
                                    <p class="text-right">Bus 16</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Last Check IN / Check Out
                                    </p>
                                    <p class="text-right">25 May 2021</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Boarding Point
                                    </p>
                                    <p class="text-right">Karukachal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End --}}
        </div>






        <!-- Table Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                            <!-- Header -->
                            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800">
                                        Recent Journey
                                    </h2>
                                    <p class="text-sm text-gray-600">
                                        Add users, edit and more.
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                            View all
                                        </a>

                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                            Manage Cards
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                      Name
                    </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Position
                    </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Status
                    </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Portfolio
                    </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Created
                    </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <img class="inline-block size-[38px] rounded-full" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">Christina Bersh</span>
                                                    <span class="block text-sm text-gray-500">christina@site.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800">Director</span>
                                            <span class="block text-sm text-gray-500">Human resources</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                      Active
                    </span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <span class="text-xs text-gray-500">1/5</span>
                                                <div class="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="flex flex-col justify-center overflow-hidden bg-gray-800" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-sm text-gray-500">28 Dec, 12:12</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium" href="#">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                            <!-- End Table -->

                            <!-- Footer -->
                            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                                <div>
                                    <p class="text-sm text-gray-600 ">
                                        <span class="font-semibold text-gray-800">6</span> results
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                            Prev
                                        </button>

                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                            Next
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>

    @endif

