// 1 - START DROPDOWN SLIDER SCRIPTS ------------------------------------------------------------------------

$(document).ready(function () {
    $(".showhide-account").click(function () {
        $(".account-content").slideToggle("fast");
        $(this).toggleClass("active");
        return false;
    });
});

$(document).ready(function () {
    $(".action-slider").click(function () {
        $("#actions-box-slider").slideToggle("fast");
        $(this).toggleClass("activated");
        return false;
    });
});

//  END ----------------------------- 1

// 2 - START LOGIN PAGE SHOW HIDE BETWEEN LOGIN AND FORGOT PASSWORD BOXES--------------------------------------

$(document).ready(function () {
	$(".forgot-pwd").click(function () {
	$("#loginbox").hide();
	$("#forgotbox").show();
	return false;
	});

});

$(document).ready(function () {
	$(".back-login").click(function () {
	$("#loginbox").show();
	$("#forgotbox").hide();
	return false;
	});
});

// END ----------------------------- 2



// 3 - MESSAGE BOX FADING SCRIPTS ---------------------------------------------------------------------

$(document).ready(function() {
	$(".close-yellow").click(function () {
		$("#message-yellow").fadeOut("slow");
	});
	$(".close-red").click(function () {
		$("#message-red").fadeOut("slow");
	});
	$(".close-blue").click(function () {
		$("#message-blue").fadeOut("slow");
	});
	$(".close-green").click(function () {
		$("#message-green").fadeOut("slow");
	});
});

// END ----------------------------- 3



// 4 - CLOSE OPEN SLIDERS BY CLICKING ELSEWHERE ON PAGE -------------------------------------------------------------------------

$(document).bind("click", function (e) {
    if (e.target.id != $(".showhide-account").attr("class")) $(".account-content").slideUp();
});

$(document).bind("click", function (e) {
    if (e.target.id != $(".action-slider").attr("class")) $("#actions-box-slider").slideUp();
});
// END ----------------------------- 4
 
 
 
// 5 - TABLE ROW BACKGROUND COLOR CHANGES ON ROLLOVER -----------------------------------------------------------------------
/*
$(document).ready(function () {
    $('#product-table	tr').hover(function () {
        $(this).addClass('activity-blue');
    },
    function () {
        $(this).removeClass('activity-blue');
    });
});
 */
// END -----------------------------  5
 
 
 
 // 6 - DYNAMIC YEAR STAMP FOR FOOTER -----------------------------------------------------------------------

 $('#spanYear').html(new Date().getFullYear()); 
 
// END -----------------------------  6 
  jQuery.extend (String.prototype, {
  camelize: function () {
    return this.replace (/(?:^|[-_])(\w)/g, function (_, c) {
      return c ? c.toUpperCase () : '';
    })
  }
});

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}

$(document).ready(function() {
	$("#comment_submit").click(function() {
		
		$("#CommentAddForm").mask("Envoi en cours...");
		$.post($("#CommentAddForm").attr("action"), $("#CommentAddForm").serialize(), function(data, textStatus, jqXHR) {
			data=$.parseJSON(data);
			var fields=["nickname","email","body"];
			$.each(fields,function(i,v){
					
					$('#Comment'+v.camelize()+'Error').remove();
				});
			
			if(errors=data.errors){
				$.each(errors,function(i,k){
					if($('#Comment'+i.camelize()+'Error').length==0){
					   $('<div style="color:red;" id="Comment'+i.camelize()+'Error">'+k+'</div>').insertAfter('#Comment'+i.camelize());
					}else{
						$('#Comment'+i.camelize()+'Error').fadeIn();
					}
				});
			}
			
			if(message=data.message){
				//$("#formWrapper").fadeOut();
				$("#CommentAddForm").reset();
				//$('#CommentMessage').html(message);
				$("#CommentAddForm").unmask();
				alert(message);
			}
		 
			//console.log(data.nickname,data);
			$("#CommentAddForm").unmask();
			

		});
		return false;
	});
});

