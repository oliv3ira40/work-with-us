        @php
            $flash = session()->all();

            $notification = null;
            if (isset($flash['notification'])) {
                $notification = HelpAdmin::prepareNotification($flash['notification']);
            }
        @endphp
        @if ($notification != null)
            @section('type', $notification['type'])
            @section('msg', $notification['msg'])
        @endif
        <div style="display: none;" id="config_notifications" data-type="@yield('type')">@yield('msg')</div>
        
        </div>
        <!-- end wrapper page -->

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/detect.js') }}"></script>
        <script src="{{ asset('admin/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js') }}"></script>

        <!-- Toastr js -->
        <script src="{{ asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.app.js') }}"></script>

        {{-- My js --}}
        <script src="{{ asset('js/notifications.js') }}"></script>
        {{-- My js --}}

    </body>
</html>