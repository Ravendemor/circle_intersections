<?php
function searchByEmail( $email = '' )
{
	global $limit;

	$out = array();

	$query = 'SELECT * FROM users WHERE email LIKE ' . $email;

	if( $res = @mysql_query( $query ) )
	{
		while( $arr = @mysql_fetch_array( $res ) )
		{
			$out[] = $arr;

			if( count( $out ) > $limit )
			{
				break;
			}
		}
	}

	return $out;
}