<?php
return[
	'client_id' => env('PAYPAL_CLIENT_ID','AWqFH5FUdSDffNjAC24Ll12PEfjah7B_GhlmICz6uFaJeGphsAc-D9yhh6h87YnAbSUJorLRsPKqEwR6'),
	'secret' => env('PAYPAL_SECRET','EBAWFKIXjncc0sT7N9N60XVHyrsWoJ4fn4IR6kogLB3ZMAnnNF4Js41VhS8oEMGs-fNi3JPo1QXmwQ4J'),
	'settings' => array(

			'mode' => env('PAYPAL_MODE','sandbox'),
			'http.ConnectionTimeOut' => 30,
			'log.LogEnabled' => true,
			'log.FileName' => storage_path() . '/logs/paypal.log',
			'log.LogLevel' => 'ERROR'
		),
]
; 