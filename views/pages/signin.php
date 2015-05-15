دوستان ما به دلیل زیغ وقت(:دی)  موفق به کامل کردن این سایت نشدیم، به حرفه ای بودن و سرعت عمل خودتون ببخشید. .  خوشحالیم دوستان دیگه کارای خیلی خوبی رو ارائه دادند
شما میتونید توی سایت ما عضو بشید و با شناسه کاربری خودتون وارد بشید، ولی خب اگه حالشو ندارید ما یوزرنیم خودمونو بهتون میدیم. امیدوارم از امکاناتی که به همت گروه براتون تدارک دیدیم کمال لذت رو ببرید
<p>
username: kootlas <br />
pass: arak
</p>
	<?php 
	echo validation_errors(); 
	$attributes = array( 'autocomplete' => 'on');
	$hidden = array('type' => 'tutor_type');
	echo form_open("verifylogin/".$this->uri->segment(2),$attributes,$hidden);   ?>
   
  
   
                        	<div class="form-group">
                        		<label for="email">پست الکتروینیک :</label> <br>
                                <input name="username" type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">    
                                <label for="password">رمز کاربری :</label> <br>
                                <input name="password" type="password" class="form-control" id="password">                    </div>
                            <div class="form-group">
                            	<input type="checkbox">
                                <label>مرا به یاد بسپارید</label>
                            </div>
                            <button name="rememberme" class="btn btn-info btn-block">وارد شوید</button>
                        </form>
  