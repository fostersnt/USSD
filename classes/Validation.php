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
        $splited_names = explode(' ', $name);
        $result = [];
        if (count($splited_names) > 1) {
            foreach ($splited_names as $key => $value) {
                if (strlen($value) < 3) {
                    array_push($result, $value);
                }
            }
        } else {
            array_push($result, $name);
        }
        return count($result) == 0 ? true : false;
    }
}
