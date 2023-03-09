@include('admin.layout.header')

<section class="container-fluid">
    <div class="row">
        <div class="sidebar" id="sidebarMenu">
            @include('admin.layout.sidebar')
        </div>
        <section class="container-fluid admin-content" id="main-admin">
            @yield('statictis')
            {{-- <div class="card">
                <div class="card-header">
                    @yield('header-body')
                </div>
                <div class="card-body">
                    @yield('content-body')
                </div>
            </div> --}}
        </section>
    </div>
</section>

<script>
    function myFunction() {
        var sB = document.getElementById("sidebarMenu");
        var main = document.getElementById("main-admin");
        if (sB.style.display === "none") {
            sB.style.display = "block";
        } else {
            sB.style.display = "none";
        }
    }
</script>
@stack('scripts')
