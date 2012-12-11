<?php

include("classLoader.php");

$page = new Page();

$title = "Frequently Asked Questions";
$page->setTitle($title);

$content = <<<HEREDOC
<ol>
          	<li><a href="#register">How can I get registration information?</a></li>
            <li><a href="#credit">Can I pay by credit card?</a></li>
            <li><a href="#cancellations">Cancellations</a></li>
            <li><a href="#weather">What information do I call for closing information during inclement weather?</a></li>
            <li><a href="#hotels">Are there hotels nearby?</a></li>
            <li><a href="#eat">Where can I eat nearby?</a></li>
            <li><a href="#directions">Where can I find out about directions and transportation?</a></li>
            <li><a href="#simmons">Where can I park for Simmons workshops?</a></li>
            <li><a href="#holyoke">Where can I park for Mount Holyoke workshops?</a></li>
            <li><a href="#office">Where is the GSLIS CE office?</a></li>
            <li><a href="#library">Where is the GSLIS Library?</a></li>
            <li><a href="#ceupdp">What is the difference between CEUs and PDPs?</a></li>
            <li><a href="#online">How do online workshops work?</a></li>
          </ol>
          <ol>
            <li id="register"><p style="font-weight:bold;">How can I get registration information?</p>
            <p>Please see our <a href="register.php">registration page.</a></p></li>
            <li id="credit"><p style="font-weight:bold;">Can I pay by credit card?</p>
            <p>Yes, we can accept credit cards, as well as electronic bank payments and checks.</p></li>
            <li id="cancellations"><p style="font-weight:bold;">Cancellations</p>
            <p>If for any reason a workshop must be canceled, you will be notified, and your money will be returned.</p>

<p>If you need to make travel arrangements (transportation, lodging, etc.) in order to attend an onsite workshop, please note that we do not refund these travel costs if a workshop is canceled for any reason.  Please use caution making non-refundable reservations.</p>

<p>Cancellations by registrants must be received by <a href="mailto:gslisce@simmons.edu">email</a> five business days prior to the workshop date to receive a 70 percent refund. (The Office of Continuing Education retains 30 percent of the course cost as a nonrefundable registration processing fee.)</p></li>
            <li id="weather"><p style="font-weight:bold;">What information do I call for closing information during inclement weather?</p>
            <p><ul>
              <li>Simmons College campus workshops - 617-521-3463</li>

              <li>Mount Holyoke campus workshops - 413-533-2400</li>
            </ul></p>
            </li>
            <li id="hotels"><p style="font-weight:bold;">Are there hotels nearby?</p>
               <p>  <ul>
              <li>Best Western Inn at Children&#39;s Hospital<br />
              324 Longwood Avenue<br />
              617-731-4700</li>

              <li>Sheraton Boston Hotel<br />
              39 Dalton Street<br />

              617-236-2000</li>

              <li>Best Western Terrace Inn<br />
              1650 Commonwealth Avenue<br />
              617-566-6260</li>

              <li>The Eliot Hotel<br />

              370 Commonwealth Avenue<br />
              617-267-1607</li>

              <li>Boston Marriott at Copley Place<br />
              110 Huntington Avenue<br />
              617-236-5800</li>

              <li>The Lenox Hotel<br />
              710 Boylston Street<br />
              617-536-5300</li>

              <li>Westin Hotel at Copley Place<br />
              10 Huntington Avenue<br />
              617-262-9600</li>

              <li>Mount Holyoke lodging information can be found at <a href="http://www.mtholyoke.edu/cic/about/lodging.shtml">http://www.mtholyoke.edu/cic/about/lodging.shtml</a></li>
            </ul></p>
</li>
            <li id="eat"><p style="font-weight:bold;">Where can I eat nearby?</p>
            <p>There are many dining options around the Simmons campus, as well as our on-campus cafeteria, The Fens.</p>

            <p>Find out about <a href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=restaurants&amp;sll=42.340069,-71.101756&amp;sspn=0.009516,0.016887&amp;gl=us&amp;g=300+The+Fenway,+Boston,+MA&amp;ie=UTF8&amp;z=16" target="_blank">more dining options</a> online.</p>

            <p>Mount Holyoke dining information can be found at <a target="_blank" href="http://www.mtholyoke.edu/cic/about/restaurants.shtml">http://www.mtholyoke.edu/cic/about/restaurants.shtml</a>.</p>

