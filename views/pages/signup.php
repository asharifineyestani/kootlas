      <script>
      // JavaScript Document
$(document).ready(function(e) {
	/*FOR CLEAN ERROR*****************************************************************************************/
     var clean_error =$("#regform input").parent().attr("id");
	 $("#"+clean_error+" input").focus(function(){
		 $("#"+clean_error+" .error").slideUp("slow");
	 });
	 /*FOR LIVE CHEK******************************************************************************************/
	 $("label input").blur(function(){
		var meqdar = $(this).val();
		var id = $(this).attr("name");
		chek(meqdar,id);
	});
	/*FOR REGISTER********************************************************************************************/
	$("#regform div:nth-child(7) input").click(function(e)
	{
		e.preventDefault();
		loading();
		var x = new Array();
		var y = new Array();
				
		for(i=1;i<=4;i++){	
			x[i] = $("#babak-s div:nth-child("+i+") input").val();
			y[i] = $("#babak-s div:nth-child("+i+") input").attr("name");
			z = chek(x[i],y[i]);
			if(z == "error")
			{
				$("#loading").css("display","none");
				return false;
			}
			var state= $("#babak-s div:nth-child(5) select").val();
			var city = $("#babak-s div:nth-child(6) select").val();
			$.post("object/class.tayin-etebar.php",
				{
					name:x[1],
					lname:x[2],
					email:x[3],
					phone:x[4],
					state:state,
					city:city
				},
				function(date,status)
				{
					if(status == "success")
						if(date != "ok")
						{
							var er = date.split("-");
							$("#"+er[1]+" input").after("<lable class='error'>"+er[2]+"</label>");
							$("#"+er[1]+" .error").slideDown("slow");
						}
						else if(date == "ok")
                        	$("#regform input:last-child").after("<p class='error'>ثبت نام شما با موفقیت انجام شد</p>")
                        $("#loading").css("display","none");
				}
			);
		}
		
		
	});
	/*THIS-IS-FUNCTION******************************************************************************************************/
	function chek(x,y)
	{
		if( x == "" || x == null)
		{
			$("#"+y).after("<lable class='error'> این فیلد خالی است</label>")
			return "error";
		}
		$.post("object/class.tayin-etebar.php",
			{
				meqdar:x,
				id:y,
			},
			function(date,status)
			{
				if(status == "success")
				{
					if(date == "error")
					{
						$("#"+y+" input").after("<lable class='error'> این فیلد خالی است</label>");
						$("#"+y+" .error").slideDown("slow");
						return "error";
					}
				}
			}
		
		);
	}
	/***********************************************************************************************************************/
	function loading()
	{
		var h = $(document).height();
		
		$("#loading").css({"display":"block","height":h}).html("<img src='img/loading.gif' >");
			var i = $(window).scrollTop()+($(window).height()- 15)/2;
			$("#loading img").css("margin-top", i);
			
	}
});

</script>

		<?php 
        echo validation_errors();
        if(!isset($userid)) 
        $userid='';
        $attributes = array( 'name' => 'ValidationForm', 'role'=>'form');
        $hidden = array('ip' => $_SERVER['REMOTE_ADDR'],'disable' => '0','level' => '1');
        echo form_open('signup',$attributes,$hidden) 
		?>
        
         <?php if (isset($signup)) echo '<div class="alert">'. $signup . '</div>'; ?>
        
              <div class="form-group" id="tname">
    <label id="mahdieh-userfname">یوزرنیم:</label>
    <input type="text" class="form-control" id="username" name="username" >
  </div>
  
                <div class="form-group" id="tname">
    <label id="mahdieh-userfname">پسورد:</label>
    <input type="password" class="form-control" id="username" name="password" >
  </div>
  
  
       
      <div class="form-group" id="tname">
    <label id="mahdieh-userfname">نام:</label>
    <input type="text" class="form-control" id="username" name="fname" >
  </div>
        <div class="form-group" id="lname">
    <label id="mahdieh-userlname">نام خانوادگی:</label>
    <input type="text" class="form-control" id="userlname" name="lname" >
  </div>
          <div class="form-group" id="email">
    <label id="mahdieh-useremail">ایمیل:</label>
    <input type="text" class="form-control" id="useremail" name="email" >
  </div>
            <div class="form-group" id="mobile">
    <label id="mahdieh-usermobile">شماره موبایل:</label>
    <input type="text" class="form-control" id="usermobile" name="mobile" >

  </div>

    <div class="form-group" id="ostan">
    <label id="mahdieh-userostan">استان:</label>
    <select id="userostan" name="state">

    </select>
  </div>

    <div class="form-group" id="city">
    <label id="mahdieh-usercity">شهر:</label>
    <select id="usercity" name="city">
    </select>
    </div>

<input name="submit" type="submit" />
    </form>




