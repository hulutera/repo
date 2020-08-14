<?php
/**/
function leftcolumn()
{
	echo '<!--#### LEFT COLUMN ##### -->
			<div id="leftColumn">
				<div id="listleftcol" >
				    <ul id ="leftcol"> ';
	carSubCat();
	houseSubCat();
	computerSubCat();
	phoneSubCat();
	electronicsSubCat();
	householdsSubCat();
	othersSubCat();
	echo '
		           </ul>
			    </div>
			</div>
			';
}
// To put sub catagory for Car
function carSubCat()
{
	echo '
<li> <a rel="canonical"  href="#">Car</a>

    <ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Small Car\', \'car\' )">Small Car</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Pick Up\', \'car\')">Pick up</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Truck\',\'car\')">Truck</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Mini_bus\', \'car\')">Mini_bus</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Station Wagon\', \'car\')">Station Wagon</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Heavy Machine\', \'car\')">Heavy Machine</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Full Size Van\', \'car\')">Full Size Van</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Hatch back\', \'car\')">Hatch back</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Lift back\', \'car\')">Lift back</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Compact Car\', \'car\')">Compact Car</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Sport Car\', \'car\')">Sport Car</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Luxury Car\', \'car\')">Luxury Car</a></li>
        <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Convertible\', \'car\')">Convertible</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'SUV\', \'car\')">SUV</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Taxi/Buses\', \'car\')">Taxi/Buses</a></li>
	</ul>
</li>';
}
// To put sub catagory for House
function houseSubCat()
{
	echo '
<li><a rel="canonical"  href="#">House</a>
	<ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Residential sells\', \'house\')">Residential sells</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Residential Rental\', \'house\')">Residential Rental</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Commercial\', \'house\')">Commercial</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Land\', \'house\')">Plots of Land</a></li>
	</ul>
</li>
';
}
// To put sub catagory for Computer
function computerSubCat()
{
	echo '
<li><a rel="canonical"  href="#">Computer</a>
	<ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Laptop \', \'computer\')">Laptop</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Stationary\', \'computer\')">Stationary</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Notebook\', \'computer\')">Notebook</a></li>
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Workstations\', \'computer\')">Workstations</a></li>
	</ul>
</li>
';
}
// To put sub catagory for phone
function phoneSubCat()
{
	echo '
<li> <a rel="canonical"  href="#">Phone</a>
	<ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Mobile\', \'phone\')">Mobile</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Fixed phone\', \'phone\')">Fixed phone</a></li>

	</ul>
</li>
';
}
// To put sub catagory for electronics
function electronicsSubCat()
{
	echo '
<li> <a rel="canonical"  href="#">Electronics</a>
	<ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'TV\', \'electronics\')">TV</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Camera\', \'electronics\')">Camera</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Fridge\', \'electronics\')">Fridge</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Watch\', \'electronics\')">Watchs</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Tape/Radio\', \'electronics\')">Tape/Radio</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Headphone/earphone\', \'electronics\')">Head/Ear phones</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Game\', \'electronics\')">Video Games</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Other electronics\', \'electronics\')">other electronics</a></li>

	</ul>
</li>
';
}
// To put sub catagory for household
function householdsSubCat()
{
	echo '
<li> <a rel="canonical"  href="#">Household</a>
	<ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Furniture\',\'household\')">Furniture</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Kitchen Stuff\',\'household\')">Kitchen Stuff</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Shower Stuff\',\'household\')">Shower Stuff</a></li>
	    <li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'Other households\',\'household\')">Other households</a></li>


	</ul>
</li>
';
}
// To put sub catagory for Others
function othersSubCat()
{
	echo '
<li> <a rel="canonical"  href="#">Others</a>
	<ul id ="submenu">
		<li><a rel="canonical"  href="javascript:void(0)" onclick="jsfunctionsubmenu(\'%\', \'others\')">Other items</a></li>

	</ul>
</li>
';
}
// To put right contents
function rightcolumn()
{
	echo '
<!--#### RIGHT COLUMN ##### -->
	<div id="rightColumn">
		<div class ="logo"><a rel="canonical"  href="../index.php"><img src="http://static.hulutera.com/images/mytest2.gif"></a></div>
	</div>
';
}
