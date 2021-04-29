<?php
function saint_date() {
	$date = get_field( 'saint_date' );
	if ( ! empty( $date ) ) {
		$month = substr( $date, 0, 2 );
		$day   = substr( $date, 2, 2 );

		switch ( $month ) {
			case ( '01' ):
				$month = "fanvier";
				break;

			case ( '02' ):
				$month = "février";
				break;

			case ( '03' ):
				$month = "mars";
				break;

			case ( '04' ):
				$month = "avril";
				break;

			case ( '05' ):
				$month = "mai";
				break;

			case ( '06' ):
				$month = "juin";
				break;

			case ( '07' ):
				$month = "juillet";
				break;

			case ( '08' ):
				$month = "Aout";
				break;

			case ( '09' ):
				$month = "septembre";
				break;

			case ( '10' ):
				$month = "octobre";
				break;

			case ( '11' ):
				$month = "novembre";
				break;

			case ( '12' ):
				$month = "décembre";
				break;
		}

		?>
		<p>Saint fêté le <?php echo $day . ' ' . $month; ?>.</p>
	<?php }
}