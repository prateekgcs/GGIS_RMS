<?php
    require_once ($_SERVER['DOCUMENT_ROOT']. '/GGIS_RMS/lib/sql/conn.php');
    
    function updateAll($bitmap,$test_type,$year,$class,$section,$num=1)
    {
        if($class<=5)
            $bitmap = updateOnetoFive($bitmap,$test_type,$num);
        else if($class>=6 && $class<=9)
            $bitmap = updateSixToNine($bitmap,$test_type,$num);
        else if($class =='11s' || $class == '11c') 
            $bitmap = updateEleven($bitmap,$test_type,$num);

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

    function updateOneToFive($bitmap,$test_type,$num=1)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);

        switch($test_type)
        {
            case 'PT-1':
            {
                $a[0] = $num;
            }
            break;
            case 'NS-1':
            {
                $a[1] = $num;  
            }
            break;
            case 'SEA-1':
            {
                $a[2] = $num;  
            }
            break;
            case 'CSA-1':
            {
                $a[3] = $num;    
            }
            break;
            case 'D-1':
            {
                $a[4] = $num;    
            }
            break;
            case 'SA-1':
            {
                $a[5] = $num;    
            }
            break;
            case 'PT-2':
            {
                $a[6] = $num;    
            }
            break;
            case 'NS-2':
            {
                $a[7] = $num;    
            }
            break;
            case 'SEA-2':
            {
                $a[8] = $num;    
            }
            break;
            case 'CSA-2':
            {
                $a[9] = $num;     
            }
            break;
            case 'D-2':
            {
                $a[10] = $num;    
            }
            break;
            case 'SA-2':
            {
                $a[11] = $num;    
            }
            break;
        }

        $bitmap = implode('',$a);
        return $bitmap;
    }

    function updateSixToNine($bitmap,$test_type,$num=1)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);

        switch($test_type)
        {
            case 'PT-1':
            {
                $a[0] = $num;
            }
            break;
            case 'PT-2':
            {
                $a[1] = $num;  
            }
            break;
            case 'PT-3':
            {
                $a[2] = $num;  
            }
            break;
            case 'NS':
            {
                $a[3] = $num;    
            }
            break;
            case 'SEA':
            {
                $a[4] = $num;    
            }
            break;
            case 'CSA':
            {
                $a[5] = $num;    
            }
            break;
            case 'D':
            {
                $a[6] = $num;    
            }
            break;
            case 'AE':
            {
                $a[7] = $num;    
            }
            break;
        }

        $bitmap = implode('',$a);
        return $bitmap;
    }

    function updateEleven($bitmap,$test_type,$num=1)
    {
        $a = str_split($bitmap);
        $test_type = strtoupper($test_type);

        switch($test_type)
        {
            case 'UT-1':
            {
                $a[0] = $num;
            }
            break;
            case 'UT-2':
            {
                $a[1] = $num;  
            }
            break;
            case 'UT-3':
            {
                $a[2] = $num;  
            }
            break;
            case 'CSA':
            {
                $a[3] = $num;    
            }
            break;
            case 'D':
            {
                $a[4] = $num;    
            }
            break;
            case 'AE':
            {
                $a[5] = $num;    
            }
            break;
        }

        $bitmap = implode('',$a);
        return $bitmap;
    }
?>