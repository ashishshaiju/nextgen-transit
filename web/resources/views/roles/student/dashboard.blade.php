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


<div
    class="grid grid-cols-12 gap-4"
>
    {{-- Start --}}
    <div class="col-span-12 lg:col-span-4 xl:col-span-4">
        <!-- component -->
        <div class="p-4 mx-4 w-full mx-auto pt-20 flow-root">
            <ul role="list" class="-mb-8">
                <li>
                    <div class="relative pb-8">
                        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        <div class="relative flex space-x-3">
                            <div>
            <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
              <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
              </svg>
            </span>
                            </div>
                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                <div>
                                    <p class="text-sm text-gray-500">packing at <a href="#" class="font-medium text-gray-900">France</a></p>
                                </div>
                                <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                    <time datetime="2020-09-20">Sep 20</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="relative pb-8">
                        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        <div class="relative flex space-x-3">
                            <div>
            <span class="h-8 w-8 rounded-full  flex items-center justify-center ring-8 ring-white">
              <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                   src="https://t3.ftcdn.net/jpg/04/14/78/90/360_F_414789044_6xD0f4z9YcHfQimfnighWoUCIqgEJ66G.jpg" />

            </span>
                            </div>
                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                <div>
                                    <p class="text-sm text-gray-500">with driver <a href="#" class="font-medium text-gray-900">on the way to the plane</a></p>
                                </div>
                                <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                    <time datetime="2020-09-22">Sep 22</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="relative pb-8">
                        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        <div class="relative flex space-x-3">
                            <div>
            <span class="h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white">
              <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                   src="https://c8.alamy.com/comp/2RC5DTJ/taking-off-plane-logo-2RC5DTJ.jpg" clip-rule="evenodd" />

            </span>
                            </div>
                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                <div>
                                    <p class="text-sm text-gray-500">on plane ready to fly <a href="#" class="font-medium text-gray-900"> to london</a></p>
                                </div>
                                <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                    <time datetime="2020-09-28">Sep 28</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="relative pb-8">
                        <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        <div class="relative flex space-x-3">
                            <div>
            <span class="h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white">
              <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                   src="https://res.cloudinary.com/teepublic/image/private/s--AwgOGWhQ--/t_Resized%20Artwork/c_fit,g_north_west,h_954,w_954/co_ffffff,e_outline:48/co_ffffff,e_outline:inner_fill:48/co_ffffff,e_outline:48/co_ffffff,e_outline:inner_fill:48/co_bbbbbb,e_outline:3:1000/c_mpad,g_center,h_1260,w_1260/b_rgb:eeeeee/c_limit,f_auto,h_630,q_auto:good:420,w_630/v1615488250/production/designs/20135311_0.jpg" />
                </svg>
            </span>
                            </div>
                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                <div>
                                    <p class="text-sm text-gray-500">with driver <a href="#" class="font-medium text-gray-900">on the way to you</a></p>
                                </div>
                                <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                    <time datetime="2020-09-30">Sep 30</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="relative pb-8">
                        <div class="relative flex space-x-3">
                            <div>
            <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
              <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
              </svg>
            </span>
                            </div>
                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                <div>
                                    <p class="text-sm text-gray-500">wait outside the door <a href="#" class="font-medium text-gray-900">the driver is close</a></p>
                                </div>
                                <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                    <time datetime="2020-10-04">Oct 4</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    {{-- End --}}

    {{-- Parents Column --}}
    {{-- Start --}}
    <div class="pt-12 lg:mt-0 col-span-12 lg:col-span-4 xl:col-span-4">
        <div class="px-6 text-xl text-center font-semibold text-gray-600 mb-8">
            Parents
        </div>
    @foreach (Auth::user()->guardians as $parent)
        <!-- Card -->
        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition" href="#">
            <div class="px-4 py-3 ">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img class="size-[38px] rounded-full" src="{{ $parent->user->profile_photo_url }}" alt="Image Description">
                        <div class="ms-3">
                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-700">
                                {{ $parent->user->name }}
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
    </div>
    {{-- Stop --}}

    {{-- Start --}}
    <div class="mt-4 col-span-12 lg:col-span-4 xl:col-span-4 mx-auto">
        <div class="text-xl text-center font-semibold text-gray-600 mb-8">
            Bus Pass Details
        </div>
        <div
            class="swiper h-40 w-64 mx-auto justify-center"
        >
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide relative  flex h-full flex-col overflow-hidden rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 p-5"
                >
                    <div class="grow mb-2">
                        <img
                            class="mt-1 h-8 rounded-full border-2 border-white"
                            src="{{ Auth::user()->profile_photo_url }}"
                            alt="image"
                        />
                        <p class="-mt-6 text-white float-right text-xs font-medium">Bus No : {{ Auth::user()->busBoardingPoint->bus->bus_no }}</p>
                    </div>
                    <div class="text-white">
                        <p class="text-lg font-semibold tracking-wide">{{ Auth::user()->name }}</p>
                        <p class="mt-1 text-xs font-medium"> {{ Auth::user()->busBoardingPoint->boardingPoint->place }}</p>
                        <p class="mt-1 text-xs font-medium">**** **** **** 8945</p>

                        <p class="-mt-3 text-white float-right text-xs font-bold">CBMS</p>
                    </div>
                    <div
                        class="absolute top-0 right-0 -m-3 h-24 w-24 rounded-full bg-white/20"
                    ></div>
                </div>
            </div>
        </div>
        <div
            class="swiper h-40 w-64 mx-auto justify-center my-4"
        >
            <div class="swiper-wrapper">
                <div
                    class="swiper-slide relative  flex h-full flex-col overflow-hidden rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 p-5"
                >
                    <div class="grow mb-2">

                    </div>
                    <div class="text-white">
                        <p class="-mt-3 text-sm font-semibold tracking-wide">Contact Details</p>
                        <p class="mt-2 text-xs font-medium"> {{ Auth::user()->email }}</p>
                        <p class="mt-1 text-xs font-medium"> {{ Auth::user()->phone }}</p>

                        <p class="mt-5 text-[7px] font-medium">*To be presented when boarding the bus</p>

                        <p class="-mt-2 text-white float-right text-xs font-bold">CBMS</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End --}}
