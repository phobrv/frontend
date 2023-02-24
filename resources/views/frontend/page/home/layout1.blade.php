@extends('phont::frontend.layout.1col')
@section('content')
    <div class="container">
        @include('phont::frontend.components.boxFormWithReCaptcha')
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
