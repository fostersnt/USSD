<?php
class Validation
{
    public function validateAge($age)
    {
        $check = (is_int($age) && $age > 18 && $age < 100);
        return $check;
    }

    public function validateName($name)
    {
        $check = strlen($name) > 3;
        return $check;
    }
}
