@if(Session::has('success'))
<script async language="javascript">
  alert("{{Session::get('success')}}");
</script>
{{Session::forget('success')}}
@endif
