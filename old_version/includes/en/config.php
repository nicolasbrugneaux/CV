<?php

// Basics infos
$personal['first_name']= 'Nicolas';
$personal['last_name'] = 'Brugneaux';
$personal['phone_number'] = '+33 6 42 24 38 46';
$personal['email_address'] = 'nicolas.brugneaux@gmail.com';
$personal['address'] = 'Slotsgade 11, room 23<br/>8700 Horsens<br/>DENMARK<br/><br/>44 A rue de Coswiller<br/>67310 Wasselonne<br/>FRANCE';

// Social links
$social_media[] = array('Facebook', 'https://facebook.com/nicolas.brugneaux');
$social_media[] = array('Twitter', 'https://twitter.com/Nicolas_Bru_');
$social_media[] = array('GitHub', 'https://github.com/nicolasbrugneaux');

// Work history
$work_history[] = array('2011',
						'Cashier',
						'Societe Generale - FRANCE',
						'Welcoming customers<br/>Withdrawing cash<br/>Regular operations<br/>Support');
$work_history[] = array('2007',
						'Trainee',
						'La Poste - FRANCE',
						'Internship as part of school');

// Education stuff
$education[] = array('DENMARK : VIA University College', 'Current - Bachelor in ICT Engineering<br/><!--<span id="menu">Topics :
<ul>
	<li>Software Development</li>
	<li>Interfacing electronics devices</li>
	<li>Programming electronics devices</li>
	<li>Real time programming </li>
	<li>Computer net & client server technology</li>
	<li>Database technology</li>
	<li>Web & Multimedia</li>
	<li>Specialisation in:</li>
	<li>Web Engineering</li>
	<li>Enterprise Engineering</li>
	<li>Embedded Engineering</li>
</ul></span>-->');
$education[] = array('FRANCE : IUT Robert Schuman', '2012 - DUT Informatique<br/>4th Semester in VIA University - DENMARK');
$education[] = array('FRANCE : Lycee Leclerc', '2010 - Baccalaureat S option Math');

// Skills
$skills[] = array('Languages', 'French - Mothertongue<br/>English - Spoken and written fluently');
$skills[] = array('Programming Languages', 'C# - Java<br/>HTML5 - CSS3 &amp; <i>Less</i> - JavaScript &amp; <i>JQuery</i><br/>PHP &amp; <i>CodeIgniter - CakePHP - Doctrine</i><br/>Python &amp; <i>Django</i><br/>Bash - SQL - Git<br/>Assembly - C');
$skills[] = array('Operating Systems', 'Mac OS - Windows - Linux');
$skills[] = array('Softwares', 'Eclipse, Visual Studio, Atmel,<br/> Maple, Suite Office, Photoshop, Sublime Text 2');

// If any awards  
$awards[] = array('Award Name', 'Description');
// interests

$interests[] = array('Sports', 'Judo, Mountain Bike, Alpine skiing');
$interests[] = array('Culture', 'Cinema, Music, Reading, Video Games, Design');
$interests[] = array('More information', '20 years old, Got Driver Licence, Likes travelling');
$interests[] = array('Personality', 'Kind, Open minded, Perserverant');

// If visible or not
$settings['social_media'] = true;
$settings['education'] = true;
$settings['skills'] = true;
$settings['awards'] = false;
$settings['interests'] = true;

// others
$settings['printable'] = false;
$settings['style'] = "dark";
$settings['lang'] = "en";