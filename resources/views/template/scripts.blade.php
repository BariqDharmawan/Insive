<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('plugins/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
@yield('script')
<script>
    function currentNav(navId) {
        let current = window.location.href.split('#')[0],
            nav = document.getElementById(navId),
            navItem = nav.getElementsByTagName('a');

        Array.from(navItem).filter(link => {
            if (link.href == current || link.href == decodeURIComponent(current)) link.classList.add("active")
        });
    }
    
    currentNav('adminSidebar');
</script>