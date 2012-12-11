<?php
/**
    * FileMaker PHP Site Assistant Generated File
    */

    require_once 'fmview.php';
    require_once 'FileMaker.php';
    require_once 'error.php';

    $cgi = new CGI();
    $cgi->storeFile();
    $databaseName = 'WebForm';
    $layoutName = 'Students';
    $userName = '';
    $passWord = '';

    $fm = & new FileMaker();
    $fm->setProperty('database', $databaseName);
    $fm->setProperty('username', $userName);
    $fm->setProperty('password', $passWord);
    
    ExitOnError($fm);
    $layout = $fm->getLayout($layoutName);
    ExitOnError($layout);

    // formats for dates and times
    $displayDateFormat = '%m/%d/%Y';
    $displayTimeFormat = '%I:%M %P';
    $displayDateTimeFormat = '%m/%d/%Y %I:%M %P';
    $submitDateOrder = 'mdy';

    class EmptyRecord {
        function getRelatedSet($relationName) {
            return array(new EmptyRecord());
        }

        function getField($field, $repetition = 0) {
        }

        function getRecordId() {
        }
    }

    $record = new EmptyRecord();
?>

<p style="font-weight:bold">If you have already registered but have not yet paid, 
       	please do not register again. Contact <a href="mailto:gslisce@simmons.edu">gslisce@simmons.edu</a>
        for a direct link to our payment page.</p>
         		
       
       <form method="post" action="confirmation.php">
                    <input type="hidden" name="-db" value="<?php echo $databaseName ?>"> <input type="hidden" name="-lay" value="<?php echo $layoutName ?>"> <input type="hidden"
                    name="-action" value="new"> 
                    <table class="record">
                        <!-- Display record field values -->
                        <tr class="field">
                            <td class="field_name">
                                First Name                            </td>
                            <td class="field_data">
                            <input type="text" size="30" name="<?php echo getFieldFormName('FirstName', 0, $record);?>" value=
                                "<?php echo $record->getField('FirstName', 0) ;?>">                            </td>
                        </tr>
                        <tr class="field">
                            <td class="field_name"><span class="field_name">Last Name</span></td>
                            <td class="field_data"><input type="text" size="30" name="<?php echo getFieldFormName('LastName', 0, $record);?>" value=
                                "<?php echo $record->getField('LastName', 0)   ;?>"></td>
                        </tr>
                        
                        <tr class="field">
                            <td class="field_name">
                                Organization                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('Organization', 0, $record);?>" value=
                                "<?php echo $record->getField('Organization', 0)   ;?>">                            </td>
                        </tr>
                        <tr class="field">
                            <td class="field_name"><span class="field_name">Job Title </span></td>
                            <td class="field_data"><input type="text" size="30" name="<?php echo getFieldFormName('JobTitle', 0, $record);?>" value=
                                "<?php echo $record->getField('JobTitle', 0)   ;?>"></td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                Address Type                            </td>
                            <td class="field_data">
                                <?php getInputChoices("radio", $layout->getValueList('AddressType', $record->getRecordId()), $record->getField('AddressType', 0) , getFieldFormName('AddressType', 0, $record));?>                            </td>
                            <td class="field_data">&nbsp;</td>
                            <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                Street1                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('Street1', 0, $record);?>" value="<?php echo $record->getField('Street1', 0) ;?>">                            </td>
                            <td class="field_data">&nbsp;</td>
                            <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                Street2                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('Street2', 0, $record);?>" value="<?php echo $record->getField('Street2', 0) ;?>">                            </td>
                            <td class="field_data">&nbsp;</td>
                            <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                City                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('City', 0, $record);?>" value="<?php echo $record->getField('City', 0)   ;?>">                            </td>
                            <td class="field_data">&nbsp;</td>
                            <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                State                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('State', 0, $record);?>" value="<?php echo $record->getField('State', 0) ;?>">                            </td>
                            <td class="field_data">&nbsp;</td>
                            <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                Zip                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('Zip', 0, $record);?>" value="<?php echo $record->getField('Zip', 0) ;?>">                            </td>
                            <td class="field_data">&nbsp;</td>
                            <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                            <td class="field_name">
                                Country (if not U.S.)
                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('Country', 0, $record);?>" value="<?php echo $record->getField('Country', 0) ;?>"> 
                            </td>
                        </tr>
                        <tr class="field">
                          <td class="field_name"> Email </td>
                          <td class="field_data"><input type="text" size="30" name="<?php echo getFieldFormName('Email', 0, $record);?>" value="<?php echo $record->getField('Email', 0) ;?>">                          </td>
                          <td class="field_data">&nbsp;</td>
                          <td class="field_data">&nbsp;</td>
                        </tr>
                        <tr class="field">
                          <td class="field_name"> Home Phone </td>
                          <td class="field_data"><input type="text" size="30" name="<?php echo getFieldFormName('HomePhone', 0, $record);?>" value=
                                "<?php echo $record->getField('HomePhone', 0) ;?>">                          </td>
                        </tr>
                        <tr class="field">
                          <td class="field_name"> Work Phone </td>
                          <td class="field_data"><input type="text" size="30" name="<?php echo getFieldFormName('WorkPhone', 0, $record);?>" value=
                                "<?php echo $record->getField('WorkPhone', 0) ;?>">                          </td>
                        </tr>
                        <tr class="field">
                          <td class="field_name">&nbsp;</td>
                          <td class="field_data">&nbsp;</td>
                         
                        </tr>
                  </table>
                        <hr>
                        <br />
                        <table>
                    
                        <tr class="field">
                          <td colspan="4" class="field_name">For each workshop, please enter the title and the applicable Full, Simmons GSLIS alum, or Simmons GSLIS student cost below.</td>
                          </tr>
                        
                        
                        <tr class="field">
                            <td class="field_name">
                                Workshop 1 Title                          </td>
                      <td class="field_data">
							<select style="width:25em;" name="<?php echo getFieldFormName('Workshop1_title', 0, $record);?>">
							<option value=""></option>
							<?php
							$date = mysql_query("SELECT *, MONTH(startdate) as month, YEAR(startdate) as year FROM workshop WHERE 
							
							display = 1 ORDER BY title");
							
							while($dropdownWorkshop = mysql_fetch_array($date)) {
							  $startdate = explode('-', $dropdownWorkshop['startdate']);
							  echo '<option value="';
							  echo $dropdownWorkshop['title'] . ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '">';
							  echo $dropdownWorkshop['title'];
							  echo ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '</option>';
							}
							?>
							</select>                         
                                </td></tr>
                         <tr class="field">
                          <td class="field_name"><span class="field_name">Workshop 1 Cost</span></td>
                          <td class="field_data"><input type="text" size="10" name="<?php echo getFieldFormName('Workshop1_price', 0, $record);?>" value=
                                "<?php echo $record->getField('Workshop1_price', 0) ;?>"></td>
                          </tr>
                        
                        <tr class="field">
                            <td class="field_name">
                                Workshop 2 Title                          </td>
                      <td class="field_data">
                        <select style="width:25em;" name="<?php echo getFieldFormName('Workshop2_title', 0, $record);?>">
							<option value=""></option>
							<?php
							$date = mysql_query("SELECT *, MONTH(startdate) as month, YEAR(startdate) as year FROM workshop WHERE 
							
							display = 1 ORDER BY title");
							
							while($dropdownWorkshop = mysql_fetch_array($date)) {
							  $startdate = explode('-', $dropdownWorkshop['startdate']);
							  echo '<option value="';
							  echo $dropdownWorkshop['title'] . ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '">';
							  echo $dropdownWorkshop['title'];
							  echo ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '</option>';
							}
							?>
							</select>
	                           </td></tr>
                         <tr class="field">
                          <td class="field_name"><span class="field_name">Workshop 2 Cost</span></td>
                          <td class="field_data"><input type="text" size="10" name="<?php echo getFieldFormName('Workshop2_price', 0, $record);?>" value=
                                "<?php echo $record->getField('Workshop2_price', 0) ;?>"></td>
                          </tr>
                        <tr class="field">
                            <td class="field_name">
                                Workshop 3 Title                          </td>
                      <td class="field_data">
                        <select style="width:25em;" name="<?php echo getFieldFormName('Workshop3_title', 0, $record);?>">
							<option value=""></option>
							<?php
							$date = mysql_query("SELECT *, MONTH(startdate) as month, YEAR(startdate) as year FROM workshop WHERE 
							
							display = 1 ORDER BY title");
							
							while($dropdownWorkshop = mysql_fetch_array($date)) {
							  $startdate = explode('-', $dropdownWorkshop['startdate']);
							  echo '<option value="';
							  echo $dropdownWorkshop['title'] . ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '">';
							  echo $dropdownWorkshop['title'];
							  echo ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '</option>';
							}
							?>
							</select>                             
								</td></tr>
                         <tr class="field">
                          <td class="field_name"><span class="field_name">Workshop 3 Cost</span></td>
                          <td class="field_data"><input type="text" size="10" name="<?php echo getFieldFormName('Workshop3_price', 0, $record);?>" value=
                                "<?php echo $record->getField('Workshop3_price', 0) ;?>"></td>
                          </tr>
                          
                          
                        <tr class="field">
                            <td class="field_name">
                                Workshop 4 Title                          </td>
                      <td class="field_data">
                        <select style="width:25em;" name="<?php echo getFieldFormName('Workshop4_title', 0, $record);?>">
							<option value=""></option>
							<?php
							$date = mysql_query("SELECT *, MONTH(startdate) as month, YEAR(startdate) as year FROM workshop WHERE 
							
							display = 1 ORDER BY title");
							
							while($dropdownWorkshop = mysql_fetch_array($date)) {
							  $startdate = explode('-', $dropdownWorkshop['startdate']);
							  echo '<option value="';
							  echo $dropdownWorkshop['title'] . ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '">';
							  echo $dropdownWorkshop['title'];
							  echo ' (' . date('F Y', mktime(0, 0, 0, $startdate[1], $startdate[2], $startdate[0])) . ')';
							  echo '</option>';
							}
							?>
							</select>                             
								</td></tr>
                         <tr class="field">
                          <td class="field_name"><span class="field_name">Workshop 4 Cost</span></td>
                          <td class="field_data"><input type="text" size="10" name="<?php echo getFieldFormName('Workshop4_price', 0, $record);?>" value=
                                "<?php echo $record->getField('Workshop4_price', 0) ;?>"></td>
                          </tr>
                        

						<tr class="field">
							<td class="field_name">Payment Method</td>
                            
							<td class="field_data">
							<select name="<?php echo getFieldFormName('PaymentMethod', 0, $record);?>">
							
							<option value="">
							Please Choose
							</option>
							
							<?php getMenu($layout->getValueList('PaymentMethod', $record->getRecordId()), $record->getField('PaymentMethod', 0) , 'PaymentMethod', getFieldFormName('PaymentMethod', 0, $record));?>
							
							</select>                         
							</td>
						</tr>
                         <!-- 
 <tr class="field">
                            <td class="field_name">Notes</td>
                            <td class="field_data"><input type="text" size="50" name="<?php echo getFieldFormName('Notes', 0, $record);?>2" value=
                                "<?php echo $record->getField('Notes', 0) ;?>"></td>
                          </tr>
 -->
 							<tr class="field">
                            <td class="field_name">
                                Notes
                            </td>
                            <td class="field_data">
                                <input type="text" size="30" name="<?php echo getFieldFormName('Notes', 0, $record);?>" value="<?php echo $record->getField('Notes', 0) ;?>"> 
                            </td>
                        </tr>
                        </table>
<hr>
                        <br />
                        <table>
                        
                        <tr class="field">
                            <td width="269" class="field_name">
                                Student Type                            </td>
                            <td width="359" class="field_data">
                                <select name="<?php echo getFieldFormName('StudentType', 0, $record);?>">
                                    <option value="">
                                        Please Choose                                    </option>
                                    <?php getMenu($layout->getValueList('StudentType', $record->getRecordId()), $record->getField('StudentType', 0) , 'StudentType', getFieldFormName('StudentType', 0, $record));?>
                                </select>                            </td>
                          </tr>
                        <tr class="field">
                          <td class="field_name">If Simmons GSLIS alum, please enter year of graduation</td>
                          <td class="field_data"><input type="text" size="10" name="<?php echo getFieldFormName('YearOfGraduation', 0, $record);?>" value=
                                "<?php echo $record->getField('YearOfGraduation', 0)   ;?>"></td>
                        </tr>
                         
                      </table>
                      <hr />
                      <table>
                       
                        <tr class="field">
                          <td colspan="2" class="field_name"><p>Do you need professional development points (PDPs) used for recertification at the Department of Education? For more information, please see <a href="http://alanis.simmons.edu/ceweb/faq.php#ceupdp" target="_blank">here</a>. </p>                          </td>
                          </tr>
                        <tr class="field">
                            <td class="field_name">
                                PDP                            </td>
                            <td class="field_data">
                                <?php getInputChoices("checkbox", $layout->getValueList('PDP', $record->getRecordId()), $record->getField('PDP', 0) , getFieldFormName('PDP', 0, $record));?>                            </td>
                          </tr>
                          
                          <tr class="field">
                            <td class="field_name">Area of Certification for PDPs (e.g., "School Libraries")</td>
                            <td class="field_data">
                            <input type="text" size="30" name="<?php echo getFieldFormName('AreaOfCertification', 0, $record);?>" value=
                                "<?php echo $record->getField('AreaOfCertification', 0) ;?>"></td>
                          </tr>
                          
                          
                        <tr class="field">
                          <td colspan="2" class="field_name">Please provide us with an area of certification above to place on your PDP letter if you request PDPs.</td>
                          </tr>
                        
                        <!--Display record form controls-->
                    </table>
                        <hr />
                        <table>
                        
                         <tr class="field">
                           <td colspan="3" class="field_name"><div align="left">How did you hear about the GSLIS Continuing Education Program?</div></td>
                          </tr>
                         <tr class="field">
							<td class="field_data">
							<select name="<?php echo getFieldFormName('howHeard', 0, $record);?>">

							<option value="">
							Please Choose
							</option>
							
							
							<?php getMenu($layout->getValueList('howHeard', $record->getRecordId()), $record->getField('howHeard', 0) , 'howHeard', getFieldFormName('howHeard', 0, $record));?>
							
							</select>                         
							</td>
						</tr>
						<br />
                          <tr class="field">
                            <td width="159" class="field_name">
                            <div align="left">If other, please specify:</div></td></tr>
                          <tr class="field"><td width="261" class="field_data">
                          <input type="text" size="30" name="<?php echo getFieldFormName('howHeard_other', 0, $record);?>" value=
                                "<?php echo $record->getField('howHeard_other', 0)   ;?>">
                          </div></td>
                        </tr>

                          <!--Display record form controls-->
                          <tr class="submit_btn">
                            <td colspan="2"><input type="submit" name="-new2" value="Register">
                                <input type="reset" name="Reset2" value="Reset">
                                <input type="button" onClick=location.href="index.php"
                                name="Cancel2" value="Cancel">                            </td>
                          </tr>
                        </table>
                  <p>&nbsp;</p>
              </form>