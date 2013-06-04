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
						'Guichetier',
						'Societe Generale - FRANCE',
						'Accueil des clients<br/>Retrait d\'espèces<br/>Opérations courantes<br/>Assistance');
$work_history[] = array('2007',
						'Stagiaire',
						'La Poste - FRANCE',
						'Stage dans le cadre scolaire');

// Education stuff
$education[] = array('DANEMARK : VIA University College', 'Présent - Bachelor in ICT Engineering');
$education[] = array('FRANCE : IUT Robert Schuman', '2012 - DUT Informatique<br/>4ème semestre à VIA University - DANEMARK');
$education[] = array('FRANCE : Lycee Leclerc', '2010 - Baccalaureat S option Math');

// Skills
$skills[] = array('Langages', 'Français - Langue maternelle<br/>Anglais - Ecrit et parlé couramment');
$skills[] = array('Langages de programmation', 'C# - Java<br/>HTML5 - CSS3 &amp; <i>Less</i> - JavaScript &amp; <i>JQuery</i><br/>PHP &amp; <i>CodeIgniter - CakePHP - Doctrine</i><br/>Python &amp; <i>Django</i><br/>Bash - SQL - Git<br/>Assembleur - C');
$skills[] = array('Systèmes d\'exploitations', 'Mac OS - Windows - Linux');
$skills[] = array('Logiciels', 'Eclipse, Atmel, Visual Studio,<br/> Maple, Suite Office, Photoshop, Sublime Text 2');

// If any awards  
$awards[] = array('Award Name', 'Description');
// interests

$interests[] = array('Sports', 'Judo, VTT, Ski alpin');
$interests[] = array('Culture', 'Cinéma, Musique, Livres, Jeux vidéo, Design');
$interests[] = array('Informations complémentaires', '20 ans, Titulaire du permis B, aime voyager');
$interests[] = array('Personnalité', 'Joyeux de nature, Ouvert d\'esprit, Perséverant');

// If visible or not
$settings['social_media'] = true;
$settings['education'] = true;
$settings['skills'] = true;
$settings['awards'] = false;
$settings['interests'] = true;

// others
$settings['printable'] = false;
$settings['style'] = "dark";
$settings['lang'] = "fr";