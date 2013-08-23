	<meta charset="utf-8">
	
	<style>
	 
		
		label, input { display:block; }
		input.text { margin-bottom:3px;height:12px; width:95%; padding: .4em; }
		fieldset#newslettre {  padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain {width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error {  padding: .3em; }
		.validateTips {border: 1px solid transparent; padding: 0.3em; }
		.demo{
			display:none;
		}
		.ui-dialog-content .ui-widget-content{
			
			height: 93px;
		}
		
	</style>
	
<div class="demo">
<div style="height: 106px">
<div id="dialog-form"  title="النشرة الإخبارية" style="height: 109px;">
	<p class="validateTips">اشترك معنا في نشرة الموقع لتصلك بالبريد .</p>

	<form>
		
			
		
	<fieldset id="newslettre">
	
		<label for="email">البريد الإلكتروني</label>
		<input type="text" name="email" id="email" value="" class="text" />
		
	</fieldset>
	
	</form>
</div>
</div>
	<script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var name = $( "#name" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
			tips = $( ".validateTips" );

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "عفوا.. عنوان البريد الإلكتروني الذي أدخلته غير صحيح "   
					 );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				"تسجيل": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

					//bValid = bValid && checkLength( name, "username", 3, 16 );
					bValid = bValid && checkLength( email, "email", 6, 80 );
					//bValid = bValid && checkLength( password, "password", 5, 16 );

					//bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
					//bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

					if ( bValid ) {
						$( "#users tbody" ).append( "<tr>" +
							//"<td>" + name.val() + "</td>" + 
							"<td>" + email.val() + "</td>" + 
							//"<td>" + password.val() + "</td>" +
						"</tr>" ); 
						
						DataString = "email=" + email.val();
						$.ajax({
							type :'POST',
							url :'http://www.wijhatnadar.com/Newsletters/insertemail',
							data : DataString,
							success : function(){
								alert("نشكركم على الانضمام إلى وجهات نظر ");
							}
						});
					  document.cookie = 'envoiwijhatnadar=aufaitmarocmail; expires=365; path=/'
					  
						$( this ).dialog( "close" );
					}
				},
				"إلغاء": function() {
					 
					  document.cookie = 'closedmodalboxwijhat=closedmodalbox; expires=2; path=/'
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});

		$( "#create-user" )
			
			
				$( "#dialog-form" ).dialog( "open" );
			
	});
	</script>





</div><!-- End demo -->

<!-- End demo-description -->
	
