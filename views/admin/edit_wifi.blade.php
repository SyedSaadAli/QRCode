@include('admin.header')

        <!-- BEGIN: Mobile Menu -->
    {{-- @include('admin.sidebar_m') --}}
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
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       WIFI
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Update WIFI
                                </h2>

                            </div>
                            <form action="{{url('Edit_WIFI_Confirm',$data[0]->id)}}" method="post" >
                                @csrf
                            <div id="input" class="p-5">
                                <div class="preview">
                                    <div>
                                        <label for="regular-form-1" class="form-label">Encryption</label>
                                        <input id="regular-form-1" type="text" name="edit_encryption" value="{{$data[0]->encryption}}" class="form-control form-control-rounded" placeholder="Encryption">
                                    </div>
                                    <br>
                                    <div>
                                        <label for="regular-form-1" class="form-label">Title</label>
                                        <input id="regular-form-1" type="text" name="edit_title" value="{{$data[0]->title}}" class="form-control form-control-rounded" placeholder="Title">
                                    </div>
                                    <br>
                                    <div>
                                        <label for="regular-form-1" class="form-label">Password</label>
                                        <input id="regular-form-1" type="text" name="edit_password" value="{{$data[0]->password}}" class="form-control form-control-rounded" placeholder="Password">
                                    </div>




                                    <div class="mine" style="display:flex;justify-content: center;align-items: center;">
                                            {{-- <div class="sm:ml-20 sm:pl-5 mt-5">
                                                <button class="btn btn-primary" >Cancel</button>
                                            </div> --}}
                                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                                <button type="submit" class="btn btn-primary">Update WIFI</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END: Input -->

                    </div>
                </div>
            </div>
            <!-- END: Content -->


        </div>
            <!-- END: Content -->


        </div>




        <!-- BEGIN: JS Assets-->

        @include('admin.script')
        <!-- END: JS Assets-->
