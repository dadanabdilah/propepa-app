<?php
	function position($value = null)
	{
		$position = [
                'admin' => 'Admin',
                'teacher' => 'Guru',
                'student' => 'Pelajar'
            ];

        if ($value == null) {
            return $position;
        } else {
            return $position[$value];
        } 
	}
