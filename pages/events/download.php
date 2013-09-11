<?php
	/**
	 * Elgg file download.
	 * 
	 * @package ElggFile
	 */
	global $CONFIG;
	
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	require_once(dirname(__FILE__) . "/lib/iCalcreator.class.php");
	
	// Get the guid
	$guid = get_input("guid");
	
	// Get the file
	$entity = get_entity($guid);
	
	if ($entity) {
		
		
		echo $guid;
		
		$title=ucfirst($entity->title);
		$description=$entity->description;
		$lieu=$entity->lieu;
		
		$ctrdatestart = explode(':', date("d:m:Y", $entity->datedebut));
		$ctrtimestart = explode(':', $entity->heuredebut);
		
		$ctrdateend = explode(':', date("d:m:Y", $entity->datefin));
		$ctrtimeend = explode(':', $entity->heurefin);
		
		/*echo "<pre>";
				print_r($ctrdatestart);
				print_r($ctrtimestart);
		echo '</pre>';*/
		
		$timestart = date("F j, Y, G:i a", mktime($ctrtimestart['0'], $ctrtimestart['1'], '0',$ctrdatestart['1'],$ctrdatestart['0'],$ctrdatestart['2']));
		//$timestart =str_replace('-', 'T', $timestart).'Z';
		
		$timeend = date("F j, Y, G:i a", mktime($ctrtimeend['0'], $ctrtimeend['1'], '0', $ctrdateend['1'], $ctrdateend['0'], $ctrdateend['2']));
		//$timeend =str_replace('-', 'T', $timeend).'Z';
		
		/*echo $entity->heuredebut.'</br>';
		echo $timestart.'</br>';
		die();*/
			
		$c = new vcalendar ();
		$e = new vevent();
		
		$e->setProperty( 'dtstart', $timestart);
		$e->setProperty( 'dtend', $timeend);
		$e->setProperty( 'summary', $title );
		$e->setProperty( 'location', $lieu );
		$e->setProperty( 'description', $description);
		
		$e->setProperty( 'class', 'PUBLIC' );
		$e->setProperty( 'transp', 'TRANSPARENT' );
		$c->setComponent( $e );
		$str = $c->createCalendar();
		
		$filename = friendly_title($CONFIG->sitename)."-event-".time().'.ics';
		
		//fix for IE https issue 
		header("Pragma: public");
		
		header("Content-type: text/calendar");
		header("Content-Disposition: inline; filename=\"$filename\"");
		
		/*if (strpos($mime, "image/")!==false)
			
		else
			header("Content-Disposition: attachment; filename=\"$filename\"");*/

		// allow downloads of large files.
		// see http://trac.elgg.org/ticket/1932
		ob_clean();
		flush();
		echo $str;
		exit;
		
	} else {
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}