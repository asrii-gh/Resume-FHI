<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*=== Injected codes====*/
define('BASEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/Project_fhi/index.php/');
define('CSSPATH', 'http://'.$_SERVER['HTTP_HOST'].'/Project_fhi/resources/css/');
define('JSPATH', 'http://'.$_SERVER['HTTP_HOST'].'/Project_fhi/resources/js/');
define('IMAGEPATH', 'http://'.$_SERVER['HTTP_HOST'].'/Project_fhi/resources/images/');
define('IMAGEPATH_APPLICANT', 'http://'.$_SERVER['HTTP_HOST'].'/Project_fhi/resources/images/applicants/');
define('IMAGEPATH_EMPLOYER', 'http://'.$_SERVER['HTTP_HOST'].'/Project_fhi/resources/images/employer/');
define('IMAGEPATH_EXTRA', 'http://'.$_SERVER['HTTP_HOST'].'/Project_fhi/resources/images/extra/');

define('WORK_INDUSTRY_LIST', serialize(
	array('Accounting/Finance/Audit/Tax'=>'Accounting/Finance/Audit/Tax','Advertising/Marketing/Public Relations'=>'Advertising/Marketing/Public Relations','Banking/Financial Services'=>'Banking/Financial Services','Call Center'=>'Call Center','Design/Arts'=>'Design/Arts','Engineering'=>'Engineering','Food and Beverage/Catering/Restaurant'=>'Food and Beverage/Catering/Restaurant','Hospitality'=>'Hospitality','Human Resource Management'=>'Human Resource Management','Information Technology'=>'Information Technology','Insurance'=>'Insurance','Law/Legal'=>'Law/Legal','Management'=>'Management','Media'=>'Media','Medical'=>'Medical','Merchandising and Purchasing'=>'Merchandising and Purchasing','Professional Services'=>'Professional Services','Property/Real Estates'=>'Property/Real Estates','Sales, CS and Business Development'=>'Sales, CS and Business Development','Telecommunications'=>'Telecommunications','Transportation and Logistics'=>'Transportation and Logistics','Others'=>'Others'))
);
define('FIELD_OF_STUDY_LIST', serialize(
	array('Advertising/Media'=>'Advertising/Media','Agriculture/Aquaculture/Forestry'=>'Agriculture/Aquaculture/Forestry','Architecture'=>'Architecture','Art/Design/Creative Multimedia'=>'Art/Design/Creative Multimedia','Biology'=>'Biology','BioTechnology'=>'BioTechnology','Business Studies/Administration/Management'=>'Business Studies/Administration/Management','Chemistry'=>'Chemistry','Commerce'=>'Commerce','Computer Science/Information Technology'=>'Computer Science/Information Technology','Dentistry'=>'Dentistry','Economics'=>'Economics','Journalism'=>'Journalism','Education/Teaching/Training'=>'Education/Teaching/Training','Engineering (Aviation/Aeronautics/Astronautics)'=>'Engineering (Aviation/Aeronautics/Astronautics)','Engineering (Bioengineering/Biomedical)'=>'Engineering (Bioengineering/Biomedical)','Engineering (Chemical)'=>'Engineering (Chemical)','Engineering (Civil)'=>'Engineering (Civil)','Engineering (Computer/Telecommunication)'=>'Engineering (Computer/Telecommunication)','Engineering (Electrical/Electronic)'=>'Engineering (Electrical/Electronic)','Engineering (Environment/Health/Safety)'=>'Engineering (Environment/Health/Safety)','Engineering (Industrial)'=>'Engineering (Industrial)','Engineering (Marine)'=>'Engineering (Marine)','Engineering (Material Science)'=>'Engineering (Material Science)','Engineering (Mechanical)'=>'Engineering (Mechanical)','Engineering (Mechatronic/Electromechanical)'=>'Engineering (Mechatronic/Electromechanical)','Engineering (Metal Fabrication/Tool and Die/Welding)'=>'Engineering (Metal Fabrication/Tool and Die/Welding)','Engineering (Mining/Mineral)'=>'Engineering (Mining/Mineral)','Engineering (Others)'=>'Engineering (Others)','Engineering (Petroleum/Oil/Gas)'=>'Engineering (Petroleum/Oil/Gas)','Finance/Accountancy/Banking'=>'Finance/Accountancy/Banking','Food and Beverage Services Management'=>'Food and Beverage Services Management','Food Technology/Nutrition/Dietetics'=>'Food Technology/Nutrition/Dietetics','Geographical/Geophysics'=>'Geographical/Geophysics','Geology/Geophysics'=>'Geology/Geophysics','History'=>'History','Hospitality/Tourism/Hotel Management'=>'Hospitality/Tourism/Hotel Management','Human Resource Management'=>'Human Resource Management','Humanities/Liberal Arts'=>'Humanities/Liberal Arts','Logistic/Transportation'=>'Logistic/Transportation','Law'=>'Law','Library Management'=>'Library Management','Linguistics/Languages'=>'Linguistics/Languages','Mass Communications'=>'Mass Communications','Mathematics'=>'Mathematics','Medical Science'=>'Medical Science','Medicine'=>'Medicine','Maritime Studies'=>'Maritime Studies','Marketing'=>'Marketing','Music/Performing Arts Studies'=>'Music/Performing Arts Studies','Nursing'=>'Nursing','Optometry'=>'Optometry','Personal Services'=>'Personal Services','Pharmacy/Pharmacology'=>'Pharmacy/Pharmacology','Philosophy'=>'Philosophy','Physical Therapy/Physiotherapy'=>'Physical Therapy/Physiotherapy','Physics'=>'Physics','Political Science'=>'Political Science','Property Development/Real Estate Management'=>'Property Development/Real Estate Management','Protective Services and Management'=>'Protective Services and Management','Psychology'=>'Psychology','Quantity Survey'=>'Quantity Survey','Science and Technology'=>'Science and Technology','Secretarial'=>'Secretarial','Social Science/Sociology'=>'Social Science/Sociology','Sports Science and Management'=>'Sports Science and Management','Textile/Fashion Design'=>'Textile/Fashion Design','Urban Studies/Town Planning'=>'Urban Studies/Town Planning','Veterinary'=>'Veterinary','Others'=>'Others'))
);
define('PH_CITY_LIST', serialize(
	array('Caloocan City'=>'Caloocan City','Las Piñas City'=>'Las Piñas City','Makati City'=>'Makati City','Malabon City'=>'Malabon City','Mandaluyong City'=>'Mandaluyong City','Manila City'=>'Manila City','Marikina City'=>'Marikina City','Muntinlupa City'=>'Muntinlupa City','Navotas City'=>'Navotas City','Parañaque City'=>'Parañaque City','Pasay City'=>'Pasay City','Pasig City'=>'Pasig City','Pateros City'=>'Pateros City','Quezon City'=>'Quezon City','San Juan City'=>'San Juan City','Taguig City'=>'Taguig City','Valenzuela City'=>'Valenzuela City'))
);
define('COUNTRY_LIST', serialize(
	array('Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','Andorra'=>'Andorra','Angola'=>'Angola','Antigua and Barbuda'=>'Antigua and Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia and Herzegovina'=>'Bosnia and Herzegovina','Botswana'=>'Botswana','Brazil'=>'Brazil','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Colombi'=>'Colombi','Comoros'=>'Comoros',"Congo (Brazzaville)"=>"Congo (Brazzaville)",'Congo'=>'Congo','Costa Rica'=>'Costa Rica',"Cote d'Ivoire"=>"Cote d'Ivoire",'Croatia'=>'Croatia','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor (Timor Timur)'=>'East Timor (Timor Timur)','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','Gabon'=>'Gabon','Gambia, The'=>'Gambia, The','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Greece'=>'Greece','Grenada'=>'Grenada','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Honduras'=>'Honduras','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Korea, North'=>'Korea, North','Korea, South'=>'Korea, South','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar'=>'Myanmar','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepa'=>'Nepa','Netherlands'=>'Netherlands','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Poland'=>'Poland','Portugal'=>'Portugal','Qatar'=>'Qatar','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Kitts and Nevis'=>'Saint Kitts and Nevis','Saint Lucia'=>'Saint Lucia','Saint Vincent'=>'Saint Vincent','Samoa'=>'Samoa','San Marino'=>'San Marino','Sao Tome and Principe'=>'Sao Tome and Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Serbia and Montenegro'=>'Serbia and Montenegro','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovakia'=>'Slovakia','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tonga'=>'Tonga','Trinidad and Tobago'=>'Trinidad and Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City'=>'Vatican City','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Yemen'=>'Yemen','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe'))
);

/* End of file constants.php */
/* Location: ./application/config/constants.php */