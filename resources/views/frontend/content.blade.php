@include('frontend.head')
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    {{-- <div id="hot-post" class="row hot-post"> --}}
      
      @yield('isi')
      
      {{-- @include('frontend.widget') --}}

  </div>
</div>

@include('frontend.footer')
