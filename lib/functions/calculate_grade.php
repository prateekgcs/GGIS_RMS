<?php
    function calculateGrade($percentage)
    {
        if($percentage>90 && $percentage<=100)
            $grade = 'A1';
        else if($percentage>80 && $percentage<=90)
            $grade = 'A2';
        else if($percentage>70 && $percentage<=80)
            $grade = 'B1';
        else if($percentage>60 && $percentage<=70)
            $grade = 'B2';
        else if($percentage>50 && $percentage<=60)
            $grade = 'C1';
        else if($percentage>40 && $percentage<=50)
            $grade = 'C2';
        else if($percentage>33 && $percentage<=40)
            $grade = 'D';
        else if($percentage<=32)
            $grade = 'E';

        return $grade;
    }

    function averageBestTwo($m1, $m2, $m3)
    {
        $max1 = 0; $max2 = 0;
        
        if($m1 >= $m2)
        {
            if($m1 >= $m3)
            {
                $max1 = $m1;
                if($m2 >= $m3)
                {
                    $max2 = $m2;
                }
                else
                {
                    $max2 = $m3;
                }
            }
        }
        else if($m2 > $m3)
        {
            $max1 = $m2;
            if($m1 >= $m3)
            {
                $max2 = $m1;
            }
            else
            {
                $max2 = $m3;
            }
        }
        else
        {
            $max1 = $m3;
            if($m1 >= $m2)
            {
                $max2 = $m1;
            }
            else
            {
                $max2 = $m2;
            }
        }

        $avg = ($max1+$max2)/2;
        $avg = number_format($avg, 2);
        return $avg;
    }


?>