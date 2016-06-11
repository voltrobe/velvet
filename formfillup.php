<?php
echo<<<_END

<div id="content">
<div id="wrapper-slideform">
 <div id="steps">
 
			<form method='post' name='account' id='account' action='rnprofile.php'  enctype='multipart/form-data'>
					<div id='ajax-content'>
                        <fieldset class="step">
                            <legend>Account</legend>
                            <p>
                                <label for="username"><b  class='ud1btn'>Username: </b></label>
                                <input title='Willing to change your username...Do it...!@!' type='text' maxlength='50' name='user1' placeholder='$user1' />
                            </p>
                            <p>
                                <label for="email">Email</label>
                                <input title='Enter Your Existing Email-ID' type='email' maxlength='30' name='email'
placeholder='$email' AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="password"><b  class='ud1btn'>Password:</b></label>
                                <input title='Encrypte Your password FOr high security...RETYPE it!@!' type='password' maxlength='50' name='pass' placeholder='$lpsd' AUTOCOMPLETE=OFF />
                            </p>
							<p>
							<label for="contact">Contact</label>
							<input title='Enter your Mobile/Phone Number' type='tel' maxlength='30' name='contact'
placeholder='$contact' />
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Personal Details</legend>
                            <p>
                                <label for="fname">First Name</label>
                                <input title='Enter Your First Name' type='text' maxlength='20' name='fname'
placeholder='$fname' AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="lname">Last Name</label>
                                <input title='Enter Your Last Name' type='text' maxlength='20' name='lname'
placeholder='$lname' AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="country">Country</label>
                                <input title='Enter the country name, where you belong..!' type='text' maxlength='16' name='country'
placeholder='$country' AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="city">City</label>
                                <input title='Write the city name, where you live..!' type='text' maxlength='16' name='city'
placeholder='$city' AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Self-Info</legend>
                            <p>
                                <label for="gender">Gender</label>
                               <input title='Write Your gender' type='text' maxlength='20' name='gender'
placeholder='$gender' AUTOCOMPLETE=OFF/>
                            </p>
                            <p>
                                <label for="age">AGE</label>
                                <input title='What is ur age...?Type it' type="number" maxlength='10' name='age'
placeholder='$age' AUTOCOMPLETE=OFF/>
                            </p>
                            <p>
                                <label for="religion">Religion</label>
                                <input id="religion" name="religion" type="text"  placeholder='Leave...!!if Dont Want' AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="suggest">Want to Say Something!!</label>
                                <textarea id="suggest" rows="3" name="suggest" type="text" AUTOCOMPLETE=OFF ></textarea>
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Settings</legend>
                            <p>
                                <label for="newsletter">Newsletter</label>
                                <select id="newsletter" name="newsletter">
                                    <option value="Daily" selected>Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Never">Never</option>
                                </select>
                            </p>
                            <p>
							<label style="margin-right:30px;">Account Deactivation</label>
                                <a style='height:25px;width:65px;'  align='right' type='submit' href='rnprofile.php' class='button purple' name='deact' value='$partial'><small style='font-size:13px;'>Partially</small></a>
                            
                                <a style='height:25px;width:75px;'  href='rnprofile.php' type='submit' class='button red' name='deact' value='$permanent'><small style='font-size:13px;'>Permanent </small></a>

						</p>
							</fieldset>
						<fieldset style="display:none;" class="step">
								<legend>Confirm</legend>
							<p>
								Everything in the form was correctly filled 
								if all the steps have a green checkmark icon.
								A red checkmark icon indicates that some field 
								is missing or filled out with invalid data. In this
								last step the user can confirm the submission of
								the form.
							</p>
							<p class="submit">
									<button id="registerButton" type="submit">Register</button>
							</p> 
						</fieldset>
						</div>
			</form>
				</div>
				<div id="navigation" style="display:none;">
					<ul>
						<li class="selected">
						<a href="#">Account</a>
						</li>
							<li>
						<a href="#">Personal Details</a>
						</li>
						<li>
							<a href="#">Self-Info</a>
						</li>
						<li>
							<a href="#">Settings</a>
						</li>
						<li>
						<font id='refresh'><a  href='rnprofile.php'  class='button grey'  value='Refresh' >Submit</a></font>
						</li>
					</ul>
				</div>
		</div>
	</div>

_END;

?>