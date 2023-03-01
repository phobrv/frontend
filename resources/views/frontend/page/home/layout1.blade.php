@extends('phont::frontend.layout.1col')
@section('content')
    <div class="container">
      @include('phont::frontend.components.boxFormWithReCaptcha')
    <div class="row">
        {{-- @for($i=0; $i<100;$i++)
         <div class="col-sm-6 col-md-4 mb-2">
          <img class="responsively-lazy" src="http://127.0.0.1:8000/storage/rs100/shares/panda.jpeg" 
          data-srcset="http://127.0.0.1:8000/storage/rs200/shares/panda.jpeg 200w,
                        http://127.0.0.1:8000/storage/rs300/shares/panda.jpeg 300w, 
                        http://127.0.0.1:8000/storage/rs400/shares/panda.jpeg 400w,
                        http://127.0.0.1:8000/storage/rs500/shares/panda.jpeg 500w, 
                        http://127.0.0.1:8000/storage/rs600/shares/panda.jpeg 600w, 
                        http://127.0.0.1:8000/storage/rs800/shares/panda.jpeg 800w" 
                        srcset="http://127.0.0.1:8000/storage/rs100/shares/panda.jpeg" />
        </div>
        @endfor --}}

        @for($i=0; $i<100;$i++)
        <div class="col-sm-6 col-md-4 mb-2">
         @include('phont::frontend.components.img',['source'=>'http://127.0.0.1:8000/storage/photos/shares/panda.jpeg','alt'=>'function removes whitespace or other predefined characters from the right side of a','class'=>'img_cover'])
        </div>
        @endfor
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
