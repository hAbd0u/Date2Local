<?php
	require_once '../date2local.php';
	
	$date_str = 'Friday 01 February 2019';
	

	$date2local = new \WebDeveloperFW\Date2Local( $date_str );
	$lang_from = $date2local::ENGLISH;
	$lang_to = $date2local::UZBEK;
	$translated = $date2local->Convert2Local( $lang_from, $lang_to );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 Feb 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->Convert2Local( $lang_from, $lang_to );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 Feb 2019';
	$date2local->SetDateFormat( true, false );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->Convert2Local( $lang_from, $lang_to );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 Feb 2019';
	$date2local->SetDateFormat( true, false );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->Convert2Local( $lang_from, $lang_to );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 Feb 2019';
	$date2local->SetDateFormat( true, false );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->Convert2Local( $lang_from, $lang_to );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated . ' ' . "<br>";
	

	/*
	*
	*
	*
	*	Convert Fromat
	*
	*
	*/
	echo "<br><br><br>";
	
	$date_str = 'Friday 01 February 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->ConvertFromat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Convert fromat: ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 Feb 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->ConvertFromat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Convert fromat: ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 February 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_LONG_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->ConvertFromat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Convert fromat: ' . $translated . ' ' . "<br>";
	

	$date_str = 'Fri 01 Feb 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->ConvertFromat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Convert fromat: ' . $translated . ' ' . "<br>";
	

	$date_str = 'Friday 01 February 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->ConvertFromat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_LONG_MONTH );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Convert fromat: ' . $translated . ' ' . "<br>";
	

	$date_str = 'Friday 01 February 2019';
	$date2local->SetDateFormat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
	$date2local->SetDateString( $date_str );
	$translated = $date2local->ConvertFromat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
	if( !$translated ) 
		echo $date2local->GetLastError() . "<br>";
	else
		echo 'Convert fromat: ' . $translated . ' ' . "<br>";
	
	
?>