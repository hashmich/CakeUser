Hello Admin, 

a new user has registered and is waiting for your approval of the new account!

<?php
if(!empty($data[$model])) {
	echo "Details (database entry): \n\n";
	foreach($data[$model] as $fieldname => $value) {
        if(in_array($fieldname, array('modified','updated','password','shib_eppn','active','approved',
            'new_email','email_verified','is_admin','user_admin','last_login','password_token','email_token',
            'approval_token','password_token_expires','email_token_expires','approval_token_expires')))
            continue;
        // handle foreign keys
        if(strpos($fieldname, '_id') !== false) {
            $modelname = Inflector::camelize(substr($fieldname, 0, strlen($fieldname) - 3));
            $value = $course[$modelname]['name'];
            $fieldname = $modelname;
        }
	    echo str_pad($fieldname . ':', 24, " ") . "\t\t" . $value . "\n";
	}
	echo "\n\n";
	echo "Click here for instant approval: \n";
	
	echo Router::url(array(
		'admin' => false,
		'plugin' => 'users',
		'controller' => 'users',
		'action' => 'approve',
		$data[$model]['approval_token']
	), $full = true);
}
?>
