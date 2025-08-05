<?php
if (!function_exists('icon_edit')) {
    function icon_edit()
    {
        return  'helloworld';
    }
};
if (!function_exists('icon_delete')) {
    function icon_delete()
    {
        return  'helloworld';
    }
};

if(!function_exists('fullName')) {
    function fullName($staff)
    {
        $title = '';

        if($staff->gender === 'male'){
            $title = 'Mr.';
        }
        else {
            $title = 'Ms.';
        }
        return trim("{$title} {$staff->first_name} {$staff->last_name}");
    }
}
