<?php
    require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php');
    
    function updateAll($bitmap,$test_type,$year,$class,$section)
    {
        if($class<=5)
            $bitmap = updateOnetoFive($bitmap,$test_type);
        else if($class>=6 && $class<=9)
            $bitmap = updateSixToNine($bitmap,$test_type);
        else if($class>=11) 
            $bitmap = updateEleven($bitmap,$test_type);

        rewriteBitmap($bitmap,$year,$class,$section);
    }

    function rewriteBitmap($bitmap,$year,$class,$section)
    {
        $conn = connect();
        $class = $class.strtoupper($section);
        $query = "UPDATE batch_info SET $class = ? WHERE year = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$bitmap);
        $stmt->bindParam(2,$year);
        if(!$stmt->execute()) die("<script>alert('Internal error!');</script>");
    }

    function updateOneToFive($bitmap,$test_type)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);

        switch($test_type)
        {
            case 'PT-1':
            {
                $a[0] = 1;
            }
            break;
            case 'NS-1':
            {
                $a[1] = 1;  
            }
            break;
            case 'SEA-1':
            {
                $a[2] = 1;  
            }
            break;
            case 'CSA-1':
            {
                $a[3] = 1;    
            }
            break;
            case 'D-1':
            {
                $a[4] = 1;    
            }
            break;
            case 'SA-1':
            {
                $a[5] = 1;    
            }
            break;
            case 'PT-2':
            {
                $a[6] = 1;    
            }
            break;
            case 'NS-2':
            {
                $a[7] = 1;    
            }
            break;
            case 'SEA-2':
            {
                $a[8] = 1;    
            }
            break;
            case 'CSA-2':
            {
                $a[9] = 1;     
            }
            break;
            case 'D-2':
            {
                $a[10] = 1;    
            }
            break;
            case 'SA-2':
            {
                $a[11] = 1;    
            }
            break;
        }

        $bitmap = implode('',$a);
        return $bitmap;
    }

    function updateSixToNine($bitmap,$test_type)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);

        switch($test_type)
        {
            case 'PT-1':
            {
                $a[0] = 1;
            }
            break;
            case 'PT-2':
            {
                $a[1] = 1;  
            }
            break;
            case 'PT-3':
            {
                $a[2] = 1;  
            }
            break;
            case 'NS':
            {
                $a[3] = 1;    
            }
            break;
            case 'SEA':
            {
                $a[4] = 1;    
            }
            break;
            case 'CSA':
            {
                $a[5] = 1;    
            }
            break;
            case 'D':
            {
                $a[6] = 1;    
            }
            break;
            case 'AE':
            {
                $a[7] = 1;    
            }
            break;
        }

        $bitmap = implode('',$a);
        return $bitmap;
    }

    function updateEleven($bitmap,$test_type)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);

        switch($test_type)
        {
            case 'UT-1':
            {
                $a[0] = 1;
            }
            break;
            case 'UT-2':
            {
                $a[1] = 1;  
            }
            break;
            case 'UT-3':
            {
                $a[2] = 1;  
            }
            break;
            case 'CSA':
            {
                $a[3] = 1;    
            }
            break;
            case 'D':
            {
                $a[4] = 1;    
            }
            break;
            case 'AE':
            {
                $a[5] = 1;    
            }
            break;
        }

        $bitmap = implode('',$a);
        return $bitmap;
    }
?>