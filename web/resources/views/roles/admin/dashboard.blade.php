<div
    class="grid grid-cols-12 gap-4"
>
    {{-- Start --}}
    <div class="col-span-12 lg:col-span-8 xl:col-span-8">
        <div
            class="card col-span-12 mt-12 bg-gradient-to-r from-orange-500 to-orange-700 p-5 sm:col-span-8 sm:mt-0 sm:flex-row h-full"
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
                </h3>
                <p class="mt-2 leading-relaxed">Have a nice day at college</p>
                <p>System : <span class="font-semibold">UP</span></p>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <button
                        class="btn px-3 py-2 rounded-lg mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                    >
                        API Access Points
                    </button>
                    <button
                        class="btn px-3 py-2 rounded-lg mt-6 border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                    >
                        Access Logs
                    </button>
                    <button
                        class="btn px-3 py-2 rounded-lg border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                    >
                        Bus Boarding Points
                    </button>
                    <button
                        class="btn px-3 py-2 rounded-lg border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                    >
                        Contact Driver
                    </button>
                    <button
                        class="btn px-3 py-2 rounded-lg border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                    >
                        Fee Details
                    </button>
                    <button
                        class="btn px-3 py-2 rounded-lg border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30"
                    >
                        Bus Pass Details
                    </button>
                </div>
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

                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                Administrator
                            </span>
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div class="space-y-3 text-xs+">
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Assigned Buses
                            </p>
                            <p class="text-right">Bus 16</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Last Login
                            </p>
                            <p class="text-right">{{ now()->format('d-m-Y') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
</div>



<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    <h3 class="mb-8">Analytics</h3>

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-green-100 rounded-lg">
                    <svg class="flex-shrink-0 size-5 text-green-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Total Students
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                  The number of daily users
                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ \App\Models\Student::count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-red-100 rounded-lg">
                    <svg class="flex-shrink-0 size-5 text-red-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Total Buses
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                                    The number of available buses
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ \App\Models\Bus::count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-orange-100 rounded-lg">
                    <svg class="flex-shrink-0 size-5 text-orange-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Total Staffs
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                                    The number of available staffs
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ \App\Models\Staff::count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-100 rounded-lg">
                    <svg class="flex-shrink-0 size-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            Total Parents
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="flex-shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                                    The number of available staffs
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ \App\Models\Guardian::count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Section -->
