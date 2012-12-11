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

    // create the new add command
    $newrecordrequest = $fm->newAddCommand($layoutName);
    ExitOnError($newrecordrequest);

    // get the submitted record data
    $recorddata = $cgi->get('recorddata');
    if (isset ($recorddata)) {

        //  submit the data to the db
        $result = submitRecordData($recorddata, $newrecordrequest, $cgi, $layout->listFields());

        //  clear the stored record data
        $cgi->clear('recorddata');
        ExitOnError($result);
        if ($result->getFetchCount() > 0) {
            $records = $result->getRecords();
            $record = $records[0];
        }
    }
    ExitOnError($record);

?>

<p style="font-weight:bold">If you have already registered but have not yet paid, 
       			please do not register again. Contact <a href="mailto:gslisce@simmons.edu">gslisce@simmons.edu</a>
       			for a direct link to our payment page.</p>
         		<p>
                    Please review the information below and print this page
                    for your records.  To pay by credit card or electronic bank payment, click "Continue". 
                </p>
                
               <table>
                  <tr class="field">
                    <td colspan="2" class="field_name">
                    <form action="https://secure.touchnet.com/C21377_upay/web/index.jsp" method="post">
                    <!-- form action="https://secure.touchnet.com:8443/C21377test_upay/web/index.jsp" method="post"> -->
					<input type="hidden" name="UPAY_SITE_ID" value="0" />
    				<input type="hidden" name="EXT_TRANS_ID" value="GSLIS_111_2435_10_134025_400500" />
    				<input type="text" name="AMT" value="<?php echo nl2br( $record->getField('Total', 0))?>" />
    				<input type="submit" value="Continue" /></form></td>
                  </tr>
                </table>
                
                <p>
                    Or, you may pay with a check in U.S. funds, made out to Simmons College, and mailed to:<br /><br />
    
                    Kris Liberman, Program Manager<br />
                    Graduate School of Library and Information Science<br />
                    The Office of Continuing Education<br />
                    Simmons College<br />
                    300 The Fenway<br />
                    Boston, MA 02115-5898<br />

                </p>
                
                <p>
                	We will send you a confirmation email with an attached receipt or 
                    confirmation within 2 business days.  If you have any questions, 
                    please do not hesitate to contact us at 
                    <a href="mailto:gslisce@simmons.edu">gslisce@simmons.edu</a>.
                </p>
                <p>
                  <input type="hidden" name="-db" value="<?php echo $databaseName ?>">
                  <input type="hidden" name="-lay" value="<?php echo $layoutName ?>">
                  <input type="hidden" name="-action" value="new">
				</p>
                <hr />
                <table class="record">
                  <!-- Display record field values -->
                  <tr class="field">
                    <td width="123" class="field_name"> First Name </td>
                    <td width="242" class="field_data"><?php echo nl2br( $record->getField('FirstName', 0))?></td>
                    <td width="97" class="field_name">Last Name</td>
                    <td width="391" class="field_data"><?php echo nl2br( $record->getField('LastName', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Organization </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Organization', 0))?></td>
                    <td class="field_name">JobTitle </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('JobTitle', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Address Type </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('AddressType', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Street1 </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Street1', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Street2 </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Street2', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> City </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('City', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> State </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('State', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name">Country</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Country', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Zip </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Zip', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Email </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Email', 0))?></td>
                    <td class="field_data">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Home Phone </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('HomePhone', 0))?></td>
                    <td class="field_name"> Work Phone </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('WorkPhone', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name">&nbsp;</td>
                    <td class="field_data">&nbsp;</td>
                  </tr>
                </table>
                <hr />
                <table>
                  <tr class="field">
                    <td width="152" class="field_name"> Workshop Title 1</td>
                    <td width="223" class="field_data"><?php echo nl2br( $record->getField('Workshop1_title', 0))?></td>
                    <td width="45" class="field_name">Cost</td>
                    <td width="242" class="field_data"><?php echo nl2br( $record->getField('Workshop1_price', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Workshop Title 2</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Workshop2_title', 0))?></td>
                    <td class="field_name">Cost</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Workshop2_price', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Workshop Title 3</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Workshop3_title', 0))?></td>
                    <td class="field_name">Cost </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Workshop3_price', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Workshop Title 4</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Workshop4_title', 0))?></td>
                    <td class="field_name">Cost</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('Workshop4_price', 0))?></td>
                  </tr>
                </table>
          <hr />
                <table>
                  <tr class="field">
                    <td width="101" class="field_name"> Student Type </td>
                    <td width="242" class="field_data"><?php echo nl2br( $record->getField('StudentType', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> Year Of Graduation </td>
                    <td class="field_data"><?php echo nl2br( $record->getField('YearOfGraduation', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name"> PDP Selection</td>
                    <td class="field_data"><?php echo nl2br( $record->getField('PDP', 0))?></td>
                  </tr>
                  <tr class="field">
                    <td class="field_name">Date Stamp</td>
                    <td class="field_data"><?php echo displayTimeStamp( $record->getField('DateStamp', 0), $displayDateTimeFormat)?></td>
                  </tr>
                </table>