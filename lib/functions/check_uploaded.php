<?php
    function checkAll($bitmap,$test_type,$class)
    {
        $bool = 0;

        if($class<=5)
            $bool = checkOnetoFive($bitmap,$test_type);
        else if($class>=6 && $class<=9)
            $bool = checkSixToNine($bitmap,$test_type);
        else if($class>=11) 
            $bool = checkEleven($bitmap,$test_type);

        return $bool;
    }

    function checkOnetoFive($bitmap,$test_type)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);
        $bool = 0;
        switch($test_type)
        {
            case 'PT-1':
            {
                $bool = ($a[0]==0)?0:1;
                return $bool;
            }
            break;
            case 'NS-1':
            {
                $bool = ($a[1]==0)?0:1;
                return $bool;
            }
            break;
            case 'SEA-1':
            {
                $bool = ($a[2]==0)?0:1;
                return $bool;
            }
            break;
            case 'CSA-1':
            {
                $bool = ($a[3]==0)?0:1;
                return $bool;
            }
            break;
            case 'D-1':
            {
                $bool = ($a[4]==0)?0:1;
                return $bool;
            }
            break;
            case 'SA-1':
            {
                $bool = ($a[5]==0)?0:1;
                return $bool;
            }
            break;
            case 'PT-2':
            {
                $bool = ($a[6]==0)?0:1;
                return $bool;
            }
            break;
            case 'NS-2':
            {
                $bool = ($a[7]==0)?0:1;
                return $bool;
            }
            break;
            case 'SEA-2':
            {
                $bool = ($a[8]==0)?0:1;
                return $bool;
            }
            break;
            case 'CSA-2':
            {
                $bool = ($a[9]==0)?0:1;
                return $bool;
            }
            break;
            case 'D-2':
            {
                $bool = ($a[10]==0)?0:1;
                return $bool;
            }
            break;
            case 'SA-2':
            {
                $bool = ($a[11]==0)?0:1;
                return $bool;
            }
            break;
        }
    }

    function checkSixToNine($bitmap,$test_type)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);
        $bool = 0;
        switch($test_type)
        {
            case 'PT-1':
            {
                $bool = ($a[0]==0)?0:1;
                return $bool;
            }
            break;
            case 'PT-2':
            {
                $bool = ($a[1]==0)?0:1;
                return $bool;
            }
            break;
            case 'PT-3':
            {
                $bool = ($a[2]==0)?0:1;
                return $bool;
            }
            break;
            case 'NS':
            {
                $bool = ($a[3]==0)?0:1;
                return $bool;
            }
            break;
            case 'SEA':
            {
                $bool = ($a[4]==0)?0:1;
                return $bool;
            }
            break;
            case 'CSA':
            {
                $bool = ($a[5]==0)?0:1;
                return $bool;
            }
            break;
            case 'D':
            {
                $bool = ($a[6]==0)?0:1;
                return $bool;
            }
            break;
            case 'AE':
            {
                $bool = ($a[7]==0)?0:1;
                return $bool;
            }
            break;
        }
    }

    function checkEleven($bitmap,$test_type)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);
        $bool = 0;
        switch($test_type)
        {
            case 'UT-1':
            {
                $bool = ($a[0]==0)?0:1;
                return $bool;
            }
            break;
            case 'UT-2':
            {
                $bool = ($a[1]==0)?0:1;
                return $bool;
            }
            break;
            case 'UT-3':
            {
                $bool = ($a[2]==0)?0:1;
                return $bool;
            }
            break;
            case 'CSA':
            {
                $bool = ($a[3]==0)?0:1;
                return $bool;
            }
            break;
            case 'D':
            {
                $bool = ($a[4]==0)?0:1;
                return $bool;
            }
            break;
            case 'AE':
            {
                $bool = ($a[5]==0)?0:1;
                return $bool;
            }
            break;
        }
    }
?>