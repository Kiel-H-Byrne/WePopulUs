<?php
$states=array(
        'alabama'=>'AL',
        'alaska'=>'AK',
        'arizona'=>'AZ',
        'arkansas'=>'AR',
        'california'=>'CA',
        'colorado'=>'CO',
        'connecticut'=>'CT',
        'delaware'=>'DE',
        'district of columbia'=>'DC',
        'florida'=>'FL',
        'georgia'=>'GA',
        'hawaii'=>'HI',
        'idaho'=>'ID',
        'illinois'=>'IL',
        'indiana'=>'IN',
        'iowa'=>'IA',
        'kansas'=>'KS',
        'kentucky'=>'KY',
        'louisiana'=>'LA',
        'maine'=>'ME',
        'maryland'=>'MD',
        'massachusetts'=>'MA',
        'michigan'=>'MI',
        'minnesota'=>'MN',
        'mississippi'=>'MS',
        'missouri'=>'MO',
        'montana'=>'MT',
        'nebraska'=>'NE',
        'nevada'=>'NV',
        'new hampshire'=>'NH',
        'new jersey'=>'NJ',
        'new mexico'=>'NM',
        'new york'=>'NY',
        'north carolina'=>'NC',
        'north dakota'=>'ND',
        'ohio'=>'OH',
        'oklahoma'=>'OK',
        'oregon'=>'OR',
        'pennsylvania'=>'PA',
        'puerto rico'=>'PR',
        'rhode island and providence plantations'=>'RI',
        'rhode island'=>'RI',
        'south carolina'=>'SC',
        'south dakota'=>'SD',
        'tennessee'=>'TN',
        'texas'=>'TX',
        'utah'=>'UT',
        'vermont'=>'VT',
        'virginia'=>'VA',
        'washington'=>'WA',
        'west virginia'=>'WV',
        'wisconsin'=>'WI',
        'wyoming'=>'WY'
      );

//function to convert US states name into its abbreviation
function state2code($state) {
    global $states;
    
    $input=strtolower($state);
    foreach($states as $name=>$abbr) {
        if ($input==$name) {
            return $abbr;
        }
    }
    return $state;
}

//function to convert US state code to its coresponding state name
function code2state($scode) {
    global $states;
    
    $res=array_search(strtoupper($scode), $states);
    if ($res!==FALSE) {
        return $res;
    }
    
    return $scode;
}

?>