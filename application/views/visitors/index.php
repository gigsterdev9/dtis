<?php $allowed_groups = array('admin','supervisor', 'encoder'); ?>
<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; <?php echo $title; ?></h2>
	<?php
	if ($this->ion_auth->in_group($allowed_groups)) {
	?>
	<div class="container-fluid text-right"><a href="<?php echo base_url('visits/add') ?>"><span class="glyphicon glyphicon-plus-sign"></span> New entry</a></div>
	<?php
	}
	?>
	<p>&nbsp;</p>
    <div class="container-fluid" style="padding: 0">
        <div class="row">
            <div class="col-sm-6" >

                <div class="text-left">
                <?php 
                    $attributes = array('class' => 'form-inline', 'role' => 'form', 'method' => 'GET');
                    echo form_open('visitors/', $attributes); 
                ?>
                    <div class="form-group">
                        <label class="control-label" for="title">Filter by:</label> &nbsp; 
                        <select name="filter_by" id="filter_by" class="form-control	">
                            <option value="">Select</option>
                            <option value="nationality">Nationality</option>
                            <option value="gender">Gender</option>
                            <option value="age">Age</option>
                            <option value="status_code">Status Code</option>
                        </select>
                        <select name="filter_by_nationality" id="filter_by_nationality" class="form-control" style="display:none">
                                    <option value="">Select</option>
                                    <option value="Afghan" <?php if (set_value('nationality') == 'Afghan') echo 'selected' ?> >Afghan</option>
                                    <option value="Albanian" <?php if (set_value('nationality') == 'Albanian') echo 'selected' ?> >Albanian</option>
                                    <option value="Algerian" <?php if (set_value('nationality') == 'Algerian') echo 'selected' ?> >Algerian</option>
                                    <option value="American" <?php if (set_value('nationality') == 'American') echo 'selected' ?> >American</option>
                                    <option value="Andorran" <?php if (set_value('nationality') == 'Andorran') echo 'selected' ?> >Andorran</option>
                                    <option value="Angolan" <?php if (set_value('nationality') == 'Angolan') echo 'selected' ?> >Angolan</option>
                                    <option value="Antiguan and Barbudan" <?php if (set_value('nationality') == 'Antiguan and Barbudan') echo 'selected' ?> >Antiguan and Barbudan</option>
                                    <option value="Argentine" <?php if (set_value('nationality') == 'Argentine') echo 'selected' ?> >Argentine</option>
                                    <option value="Armenian" <?php if (set_value('nationality') == 'Armenian') echo 'selected' ?> >Armenian</option>
                                    <option value="Aruban" <?php if (set_value('nationality') == 'Aruban') echo 'selected' ?> >Aruban</option>
                                    <option value="Australian" <?php if (set_value('nationality') == 'Australian') echo 'selected' ?> >Australian</option>
                                    <option value="Austrian" <?php if (set_value('nationality') == 'Austrian') echo 'selected' ?> >Austrian</option>
                                    <option value="Azerbaijani" <?php if (set_value('nationality') == 'Azerbaijani') echo 'selected' ?> >Azerbaijani</option>
                                    <option value="Bahamian" <?php if (set_value('nationality') == 'Bahamian') echo 'selected' ?> >Bahamian</option>
                                    <option value="Bahraini" <?php if (set_value('nationality') == 'Bahraini') echo 'selected' ?> >Bahraini</option>
                                    <option value="Bangladeshi" <?php if (set_value('nationality') == 'Bangladeshi') echo 'selected' ?> >Bangladeshi</option>
                                    <option value="Barbadian" <?php if (set_value('nationality') == 'Barbadian') echo 'selected' ?> >Barbadian</option>
                                    <option value="Basque" <?php if (set_value('nationality') == 'Basque') echo 'selected' ?> >Basque</option>
                                    <option value="Belarusian" <?php if (set_value('nationality') == 'Belarusian') echo 'selected' ?> >Belarusian</option>
                                    <option value="Belgian" <?php if (set_value('nationality') == 'Belgian') echo 'selected' ?> >Belgian</option>
                                    <option value="Belizean" <?php if (set_value('nationality') == 'Belizean') echo 'selected' ?> >Belizean</option>
                                    <option value="Beninese" <?php if (set_value('nationality') == 'Beninese') echo 'selected' ?> >Beninese</option>
                                    <option value="Bermudian" <?php if (set_value('nationality') == 'Bermudian') echo 'selected' ?> >Bermudian</option>
                                    <option value="Bhutanese" <?php if (set_value('nationality') == 'Bhutanese') echo 'selected' ?> >Bhutanese</option>
                                    <option value="Bolivian" <?php if (set_value('nationality') == 'Bolivian') echo 'selected' ?> >Bolivian</option>
                                    <option value="Bosniaks" <?php if (set_value('nationality') == 'Bosniaks') echo 'selected' ?> >Bosniaks</option>
                                    <option value="Bosnian and Herzegovinian" <?php if (set_value('nationality') == 'Bosnian and Herzegovinian') echo 'selected' ?> >Bosnian and Herzegovinian</option>
                                    <option value="Botswana" <?php if (set_value('nationality') == 'Botswana') echo 'selected' ?> >Botswana</option>
                                    <option value="Brazilian" <?php if (set_value('nationality') == 'Brazilian') echo 'selected' ?> >Brazilian</option>
                                    <option value="Breton" <?php if (set_value('nationality') == 'Breton') echo 'selected' ?> >Breton</option>
                                    <option value="British" <?php if (set_value('nationality') == 'British') echo 'selected' ?> >British</option>
                                    <option value="British Virgin Islander" <?php if (set_value('nationality') == 'British Virgin Islander') echo 'selected' ?> >British Virgin Islander</option>
                                    <option value="Bruneian" <?php if (set_value('nationality') == 'Bruneian') echo 'selected' ?> >Bruneian</option>
                                    <option value="Bulgarian" <?php if (set_value('nationality') == 'Bulgarian') echo 'selected' ?> >Bulgarian</option>
                                    <option value="Macedonian Bulgarian" <?php if (set_value('nationality') == 'Macedonian Bulgarian') echo 'selected' ?> >Macedonian Bulgarian</option>
                                    <option value="Burkinabés" <?php if (set_value('nationality') == 'Burkinabés') echo 'selected' ?> >Burkinabés</option>
                                    <option value="Burmese" <?php if (set_value('nationality') == 'Burmese') echo 'selected' ?> >Burmese</option>
                                    <option value="Burundian" <?php if (set_value('nationality') == 'Burundian') echo 'selected' ?> >Burundian</option>
                                    <option value="Cambodian" <?php if (set_value('nationality') == 'Cambodian') echo 'selected' ?> >Cambodian</option>
                                    <option value="Cameroonian" <?php if (set_value('nationality') == 'Cameroonian') echo 'selected' ?> >Cameroonian</option>
                                    <option value="Canadian" <?php if (set_value('nationality') == 'Canadian') echo 'selected' ?> >Canadian</option>
                                    <option value="Catalan" <?php if (set_value('nationality') == 'Catalan') echo 'selected' ?> >Catalan</option>
                                    <option value="Cape Verdean" <?php if (set_value('nationality') == 'Cape Verdean') echo 'selected' ?> >Cape Verdean</option>
                                    <option value="Chadian" <?php if (set_value('nationality') == 'Chadian') echo 'selected' ?> >Chadian</option>
                                    <option value="Chilean" <?php if (set_value('nationality') == 'Chilean') echo 'selected' ?> >Chilean</option>
                                    <option value="Chinese" <?php if (set_value('nationality') == 'Chinese') echo 'selected' ?> >Chinese</option>
                                    <option value="Colombian" <?php if (set_value('nationality') == 'Colombian') echo 'selected' ?> >Colombian</option>
                                    <option value="Comorian" <?php if (set_value('nationality') == 'Comorian') echo 'selected' ?> >Comorian</option>
                                    <option value="Congolese" <?php if (set_value('nationality') == 'Congolese') echo 'selected' ?> >Congolese</option>
                                    <option value="Costa Rican" <?php if (set_value('nationality') == 'Costa Rican') echo 'selected' ?> >Costa Rican</option>
                                    <option value="Croatian" <?php if (set_value('nationality') == 'Croatian') echo 'selected' ?> >Croatian</option>
                                    <option value="Cuban" <?php if (set_value('nationality') == 'Cuban') echo 'selected' ?> >Cuban</option>
                                    <option value="Cypriot" <?php if (set_value('nationality') == 'Cypriot') echo 'selected' ?> >Cypriot</option>
                                    <option value="Turkish Cypriot" <?php if (set_value('nationality') == 'Turkish Cypriot') echo 'selected' ?> >Turkish Cypriot</option>
                                    <option value="Czech" <?php if (set_value('nationality') == 'Czech') echo 'selected' ?> >Czech</option>
                                    <option value="Dane" <?php if (set_value('nationality') == 'Dane') echo 'selected' ?> >Dane</option>
                                    <option value="Greenlander" <?php if (set_value('nationality') == 'Greenlander') echo 'selected' ?> >Greenlander</option>
                                    <option value="Djiboutian" <?php if (set_value('nationality') == 'Djiboutian') echo 'selected' ?> >Djiboutian</option>
                                    <option value="Dominican (Commonwealth)" <?php if (set_value('nationality') == 'Dominican (Commonwealth)') echo 'selected' ?> >Dominican (Commonwealth)</option>
                                    <option value="Dominican (Republic)" <?php if (set_value('nationality') == 'Dominican (Republic)') echo 'selected' ?> >Dominican (Republic)</option>
                                    <option value="Dutch" <?php if (set_value('nationality') == 'Dutch') echo 'selected' ?> >Dutch</option>
                                    <option value="East Timorese" <?php if (set_value('nationality') == 'East Timorese') echo 'selected' ?> >East Timorese</option>
                                    <option value="Ecuadorian" <?php if (set_value('nationality') == 'Ecuadorian') echo 'selected' ?> >Ecuadorian</option>
                                    <option value="Egyptian" <?php if (set_value('nationality') == 'Egyptian') echo 'selected' ?> >Egyptian</option>
                                    <option value="Emirati" <?php if (set_value('nationality') == 'Emirati') echo 'selected' ?> >Emirati</option>
                                    <option value="English" <?php if (set_value('nationality') == 'English') echo 'selected' ?> >English</option>
                                    <option value="Equatoguinean" <?php if (set_value('nationality') == 'Equatoguinean') echo 'selected' ?> >Equatoguinean</option>
                                    <option value="Eritrean" <?php if (set_value('nationality') == 'Eritrean') echo 'selected' ?> >Eritrean</option>
                                    <option value="Estonian" <?php if (set_value('nationality') == 'Estonian') echo 'selected' ?> >Estonian</option>
                                    <option value="Ethiopian" <?php if (set_value('nationality') == 'Ethiopian') echo 'selected' ?> >Ethiopian</option>
                                    <option value="Falkland Islander" <?php if (set_value('nationality') == 'Falkland Islaner') echo 'selected' ?> >Falkland Islander</option>
                                    <option value="Faroese" <?php if (set_value('nationality') == 'Faroese') echo 'selected' ?> >Faroese</option>
                                    <option value="Fijian" <?php if (set_value('nationality') == 'Fijian') echo 'selected' ?> >Fijian</option>
                                    <option value="Finn" <?php if (set_value('nationality') == 'Finn') echo 'selected' ?> >Finn</option>
                                    <option value="Finnish Swedish" <?php if (set_value('nationality') == 'Finnish Swedish') echo 'selected' ?> >Finnish Swedish</option>
                                    <option value="Filipino" <?php if (set_value('nationality') == 'Filipino') echo 'selected' ?> >Filipino</option>
                                    <option value="French citizen" <?php if (set_value('nationality') == 'French citizen') echo 'selected' ?> >French citizen</option>
                                    <option value="Gabonese" <?php if (set_value('nationality') == 'Gabonese') echo 'selected' ?> >Gabonese</option>
                                    <option value="Gambian" <?php if (set_value('nationality') == 'Gambian') echo 'selected' ?> >Gambian</option>
                                    <option value="Georgian" <?php if (set_value('nationality') == 'Georgian') echo 'selected' ?> >Georgian</option>
                                    <option value="German" <?php if (set_value('nationality') == 'German') echo 'selected' ?> >German</option>
                                    <option value="Baltic German" <?php if (set_value('nationality') == 'Baltic German') echo 'selected' ?> >Baltic German</option>
                                    <option value="Ghanaian" <?php if (set_value('nationality') == 'Ghanaian') echo 'selected' ?> >Ghanaian</option>
                                    <option value="Gibraltarian" <?php if (set_value('nationality') == 'Gibraltarian') echo 'selected' ?> >Gibraltarian</option>
                                    <option value="Greek" <?php if (set_value('nationality') == 'Greek') echo 'selected' ?> >Greek</option>
                                    <option value="Greek Macedonian" <?php if (set_value('nationality') == 'Greek Macedonian') echo 'selected' ?> >Greek Macedonian</option>
                                    <option value="Grenadian" <?php if (set_value('nationality') == 'Grenadian') echo 'selected' ?> >Grenadian</option>
                                    <option value="Guatemalan" <?php if (set_value('nationality') == 'Guatemalan') echo 'selected' ?> >Guatemalan</option>
                                    <option value="Guianese (French)" <?php if (set_value('nationality') == 'Guianese (French)') echo 'selected' ?> >Guianese (French)</option>
                                    <option value="Guinean" <?php if (set_value('nationality') == 'Guinean') echo 'selected' ?> >Guinean</option>
                                    <option value="Guinea-Bissau national" <?php if (set_value('nationality') == 'Guinea-Bissau national') echo 'selected' ?> >Guinea-Bissau national</option>
                                    <option value="Guyanese" <?php if (set_value('nationality') == 'Guyanese') echo 'selected' ?> >Guyanese</option>
                                    <option value="Haitian" <?php if (set_value('nationality') == 'Haitian') echo 'selected' ?> >Haitian</option>
                                    <option value="Honduran" <?php if (set_value('nationality') == 'Honduran') echo 'selected' ?> >Honduran</option>
                                    <option value="Hong Konger" <?php if (set_value('nationality') == 'Hong Konger') echo 'selected' ?> >Hong Konger</option>
                                    <option value="Hungarian" <?php if (set_value('nationality') == 'Hungarian') echo 'selected' ?> >Hungarian</option>
                                    <option value="Icelander" <?php if (set_value('nationality') == 'Icelander') echo 'selected' ?> >Icelander</option>
                                    <option value="I-Kiribati" <?php if (set_value('nationality') == 'I-Kiribati') echo 'selected' ?> >I-Kiribati</option>
                                    <option value="Indian" <?php if (set_value('nationality') == 'Indian') echo 'selected' ?> >Indian</option>
                                    <option value="Indonesian" <?php if (set_value('nationality') == 'Indonesian') echo 'selected' ?> >Indonesian</option>
                                    <option value="Iranian" <?php if (set_value('nationality') == 'Iranian') echo 'selected' ?> >Iranian</option>
                                    <option value="Iraqi" <?php if (set_value('nationality') == 'Iraqi') echo 'selected' ?> >Iraqi</option>
                                    <option value="Irish" <?php if (set_value('nationality') == 'Irish') echo 'selected' ?> >Irish</option>
                                    <option value="Israeli" <?php if (set_value('nationality') == 'Israeli') echo 'selected' ?> >Israeli</option>
                                    <option value="Italian" <?php if (set_value('nationality') == 'Italian') echo 'selected' ?> >Italian</option>
                                    <option value="Ivoirian" <?php if (set_value('nationality') == 'Ivoirian') echo 'selected' ?> >Ivoirian</option>
                                    <option value="Jamaican" <?php if (set_value('nationality') == 'Jamaican') echo 'selected' ?> >Jamaican</option>
                                    <option value="Japanese" <?php if (set_value('nationality') == 'Japanese') echo 'selected' ?> >Japanese</option>
                                    <option value="Jordanian" <?php if (set_value('nationality') == 'Jordanian') echo 'selected' ?> >Jordanian</option>
                                    <option value="Kazakh" <?php if (set_value('nationality') == 'Kazakh') echo 'selected' ?> >Kazakh</option>
                                    <option value="Kenyan" <?php if (set_value('nationality') == 'Kenyan') echo 'selected' ?> >Kenyan</option>
                                    <option value="Korean" <?php if (set_value('nationality') == 'Korean') echo 'selected' ?> >Korean</option>
                                    <option value="Kosovar" <?php if (set_value('nationality') == 'Kosovar') echo 'selected' ?> >Kosovar</option>
                                    <option value="Kuwaiti" <?php if (set_value('nationality') == 'Kuwaiti') echo 'selected' ?> >Kuwaiti</option>
                                    <option value="Kyrgyz" <?php if (set_value('nationality') == 'Kyrgyz') echo 'selected' ?> >Kyrgyz</option>
                                    <option value="Lao" <?php if (set_value('nationality') == 'Lao') echo 'selected' ?> >Lao</option>
                                    <option value="Latvian" <?php if (set_value('nationality') == 'Latvian') echo 'selected' ?> >Latvian</option>
                                    <option value="Lebanese" <?php if (set_value('nationality') == 'Lebanese') echo 'selected' ?> >Lebanese</option>
                                    <option value="Liberian" <?php if (set_value('nationality') == 'Liberian') echo 'selected' ?> >Liberian</option>
                                    <option value="Libyan" <?php if (set_value('nationality') == 'Libyan') echo 'selected' ?> >Libyan</option>
                                    <option value="Liechtensteiner" <?php if (set_value('nationality') == 'Liechtensteiner') echo 'selected' ?> >Liechtensteiner</option>
                                    <option value="Lithuanian" <?php if (set_value('nationality') == 'Lithuanian') echo 'selected' ?> >Lithuanian</option>
                                    <option value="Luxembourger" <?php if (set_value('nationality') == 'Luxembourger') echo 'selected' ?> >Luxembourger</option>
                                    <option value="Macao" <?php if (set_value('nationality') == 'Macao') echo 'selected' ?> >Macao</option>
                                    <option value="Macedonian" <?php if (set_value('nationality') == 'Macedonian') echo 'selected' ?> >Macedonian</option>
                                    <option value="Malagasy" <?php if (set_value('nationality') == 'Malagasy') echo 'selected' ?> >Malagasy</option>
                                    <option value="Malawian" <?php if (set_value('nationality') == 'Malawian') echo 'selected' ?> >Malawian</option>
                                    <option value="Malaysian" <?php if (set_value('nationality') == 'Malaysian') echo 'selected' ?> >Malaysian</option>
                                    <option value="Maldivian" <?php if (set_value('nationality') == 'Maldivian') echo 'selected' ?> >Maldivian</option>
                                    <option value="Malian" <?php if (set_value('nationality') == 'Malian') echo 'selected' ?> >Malian</option>
                                    <option value="Maltese" <?php if (set_value('nationality') == 'Maltese') echo 'selected' ?> >Maltese</option>
                                    <option value="Manx" <?php if (set_value('nationality') == 'Manx') echo 'selected' ?> >Manx</option>
                                    <option value="Marshallese" <?php if (set_value('nationality') == 'Marshallese') echo 'selected' ?> >Marshallese</option>
                                    <option value="Mauritanian" <?php if (set_value('nationality') == 'Mauritanian') echo 'selected' ?> >Mauritanian</option>
                                    <option value="Mauritian" <?php if (set_value('nationality') == 'Mauritian') echo 'selected' ?> >Mauritian</option>
                                    <option value="Mexican" <?php if (set_value('nationality') == 'Mexican') echo 'selected' ?> >Mexican</option>
                                    <option value="Micronesian" <?php if (set_value('nationality') == 'Micronesian') echo 'selected' ?> >Micronesian</option>
                                    <option value="Moldovan" <?php if (set_value('nationality') == 'Moldovan') echo 'selected' ?> >Moldovan</option>
                                    <option value="Monégasque" <?php if (set_value('nationality') == 'Monégasque') echo 'selected' ?> >Monégasque</option>
                                    <option value="Mongolian" <?php if (set_value('nationality') == 'Mongolian') echo 'selected' ?> >Mongolian</option>
                                    <option value="Montenegrin" <?php if (set_value('nationality') == 'Montenegrin') echo 'selected' ?> >Montenegrin</option>
                                    <option value="Moroccan" <?php if (set_value('nationality') == 'Moroccan') echo 'selected' ?> >Moroccan</option>
                                    <option value="Mozambican" <?php if (set_value('nationality') == 'Mozambican') echo 'selected' ?> >Mozambican</option>
                                    <option value="Namibian" <?php if (set_value('nationality') == 'Namibian') echo 'selected' ?> >Namibian</option>
                                    <option value="Nauran" <?php if (set_value('nationality') == 'Nauran') echo 'selected' ?> >Nauran</option>
                                    <option value="Nepalese" <?php if (set_value('nationality') == 'Nepalese') echo 'selected' ?> >Nepalese</option>
                                    <option value="New Zealander" <?php if (set_value('nationality') == 'New Zealander') echo 'selected' ?> >New Zealander</option>
                                    <option value="Nicaraguan" <?php if (set_value('nationality') == 'Nicaraguan') echo 'selected' ?> >Nicaraguan</option>
                                    <option value="Nigerien" <?php if (set_value('nationality') == 'Nigerien') echo 'selected' ?> >Nigerien</option>
                                    <option value="Nigerian" <?php if (set_value('nationality') == 'Nigerian') echo 'selected' ?> >Nigerian</option>
                                    <option value="Norwegian" <?php if (set_value('nationality') == 'Norwegian') echo 'selected' ?> >Norwegian</option>
                                    <option value="Omani" <?php if (set_value('nationality') == 'Omani') echo 'selected' ?> >Omani</option>
                                    <option value="Pakistani" <?php if (set_value('nationality') == 'Pakistani') echo 'selected' ?> >Pakistani</option>
                                    <option value="Palauan" <?php if (set_value('nationality') == 'Palauan') echo 'selected' ?> >Palauan</option>
                                    <option value="Palestinian" <?php if (set_value('nationality') == 'Palestinian') echo 'selected' ?> >Palestinian</option>
                                    <option value="Panamanian" <?php if (set_value('nationality') == 'Panamanian') echo 'selected' ?> >Panamanian</option>
                                    <option value="Papua New Guinean" <?php if (set_value('nationality') == 'Papua New Guinean') echo 'selected' ?> >Papua New Guinean</option>
                                    <option value="Paraguayan" <?php if (set_value('nationality') == 'Paraguayan') echo 'selected' ?> >Paraguayan</option>
                                    <option value="Peruvian" <?php if (set_value('nationality') == 'Peruvian') echo 'selected' ?> >Peruvian</option>
                                    <option value="Poles" <?php if (set_value('nationality') == 'Poles') echo 'selected' ?> >Poles</option>
                                    <option value="Portuguese" <?php if (set_value('nationality') == 'Portuguese') echo 'selected' ?> >Portuguese</option>
                                    <option value="Puerto Rican" <?php if (set_value('nationality') == 'Puerto Rican') echo 'selected' ?> >Puerto Rican</option>
                                    <option value="Qatari" <?php if (set_value('nationality') == 'Qatari') echo 'selected' ?> >Qatari</option>
                                    <option value="Quebecer" <?php if (set_value('nationality') == 'Quebecer') echo 'selected' ?> >Quebecer</option>
                                    <option value="Réunionnai" <?php if (set_value('nationality') == 'Réunionnai') echo 'selected' ?> >Réunionnai</option>
                                    <option value="Romanian" <?php if (set_value('nationality') == 'Romanian') echo 'selected' ?> >Romanian</option>
                                    <option value="Russian" <?php if (set_value('nationality') == 'Russian') echo 'selected' ?> >Russian</option>
                                    <option value="Baltic Russian" <?php if (set_value('nationality') == 'Baltic Russian') echo 'selected' ?> >Baltic Russian</option>
                                    <option value="Rwandan" <?php if (set_value('nationality') == 'Rwandan') echo 'selected' ?> >Rwandan</option>
                                    <option value="Saint Kitts and Nevis" <?php if (set_value('nationality') == 'Saint Kitts and Nevis') echo 'selected' ?> >Saint Kitts and Nevis</option>
                                    <option value="Saint Lucian" <?php if (set_value('nationality') == 'Saint Lucian') echo 'selected' ?> >Saint Lucian</option>
                                    <option value="Salvadoran" <?php if (set_value('nationality') == 'Salvadoran') echo 'selected' ?> >Salvadoran</option>
                                    <option value="Sammarinese" <?php if (set_value('nationality') == 'Sammarinese') echo 'selected' ?> >Sammarinese</option>
                                    <option value="Samoan" <?php if (set_value('nationality') == 'Samoan') echo 'selected' ?> >Samoan</option>
                                    <option value="São Tomé and Príncipe" <?php if (set_value('nationality') == 'São Tomé and Príncipe') echo 'selected' ?> >São Tomé and Príncipe</option>
                                    <option value="Saudi" <?php if (set_value('nationality') == 'Saudi') echo 'selected' ?> >Saudi</option>
                                    <option value="Scot" <?php if (set_value('nationality') == 'Scot') echo 'selected' ?> >Scot</option>
                                    <option value="Senegalese" <?php if (set_value('nationality') == 'Senegalese') echo 'selected' ?> >Senegalese</option>
                                    <option value="Serb" <?php if (set_value('nationality') == 'Serb') echo 'selected' ?> >Serb</option>
                                    <option value="Seychellois" <?php if (set_value('nationality') == 'Seychellois') echo 'selected' ?> >Seychellois</option>
                                    <option value="Sierra Leonean" <?php if (set_value('nationality') == 'Sierra Leonean') echo 'selected' ?> >Sierra Leonean</option>
                                    <option value="Singaporean" <?php if (set_value('nationality') == 'Singaporean') echo 'selected' ?> >Singaporean</option>
                                    <option value="Slovak" <?php if (set_value('nationality') == 'Slovak') echo 'selected' ?> >Slovak</option>
                                    <option value="Slovene" <?php if (set_value('nationality') == 'Slovene') echo 'selected' ?> >Slovene</option>
                                    <option value="Solomon Islander" <?php if (set_value('nationality') == 'Solomon Islander') echo 'selected' ?> >Solomon Islander</option>
                                    <option value="Somali" <?php if (set_value('nationality') == 'Somali') echo 'selected' ?> >Somali</option>
                                    <option value="Somalilander" <?php if (set_value('nationality') == 'Somalilander') echo 'selected' ?> >Somalilander</option>
                                    <option value="Sotho" <?php if (set_value('nationality') == 'Sotho') echo 'selected' ?> >Sotho</option>
                                    <option value="South African" <?php if (set_value('nationality') == 'South African') echo 'selected' ?> >South African</option>
                                    <option value="Spaniard" <?php if (set_value('nationality') == 'Spaniard') echo 'selected' ?> >Spaniard</option>
                                    <option value="Sri Lankan" <?php if (set_value('nationality') == 'Sri Lankan') echo 'selected' ?> >Sri Lankan</option>
                                    <option value="Sudanese" <?php if (set_value('nationality') == 'Sudanese') echo 'selected' ?> >Sudanese</option>
                                    <option value="Surinamese" <?php if (set_value('nationality') == 'Surinamese') echo 'selected' ?> >Surinamese</option>
                                    <option value="Swazi" <?php if (set_value('nationality') == 'Swazi') echo 'selected' ?> >Swazi</option>
                                    <option value="Swede" <?php if (set_value('nationality') == 'Swede') echo 'selected' ?> >Swede</option>
                                    <option value="Swiss" <?php if (set_value('nationality') == 'Swiss') echo 'selected' ?> >Swiss</option>
                                    <option value="Syriac" <?php if (set_value('nationality') == 'Syriac') echo 'selected' ?> >Syriac</option>
                                    <option value="Syrian" <?php if (set_value('nationality') == 'Syrian') echo 'selected' ?> >Syrian</option>
                                    <option value="Taiwanese" <?php if (set_value('nationality') == 'Taiwanese') echo 'selected' ?> >Taiwanese</option>
                                    <option value="Tamil" <?php if (set_value('nationality') == 'Tamil') echo 'selected' ?> >Tamil</option>
                                    <option value="Tajik" <?php if (set_value('nationality') == 'Tajik') echo 'selected' ?> >Tajik</option>
                                    <option value="Tanzanian" <?php if (set_value('nationality') == 'Tanzanian') echo 'selected' ?> >Tanzanian</option>
                                    <option value="Thai" <?php if (set_value('nationality') == 'Thai') echo 'selected' ?> >Thai</option>
                                    <option value="Tibetan" <?php if (set_value('nationality') == 'Tibetan') echo 'selected' ?> >Tibetan</option>
                                    <option value="Tobagonian" <?php if (set_value('nationality') == 'Tobagonian') echo 'selected' ?> >Tobagonian</option>
                                    <option value="Togolese" <?php if (set_value('nationality') == 'Togolese') echo 'selected' ?> >Togolese</option>
                                    <option value="Tongan" <?php if (set_value('nationality') == 'Tongan') echo 'selected' ?> >Tongan</option>
                                    <option value="Trinidadian" <?php if (set_value('nationality') == 'Trinidadian') echo 'selected' ?> >Trinidadian</option>
                                    <option value="Tunisian" <?php if (set_value('nationality') == 'Tunisian') echo 'selected' ?> >Tunisian</option>
                                    <option value="Turk" <?php if (set_value('nationality') == 'Turk') echo 'selected' ?> >Turk</option>
                                    <option value="Tuvaluan" <?php if (set_value('nationality') == 'Tuvaluan') echo 'selected' ?> >Tuvaluan</option>
                                    <option value="Ugandan" <?php if (set_value('nationality') == 'Ugandan') echo 'selected' ?> >Ugandan</option>
                                    <option value="Ukrainian" <?php if (set_value('nationality') == 'Ukrainian') echo 'selected' ?> >Ukrainian</option>
                                    <option value="Uruguayan" <?php if (set_value('nationality') == 'Uruguayan') echo 'selected' ?> >Uruguayan</option>
                                    <option value="Uzbek" <?php if (set_value('nationality') == 'Uzbek') echo 'selected' ?> >Uzbek</option>
                                    <option value="Vanuatuan" <?php if (set_value('nationality') == 'Vanuatuan') echo 'selected' ?> >Vanuatuan</option>
                                    <option value="Venezuelan" <?php if (set_value('nationality') == 'Venezuelan') echo 'selected' ?> >Venezuelan</option>
                                    <option value="Vietnamese" <?php if (set_value('nationality') == 'Vietnamese') echo 'selected' ?> >Vietnamese</option>
                                    <option value="Vincentian" <?php if (set_value('nationality') == 'Vincentian') echo 'selected' ?> >Vincentian</option>
                                    <option value="Welsh" <?php if (set_value('nationality') == 'Welsh') echo 'selected' ?> >Welsh</option>
                                    <option value="Yemeni" <?php if (set_value('nationality') == 'Yemeni') echo 'selected' ?> >Yemeni</option>
                                    <option value="Zambian" <?php if (set_value('nationality') == 'Zambian') echo 'selected' ?> >Zambian</option>
                                    <option value="Zimbabwean" <?php if (set_value('nationality') == 'Zimbabwean') echo 'selected' ?> >Zimbabwean</option>		
                        </select>
                        <select name="filter_by_gender" id="filter_by_gender" class="form-control" style="display:none">
                            <option value="">Select</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <select name="filter_by_age_operand" id="filter_by_age_operand" class="form-control" style="display:none">
                            <option value="">Select</option>
                            <option value="above">Above</option>
                            <option value="below">Below</option>
                            <option value="between">Between</option>
                        </select>
                        <input type="input" class="form-control" name="filter_by_age_value" id="filter_by_age_value" style="display:none" />
                        <select name="filter_by_status_code" id="filter_by_status_code" class="form-control" style="display:none">
                            <option value="">Select</option>
                            <option value="0" >Undefined</option>
							<option value="1" >Welcome</option>
							<option value="2" >Conditional Entry</option>
                            <option value="3" >Total Ban</option>
                        </select>
                        <input type="submit" class="form-control" value="&raquo;" />
                    </div>
                <?php echo form_close();?>
                </div>

            </div>
            <div class="col-sm-6" >
            
                <div class="text-right">
                <?php 
                    $attributes = array('class' => 'form-inline', 'role' => 'form', 'method' => 'GET');
                    echo form_open('visitors/', $attributes); 
                ?>
                    <div class="form-group" id="search_bar">
                        <label class="control-label" for="title">Search</label> &nbsp; 
                        <input type="input" class="form-control" name="search_param" />
                        <input type="submit" class="form-control" value="&raquo;" />
                        <!--<br />
                        <span id="search_in">
                        Search in: 
                            <input type="checkbox" name="s_key[]" value="s_name" checked /> Name
                            <input type="checkbox" name="s_key[]" value="s_address" />Address
                        </span> 
                        -->
                    </div>
                <?php echo form_close();?>
                <!-- <a href="visitors/advanced">Advanced Search &raquo;</a> -->
                </div>

            </div>
        </div>
    </div>
		
	<h3>
		<!-- <span class="glyphicon glyphicon-folder-open"></span>&nbsp; Visitors -->
        <hr />
	</h3>
	<div class="container-fluid message"><?php echo $visitors['result_count'] ?> records found. 
		<?php 
			if (isset($filterval)) {
				$filter = (is_array($filterval)) ? '<br />Filter parameters: '. ucfirst($filterval[0]).' / '.$filterval[1] .' '. $filterval[2] : '' ; 
				echo strtoupper($filter); 
			}
			if (isset($searchval)){
				$search = '<br />Search parameters: '. ucfirst($searchval);
				echo strtoupper($search);
			}
		?>
	</div> 
	
    <div class="panel panel-default">
		<div class="table-responsive show-records">
		
			<?php if ($visitors['result_count'] > 0) { ?>	
			<div class="page-links"><?php echo $links; ?></div>
			<table class="table table-striped" id="main_table">
				<thead>
					<tr>
                        <th width="2%">&nbsp;</th>
						<th width="23%">
                            Full Name <a href="#" onclick="sortByFullName()"><i class="fas fa-sort"></i></a>
                        </th>
						<th width="7%">
                            Age <a href="#" onclick="sortByAge()"><i class="fas fa-sort"></i></a>
                        </th>
                        <th width="5%">Sex</th>
                        <th width="10%">
                            Nationality <a href="#" onclick="sortByNationality()"><i class="fas fa-sort"></i></a>
                        </th>
                        <!--
                        <th width="2%">Diver?</th>
                        <th width="2%">Swimmer?</th>
                        -->
                        <th width="12%">Mobile No.</th>
                        <th width="13%">Email</th>
						<th width="31%">In case of emergency</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($visitors as $v): 
						//echo '<pre>'; print_r($v); echo '</pre>';
						if (is_array($v)) { //do not display 'result_count' 
					?>
					<tr>
                        <td>
                            <a href="<?php echo site_url('visitors/view/'.$v['visitor_id']); ?>">
                            <i class="far fa-file"></i></a>
                        </td>
                        <td>
							<a href="<?php echo site_url('visitors/view/'.$v['visitor_id']); ?>">
								<!-- <span class="glyphicon glyphicon-file"></span> -->
                                <?php echo strtoupper($v['lname'].', '.$v['fname']) ?>
							</a>
						</td>
						<td><?php echo $v['age']; ?></td>
                        <td><?php echo strtoupper($v['gender']); ?></td>
                        <td><?php echo $v['nationality']; ?></td>
                        <!--
                        <td><?php echo ($v['diver'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo ($v['swimmer'] == 1) ? 'Yes' : 'No'; ?></td>
                        -->
                        <td><?php echo $v['mobile_no'] ?></td>
                        <td><a href="mailto:<?php echo $v['email']; ?>" target="_blank"><?php echo $v['email']; ?></a></td>
						<td><?php echo $v['ice_fullname'].' ('.$v['ice_relationship'].') '.$v['ice_contact_nos']; ?></td>
					</tr>
					<?php 
						}
						endforeach;
					?>
				</tbody>
			</table>
			<div class="page-links"><?php echo $links; ?></div>

			<?php } ?>

		</div>
	</div>

    <div class="container-fluid">
		<small>
        <?php 
            if (isset($filterval)) { 
				$url = 'visitors/filtered_to_excel/'.$filterval[0].'/'.$filterval[1];
			} 
			else if (isset($searchval)) {
				$url = 'visitors/results_to_excel/'.$searchval;
			}
			else {
				$url = 'visitors/all_to_excel';
			}
            //$url = 'visitors/all_to_excel';
            if ($visitors['result_count'] > 0) echo '<a href="'.$url.'" target="_blank"><i class="fas fa-file-excel"></i> Export to Excel &raquo;</a>';	
				//echo '<a href="#">Export to Excel &raquo;</a>';	
		?>
		</small>
	</div>

</div>
<script>
$(function() {

	$('#filter_by').on('change', function(){
		var myval = $(this).val();
		//alert(myval);
		
		switch (myval) {
			case 'nationality':
				$('#filter_by_nationality').show();
					$('#filter_by_nationality').prop('disabled', false);
				$('#filter_by_gender').hide();
					$('#filter_by_gender').prop('disabled', true);
				$('#filter_by_age_operand').hide();
					$('#filter_by_age_operand').prop('disabled', true);
				$('#filter_by_age_value').hide();
					$('#filter_by_age_value').prop('disabled', true);
                $('#filter_by_status_code').hide();
					$('#filter_by_status_code').prop('disabled', true);
				break;
			case 'gender':
				$('#filter_by_nationality').hide();
					$('#filter_by_nationality').prop('disabled', true);
				$('#filter_by_gender').show();
					$('#filter_by_gender').prop('disabled', false);
				$('#filter_by_age_operand').hide();
					$('#filter_by_age_operand').prop('disabled', true);
				$('#filter_by_age_value').hide();
					$('#filter_by_age_value').prop('disabled', true);
                $('#filter_by_status_code').hide();
					$('#filter_by_status_code').prop('disabled', true);
				break;
			case 'age':
				$('#filter_by_nationality').hide();
					$('#filter_by_nationality').prop('disabled', true);
				$('#filter_by_gender').hide();
					$('#filter_by_gender').prop('disabled', true);
				$('#filter_by_age_operand').show();
					$('#filter_by_age_operand').prop('disabled', false);
				$('#filter_by_age_value').show();
					$('#filter_by_age_value').prop('disabled', false);
                $('#filter_by_status_code').hide();
					$('#filter_by_status_code').prop('disabled', true);
				break;
            case 'status_code':
				$('#filter_by_nationality').hide();
					$('#filter_by_nationality').prop('disabled', true);
				$('#filter_by_gender').hide();
					$('#filter_by_gender').prop('disabled', true);
				$('#filter_by_age_operand').hide();
					$('#filter_by_age_operand').prop('disabled', true);
				$('#filter_by_age_value').hide();
					$('#filter_by_age_value').prop('disabled', true);
                $('#filter_by_status_code').show();
					$('#filter_by_status_code').prop('disabled', false);
				break;
			default:
			
		}

	});


	$('#filter_by_age_operand').on('change', function(){
		var myval = $(this).val();
		
		if (myval == 'between') {
			$('#filter_by_age_value').attr("placeholder", "18 and 25");
		}
		
	});

});

//table sorting
function sortTable(table, order, nr) {
    var asc   = order === 'asc',
        tbody = table.find('tbody');
        
        tbody.find('tr').sort(function(a, b) {
            if (asc) {
                return $('td:nth-child('+ nr +')', a).text().localeCompare($('td:nth-child('+ nr +')', b).text());
            } else {
                return $('td:nth-child('+ nr +')', b).text().localeCompare($('td:nth-child('+ nr +')', a).text());
            }
        }).appendTo(tbody);
}

function sortByFullName() {
    sortTable($('#main_table'),'asc','2');  //it's the 1st column on the table
}

function sortByNationality() {
    sortTable($('#main_table'),'asc','5');  //it's the 4th column on the table
}

function sortByAge() {
    sortTable($('#main_table'),'asc','3'); //it's the 2nd column on the table
}
</script>
