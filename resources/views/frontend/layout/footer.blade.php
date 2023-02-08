<footer>

</footer>
<section id="copyright">
    {!! $configs['copyright'] ?? '' !!}
</section>
<div id="modalCartArea"></div>

{!! $configs['code_body'] ?? '' !!}
@include('phobrv::frontend.components.alertBoxSimple')
@include('phobrv::frontend.components.scrolltop')
@include('phobrv::frontend.components.googleAnalyticLazyload')
@include('phobrv::frontend.components.modalSuccess')
<script rel="preload" type="text/javascript" src="{{ asset('/js/frontend.js') }}"></script>
@yield('script')
{{-- @include("phobrv::frontend.components.iconFix") --}}
<script type="text/javascript">
    if (typeof(App) == 'undefined') {
        const App = {}
    }
</script>

</body>
</html>
