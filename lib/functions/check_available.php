<?php
	function checkAvailable($class,$bitmap,$test_type)
	{
		if($class<=5)
			$foo = 'oneToFive';
		else if($class>5 && $class<10)
			$foo = 'sixToNine';
		else if( $class=='11s' || $class=='11c' )
			$foo = 'eleven';
		else
			printf("<script>alert('Something went wrong!');</script>");

		$bool = call_user_func_array($foo, array($bitmap, $test_type));
		return $bool;
	}

	function oneToFive($bitmap,$test_type)
	{
		$a = str_split($bitmap);
		$test_type = strtoupper($test_type);
		$bool = 0;
		switch($test_type)
		{
			case 'PT-1':
			{
				if($a[0])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'SA-1':
			{
				if($a[0]&&$a[1]&&$a[2]&&$a[3]&&$a[4]&&$a[5])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'PT-2':
			{
				if($a[6])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'SA-2':
			{
				if($a[6]&&$a[7]&&$a[8]&&$a[9]&&$a[10])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'AE':
			{
				if($a[0]&&$a[1]&&$a[2]&&$a[3]&&$a[4]&&$a[5]&&$a[6]&&$a[7]&&$a[8]&&$a[9]&&$a[10]&&$a[11])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			default:
			{
				return $bool;
				break;
			}
		}
		return $bool;
	}
	
	function sixToNine($bitmap,$test_type)
	{
		$a = str_split($bitmap);
		$test_type = strtoupper($test_type);
		$bool = 0;
		switch($test_type)
		{
			case 'PT-1':
			{
				if($a[0])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'PT-2':
			{
				if($a[1])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'PT-3':
			{
				if($a[2])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'AE':
			{
				if($a[0]&&$a[1]&&$a[2]&&$a[3]&&$a[4]&&$a[5]&&$a[6]&&$a[7])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			default:
			{
				return $bool;
				break;
			}
		}
		return $bool;
	}

	function eleven($bitmap,$test_type)
	{
		$a = str_split($bitmap);
		$test_type = strtoupper($test_type);
		$bool = 0;
		switch($test_type)
		{
			case 'UT-1':
			{
				if($a[0])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'UT-2':
			{
				if($a[1])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'UT-3':
			{
				if($a[2])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			case 'AE':
			{
				if($a[3]&&a[4]&&$a[5])
				{
					$bool = 1;
					return $bool;
				}
				break;
			}
			default:
			{
				return $bool;
				break;
			}
		}	
	}
?>