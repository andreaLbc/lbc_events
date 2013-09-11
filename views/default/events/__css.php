<?php
$url =$vars['url'];
?>

.info_evenement{
	border: 1px solid #CCC;
	padding: 10px;
	margin-top: 20px;
	font-size: 12px;
}
.block_1{
	background: #F6F6F5;
	padding: 5px;
	width: 50%;
	float: left;
	color:#4b5de0;
}
.block_1 span{
	color:#333;
	margin-right:5px;
}
.block_2{
	margin-left: 30px;
	background: white;
	padding: 5px;
	width: 40%;
	float: left;
}

.block_edit_invite h4 {
	margin-bottom: 5px;
	font-size: 1.2em;
	font-weight: normal
}

.block_edit_invite ul#edit li {
	float:left;
	margin-right:5px;
}

.block_edit_invite ul#edit li a{
	display: block;
	background: #003d7d url(<?php echo $vars['url']; ?>mod/lbc_events/_graphics/image/button_submit_off.gif) repeat-x 0px 0px;
	width: 70px;
	padding: 2px;
	text-align: center;
	color: #fff;
	font-weight: bold;
	border-radius:6px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
}
a.privateevents {
	background: transparent url(<?php echo $vars['url']; ?>mod/lbc_events/_graphics/image/pictoEvent.png) no-repeat 0 -17px;
	display: block;
	font-size: 68.8%;
	height: 17px;
	width: 18px;
	text-decoration: none;
	margin-top: -17px;
	margin-left: 170px;
}
a.privateevents_new {
	background: transparent url(<?php echo $vars['url']; ?>mod/lbc_events/_graphics/image/pictoEvent_bulle.png) no-repeat 0 0;
	display: block;
	font-size: 68.8%;
	height: 45px;
	width: 18px;
	text-decoration: none;
	margin-top: -34px;
	margin-left: 170px;
}

.event_calend_close{
	position: relative;
	top: -65px;
	left: 260px;
	display: block;
	width: 15px;
	height: 15px;
	background: transparent url(<?php echo $vars['url']; ?>mod/lbc_events/_graphics/close.png) no-repeat 0 0;;
}
.events_icon{

	font-size: 18px;
	margin-right: 7px;
	background: #fff;
	color: #003d7d;
	border-radius: 6px;
	height: 70px;
	border: 1px solid #003d7d;
	width: 70px;

}
.events_icon p{
	margin: 0px 0 10px;
}
.day{
	text-align: center;
	font-size: 40px;
	color: #003d7d;
	margin-bottom: 6px !important;
}
.month{
	background: #003d7d;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	color: #fff;
	text-align: center;
	text-transform: uppercase;
}
.year{
	font-size: 14px;
	text-align: center !important;
	background: #eee !important;
	margin: 0 !important;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
}

.ui-state-highlight{
	background-color:#003d7d  !important;
	color:#fff !important;
}


.block_edit_invite,
.events_block_invited{
	margin: 20px 0;
}
.events_block_invited .container_box{
	
}
.events_block_invited .container_box .box{
	background: #fff;
	width: 32%;
	float: left;
	margin: 0 3px;
	border: 1px solid #003d7d;
	border-radius: 5px;
	min-height:250px;
}
.events_block_invited .container_box .box .margin{
 	padding: 5px;
}
.events_block_invited .container_box .box .member{
 	float:left;
 	margin-right:4px;
}
.events_block_invited h3{

}
.events_block_invited h4{
	padding: 3px;
	background: #003d7d;
	color: #fff;
	margin: 0 0 5px 0;
	text-align: center;
}

/* ***************************************
      DATE PICKER
**************************************** */
.ui-datepicker {
	display: none;

	margin-top: 3px;
	width: 208px;
	background-color: white;
	border: 1px solid #003d7d;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	overflow: hidden;

	-webkit-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
}
.ui-datepicker-inline {
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}

.ui-datepicker-header {
	position: relative;
	background:#003d7d;
	color: white;
	padding: 2px 0;
	border-bottom: 1px solid #003d7d;
}
.ui-datepicker-header a {
	color: white;
}
.ui-datepicker-prev, .ui-datepicker-next {
	position: absolute;
	top: 5px;
	cursor: pointer;
}
.ui-datepicker-prev {
	left: 6px;
}
.ui-datepicker-next {
	right: 6px;
}
.ui-datepicker-title {
	line-height: 1.8em;
	margin: 0 30px;
	text-align: center;
	font-weight: bold;
}
.ui-datepicker-calendar {
	margin: 4px;
}
.ui-datepicker th {
	color: #003d7d;
	border: none;
	font-weight: bold;
	padding: 5px 6px;
	text-align: center;
}
.ui-datepicker td {
	padding: 1px;
}
.ui-datepicker td span, .ui-datepicker td a {
	display: block;
	padding: 2px;
	line-height: 1.2em;
	text-align: right;
	text-decoration: none;
}
.ui-datepicker-calendar .ui-state-default {
	border: 1px solid #ccc;
	color: #4690D6;;
	background: #fafafa;
}
.ui-datepicker-calendar .ui-state-hover {
	border: 1px solid #aaa;
	color: #003d7d;
	background: #eee;
}
.ui-datepicker-calendar .ui-state-active,
.ui-datepicker-calendar .ui-state-active.ui-state-hover {
	font-weight: bold;
	border: 1px solid #003d7d;
	color: #003d7d;
	background: #E4ECF5;
}


.ui-state-highlight{
	background-color:#003d7d  !important;
	color:#fff !important;
}

.detail-calendrier{
	clear: both;
	margin: 9px 0;
	background: #e5e5e5;
	border-radius: 4px;
	padding: 16px;

}
