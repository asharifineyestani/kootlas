		<?php 
        echo validation_errors();
        if(!isset($userid)) 
        $userid='';
        $attributes = array( 'name' => 'ValidationForm', 'role'=>'form');
        echo form_open('admin/event_add',$attributes) 
		?>
    <?php if(isset($sucess_msg)) echo $sucess_msg;?>
    <form class="form-inline" id="regform">
      <div class="form-group" id="name">
    <label id="mahdieh-eventtitel">نام رویداد:</label>
    <input type="text" class="form-control" id="eventtitel" name="title" >
  </div>
        <div class="form-group" id="text">
    <label id="mahdieh-eventtext">توضیحات رویداد:</label>
    <input type="text" class="form-control" id="eventtext" name="text" >
  </div>
          <div class="form-group" id="date">
    <label id="mahdieh-eventdate">تاریخ رویداد:</label>
    <input type="date" class="form-control" id="eventdate" name="date" >
  </div>
            <div class="form-group" id="price">
    <label id="mahdieh-eventprice">هزینه</label>
    <label id="mahdieh-eventprice">دارد</label>
    <input type="radio" class="form-control" id="eventprice" name="price1">
     <label id="mahdieh-eventprice">ندارد</label>
    <input type="radio" class="form-control" id="eventprice" name="price2">
  </div>

    <div class="form-group" id="ostan">
    <label id="mahdieh-eventostan">استان:</label>
    <select id="eventostan" name="state">

    </select>
  </div>

    <div class="form-group" id="city">
    <label id="mahdieh-eventcity">شهر:</label>
    <select id="eventcity" name="city">

    </select>
    </div>

<input name="submit" type="submit">
    </form>

