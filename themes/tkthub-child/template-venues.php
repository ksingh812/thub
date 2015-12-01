<?php 
/**
 * Template Name: Venues Template
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header(); 

/**
 * determine main column size from actived sidebar
 */
//$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<div class="col-md-12 content-area" id="main-column">
	<main id="main" class="site-main" role="main">
		<div class="areabox">
				<table style="width:100%; background-color:#d83c3c;" cellpadding="0" cellspacing="0">
							<tbody>

							<tr>
							 <td style="COLOR: #fff; font-size:16px;" align="right" width="20%"><b>Search by city:&nbsp;</b></td>
							 <td>&nbsp;</td>
							 <td style="text-align:left;" align="left">
								<select name="City" id="City" style="float:left; width: 50%;height: 50px;font-size: 16px;">
								  <option value="" selected="selected">--Select a city--</option>
									<option value="36">Akron, OH</option>
									<option value="33">Albuquerque, NM</option>
									<option value="5">Anaheim, CA</option>
									<option value="1">Anchorage, AK</option>
									<option value="44">Arlington, TX</option>
									<option value="11">Atlanta, GA</option>
									<option value="6">Aurora, CO</option>
									<option value="44">Austin, TX</option>
									<option value="5">Bakersfield, CA</option>
									<option value="21">Baltimore, MD</option>
									<option value="19">Baton Rouge, LA</option>
									<option value="2">Birmingham, AL</option>
									<option value="20">Boston, MA</option>
									<option value="35">Buffalo, NY</option>
									<option value="4">Chandler, AZ</option>
									<option value="28">Charlotte, NC</option>
									<option value="46">Chesapeake, VA</option>
									<option value="15">Chicago, IL</option>
									<option value="5">Chula Vista, CA</option>
									<option value="36">Cincinnati, OH</option>
									<option value="36">Cleveland, OH</option>
									<option value="6">Colorado Springs, CO</option>
									<option value="36">Columbus, OH</option>
									<option value="44">Corpus Christi, TX</option>
									<option value="44">Dallas, TX</option>
									<option value="6">Denver, CO</option>
									<option value="23">Detroit, MI</option>
									<option value="28">Durham, NC</option>
									<option value="44">El Paso, TX</option>
									<option value="16">Fort Wayne, IN</option>
									<option value="44">Fort Worth, TX</option>
									<option value="5">Fremont, CA</option>
									<option value="5">Fresno, CA</option>
									<option value="44">Garland, TX</option>
									<option value="4">Glendale, AZ</option>
									<option value="5">Glendale, CA</option>
									<option value="28">Greensboro, NC</option>
									<option value="7">Hartford, CT</option>
									<option value="34">Henderson, NV</option>
									<option value="10">Hialeah, FL</option>
									<option value="12">Honolulu, HI</option>
									<option value="44">Houston, TX</option>
									<option value="16">Indianapolis, IN</option>
									<option value="10">Jacksonville, FL</option>
									<option value="32">Jersey City, NJ</option>
									<option value="25">Kansas City, MO</option>
									<option value="44">Laredo, TX</option>
									<option value="34">Las Vegas, NV</option>
									<option value="18">Lexington, KY</option>
									<option value="30">Lincoln, NE</option>
									<option value="56">London, EN</option>
									<option value="5">Long Beach, CA</option>
									<option value="5">Los Angeles, CA</option>
									<option value="18">Louisville, KY</option>
									<option value="44">Lubbock, TX</option>
									<option value="49">Madison, WI</option>
									<option value="43">Memphis, TN</option>
									<option value="4">Mesa, AZ</option>
									<option value="10">Miami, FL</option>
									<option value="49">Milwaukee, WI</option>
									<option value="24">Minneapolis, MN</option>
									<option value="5">Modesto, CA</option>
									<option value="2">Montgomery, AL</option>
									<option value="54">Montreal, QC</option>
									<option value="43">Nashville, TN</option>
									<option value="19">New Orleans, LA</option>
									<option value="35">New York, NY</option>
									<option value="32">Newark, NJ</option>
									<option value="46">Norfolk, VA</option>
									<option value="5">Oakland, CA</option>
									<option value="37">Oklahoma City, OK</option>
									<option value="30">Omaha, NE</option>
									<option value="10">Orlando, FL</option>
									<option value="61">Paris, FR</option>
									<option value="39">Philadelphia, PA</option>
									<option value="4">Phoenix, AZ</option>
									<option value="39">Pittsburgh, PA</option>
									<option value="44">Plano, TX</option>
									<option value="38">Portland, OR</option>
									<option value="28">Raleigh, NC</option>
									<option value="5">Riverside, CA</option>
									<option value="35">Rochester, NY</option>
									<option value="5">Sacramento, CA</option>
									<option value="25">Saint Louis, MO</option>
									<option value="24">Saint Paul, MN</option>
									<option value="10">Saint Petersburg, FL</option>
									<option value="44">San Antonio, TX</option>
									<option value="5">San Diego, CA</option>
									<option value="5">San Francisco, CA</option>
									<option value="5">San Jose, CA</option>
									<option value="57">San Juan, PR</option>
									<option value="5">Santa Ana, CA</option>
									<option value="4">Scottsdale, AZ</option>
									<option value="48">Seattle, WA</option>
									<option value="19">Shreveport, LA</option>
									<option value="5">Stockton, CA</option>
									<option value="10">Tampa, FL</option>
									<option value="36">Toledo, OH</option>
									<option value="53">Toronto, ON</option>
									<option value="4">Tucson, AZ</option>
									<option value="37">Tulsa, OK</option>
									<option value="52">Vancouver, BC</option>
									<option value="46">Virginia Beach, VA</option>
									<option value="8">Washington, DC</option>
									<option value="17">Wichita, KS</option>


				</select> <input name="TNSearchButton" id="TNSearchButton" onclick="SubmitSearch()" value="Go!" style="margin-left:10px; height:50px;border: 0px;width: 51px; vertical-align:middle;" type="button">
				</td>
				</tr>
				</tbody></table>

				<script language="javascript">

				function SubmitSearch()
				{
				var citySelect = document.getElementById('City');
				var number = citySelect.selectedIndex;
				if(citySelect.options[number].value == "")
					return;
				var newLocation="http://tickets.tickethub.co/ResultsCity.aspx?city=";
				newLocation += citySelect.options[number].text.split(",")[0]+"&stprvid="+citySelect.options[number].value+"&location="+citySelect.options[number].text;

				//newLocation+="&sdate="+document.getElementById("txtEventDateStart").value + "&edate="+document.getElementById("txtEventDateEnd").value;

				window.location=newLocation;
				}

				//-->
				</script>

				</div>
		<?php the_content(); ?>
	</main>
</div>
<?php get_footer(); ?> 