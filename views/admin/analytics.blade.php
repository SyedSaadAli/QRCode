@include('admin.header')

        <!-- BEGIN: Mobile Menu -->
    @include('admin.sidebar_m')
        <!-- END: Mobile Menu -->

        <!-- BEGIN: Top Bar -->
        @include('admin.top_bar')
        <!-- END: Top Bar -->

        <div class="flex overflow-hidden">

            <!-- BEGIN: Side Menu -->
            @include('admin.sidebar')
            <!-- END: Side Menu -->

            <!-- BEGIN: Content -->
            <div class="content">
                <div class="">
                    <div class="">
                        <div class="">
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        General Report
                                    </h2>
                                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                                </div>

                                    <div class="grid grid-cols-12 gap-6 mt-5">
                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                                    <div class="ml-auto">
                                                        <div  > </div>
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{$data4}}</div>
                                                <div class="text-base text-slate-500 mt-1">New Orders</div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                                    <div class="ml-auto">
                                                        <div > </div>
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{$data3}}</div>
                                                <div class="text-base text-slate-500 mt-1">Total Orders</div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                                    <div class="ml-auto">
                                                        <div > </div>
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{$data2}}</div>
                                                <div class="text-base text-slate-500 mt-1">Total Products</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END: General Report -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->


        </div>




        <!-- BEGIN: JS Assets-->
        @include('admin.script')
        <!-- END: JS Assets-->
