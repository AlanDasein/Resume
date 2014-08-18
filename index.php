<?php
include("include/php/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resume Builder</title>
<link rel="stylesheet" href="include/css/_reset.css" />
<link rel="stylesheet" href="include/css/_setup.css" />
<link rel="stylesheet" href="include/css/_global.css" />
<script language="javascript" src="include/jsc/jquery/jquery-1.10.2.min.js"></script>
<script language="javascript" src="include/jsc/_global.js"></script>
</head>
<body>
	
	<div class="header">
		<img src="images/logo.png" height="92" width="186" class="columnleft" />
		<h2 class="columnright"><div class="divisor50"></div><div class="divisor5"></div>creating your <span class="enphasis">own resume</span> has never been so easy</h2>
		<div class="columnclear"></div>
	</div>
	
	<div class="divisor15"></div>
	
	<p>
		<b>LOREM IPSUM</b> ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. 
		<br /><br />
		No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei. Blandit incorrupte quaerendum in quo, nibh impedit id vis, vel no nullam semper audiam. Ei populo graeci consulatu mei, has ea stet modus phaedrum. Inani oblique ne has, duo et veritus detraxit. Tota ludus oratio ea mel, offendit persequeris ei vim. <span class="colored">Eos dicat oratio partem</span> ut, id cum ignota senserit intellegat.
	</p>
	
	<div class="divisor25"></div>
	
	<div class="columnright copyright">example copyright ® 2013</div>
	
	<div class="columnclear divisor5"></div>
	
	<div class="line"></div>
	
	<div class="divisor10"></div>
	
	<h1>STEP <span class="variant">0<?php echo $_SESSION["resume"]->step; ?></span></h1>
	
	<?php
		
		if($_SESSION["resume"]->step == 1){
			
			$name = strlen($_SESSION["resume"]->name) > 0 ? ' value="'.htmlentities($_SESSION["resume"]->name).'"' : '';
			$phone = strlen($_SESSION["resume"]->phone) > 0 ? ' value="'.htmlentities($_SESSION["resume"]->phone).'"' : '';
			$fax = strlen($_SESSION["resume"]->fax) > 0 ? ' value="'.htmlentities($_SESSION["resume"]->fax).'"' : '';
			$address = strlen($_SESSION["resume"]->address) > 0 ? ' value="'.htmlentities($_SESSION["resume"]->address).'"' : '';
			$email = strlen($_SESSION["resume"]->email) > 0 ? ' value="'.htmlentities($_SESSION["resume"]->email).'"' : '';
			
			echo '
				
				<small>
					Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis <span class="pinky">mutat affert percipit cu</span>, eirmod consectetuer signiferumque eu per.
				</small>
				
				<div class="divisor25"></div>
				
				<form method="post" action="include/php/assign.php" class="columnright">
					
					<div class="columnleft">
						<label for="name">Complete Name</label>
						<input type="text" id="name" name="name"'.$name.' class="field2" />
					</div>
					
					<div class="columnleft">
						<label for="phone">Phone(s)&nbsp;&nbsp;<small><span class="colored">recommended:</span> home: 555-555-5555 / cell: 555-555-5555</small></label>
						<input type="text" id="phone" name="phone"'.$phone.' class="field2" />
					</div>
					
					<div class="columnleft">
						<label for="fax">Fax</label>
						<input type="text" id="fax" name="fax"'.$fax.' class="field1" />
					</div>
					
					<div class="columnclear"></div>
					
					<div class="columnleft">
						<label for="address">Address&nbsp;&nbsp;<small><span class="colored">recommended:</span> number, street, apartment, city, state, zip code</small></label>
						<input type="text" id="address" name="address"'.$address.' class="field3" />
					</div>
					
					<div class="columnleft">
						<label for="email">Email</label>
						<input type="text" id="email" name="email"'.$email.' class="field2" />
					</div>
					
					<div class="columnclear"></div>
					
					<div class="columnleft">
						<label for="objective">Objective</label>
						<textarea id="objective" name="objective" class="field5">'.$_SESSION["resume"]->objective.'</textarea>
					</div>
					
					<div class="columnleft">
						<label for="profile">Profile</label>
						<textarea id="profile" name="profile" class="field5">'.$_SESSION["resume"]->profile.'</textarea>
					</div>
					
					<div class="columnclear"></div>
					
					<div class="columnleft">
						<label for="qualifications">Qualifications</label>
						<textarea id="qualifications" name="qualifications" class="field5">'.$_SESSION["resume"]->qualifications.'</textarea>
					</div>
					
					<div class="columnleft">
						<label for="skills">Skills</label>
						<textarea id="skills" name="skills" class="field5">'.$_SESSION["resume"]->skills.'</textarea>
					</div>
					
				</form>
				
				<div class="columnclear divisor25"></div>
				
				<div class="line"></div>
				
				<div class="divisor5"></div>
				
				<div class="button columnright textcenter link" id="continue" lang="1">continue</div>
				
				<div class="columnClear divisor100"></div>
				
			';
			
		}
		else {
			
			if($_SESSION["resume"]->step == 2) {
				
				if($_SESSION["resume"]->education->counter > 0 && $_SESSION["resume"]->count_items($_SESSION["resume"]->education->active, $_SESSION["resume"]->education->counter) > 0) {
					
					$items = '<h3><b>LIST OF EDUCATION</b></h3>';
					
					for($i = 0;$i < $_SESSION["resume"]->education->counter;$i++) {
						
						$counter = 1;
						
						if($_SESSION["resume"]->education->active[$i]) {
							
							$items .= '
								
								<div class="items">
									
									<div class="columnleft">
										<div class="divisor1"></div><div class="divisor1"></div><div id="val'.$i.'_'.$counter++.'">'.htmlentities($_SESSION["resume"]->education->school[$i]).'</div>
									</div>
									
									<div id="commands" class="columnright">
										<img src="images/delete.gif" height="20" width="20" title="delete" lang="'.$i.'" class="columnright link" />
										<img src="images/edit.gif" height="20" width="20" title="edit" lang="'.$i.'" class="columnright link" />
									</div>
									
									<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->education->studies[$i]).'</div>
									<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->education->graduation[$i]).'</div>
									
									<div class="columnclear"></div>
									
								</div>
								
							';
							
						}
						
					}
					
					$items .= '<h3><div class="divisor5"></div></h3><div class="divisor50"></div><div class="divisor20"></div>';
					
				}
				else {$items = '';}
				
				echo '
					
					<small>
						Homero salutatus suscipiantur eum id, tamquam voluptaria expetendis ad sed,  <span class="colored">nobis feugiat similique usu ex</span>. Eum hinc argumentum te, no sit percipit adversarium, ne qui feugiat persecuti. Odio omnes scripserit ad est, ut vidit lorem maiestatis his, putent mandamus gloriatur ne pro.  <span class="colored">Oratio iriure rationibus</span> ne his, ad est corrumpit splendide. Ad duo appareat moderatius, ei falli tollit denique eos. Dicant evertitur mei in, ne his deserunt perpetua sententiae, ea sea omnes similique vituperatoribus. Ex mel errem intellegebat comprehensam, vel ad tantas antiopam delicatissimi, tota ferri affert eu nec. Legere expetenda pertinacia ne pro, et pro impetus persius assueverit.
					</small>
								
					<div class="divisor25"></div>
					
					<div id="list" lang="360">
						
						'.$items.'
						
					</div>
					
					<form method="post" action="include/php/insert.php" class="columnright">
						
						<div class="columnleft">
							<label for="school">School&nbsp;&nbsp;<small><span class="colored">recommended:</span> school name, city, state</small></label>
							<input type="text" id="school" name="school" class="field2" />
						</div>
						
						<div class="columnleft">
							<label for="studies">Studies</label>
							<input type="text" id="studies" name="studies" class="field2" />
						</div>
						
						<div class="columnclear"></div>
						
						<div class="columnleft">
							<label for="graduation">Graduation and/or courses taken</label>
							<textarea id="graduation" name="graduation" class="field6"></textarea>
						</div>
						
					</form>
					
					<div class="columnclear divisor5"></div>
					
					<div class="button columnright textcenter link" id="insert">insert</div>
					
					<div class="columnclear divisor25"></div>
					
					<div class="line"></div>
					
					<div class="divisor5"></div>
					
					<div class="button columnright textcenter link" id="continue" lang="2">continue</div>
					
					<div class="button columnright textcenter link" id="back">back</div>
					
					<div class="columnclear divisor100"></div>
					
					<div class="cover invisible"><img src="images/loading.gif" height="150" width="150" /></div>
					
					<form method="post" action="include/php/update.php" class="box invisible">
						
						<h3>UPDATE</h3>
						
						<input type="hidden" name="item" id="item" value="0" />
						
						<div class="columnleft">
							<label for="school_upd">School</label>
							<input type="text" id="school_upd" name="school_upd" class="field4" />
						</div>
						
						<div class="columnleft">
							<label for="studies_upd">Studies</label>
							<input type="text" id="studies_upd" name="studies_upd" class="field4" />
						</div>
						
						<div class="columnclear"></div>
						
						<div class="columnleft">
							<label for="graduation_upd">Graduation and/or courses taken</label>
							<textarea id="graduation_upd" name="graduation_upd" class="field4"></textarea>
						</div>
						
						<div class="columnclear divisor5"></div>
						
						<div class="button columnright textcenter link" id="update">continue</div>
						
						<div class="button columnright textcenter link" id="cancel">back</div>
						
					</form>
					
				';
				
			}
			else {
				
				if($_SESSION["resume"]->step == 3) {
					
					if($_SESSION["resume"]->experience->counter > 0 && $_SESSION["resume"]->count_items($_SESSION["resume"]->experience->active, $_SESSION["resume"]->experience->counter) > 0) {
					
						$items = '<h3><b>LIST OF WORK EXPERIENCE</b></h3>';
						
						for($i = 0;$i < $_SESSION["resume"]->experience->counter;$i++) {
							
							$counter = 1;
							
							if($_SESSION["resume"]->experience->active[$i]) {
								
								$items .= '
									
									<div class="items">
										
										<div class="columnleft">
											<div class="divisor1"></div><div class="divisor1"></div><div id="val'.$i.'_'.$counter++.'">'.htmlentities($_SESSION["resume"]->experience->company[$i]).'</div>
										</div>
										
										<div id="edit" class="columnright">
											<img src="images/delete.gif" height="20" width="20" title="delete" lang="'.$i.'" class="columnright link" />
											<img src="images/edit.gif" height="20" width="20" title="edit" lang="'.$i.'" class="columnright link" />
										</div>
										
										<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->experience->title[$i]).'</div>
										<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->experience->date[$i]).'</div>
										<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->experience->reason[$i]).'</div>
										<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->experience->duties[$i]).'</div>
										
										<div class="columnclear"></div>
										
									</div>
									
								';
								
							}
							
						}
						
						$items .= '<h3><div class="divisor5"></div></h3><div class="divisor50"></div><div class="divisor20"></div>';
						
					}
					else {$items = '';}
					
					echo '
						
						<small>
							Nulla eu nulla a elit ullamcorper convallis. In lacinia consectetur tortor, in consectetur eros tristique eu. Nam in lectus dolor, et feugiat tortor. Morbi risus nibh, feugiat bibendum eleifend a, interdum fringilla ligula. Maecenas odio sapien, luctus a cursus at, fringilla vel arcu.
						</small>
						
						<div class="divisor25"></div>
						
						<div id="list" lang="480">
							
							'.$items.'
							
						</div>
						
						<form method="post" action="include/php/insert.php" class="columnright">
							
							<div class="columnleft">
								<label for="company">Company</label>
								<input type="text" id="company" name="company" class="field2" />
							</div>
							
							<div class="columnleft">
								<label for="title">Title</label>
								<input type="text" id="title" name="title" class="field2" />
							</div>
							
							<div class="columnclear"></div>
							
							<div class="columnleft">
								<label for="date">Date&nbsp;&nbsp;<small><span class="colored">recommended:</span> date from / date to <span class="colored">(jun, 2009 - now)</span></small></label>
								<input type="text" id="date" name="date" class="field2" />
							</div>
							
							<div class="columnLeft">
								<label for="reason">Reason for living</label>
								<input type="text" id="reason" name="reason" class="field2" />
							</div>
							
							<div class="columnclear"></div>
							
							<div class="columnleft">
								<label for="duties">Duties</label>
								<textarea id="duties" name="duties" class="field6"></textarea>
							</div>
							
						</form>
						
						<div class="columnclear divisor5"></div>
						
						<div class="button columnright textcenter link" id="insert">insert</div>
						
						<div class="columnclear divisor25"></div>
						
						<div class="line"></div>
						
						<div class="divisor5"></div>
						
						<div class="button columnright textcenter link" id="continue" lang="3">continue</div>
						
						<div class="button columnright textcenter link" id="back">back</div>
						
						<div class="columnclear divisor100"></div>
						
						<div class="cover invisible"><img src="images/loading.gif" height="150" width="150" /></div>
						
						<form method="post" action="include/php/update.php" class="box invisible">
							
							<h3>UPDATE</h3>
							
							<input type="hidden" name="item" id="item" value="0" />
							
							<div class="columnleft">
								<label for="company_upd">Company</label>
								<input type="text" id="company_upd" name="company_upd" class="field4" />
							</div>
							
							<div class="columnleft">
								<label for="title_upd">Title</label>
								<input type="text" id="title_upd" name="title_upd" class="field4" />
							</div>
							
							<div class="columnclear"></div>
							
							<div class="columnleft">
								<label for="date_upd">Date</label>
								<input type="text" id="date_upd" name="date_upd"class=" field4" />
							</div>
							
							<div class="columnleft">
								<label for="reason_upd">Reason for living</label>
								<input type="text" id="reason_upd" name="reason_upd" class="field4" />
							</div>
							
							<div class="columnclear"></div>
							
							<div class="columnleft">
								<label for="duties_upd">Duties</label>
								<textarea id="duties_upd" name="duties_upd" class="field4"></textarea>
							</div>
							
							<div class="columnclear divisor5"></div>
							
							<div class="button columnright textcenter link" id="update">continue</div>
							
							<div class="button columnright textcenter link" id="cancel">back</div>
							
						</form>
						
					';
					
				}
				else{
					
					if($_SESSION["resume"]->step == 4) {
						
						if($_SESSION["resume"]->references->counter > 0 && $_SESSION["resume"]->count_items($_SESSION["resume"]->references->active, $_SESSION["resume"]->references->counter) > 0) {
					
							$items = '<h3><b>LIST OF WORK EXPERIENCE</b></h3>';
							
							for($i = 0;$i < $_SESSION["resume"]->references->counter;$i++) {
								
								$counter = 1;
								
								if($_SESSION["resume"]->references->active[$i]) {
									
									$items .= '
										
										<div class="items">
											
											<div class="columnleft">
												<div class="divisor1"></div><div class="divisor1"></div><div id="val'.$i.'_'.$counter++.'">'.htmlentities($_SESSION["resume"]->references->name[$i]).'</div>
											</div>
											
											<div id="edit" class="columnright">
												<img src="images/delete.gif" height="20" width="20" title="delete" lang="'.$i.'" class="columnright link" />
												<img src="images/edit.gif" height="20" width="20" title="edit" lang="'.$i.'" class="columnright link" />
											</div>
											
											<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->references->company[$i]).'</div>
											<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->references->title[$i]).'</div>
											<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->references->department[$i]).'</div>
											<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->references->address[$i]).'</div>
											<div id="val'.$i.'_'.$counter++.'" class="hide">'.htmlentities($_SESSION["resume"]->references->phone[$i]).'</div>
											
											<div class="columnclear"></div>
											
										</div>
										
									';
									
								}
								
							}
							
							$items .= '<h3><div class="divisor5"></div></h3><div class="divisor50"></div><div class="divisor20"></div>';
							
						}
						else {$items = '';}
						
						echo '
							
							<small>
								Sed id lorem vel lacus hendrerit elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer ut nisi eget purus luctus pellentesque volutpat a diam. Phasellus in orci eget leo sollicitudin laoreet. Nullam a odio quis velit mollis luctus. Cras mollis, purus ut vestibulum facilisis, massa mi suscipit ante, ac ultrices enim mauris vel velit. Fusce metus neque, eleifend nec blandit non, pellentesque sed dolor. Pellentesque ac enim elementum enim pulvinar ullamcorper nec a orci.
							</small>
							
							<div class="divisor25"></div>
							
							<div id="list" lang="420">
								
								'.$items.'
								
							</div>
							
							<form method="post" action="include/php/insert.php" class="columnright">
								
								<div class="columnleft">
									<label for="name">Name</label>
									<input type="text" id="name" name="name" class="field2" />
								</div>
								
								<div class="columnleft">
									<label for="company">Company</label>
									<input type="text" id="company" name="company" class="field2" />
								</div>
								
								<div class="columnclear"></div>
								
								<div class="columnleft">
									<label for="title">Title</label>
									<input type="text" id="title" name="title" class="field2" />
								</div>
								
								<div class="columnleft">
									<label for="department">Department</label>
									<input type="text" id="department" name="department" class="field2" />
								</div>
								
								<div class="columnclear"></div>
								
								<div class="columnleft">
									<label for="address">Address</label>
									<input type="text" id="address" name="address" class="field2" />
								</div>
								
								<div class="columnleft">
									<label for="phone">Phone(s)</label>
									<input type="text" id="phone" name="phone" class="field2" />
								</div>
								
							</form>
							
							<div class="columnclear divisor5"></div>
							
							<div class="button columnright textcenter link" id="insert">insert</div>
							
							<div class="columnclear divisor25"></div>
							
							<div class="line"></div>
							
							<div class="divisor5"></div>
							
							<div class="button columnright textcenter link" id="continue" lang="4">continue</div>
							
							<div class="button columnright textcenter link" id="back">back</div>
							
							<div class="columnclear divisor100"></div>
							
							<div class="cover invisible"><img src="images/loading.gif" height="150" width="150" /></div>
							
							<form method="post" action="include/php/update.php" class="box invisible">
								
								<h3>UPDATE</h3>
								
								<input type="hidden" name="item" id="item" value="0" />
								
								<div class="columnleft">
									<label for="name_upd">Name</label>
									<input type="text" id="name_upd" name="name_upd" class="field4" />
								</div>
								
								<div class="columnleft">
									<label for="company_upd">Company</label>
									<input type="text" id="company_upd" name="company_upd" class="field4" />
								</div>
								
								<div class="columnclear"></div>
								
								<div class="columnleft">
									<label for="title_upd">Title</label>
									<input type="text" id="title_upd" name="title_upd" class="field4" />
								</div>
								
								<div class="columnleft">
									<label for="department_upd">Department</label>
									<input type="text" id="department_upd" name="department_upd" class="field4" />
								</div>
								
								<div class="columnclear"></div>
								
								<div class="columnleft">
									<label for="address_upd">Address</label>
									<input type="text" id="address_upd" name="address_upd" class="field4" />
								</div>
								
								<div class="columnleft">
									<label for="phone_upd">Phone(s)</label>
									<input type="text" id="phone_upd" name="phone_upd" class="field4" />
								</div>
								
								<div class="columnclear divisor5"></div>
								
								<div class="button columnright textcenter link" id="update">continue</div>
								
								<div class="button columnright textcenter link" id="cancel">back</div>
								
							</form>
							
						';
						
					}
					else{
						
						if($_SESSION["resume"]->step == 5) {
							
							if($_SESSION["resume"]->extras->counter > 0 && $_SESSION["resume"]->count_items($_SESSION["resume"]->extras->active, $_SESSION["resume"]->extras->counter) > 0) {
								
								$items = '<h3><b>LIST OF WORK EXPERIENCE</b></h3>';
								
								for($i = 0;$i < $_SESSION["resume"]->extras->counter;$i++) {
									
									$counter = 1;
									
									if($_SESSION["resume"]->extras->active[$i]) {
										
										$items .= '
											
											<div class="items">
												
												<div class="columnleft">
													<div class="divisor1"></div><div class="divisor1"></div><div id="val'.$i.'_'.$counter++.'">'.htmlentities($_SESSION["resume"]->extras->title[$i]).'</div>
												</div>
												
												<div id="edit" class="columnright">
													<img src="images/delete.gif" height="20" width="20" title="delete" lang="'.$i.'" class="columnright link" />
													<img src="images/edit.gif" height="20" width="20" title="edit" lang="'.$i.'" class="columnright link" />
												</div>
												
												<div id="val'.$i.'_'.$counter++.'" class="hide">'.$_SESSION["resume"]->extras->content[$i].'</div>
												
												<div class="columnclear"></div>
												
											</div>
											
										';
										
									}
									
								}
								
								$items .= '<h3><div class="divisor5"></div></h3><div class="divisor50"></div><div class="divisor20"></div>';
								
							}
							else {$items = '';}
							
							echo '
								
								<small>
									Etiam commodo, eros in egestas vestibulum, leo tellus posuere tellus, aliquam convallis augue lectus in dui. Praesent nisl felis, pellentesque ut consectetur in, eleifend ac sem. Maecenas eu nisl dui. Sed egestas hendrerit vehicula. Curabitur blandit convallis ipsum at vulputate. Vestibulum lectus lorem, viverra nec venenatis et, gravida nec ante. Sed blandit, dolor mollis suscipit facilisis, odio lectus convallis justo.
								</small>
								
								<div class="divisor25"></div>
								
								<div id="list" lang="310">
									
									'.$items.'
									
								</div>
								
								<form method="post" action="include/php/insert.php" class="columnright">
									
									<div class="columnleft">
										<label for="title">Title</label>
										<input type="text" id="title" name="title" class="field6" />
									</div>
									
									<div class="columnclear"></div>
									
									<div class="columnleft">
										<label for="content">Content</label>
										<textarea id="content" name="content" class="field6"></textarea>
									</div>
									
								</form>
								
								<div class="columnclear divisor5"></div>
								
								<div class="button columnright textcenter link" id="insert">insert</div>
								
								<div class="columnclear divisor25"></div>
								
								<div class="line"></div>
								
								<div class="divisor5"></div>
								
								<div class="button columnright textcenter link" id="continue" lang="5">continue</div>
								
								<div class="button columnright textcenter link" id="back">back</div>
								
								<div class="columnclear divisor100"></div>
								
								<div class="cover invisible"><img src="images/loading.gif" height="150" width="150" /></div>
								
								<form method="post" action="include/php/update.php" class="box invisible">
									
									<h3>UPDATE</h3>
									
									<input type="hidden" name="item" id="item" value="0" />
									
									<div class="columnleft">
										<label for="title_upd">Title</label>
										<input type="text" id="title_upd" name="title_upd" class="field4" />
									</div>
									
									<div class="columnclear"></div>
									
									<div class="columnleft">
										<label for="content_upd">Content</label>
										<textarea name="content_upd" id="content_upd" class="field4"></textarea>
									</div>
									
									<div class="columnclear divisor5"></div>
									
									<div class="button columnright textcenter link" id="update">continue</div>
									
									<div class="button columnright textcenter link" id="cancel">back</div>
									
								</form>
								
							';
							
						}
						else{
							
							echo '
								
								<div class="spacer6"></div>
								
								<p>
									Sed cursus ullamcorper rutrum. Praesent sit amet augue ante, aliquet feugiat ligula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent at egestas augue. Quisque posuere sagittis dignissim. Nulla facilisi. Phasellus egestas, velit vel pretium cursus, ipsum felis volutpat diam, ac semper est sem ac justo. Quisque pretium, arcu vitae tincidunt faucibus, velit nibh vulputate ligula, vel commodo odio mauris a quam. Pellentesque sit amet purus sed odio condimentum gravida sit amet sed mi. Proin mattis, arcu a dignissim varius, mi dui venenatis nulla, nec interdum massa leo id lacus. Donec luctus vehicula nisi, at vehicula felis tempor non. Nulla urna nisi, placerat vitae cursus in, semper eu dolor. Nullam eu libero eget leo mattis lacinia. Morbi sollicitudin luctus neque varius sagittis. Cras libero leo, commodo at commodo nec, tempus nec magna. Nunc facilisis consequat condimentum.
								</p>
								
								<br /><br />
								
								To check out your resume <a href="resume.php" target="_blank">click here on this link</a> (it will be opened in a new window or tab)
								
								<div class="divisor15"></div>
								
								<div class="line"></div>
								
								<div class="divisor10"></div>
								
								<div class="divisor3"></div>
								
								<h4><b>You can also perform some actions with your building like:</b></h4>
								
								<div class="divisor10"></div>
								
								<div class="divisor3"></div>
								
								<blockquote>
								
									<ul>
										<li>change <a href="include/php/backward.php?section=5"><b>your profile information</b></a> (STEP <span class="colored">01</span>)</li>
										<li>change <a href="include/php/backward.php?section=4"><b>your educational information</b></a> (STEP <span class="colored">02</span>)</li>
										<li>change <a href="include/php/backward.php?section=3"><b>your work experience information</b></a> (STEP <span class="colored">03</span>)</li>
										<li>change <a href="include/php/backward.php?section=2"><b>your references information</b></a> (STEP <span class="colored">04</span>)</li>
										<li>change <a href="include/php/backward.php"><b>your extra sections information</b></a> (STEP <span class="colored">05</span>)</li>
									</ul>
									
								</blockquote>
								
							';
							
						}
						
					}
					
				}
				
			}
			
		}
		
	?>
	
	
	
</body>
</html>