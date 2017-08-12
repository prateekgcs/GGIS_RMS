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
?>