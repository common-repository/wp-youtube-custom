 $WpvotejQ=jQuery.noConflict();
    function Wpvote_showHide(id)
    {
    	if ($WpvotejQ("#"+id+"").is(":hidden")) {
            $WpvotejQ("#"+id+"").slideDown('fast');
          } else {
        	  $WpvotejQ("#"+id+"").slideUp('fast');
          }
    }
   function Wpvote_hide(id)
    {
    	$WpvotejQ("#"+id+"").empty();
    }

    function Wpvote_remove(id)
    {
    	$WpvotejQ("#"+id+"").remove();
    }

    function Wpvote_hoverShow(id)
    {
    	$WpvotejQ("#"+id+"").css("display","inline");
    }

    function Wpvote_hoverHide(id)
    {
    	$WpvotejQ("#"+id+"").css("display","none");
    }