</li>
            <li id="directions"><p style="font-weight:bold;">Where can I find out about directions and transportation?</p>
            <p>Simmons is centrally located in the heart of Boston&#39;s Fenway neighborhood and is easily accessible by public transportation.</p>

            <p>Simmons College<br />

            Graduate School of Library and Information Science<br />
            300 The Fenway<br />
            Boston, MA 02115</p>

            <p><strong>By Public Transportation</strong><br />
            MBTA (Massachusetts Bay Transportation Authority)<br />
            Take MBTA green line E train outbound toward Heath Street/Arborway to the Museum stop. Exit train, and take a right onto Louis Prang Street. Walk past the Isabella Stuart Gardner Museum, and Simmons College will be on the left.<br />

            <br />
            Bus Terminals<br />
            All buses arrive and depart from South Station Transportation Center, 700 Atlantic Avenue, Boston. Take MBTA red line from South Station inbound to Park Street. At Park Street, take green line E train and follow directions above.</p>

            <p><strong>By Car</strong></p>

            <ul>
              <li><strong>From the WEST (also NYC and CT)</strong><br />

              Take Route 90 East (Massachusetts Turnpike) to Exit 22. Stay left and follow signs marked &quot;Prudential Center/West 9. Stay on Huntington Ave. west approximately 1 mile. Pass Museum of Fine Arts on right, then turn right at next light on Louis Prang St. Continue through two lights. The main building of Simmons will be on left. Turn left on Avenue Louis Pasteur. SimmonsÃ¢â‚¬â„¢s library is on left. Passengers may be dropped off here.</li>

              <li><strong>From the NORTH (Route I-93 or Route 1)</strong><br />
              At the merge with Route 3 (the Southeast Expressway), take Storrow Drive exit. Follow Storrow Drive west. Follow local directions below.</li>

              <li><strong>From LOGAN INTERNATIONAL AIRPORT</strong><br />
              Take 1A south to I-93/Sumner Tunnel/Boston. Go through Sumner Tunnel. Follow sign to I-93 north. Sign will say &quot;93 North, Storrow Drive, Cambridge.&quot; Stay left and follow sign for Storrow Drive west. Once on Storrow Drive, stay in center lane and proceed approximately 2 miles, then get in left lane. Follow local directions below.</li>

              <li><strong>Local Directions</strong><br />
              Look for sign &quot;Kenmore Square, Fenway, Route 1 South&quot; and exit left, following sign for Fenway 1 South. Do not take Kenmore Square exit. Instead, follow ramp up and exit right. Sign will say &quot;Boyston Street Outbound, Riverway 1.&quot; You will be on Boylston Street. Stay in left lane and proceed to first light. Turn left onto Park Drive. Follow Park Drive to second light and cross Boylston Street and Brookline Avenue. Stay left. At third stoplight, bear left following &quot;Fenway&quot; sign. At fourth light, continue straight, crossing Brookline Avenue again. You will be on the Fenway. Turn right onto Avenue Louis Prang right after Emmanuel College. Simmons is on your left.</li>
            </ul>
</li>
            <li id="simmons"><p style="font-weight:bold;">Where can I park for Simmons workshops?</p>
            <p>Discounted visitor parking is now available on campus for Simmons GSLIS CE workshop participants. If you park in the Simmons Garage (<a href="http://www.simmons.edu/visit/maps/index.shtml">entrance on Avenue Louis Pasteur</a>), we will supply you with a discounted yellow exit ticket at the end of the workshop. The daily rates for the garage are:</p>

            <p><strong>Daily Visitor Rates</strong><br />
            <em>Invited visitors with yellow discount exit tickets</em><br />

            0-2 hours $3.00<br />
            2-3.5 hours $6.00<br />
            3.5-5 hours $9.00<br />
            Over 5 hours $12<br />
            Entry after 5pm and weekends $6.00</p>

            <p>Upon exit, visitors insert both the entry and exit tickets into the exit gate readers and pay any remaining fee by debit or credit card (Visa, MasterCard, and Discover). You will NOT be able to pay the parking fee with cash on nights and weekends, so be sure to have a credit or debit card with you.</p>

            <p><strong>Visitors who lose their entry ticket or fail to acquire an entry ticket will be charged the maximum daily public rate of $50.00.</strong> Parking attendants cannot validate visitors or accept payments.</p>

            <p>Workshop participants must park in the School of Management (SOM) section of the garage on levels P1, P2, and the non-Children&#39;s Hospital parking section of P3. Please do not follow the signs for the Palace Road Garage.</p>

            <p>To enter the Palace Road building, look for the SOM Lobby Stairs or SOM Elevators in the garage and take them to the lobby level. Exit through the double doors across the SOM lobby (toward the Simmons quad). The Palace Road building is to your right.</p>

            <p>You can walk through the garage, at the P1 level, following the signs to the Palace Road Garage, and use the Palace Road stairs or the elevator to bring you up directly into the building.</p>

</li>
            <li id="holyoke"><p style="font-weight:bold;">Where can I park for Mount Holyoke workshops?</p>
            <p>As clients of GSLIS CE, you may park in the Village Commons parking lot free of charge.&#160;&#160; The GSLIS West administrative offices are located in the Village Commons.</p>
</li>
            <li id="office"><p style="font-weight:bold;">Where is the GSLIS CE office?</p>
            <p>The GSLIS CE office is located in the Palace Road building, room P-111K. We are open Monday through Friday, 8:30am - 4:30pm.</p>
</li>
            <li id="library"><p style="font-weight:bold;">Where is the GSLIS Library?</p>
            <p>The GSLIS Library is located on the first floor of Beatley Library.</p>
</li>
            <li id="ceupdp"><p style="font-weight:bold;">What is the difference between CEUs and PDPs?</p>
            <p>GSLIS CE workshops are measured by Contact Hours. Each hour in the classroom (or online) equals one contact hour. Individual states and their school districts use different terms to record these contact hours. In Massachusetts, ONE contact hour is equivalent to 0.1 CEUs (Continuing Education Units). It is also equivalent to 1.0 PDPs (Professional Development Points).</p>
<p><strong>CEUs &mdash;</strong> All enrolled attendees will receive a Certificate of Continuing Education Units from the instructor at the end of the workshop (online workshop attendees will receive their certificates by mail).</p>

            <p><strong>PDPs &mdash;</strong> Simmons College provides Professional Development Points according to the MA Department of Education requirements for certification, revised as of 7/1/00.</p>


</li>
            <li id="online"><p style="font-weight:bold;">How do online workshops work?</p>
            <p>Our online workshops are asynchronous, which means you can do the work on your own time, whenever is convenient for you. Some instructors will post all the materials at the beginning of the workshop, and some will post incrementally over the course of the workshop, but all require regular participation. Occasionally, instructors will schedule online group chats, but these will be scheduled around participants&#39; other obligations and every effort will be made to ensure that everyone can participate.</p>

          </li>
          </ol>
HEREDOC;
$page->setContent($content);

$page->render();

?>