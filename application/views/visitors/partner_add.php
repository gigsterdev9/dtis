<?php
//define viewing restrictions by user group
$restricted_groups = array('wwf','partner'); 
?>

<div class="container">
<h2><?php echo $title; ?></h2>
<p><a href="javascript:history.go(-1)" ><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a></p>
<div class="panel panel-default partner-entry-bar">
	<div class="panel-body">
		<p class="small"><span class="text-info">*</span> Indicates a required field</p>
		<?php 
		echo '<div class="text-warning">';
		echo validation_errors();
		echo '</div>'; 

		if (isset($alert_success)) 
		{ 
		?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Entry added. <a href="<?php echo base_url('visitors/partner_add') ?>">Add another.</a>
                <?php if (!$this->ion_auth->in_group($restricted_groups)) { ?>
                    &nbsp; | &nbsp; <a href="<?php echo base_url('visitors') ?>">Return to Index.</a>
                <?php } ?>
			</div>
		<?php
		}
	
			//begin form
			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
			echo form_open('visitors/partner_add', $attributes); 
		?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fname">First Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fname" value="<?php echo ($this->input->get('fname') !== null) ? $this->input->get('fname') : set_value('fname'); ?>" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fname">Middle Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mname" value="<?php echo ($this->input->get('mname') !== null) ? $this->input->get('mname') : set_value('mname'); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lname">Last Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lname" value="<?php echo ($this->input->get('lname') !== null) ? $this->input->get('lname') : set_value('lname'); ?>" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="bdate">Birthdate<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type='text' class="form-control" name="bdate" id='datetimepicker1' value="<?php echo ($this->input->get('bdate') !== null) ? $this->input->get('bdate') : set_value('bdate'); ?>" />
						<script type="text/javascript">
							$(function () {
								$('#datetimepicker1').datetimepicker({
									format: 'YYYY-MM-DD',
									viewMode: 'years'
								});
							});
						</script>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="gender">Gender<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<select class="form-control select2-single" name="gender">
							<option value="">Select</option>
                            <option value="M" <?php if (set_value('gender') == 'M') echo 'selected' ?> >Male</option>
							<option value="F" <?php if (set_value('gender') == 'F') echo 'selected' ?> >Female</option>
						</select>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="civil_status">Civil Status</label>
					<div class="col-sm-10">
						<select class="form-control select2-single" name="civil_status">
							<option value="">Select</option>
							<option value="S" <?php if (set_value('civil_status') == 'S') echo 'selected' ?> >Single</option>
							<option value="M" <?php if (set_value('civil_status') == 'M') echo 'selected' ?> >Married</option>
                            <option value="W" <?php if (set_value('civil_status') == 'W') echo 'selected' ?> >Widowed</option>
                            <option value="O" <?php if (set_value('civil_status') == 'O') echo 'selected' ?> >Other</option>
						</select>
					</div>
				</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nationality">Nationality<span class="text-info">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control select2-single" name="nationality">
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
                    </div>
				</div>
                    
                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                </div>

                <div class="form-group">
					<label class="control-label col-sm-2" for="h_address">Home Address<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="h_address" value="<?php echo set_value('h_address'); ?>" />
					</div>
				</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="occupation">Occupation<span class="text-info">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="occupation" value="<?php echo set_value('occupation'); ?>" />
                    </div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="h_address">Biz Address<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="b_address" value="<?php echo set_value('b_address'); ?>" />
					</div>
				</div>
                    
                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                </div>

                <div class="form-group">
					<label class="control-label col-sm-2" for="mobile_no">Mobile No.</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mobile_no" value="<?php echo set_value('mobile_no'); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="b_contact_no">Biz Phone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="b_contact_no" value="<?php echo set_value('b_contact_no'); ?>" />
					</div>
				</div>

                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                </div>
                            
                <div class="form-group">
					<label class="control-label col-sm-2" for="diver">Diver</label>
					<div class="col-sm-4">
                        <select class="form-control select2-single" name="diver">
							<option value="">Select</option>
                            <option value="1" <?php if (set_value('diver') == '1') echo 'selected' ?> >Yes</option>
							<option value="0" <?php if (set_value('diver') == '0') echo 'selected' ?> >No</option>
						</select>
					</div>
                    <label class="control-label col-sm-2" for="swimmer">Swimmer</label>
					<div class="col-sm-4">
                        <select class="form-control select2-single" name="swimmer">
							<option value="">Select</option>
                            <option value="1" <?php if (set_value('swimmer') == '1') echo 'selected' ?> >Yes</option>
							<option value="0" <?php if (set_value('swimmer') == '0') echo 'selected' ?> >No</option>
						</select>
					</div>
				</div>

                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                    <label class="control-label col-sm-2">Emergency Contact</label>
                </div>

                <div class="form-group">
					<label class="control-label col-sm-2" for="ice_fullname">Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ice_fullname" value="<?php echo set_value('ice_fullname'); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ice_contact_nos">Contact Nos.<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ice_contact_nos" value="<?php echo set_value('ice_contact_nos'); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ice_address">Address<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ice_address" value="<?php echo set_value('ice_address'); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ice_relationship">Relationship<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ice_relationship" value="<?php echo set_value('ice_relationship'); ?>" />
					</div>
				</div>

                <div class="form-group">
                    <div class="col-sm-12"><hr /></div>
                </div>
                
                <!--
				<div class="form-group">
					<label class="control-label col-sm-2" for="status">Status Code<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<select class="form-control select2-single" name="status" >
							<option value="">Select</option>
							<option value="0" <?php echo set_select('status', '0'); ?> >Undefined</option>
							<option value="1" <?php echo set_select('status', '1', true); ?> >Welcome</option>
                            <?php 
                            if (!$this->ion_auth->in_group($restricted_groups)) {
                            ?> 
							<option value="2" <?php echo set_select('status', '2'); ?> >Conditional Entry</option>
                            <option value="3" <?php echo set_select('status', '3'); ?> >Total Ban</option>
                            <?php
                            }
                            ?>
						</select>
					</div>
				</div>
                -->
                
                <div class="form-group">
					<label class="control-label col-sm-2" for="remarks">Remarks</label>
					<div class="col-sm-10">
						<textarea name="remarks" class="form-control" rows="5"><?php echo set_value('remarks'); ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
	</div>
</div>
</div>