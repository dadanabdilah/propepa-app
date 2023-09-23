<?php
function position($value = null)
{
    $position = [
        'admin' => 'Admin',
        'teacher' => 'Guru'
    ];

    if ($value == null) {
        return $position;
    } else {
        return $position[$value];
    }
}
