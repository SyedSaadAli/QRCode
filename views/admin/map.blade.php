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
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Create QRCODE Of Map
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Add Coordinates
                                </h2>
                                @include('sweetalert::alert')
                            </div>
                            <form action="{{url('Map')}}" method="post" >
                                @csrf
                            <div id="input" class="p-5">
                                <div class="preview">
                                    <div>
                                        <label for="regular-form-1" class="form-label">Longitude</label>
                                        <input id="regular-form-1" type="text" name="longitude" class="form-control form-control-rounded" placeholder="Longitude">
                                    </div>
                                    <br>
                                    <div>
                                        <label for="regular-form-1" class="form-label">Latitude</label>
                                        <input id="regular-form-1" type="text" name="latitude" class="form-control form-control-rounded" placeholder="Latitude">
                                    </div>

                                    <div class="mine" style="display:flex;justify-content: center;align-items: center;">
                                            {{-- <div class="sm:ml-20 sm:pl-5 mt-5">
                                                <button class="btn btn-primary" >Cancel</button>
                                            </div> --}}
                                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                                <button type="submit" class="btn btn-primary">Add Coordinates</button>
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

   <!-- BEGIN: Content -->
   <div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        QRCODE Of Website Links
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-hidden">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Qrcode</th>
                        <th class="whitespace-nowrap">Coordinates</th>
                        <th class="whitespace-nowrap">Download</th>



                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data2 as $data2)

                    <tr class="intro-x">
                        <td >
                            <div class="flex">
                                <div >
                                    {{-- <div><img style="width:100px; height:100px" alt=""  src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate($data2->link)) }} "></div> --}}
                                    <div><img style="width:100px; height:100px" alt=""  src="{{$data2->qrcode_png}}"></div>


                                </div>

                            </div>
                        </td>
                        <td >
                            <div class="flex">
                                <div >

                                    <div >{{$data2->longitude}}</div>
                                    <div >{{$data2->latitude}}</div>

                                </div>

                            </div>
                        </td>
                        <td >
                            <div class="flex">
                                <div >

                                    <div >
                                         <a class="flex items-center mr-3" href="{{$data2->qrcode_png}}" download> <i data-lucide="download" class="w-4 h-4 mr-1"></i> PNG</a>
                                         <a class="flex items-center mr-3" href="{{$data2->qrcode_eps}}" download> <i data-lucide="download" class="w-4 h-4 mr-1"></i> eps</a>
                                         <a class="flex items-center mr-3" href="{{$data2->qrcode_svg}}" download> <i data-lucide="download" class="w-4 h-4 mr-1"></i> svg</a>
                                    </div>

                                </div>

                            </div>
                        </td>

                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">

                                <a class="flex items-center mr-3" onclick="confirmation_edit(event)" href="{{url('/Edit_Map',$data2->id)}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger" onclick="confirmation_delete(event)" href="{{url('/Delete_Map',$data2->id)}}" data-tw-toggle="modal" > <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>

                            </div>
                        </td>
                    </tr>
                    @empty
                        No Record
                    @endforelse


                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    {{-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- END: Delete Confirmation Modal -->
</div>
<!-- END: Content -->
        </div>
            <!-- END: Content -->


        </div>




        <!-- BEGIN: JS Assets-->
        <script>

            function confirmation_edit(event){
                event.preventDefault();
                var urlToRedirect = event.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                    title: "Are you sure to edit this map ?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode:true,
                })
                .then((willCancel) => {
                    if(willCancel){
                        window.location.href = urlToRedirect;
                    }
                });
            }

            function confirmation_delete(event){
                event.preventDefault();
                var urlToRedirect = event.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                    title: "Are you sure to delete this map ?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode:true,
                })
                .then((willCancel) => {
                    if(willCancel){
                        window.location.href = urlToRedirect;
                    }
                });
            }

        </script>
        @include('admin.script')
        <!-- END: JS Assets-->
