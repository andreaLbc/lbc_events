	
<?php

$friends = elgg_get_entities(array('types'=> 'user', 'site_guids'=> $CONFIG->site_guid, "limit"=>9999));	

if($friends){
	
?>
<div class="container_invite_member" id="container_invite_member">
<h3 class="invite_h3"><?php echo elgg_echo("b_function:invite:members"); ?></h3>


<?php
//LIST OF USER
$invited=$vars['invited'];
// Let the system know that the friends picker is in use
global $pickerinuse;
$pickerinuse = true;
$chararray = elgg_echo('friendspicker:chararray');

// Initialise internalname
if (!isset($vars['internalname'])) {
	$internalname = "friend";
} else {
	$internalname = $vars['internalname'];
}
		
// Initialise values
if (!isset($vars['value'])) {
	$vars['value'] = array();
} else {
	if (!is_array($vars['value'])) {
		$vars['value'] = (int) $vars['value'];
		$vars['value'] = array($vars['value']);
	}
}

// Initialise whether we're calling back or not
if (isset($vars['callback'])) {
	$callback = $vars['callback'];
} else {
	$callback = false;
}
		
// We need to count the number of friends pickers on the page.
if (!isset($vars['friendspicker'])) {
	global $friendspicker;
	if (!isset($friendspicker)) {
		$friendspicker = 0;
	}
	$friendspicker++;
} else {
	$friendspicker = $vars['friendspicker'];
}

$users = array();
$activeletters = array();
		
// Are we displaying form tags and submit buttons?
// (If we've been given a target, then yes! Otherwise, no.)
if (isset($vars['formtarget'])) {
	$formtarget = $vars['formtarget'];
} else {
	$formtarget = false;
}
		
// Sort users by letter
if (is_array($friends) && sizeof($friends)) {
	foreach($friends as $user) {
				
		$letter = elgg_substr($user->name,0,1);
		$letter = elgg_strtoupper($letter);
		if (!elgg_substr_count($chararray,$letter)) {
			$letter = "*";
		}
		if (!isset($users[$letter])) {
			$users[$letter] = array();
		}
		$users[$letter][$user->guid] = $user;
	}
}

if (!$callback) {
			
?>

<div class="friends_picker">

<?php

	if (isset($vars['content'])) {
		echo $vars['content'];
	}
	
?>

	<div id="friends_picker_placeholder<?php echo $friendspicker; ?>">

<?php
	
}
	
if (!isset($vars['replacement'])) {
	
	if ($formtarget) {
?>

	<script language="text/javascript">
		$(function() { // onload...do
		$('#collectionMembersForm<?php echo $friendspicker; ?>').submit(function() {
			var inputs = [];
			$(':input', this).each(function() {
				if (this.type != 'checkbox' || (this.type == 'checkbox' && this.checked != false)) {
					inputs.push(this.name + '=' + escape(this.value));
				}
			});
			jQuery.ajax({
				type: "POST",
				data: inputs.join('&'),
				url: this.action,
				success: function(){
     				$('a.collectionmembers<?php echo $friendspicker; ?>').click();
   				}

			});
			return false;
        })
      })

	</script>

<?php

	}

	echo elgg_view('notifications/subscriptions/jsfuncs',$vars);
		
?>

	<div class="friendsPicker_wrapper">
	<div id="friendsPicker<?php echo $friendspicker; ?>">
		<div class="friendsPicker_container">
<?php

	// Initialise letters
	$letter = elgg_substr($chararray,0,1);
	$letpos = 0;
	$chararray .= '*';
	while (1 == 1) {
?>
			<div class="panel" title="<?php echo $letter; ?>">
				<div class="wrapper">
					<h3><?php echo $letter; ?></h3>					
					
<?php

		if (isset($users[$letter])) {
			ksort($users[$letter]);
?>

<table id="notificationstable" cellspacing="0" cellpadding="4" border="1" width="100%">
  <tr>
    <td>&nbsp;</td>
<?php
			$i = 0;
			foreach($NOTIFICATION_HANDLERS as $method => $foo) {
				if ($i > 0) {
					echo "<td class=\"spacercolumn\">&nbsp;</td>";
				}
?>
	<td class="<?php echo $method; ?>togglefield"><?php echo elgg_echo('notification:method:'.$method); ?></td>
<?php
				$i++;
			}
?>
    <td>&nbsp;</td>
  </tr>

<?php

			if (is_array($users[$letter]) && sizeof($users[$letter]) > 0) {
				foreach($users[$letter] as $friend) {
					if ($friend instanceof ElggUser ) {
						$checked='';
						$fields='';
						if(in_array($friend->guid, $invited)){$checked = 'checked="checked"'; }
						$fields .= '<td class="'.$method.'togglefield" style="width: 10px; padding-top: 3px;">
									<input type="checkbox" name="invited['.$friend->guid.']" id="'.$method.'checkbox" value="'.$friend->guid.'" '.$checked.' /></td>';
							
						
?>

  <tr>
  <?php echo $fields; ?>
    <td class="namefield" style="width: 540px">
		<a href="<?php echo $friend->getURL(); ?>">
<?php
						echo elgg_view("profile/icon",array('entity' => $friend, 'size' => 'tiny', 'override' => true));
?>
		</a>
		<p class="namefieldlink">
			<a href="<?php echo $friend->getURL(); ?>"><?php echo ucfirst(strtolower($friend->name)).' '.ucfirst(strtolower($friend->prenom));  ?></a> <?php echo $friend->ecole ?>
		</p>
	</td>
    

  
  <td>&nbsp;</td>
  </tr>


<?php
					}
				}
			}

?>
</table>

<?php
		}

?>
			
				</div>
			</div>
<?php			
		$letpos++;
		if ($letpos == elgg_strlen($chararray)) {
			break;
		}
		$letter = elgg_substr($chararray,$letpos,1);
	}
		
?>
		</div>		
	</div>
	</div>
	
<?php
} else {
	echo $vars['replacement']; 
}
if (!$callback) {

?>
			
	</div>
</div>


<?php

}

?>
<?php
if (!isset($vars['replacement'])) {
?>

<script type="text/javascript">
		// initialise picker
		$("div#friendsPicker<?php echo $friendspicker; ?>").friendsPicker(<?php echo $friendspicker; ?>);
</script>
<script type="text/javascript">
	$(document).ready(function () {
	// manually add class to corresponding tab for panels that have content
<?php
	if (sizeof($activeletters) > 0) {
		$chararray .= "*";
		foreach($activeletters as $letter) {
			$tab = elgg_strpos($chararray, $letter) + 1;
?>
	$("div#friendsPickerNavigation<?php echo $friendspicker; ?> li.tab<?php echo $tab; ?> a").addClass("tabHasContent");
<?php
		}
	}

?>
	});
</script>

<?php

}
}
?>
</div></div>
<div class="clearfloat"></div>
