
<script type="text/javascript">      
jQuery(document).ready(function() {  
    
    $('#mycarousel_1').jcarousel({               
        scroll:1        
    });
    
    $('.fancybox').fancybox({
        loop:false,
        beforeLoad: function() {
            this.title = $(this.element).attr('caption');
        }    
    });
    
        /*
     *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
    */
    $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                    openEffect : 'none',
                    closeEffect : 'none',
                    prevEffect : 'none',
                    nextEffect : 'none',

                    arrows : false,
                    helpers : {
                            media : {},
                            buttons : {}
                    }
            });
            
    $(".various").fancybox({
            maxWidth	: 800,
            maxHeight	: 600,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: false,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'none'
    });
    
});
</script>
<style type="text/css">
.fancybox-title iframe {
    min-height: 30px;
    vertical-align: middle;
}
</style>


<li><a class="various fancybox.iframe" href="https://www.google.com/fusiontables/embedviz?viz=MAP&q=select+col3+from+1RqYbuWoX2ejCAxgk4pPGSjw1VC9cj2TKHr_3brw&h=false&lat=50.10645955300939&lng=15.328325198437597&z=7&t=1&l=col3&y=1&tmplt=1">Google maps (iframe)</a></li>
<iframe width="600" height="300" scrolling="no" frameborder="no" src="https://www.google.com/fusiontables/embedviz?viz=MAP&amp;q=select+col3+from+1RqYbuWoX2ejCAxgk4pPGSjw1VC9cj2TKHr_3brw&amp;h=false&amp;lat=50.10645955300939&amp;lng=15.328325198437595&amp;z=7&amp;t=1&amp;l=col3&amp;y=1&amp;tmplt=1"></iframe>




    
<div id="wrap">
  <h1>jCarousel</h1>
  <h2>Riding carousels with jQuery</h2> 
  
  	<h3>Simple image gallery</h3>
        
                      
        <ul id="mycarousel_1" class="jcarousel-skin-ie7">
            <li><a class="fancybox" href="/gfx/fancybox/antena_m.jpg" caption="Anténa čipové časomíry" rel="gallery"><img src="/gfx/fancybox/antena_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>
            <li><a class="fancybox" href="/gfx/fancybox/zerovice_m.jpg" caption="Brána čipové časomíry" rel="gallery"><img src="/gfx/fancybox/zerovice_s.jpg" width="75" height="75" border="0" alt="Brána čipové časomíry" /></a></li>                                        
            <li><a class="fancybox" href="/gfx/fancybox/brana_m.jpg" caption="Brána čipové časomíry" rel="gallery"><img src="/gfx/fancybox/brana_s.jpg" width="75" height="75" border="0" alt="Brána čipové časomíry" /></a></li>
            <li><a class="fancybox" href="/gfx/fancybox/blato2_m.jpg" caption="Anténa čipové časomíry" rel="gallery"><img src="/gfx/fancybox/blato2_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>
        </ul>
        
	<p>
		<a class="fancybox" href="/fancybox/img/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/fancybox/img/1_s.jpg" alt="" /></a>

		<a class="fancybox" href="/fancybox/img/2_b.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="/fancybox/img/2_s.jpg" alt="" /></a>

		<a class="fancybox" href="/fancybox/img/3_b.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="/fancybox/img/3_s.jpg" alt="" /></a>

		<a class="fancybox" href="/fancybox/img/4_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno"><img src="/fancybox/img/4_s.jpg" alt="" /></a>
	</p>
        <li><a class="fancybox" href="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Tlu%C4%8Dn%C3%A1&aq=&sll=37.0625,-95.677068&sspn=37.735377,86.572266&vpsrc=6&ie=UTF8&hq=&hnear=Tlu%C4%8Dn%C3%A1,+Czech+Republic&ll=49.721816,13.223763&spn=0.120523,0.338173&t=m&z=12&iwloc=A">Direct link</a></li>
        <li><a class="fancybox" href="https://www.google.com/fusiontables/embedviz?viz=MAP&q=select+col3+from+1RqYbuWoX2ejCAxgk4pPGSjw1VC9cj2TKHr_3brw&h=false&lat=50.10645955300939&lng=15.328325198437597&z=7&t=1&l=col3&y=1&tmplt=1">Direct link</a></li>
        <li><a class="fancybox" href="http://www.youtube.com/watch?v=opj24KnzrWo">Youtube</a></li>

 
       
      

</div>