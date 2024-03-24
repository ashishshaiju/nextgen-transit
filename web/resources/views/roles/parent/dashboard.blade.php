<div
    class="grid grid-cols-12 gap-4"
>
    {{-- Start --}}
    <div class="col-span-12 lg:col-span-8 xl:col-span-8">
        <div
            class="card col-span-12 mt-12 bg-gradient-to-r from-emerald-400 to-cyan-400 p-5 sm:col-span-8 sm:mt-0 sm:flex-row h-full"
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
                        Live Location (GPS)
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

                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Guardian
                                    </span>
                        </h3>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <hr>

                    <div class="space-y-1 text-xs+">
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700">
                                Your Children
                            </p>
                        </div>
                    </div>

                    @foreach (Auth::user()->guardian->guardianStudents as $child)
                        <!-- Card -->
                        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition" href="#">
                            <div class="px-4 py-3 ">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img class="size-[38px] rounded-full" src="{{ $child->student->user->profile_photo_url }}" alt="Image Description">
                                        <div class="ms-3">
                                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-700">
                                                {{ $child->student->user->name }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="ps-3">
                                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- End Card -->
                    @endforeach
                    <hr>

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
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                Bus System Status
                            </p>
                            <p class="text-right"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Online
                                        </span></p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                No: of Students
                            </p>
                            <p class="text-right">21</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                No: of Staffs
                            </p>
                            <p class="text-right">2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
</div>
