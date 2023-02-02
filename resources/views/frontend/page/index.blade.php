@extends('phont::frontend.layout.1col')
@section('content')
  <div class="container">
    <div id="cagegory_page1" class="category_main" >
        @include('phont::frontend.page.posts.layout2_short')
    </div>
  </div>
@endsection

@section('script')
    <script>
        if (typeof App == "undefined") {
            const App = {};
            
            // App.Received.init()
        }
    </script>
@endsection
