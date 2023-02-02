@isset($configs["google_tag_id"])
<script type="text/javascript">//<![CDATA[
	var googleTagId = '{{$configs["google_tag_id"]}}';
	var LazyAnalytics=false;window.addEventListener("scroll",function(){(0!=document.documentElement.scrollTop&&false===LazyAnalytics||0!=document.body.scrollTop&&false===LazyAnalytics)&&(!function(){var e=document.createElement("script");e.type="text/javascript",e.async=true,e.src="https://www.googletagmanager.com/gtag/js?id="+googleTagId;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a)}(),LazyAnalytics=true)},true);
	//]]></script>
	<script type="text/javascript">//<![CDATA[
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', googleTagId);
	//]]></script>
@endif