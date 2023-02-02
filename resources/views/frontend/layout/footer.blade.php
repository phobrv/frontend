<footer>

</footer>
<section id="copyright">
    {!! $configs['copyright'] ?? '' !!}
</section>
<div id="modalCartArea"></div>

{!! $configs['code_body'] ?? '' !!}
@include('phont::frontend.components.alertBoxSimple')
@include('phont::frontend.components.scrolltop')
@include('phont::frontend.components.googleAnalyticLazyload')
@include('phont::frontend.components.modalSuccess')
<script rel="preload" type="text/javascript" src="{{ asset('/js/frontend.js') }}"></script>
@yield('script')
{{-- @include("phont::frontend.components.iconFix") --}}
<script type="text/javascript">
    if (typeof(App) == 'undefined') {
        const App = {}
    }
</script>

</body>
</html>
