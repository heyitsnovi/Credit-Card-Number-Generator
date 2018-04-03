<?php

$cc_type = $_POST['cctype'];

$ccprefix = '';

$generated_num = '';

if($cc_type==='mastercard'){


	$ccprefix = mt_rand(50,55);

	$generated_num = create_cc_number($ccprefix,16);


	
}

else if($cc_type==='dinersclubcarteblance'){

	$ccprefix = mt_rand(300,305);
	$generated_num = create_cc_number($ccprefix,16);

}


else if($cc_type==='dinersclubinternational'){

	$prefixes = array(mt_rand(300,305),309,36,mt_rand(38,39));
	shuffle($prefixes);

	$ccprefix = $prefixes[0];
	$generated_num = create_cc_number($ccprefix,16);

}
else if($cc_type=='dinnersclubcanadaus'){

	$prefixes = array(54,55);
	shuffle($prefixes);

	$ccprefix = $prefixes[0];
	$generated_num = create_cc_number($ccprefix,16);

}

else if($cc_type=='discover'){

	$prefixes = array(6011, mt_rand(622126,622925), mt_rand(644,649), 65);
	shuffle($prefixes);

	$ccprefix = $prefixes[0];
	$generated_num = create_cc_number($ccprefix,16);

}
else if($cc_type=='jcb'){


	$ccprefix =mt_rand(3528,3589);
	$generated_num = create_cc_number($ccprefix,16);

}
else if($cc_type=='maestro'){

	$prefixes = array(5018, 5020, 5038, 5612, 5893, 6304, 6759, 6761, 6762, 6763, 0604, 6390);
	shuffle($prefixes);
	$ccprefix = $prefixes[0];
	$generated_num = create_cc_number($ccprefix,16);

}

else if($cc_type=='visa'){

 
	$ccprefix = 4;
	$generated_num = create_cc_number($ccprefix,16);

}
else if($cc_type=='visa_electron'){

	$prefixes = array(4026, 417500, 4405, 4508, 4844, 4913, 4917);
	shuffle($prefixes);
	$ccprefix = $prefixes[0];
	$generated_num = create_cc_number($ccprefix,16);
}

if(isValid($generated_num)){

	echo json_encode(array('result'=>$generated_num));

}else{

	echo json_encode(array('result'=>'error'));
}


function isValid($num) {
    $num = preg_replace('/[^\d]/', '', $num);
    $sum = '';

    for ($i = strlen($num) - 1; $i >= 0; -- $i) {
        $sum .= $i & 1 ? $num[$i] : $num[$i] * 2;
    }

    return array_sum(str_split($sum)) % 10 === 0;
}


function create_cc_number($prefix, $length) {

    $ccnumber = $prefix;
    # generate digits
    while ( strlen($ccnumber) < ($length - 1) ) {
        $ccnumber .= rand(0,9);
    }
    # Calculate sum
    $sum = 0;
    $pos = 0;
    $reversedCCnumber = strrev( $ccnumber );
    while ( $pos < $length - 1 ) {
        $odd = $reversedCCnumber[ $pos ] * 2;
        if ( $odd > 9 ) {
            $odd -= 9;
        }
        $sum += $odd;
        if ( $pos != ($length - 2) ) {
            $sum += $reversedCCnumber[ $pos +1 ];
        }
        $pos += 2;
    }
    # Calculate check digit
    $checkdigit = (( floor($sum/10) + 1) * 10 - $sum) % 10;
    $ccnumber .= $checkdigit;
    return $ccnumber;
}