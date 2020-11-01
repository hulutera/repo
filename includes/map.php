<?php
// show mapped page
function showMap()
{
	//918 800
	echo '<!!----SVG for bigger screens----!!>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-big-sc" width="918" height="800" viewbox="0 0 1471.67 1150.63">';
	svgMapElement();
	echo '</svg>';
	echo '<!!----SVG for mid screens----!!>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-mid-sc" width="918" height="800" viewbox="0 0 1800 1400">';
	svgMapElement();
	echo '</svg>';
	echo '<!!----SVG for small screens----!!>
		<svg xmlns="http//www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-small-sc" width="1000" height="800" viewbox="0 0 2400 1800">';
	svgMapElement();
	echo '</svg>';
}
function svgMapElement2()
{
	global $str_url;
	$base_link = '../includes/adverts.php?item=All&search_text=&cities=';
	echo '
	<defs>
	<style>.cls-1{fill:#f2e4df;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:4px;}.cls-2{fill:red;}.cls-12,.cls-16,.cls-18,.cls-20,.cls-24,.cls-26,.cls-28,.cls-3,.cls-31,.cls-34,.cls-37,.cls-39,.cls-41,.cls-45,.cls-47,.cls-50,.cls-53,.cls-55,.cls-57,.cls-59,.cls-6,.cls-61,.cls-63,.cls-65,.cls-68,.cls-70,.cls-72{stroke:#231f20;stroke-miterlimit:10;}.cls-3{fill:url(#linear-gradient);}.cls-4{font-size:51.59px;}.cls-4,.cls-7{font-family:BebasNeue-Regular, Bebas Neue;}.cls-5{fill:url(#radial-gradient-2);}.cls-6{fill:url(#linear-gradient-2);}.cls-7{font-size:40px;}.cls-8{letter-spacing:0em;}.cls-9{letter-spacing:0em;}.cls-10{letter-spacing:-0.05em;}.cls-11{fill:url(#radial-gradient-3);}.cls-12{fill:url(#linear-gradient-3);}.cls-13{letter-spacing:0em;}.cls-14{letter-spacing:-0.01em;}.cls-15{fill:url(#radial-gradient-4);}.cls-16{fill:url(#linear-gradient-4);}.cls-17{fill:url(#radial-gradient-5);}.cls-18{fill:url(#linear-gradient-5);}.cls-19{fill:url(#radial-gradient-6);}.cls-20{fill:url(#linear-gradient-6);}.cls-21{letter-spacing:0em;}.cls-22{letter-spacing:0em;}.cls-23{fill:url(#radial-gradient-7);}.cls-24{fill:url(#linear-gradient-7);}.cls-25{fill:url(#radial-gradient-8);}.cls-26{fill:url(#linear-gradient-8);}.cls-27{fill:url(#radial-gradient-9);}.cls-28{fill:url(#linear-gradient-9);}.cls-29{letter-spacing:0em;}.cls-30{fill:url(#radial-gradient-10);}.cls-31{fill:url(#linear-gradient-10);}.cls-32{letter-spacing:0em;}.cls-33{fill:url(#radial-gradient-11);}.cls-34{fill:url(#linear-gradient-11);}.cls-35{letter-spacing:0em;}.cls-36{fill:url(#radial-gradient-12);}.cls-37{fill:url(#linear-gradient-12);}.cls-38{fill:url(#radial-gradient-13);}.cls-39{fill:url(#linear-gradient-13);}.cls-40{fill:url(#radial-gradient-14);}.cls-41{fill:url(#linear-gradient-14);}.cls-42{letter-spacing:-0.02em;}.cls-43{letter-spacing:0em;}.cls-44{fill:url(#radial-gradient-15);}.cls-45{fill:url(#linear-gradient-15);}.cls-46{fill:url(#radial-gradient-16);}.cls-47{fill:url(#linear-gradient-16);}.cls-48{letter-spacing:0.01em;}.cls-49{fill:url(#radial-gradient-17);}.cls-50{fill:url(#linear-gradient-17);}.cls-51{letter-spacing:0em;}.cls-52{fill:url(#radial-gradient-18);}.cls-53{fill:url(#linear-gradient-18);}.cls-54{fill:url(#radial-gradient-19);}.cls-55{fill:url(#linear-gradient-19);}.cls-56{fill:url(#radial-gradient-20);}.cls-57{fill:url(#linear-gradient-20);}.cls-58{fill:url(#radial-gradient-21);}.cls-59{fill:url(#linear-gradient-21);}.cls-60{fill:url(#radial-gradient-22);}.cls-61{fill:url(#linear-gradient-22);}.cls-62{fill:url(#radial-gradient-23);}.cls-63{fill:url(#linear-gradient-23);}.cls-64{fill:url(#radial-gradient-24);}.cls-65{fill:url(#linear-gradient-24);}.cls-66{letter-spacing:0em;}.cls-67{fill:url(#radial-gradient-25);}.cls-68{fill:url(#linear-gradient-25);}.cls-69{fill:url(#radial-gradient-26);}.cls-70{fill:url(#linear-gradient-26);}.cls-71{fill:url(#radial-gradient-27);}.cls-72{fill:url(#linear-gradient-27);}.cls-73{font-family:BebasNeue-Regular, Bebas Neue;}.cls-73{font-size:50px;}</style>
	<radialGradient id="radial-gradient" cx="559.65" cy="605.25" r="11.67" gradientTransform="translate(-280.33 48.15) scale(1.51 0.92)" gradientUnits="userSpaceOnUse">
		<stop offset="0" stop-color="#f1f2f2"/>
		<stop offset="0.09" stop-color="#d9dada"/>
		<stop offset="0.26" stop-color="#b2b3b5"/>
		<stop offset="0.42" stop-color="#949597"/>
		<stop offset="0.58" stop-color="#7e7f82"/>
		<stop offset="0.74" stop-color="#717275"/>
		<stop offset="0.88" stop-color="#6d6e71"/>
	</radialGradient>
	<linearGradient id="linear-gradient" x1="543.84" y1="582.17" x2="588.77" y2="537.24" gradientUnits="userSpaceOnUse">
		<stop offset="0.16" stop-color="#fff33b"/>
		<stop offset="0.19" stop-color="#fee72e"/>
		<stop offset="0.25" stop-color="#fed51b"/>
		<stop offset="0.32" stop-color="#fdca10"/>
		<stop offset="0.39" stop-color="#fdc70c"/>
		<stop offset="0.69" stop-color="#f3903f"/>
		<stop offset="0.83" stop-color="#ed683c"/>
		<stop offset="0.96" stop-color="#e93e3a"/>
	</linearGradient>
	<radialGradient id="radial-gradient-2" cx="717.12" cy="452.75" r="9.42" gradientTransform="translate(-280.33 -78.46) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-2" x1="785.88" y1="319.67" x2="822.15" y2="283.4" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-3" cx="768.16" cy="553.81" r="9.42" gradientTransform="translate(-280.33 5.44) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-3" x1="862.99" y1="496.51" x2="899.26" y2="460.25" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-4" cx="780.25" cy="592.43" r="6.69" gradientTransform="translate(-280.33 37.5) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-4" x1="886.25" y1="569.39" x2="912.02" y2="543.61" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-5" cx="580.6" cy="336.71" r="9.42" gradientTransform="translate(-280.33 -174.81) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-5" x1="579.62" y1="116.59" x2="615.89" y2="80.32" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-6" cx="550.87" cy="304.78" r="7.94" gradientTransform="translate(-280.33 -201.32) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-6" x1="537.42" y1="63.59" x2="567.97" y2="33.03" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-7" cx="606.3" cy="291.48" r="7.94" gradientTransform="translate(-280.33 -212.36) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-7" x1="621.16" y1="40.32" x2="651.72" y2="9.76" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-8" cx="476.12" cy="405.31" r="8.41" gradientTransform="translate(-280.33 -117.85) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-8" x1="423.6" y1="238.61" x2="455.99" y2="206.21" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-9" cx="460.75" cy="451.16" r="9.42" gradientTransform="translate(-280.33 -79.79) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-9" x1="398.54" y1="316.87" x2="434.8" y2="280.6" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-10" cx="311.29" cy="516.25" r="9.42" gradientTransform="translate(-280.33 -25.75) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-10" x1="172.73" y1="430.78" x2="209" y2="394.51" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-11" cx="277.02" cy="655.91" r="9.42" gradientTransform="translate(-280.33 90.21) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-11" x1="120.95" y1="675.19" x2="157.22" y2="638.92" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-12" cx="422.42" cy="597.46" r="7.94" gradientTransform="translate(-280.33 41.68) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-12" x1="343.35" y1="575.79" x2="373.91" y2="545.24" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-13" cx="476.27" cy="602.91" r="7.94" gradientTransform="translate(-280.33 46.21) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-13" x1="424.71" y1="585.33" x2="455.26" y2="554.77" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-14" cx="508.83" cy="518.49" r="7.94" gradientTransform="translate(-280.33 -23.89) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-14" x1="473.9" y1="437.58" x2="504.46" y2="407.02" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-15" cx="622.87" cy="568.89" r="7.94" gradientTransform="translate(-280.33 17.96) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-15" x1="646.2" y1="525.79" x2="676.75" y2="495.23" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-16" cx="590.6" cy="642.15" r="6.82" gradientTransform="translate(-280.33 78.79) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-16" x1="599.49" y1="656.17" x2="625.74" y2="629.93" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-17" cx="616.08" cy="667.18" r="9.42" gradientTransform="translate(-280.33 99.56) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-17" x1="633.22" y1="694.91" x2="669.49" y2="658.65" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-18" cx="427.33" cy="664.93" r="7.94" gradientTransform="translate(-280.33 97.69) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-18" x1="350.77" y1="693.85" x2="381.32" y2="663.29" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-19" cx="532.09" cy="728.95" r="9.42" gradientTransform="translate(-280.33 150.85) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-19" x1="506.32" y1="803.01" x2="542.59" y2="766.74" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-20" cx="483.05" cy="733.4" r="6.66" gradientTransform="translate(-280.33 154.55) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-20" x1="437.29" y1="816.17" x2="462.92" y2="790.54" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-21" cx="639.5" cy="741" r="6.66" gradientTransform="translate(-280.33 160.85) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-21" x1="673.66" y1="829.46" x2="699.29" y2="803.83" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-22" cx="478.79" cy="700.23" r="6.66" gradientTransform="translate(-280.33 127.01) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-22" x1="430.86" y1="758.12" x2="456.49" y2="732.5" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-23" cx="561.43" cy="707.27" r="6.66" gradientTransform="translate(-280.33 132.85) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-23" x1="555.71" y1="770.45" x2="581.34" y2="744.82" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-24" cx="526.76" cy="759.81" r="6.66" gradientTransform="translate(-280.33 176.47) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-24" x1="503.34" y1="862.38" x2="528.97" y2="836.75" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-25" cx="464.04" cy="794.3" r="7.94" gradientTransform="translate(-280.33 205.1) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-25" x1="406.23" y1="920.25" x2="436.78" y2="889.69" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-26" cx="604.25" cy="474.05" r="7.94" gradientTransform="translate(-280.33 -60.78) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-26" x1="618.07" y1="359.82" x2="648.62" y2="329.26" xlink:href="#linear-gradient"/>
	<radialGradient id="radial-gradient-27" cx="827.62" cy="556.09" r="7.94" gradientTransform="translate(-280.33 7.33) scale(1.51 0.92)" xlink:href="#radial-gradient"/>
	<linearGradient id="linear-gradient-27" x1="955.55" y1="503.38" x2="986.1" y2="472.83" xlink:href="#linear-gradient"/>
</defs>
<g id="Layer_2" data-name="Layer 2">
	<g id="ethiopia-border">
		<path class="cls-1" d="M17.81,684.4,21,681.63v-2.38l-1.58-1-1.59-3.16,3.17-2,1.78-.79v-3.76H20.29L17.81,666l1-2.77,1.49-2-2.48-2,1-2.76h2.57L24,650.57,30.08,652l3,1,5.54-.39,10.09.2v-3.17l3.36-1,1,4.16,5.94-.6v-1.78l4.35-.59v3.76l3.76,3,3,4.15,4.75-.59,1.58-2.38,4-3L88,653.54,94,654.72l3-2.37,5.34-4.75,8.31-10.48-3.16-95.74,1.58-8.7,3.36-9.69,2.18-6.73,2.77-9.1,3.56-7.31.79-4.75,2.18-3.36L127.2,490l1.18-3,3.17-1.58-2.57-5,2.57-2.37L127,440.51l12.07-15.63v-3.17l14.83-12.26h4.15l14.64,13.45v6.53l3.17-.4,1.38-4.15,4.95-.2,1-2.57,1.58-.4v-4.35l2.37-.79,5.94-5.54.79-6.13h-2.38l-2-3.16.19-3.56L197,381V378.2l-1.58-2.77-3.36-2.57-.4-2,14.84-32.05-1.59-3.36-3.16-4.15,1-11.47,2.77-5.74,6.33-3.36,7.71-2.77,3.56-5v-3.36l5.14-3.56,3-2.77v-6.13l2-6.13,3-2.18,3.16-1v-6.33l20.38-33.82,4.15-1,1-5.54,26.7-5.34h10.09v1.58l7.32-.2v-4.74l1.38-5.54v-4l1.19-2.57-1.39-3.36-2.37-1.58-.39-2.38,4.15-4.15v-4l-2.18-1.38.6-3,1.58-2.37,1.78-7.91,3.16-7.52V165l3.37-4.35,15-22.75V128l2.77-4.16,1.78-4.74,2.77-5.15v-8.11l-2.57-2.37-.6-5.74L348.14,69h2.57l1.59-3.76h4.15l2.18-2.37,9.69,1,.79-2.57,16.22,1.19.79,3.16h4.55l1.38,3.76,2.38-.4,2-2,4.55.2,3.16-4V55.38l1.78-1V52h3.36V49.85h15.43l1.39,3.56,2.77,3,3.36,3.37v6.13l3,.2v3.16l3.36.4,1.38,3.16v1.58l4.16,1.19v6.13l3,2.38,2.18,1.58L482.05,6.72l2.77,3.57,1.39,3.16H488V18.4l3.36.19,1.39,4.35,4.55.6,3.36,1.38,3,2.18,2.57-.4,8.11-.19v2.76l2.37.2v5.74l2.18-.79,1,2.37,1-.79v6.13l9.5,5.74v3.76l3.16.39V53.6l15.43-1,6.93-1.39.79-3.76,3,1,2.18,1.78,7.52-2s1.18-3,2-2.57,8.11-.39,8.11-.39l11.48-8.71V29.87l6.33.39,4,2.57,2.77,3.57,2.57,3.75,1,3.17v2.77l1.78,2.17,1,2.18,4,.39V48.26l3.56-3h3.56l1.78,1.78,4.35.19,1-1.58,5.14-.39,5.94-3.17.79-2.37V38l1.58.2,2,.19v1.78l3.56,2,2.37,2.38,3.17.19,1,1.78,8.5-.59V43.71l4.15.2,3.17,3,4.94,2.57,2.77,3,5.34-.4,1.59-2,2.37-1.38,5.34.39h3.56l7.12-.19,3,2.37,3.56.2,6.92,3.76,8.71,9.1L729.51,68,735,70.62l7.32,3.56,3.57,2.57,7.11.79,6.33,1,5.54,2,3.56,2L772,87l4,5.54,5.93,6.73,5.74,5.93,4.35,6.33,2.37,4.75,4,6.72,3.76,4.35,2,4.75,2.37,4.16,9.69,6.72,5.74,2.37,7.71,5.34,6.53,3.76,10.68,8.71,5.15,4.74,8.5,7.92,5.54,7.51,2.57,5.34,2.57,6.53,1.78,4.55,1.78,2.77,2.57,3.76,2.38,3.36,2.57,2.57,3.16,1.58,3.56,2,3.76,1.19,3,1,2.37.59,3.37,3.76,20,27.1-4.55,7.51-2.77,5.94-4.94,6.53L898,286l-3.16,2.57-3.17,5.54-6.92,10.09-4.94,9.49-7.72,3.37-.39,3.36-6.33,1L864,325.58l.2,7.12-3,4.16-1.19,6.72.8,8.9,1.58,5.34.79,4.16.59,29.67-.39,3.76L859.86,398l1,1.38,7.51,1.39s5.54,1,6.13,1.18a28.7,28.7,0,0,1,3,1.78l5.34-.79,6.53.2,2.18-3.16,3.16-1.39,6.73-.2,2-.19,1.19,1.58,4.15-.79,1.59-2,4.15-.2L918,395l5.74,2,2.77-1.58,5.14-3.37,6.72-1.58,1-2,6.33.79,6.14.6,4.15,2.37,3,2.18,1.18,3,2.18,2.18,4.15-1.19,3.17,2.18,3-2.37,1.92-.86-.53,2.44-2,3,.59,3-2.37.79h-4l-1.38,3.76-1.38,3v3.16L960,418.15l-3.37,1.78-1,4.95-.39,4.94-3.56,2.58-3.56.79.19,3.36,1.59,4.55,2.17,3.76,5.15,4.15,3.75,4.35,1.59,3.17v7.71l1.38,4.55,1.58,5.34,2,4.35,5.34,3.76,4.55,2.57,2.77,2a21.82,21.82,0,0,1,2.77,3c.4.79,2.37,3.76,2.37,3.76v4.74l2,4.55,3.56,4.35,5,.6,3.36-.2,2.18.4,1.58,3.16,2.37,4.55-2.17.79,2.17,4.55v4.15l2.57,7.72,3,1.78,3.56.39v3.76l2.18,2.38,3.75,1.58,2,3.76v7.91l16.22,10.48,2.18-1.58,2.77-.2,2.17.79,1.19,2.58,34,30.65,293.74,100.29h96.13L1311.24,850.94,1282,881.41l-26.51,29.67-82.28,90.59-95.34-5.93-12.27,5.93-18.2,4.35h-14.24l-9.49,7.91-12.27,4.75-11.07,4-12.27,8.7-11.47,9.1-1.58,6.33-1.19,5.14-1.58,3.17-2,2.37-4,2.37-5.14,2.38-10.28,2.37-11.87,2H925.53l-7.12,2.77h-21l-21.36,14.24v5.93l-7.52,5.94-5.54-2.38-2.77-2.37-6.33-.39-2.77,2.37-4.35.79-1.58-4.35-2.37,2.37-3.3,1.45-5.28.66-2.63.27-1.06,1.58-6.59.92H804.34l-4.48-.79-1.72-2.24-2.24-2-3.69-3.43-3.56-4.88-4.22-4.88-5.28-.79-5.14-7.51-5.27-2.91-5-5.53-7.13,5.4-5.67,1.85-5,1.85-6.07,2.24-4.35,1.84-5.67,1.72-3.3,2.11-2.11,1.58-1.06,2-2.63.66-2.11.13-2.64.66-3,1.32-2.51.66-2.9,1.31-2.37.27-4.06,2.8-24.63,12.07-2.67,1.18-1.58,2.18-1,1.68-1,1.78-1,3.17-.59,2.37-.59,2.08-.89,3.06s-1.39.89-1.49,1.29-1.78,3.36-1.78,3.36l-16.81,15.73-1.09,1.38-.39,2.28-.69,2.27.09,1.19-1.78,2.07-1.58.7-2.47-.8-1.48-1.78-.5-2.07-1.38-1-1.39-.89-2.08-.3h-8l-2.17-.49v-2.08l-2.28-1-2,.69-1.29,1.78-2.18,1.59-4-.6-3-.49-3.46-2.08-4.35-1.88-1.78-.79-3.37.1H590l-4.06.49-4-.09-3.76-.6-4.16-.79-3.36-.69-4.65-1.48-3.36-1.59-2.67-2-.89-2.37-.4-1.09-2,.2-.7,2-1,1.28-2.28.1-1.29-.59-.39-1-2.57-.59-1.78.29-1.39-1.68-.79-.89-.79-1.28L543,1124l-1.29.4-1,1.48-.29,2.27-2.67.8-5.44.59-10.49-.1-1.38-1h-7.52l-3.86.1-2.57.1-3.16-.3-2.28-.49-.69-1.49-2.47-.29-3.07-2.18-1.38-2.47-1.68-2.28-1.68-2.07L489,1115.9l-85.35-55.19-.7-1.48-.49-1.58-1.78-.5-2.08-.1-1.38-1.78-.79-1.38-1.68-.3-2.58-.19-1.48-1.19-2.08-.79-.69-1.09-1.68-.69-1.88-.7-1.78.1-1.78-1-1.29-.49-13.05-.2-4.55-.49H359l-6.53-.1-30.95-.1-9.89.2-13.25-.5-1.49-1.08-2.57-2.18-1.09-1.19-2.77-1.58-.19-1.48-.2-1.68v-1.39s.29-1.68.39-2a8.18,8.18,0,0,0,0-1.58l-1.18-1.68-16.62-20-.49-25.32,1.88-1.48,1.18-1.19.79-1.18,1-1.09.7-1.68v-5.15l-1.59-.69-.69-1.78L274,969.33l-.5-1.39.3-1.87,1.28-1,1-.2.8-1.19.89-.59.09-1.29-.09-1.38-1.09-.4-2-.59-2.18-1.09-2-1.88-2-.59-2-1.09-2-.3L262.2,953l-1.78-.1-.89,1.19-.6,1.09-2.07.59-2.48-.49-1.28-1.39L252,953l-1.88-1.38-1.38-1.49-2.18-.89-3.66-.49-1.78.79L239,950l-6.63,6.43-1.68,1h-1.58l-1.39-.79-1.19-1.19-1.28-2.07-1-1.49-.89-1.28L222,949.15l.5-1.48.59-.69.5-.3.69-.39,1-.8.2-.69.09-1-.09-1.88-1-.39L207.6,930.07l-1.18-2.28.29-2.87-.29-2.87-10.68-14.63-.3-2.48.69-1.48.69-.49.3-1.39-.49-1.38-2.08-.89-.69-.5-.89-1.48,1.18-2.08.6-.49,1.38-.3.5-1.48-1.19-1.29-.69-3.36v-1.88l-7.12-8.8-.89-2.57-1.19-2-1-2.77-2.37-1.58-.1-3.27.49-5.14-1-3.07-1.48-2.07-1.09-2-.49-1.48L177,849.26l-.6-2,.1-2.08.3-2.18-.6-.89-.89-1.28-.79-1-.59-1.19-.4-2.27v-2.08l-1.28-3.56-.89-1.58-.79-.89-1.29-2.38-.59-1.28s-.69.49-1.19,0-1.58-1.78-1.58-1.78l-1.68-.5-1-.69-2-1.38-4.55.09-4.75-.49-.29-1-1.39-1-.29-1.58-.5-1.58.69-1.29,1.19-.2.4-2.17.49-1v-1.88L150,806.14l-1.39-1.58-1.88-1.09-.49-.39-2.28-1.78-2.77-1.49h-1.58l-2.37-.19-1.68-1-2.67-.7-2.48-.89-1.88-.29-2.27-1.68-.69-2-2-1.09-1.29-.79-2.47-2.08-1.09-1.78.4-1.28.49-1,.3-1.68-.69-1.39-.79-1.58-.7-1.49-.19-1.08-1.78-.4-1.88.2-2-.1-1.49-.49-7.22-7.52L103,757,86.25,739.58,83,739.19,80.12,738l-6.63-6.73-1.08-2.37-4.26-.79-1.88-1-.39-.79L64,725.24l-2.27.2-1.39.59-.89.69-3.86-.39-.89-2-1.78-1.88-1.68-.79-1.48.2-1.49-1.58-5.93-.3-1.88.1-1.68.49-.89,1-1.58,1.29-3.66-.1-1.49-.2-.69-.89-.39-.79L28.4,719.7l-1.09-1.38-1-1.19-2.18-.1-1.58-.49-.79-1-2.28-.2-1.18-.69-.5-.89-1.78.3v.69l-1.08.49-.8.69c-.49.8-2.86.89-2.86.89l-1-1.38V715l-2.08-.89-2,.19v-1.48l-.79-.69-1.09-2.28L3.87,708l-1.39.2v-2.67L1,705.46v-2.08L1.4,702l1.87-.59,1.49-2.08-.3-1.09.1-2L5.85,695l1.68-1.39,1-1.18,2.17-1.59.89-1.38.4-1.39.69-1.08.79-1,.69-.4.8-.29,1,.29,1.69-.2Z"/>
    </g>

	<g id="cities">
	    <a href="' . $base_link . 'Addis Ababa' . $str_url . '" class="cities-aa">
		<g id="addis-ababa">
			<circle class="cls-2" cx="566.3" cy="604.63" r="24.2"/></circle>
			<text class="cls-4" transform="translate(596.48 616.23) scale(1.02 1)">' . $GLOBALS['city_lang_arr']['Addis Ababa'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Asaita' . $str_url . '" class="cities">
		<g id="asaita">
			<circle class="cls-5" cx="804.01" cy="337.8" r="19.54"/></circle>
			<text class="cls-7" transform="translate(765.41 374.72)">' . $GLOBALS['city_lang_arr']['Asaita'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Dire Dawa' . $str_url . '" class="cities">
		<g id="dire-dawa">
			<circle class="cls-11" cx="881.12" cy="514.65" r="19.54" ry="5.59"/></circle>
			<text class="cls-7" transform="translate(733.66 506.19)">' . $GLOBALS['city_lang_arr']['Dire Dawa'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Harar' . $str_url . '" class="cities">
		<g id="harar">
			<circle class="cls-15" cx="899.13" cy="582.28" r="13.89" ry="3.97"/></circle>
			<text class="cls-7" transform="translate(861.58 617.56)">' . $GLOBALS['city_lang_arr']['Harar'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Mekele' . $str_url . '" class="cities">
		<g id="mekele">
			<circle class="cls-17" cx="597.76" cy="134.73" r="19.54" ry="5.59"/></circle>
			<text class="cls-7" transform="translate(553.68 170.58)">' . $GLOBALS['city_lang_arr']['Mekele'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Axum' . $str_url . '" class="cities">
		<g id="axum">
			<circle class="cls-19" cx="552.69" cy="78.87" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(483.02 114.89)">' . $GLOBALS['city_lang_arr']['Axum'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Adigrat' . $str_url . '" class="cities">
		<g id="adigrat">
			<circle class="cls-23" cx="636.44" cy="55.59" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(636.44 90.63)">' . $GLOBALS['city_lang_arr']['Adigrat'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Gonder' . $str_url . '" class="cities">
		<g id="gonder">
			<circle class="cls-25" cx="439.79" cy="254.8" r="17.45" ry="4.99"/></circle>
			<text class="cls-7" transform="translate(439.79 290.05)">' . $GLOBALS['city_lang_arr']['Gonder'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Bahir Dar' . $str_url . '" class="cities">
		<g id="bahir-dar">
			<circle class="cls-27" cx="416.67" cy="335.01" r="19.54" ry="5.59"/></circle>
			<text class="cls-7" transform="translate(351.79 372.12)">' . $GLOBALS['city_lang_arr']['Bahir Dar'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Asossa' . $str_url . '" class="cities">
		<g id="asossa">
			<circle class="cls-30" cx="190.86" cy="448.92" r="19.54" ry="5.59"/></circle>
			<text class="cls-7" transform="translate(143.57 488.16)">' . $GLOBALS['city_lang_arr']['Asossa'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Gambela' . $str_url . '" class="cities">
		<g id="gambela">
			<circle class="cls-33" cx="139.09" cy="693.32" r="19.54" ry="5.59"/></circle>

			<text class="cls-7" transform="translate(84.68 732.57)">' . $GLOBALS['city_lang_arr']['Gambela'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Nekemte' . $str_url . '" class="cities">
		<g id="nekemte">
			<circle class="cls-36" cx="358.63" cy="591.07" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(248.34 626.59)">' . $GLOBALS['city_lang_arr']['Nekemte'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Ambo' . $str_url . '" class="cities">
		<g id="ambo">
			<circle class="cls-38" cx="439.99" cy="600.61" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(406.33 635.82)">' . $GLOBALS['city_lang_arr']['Ambo'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Debre Markos' . $str_url . '" class="cities">
		<g id="debre-markos">
			<circle class="cls-40" cx="489.18" cy="452.86" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(404.66 488.16)">' . $GLOBALS['city_lang_arr']['Debre Markos'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Debre Birhan' . $str_url . '" class="cities">
		<g id="debre-birhan">
			<circle class="cls-44" cx="661.47" cy="541.07" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(677.93 561.63)">' . $GLOBALS['city_lang_arr']['Debre Birhan'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Bishoftu' . $str_url . '" class="cities">
		<g id="bishoftu">
			<circle class="cls-46" cx="612.62" cy="669.3" r="14.14" ry="4.04"/></circle>
			<text class="cls-7" transform="translate(483.02 684.62)">' . $GLOBALS['city_lang_arr']['Bishoftu'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Adama' . $str_url . '" class="cities">
		<g id="adama">
			<circle class="cls-49" cx="651.36" cy="713.05" r="19.54" ry="5.59"/></circle>
			<text class="cls-7" transform="translate(670.89 724.73)">' . $GLOBALS['city_lang_arr']['Adama'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'JImma' . $str_url . '" class="cities">
		<g id="jimma">
			<circle class="cls-52" cx="366.04" cy="709.13" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(271.58 704.42)">' . $GLOBALS['city_lang_arr']['Jimma'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Hawassa' . $str_url . '" class="cities">
		<g id="hawassa">
			<circle class="cls-54" cx="524.45" cy="821.14" r="19.54" ry="5.59"/></circle>
			<text class="cls-7" transform="translate(543.99 834.69)">' . $GLOBALS['city_lang_arr']['Hawassa'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Sodo' . $str_url . '" class="cities">
		<g id="sodo">
			<circle class="cls-56" cx="450.1" cy="828.99" r="13.81" ry="3.95"/></circle>
			<text class="cls-7" transform="translate(366.04 834.69)">' . $GLOBALS['city_lang_arr']['Sodo'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Asella' . $str_url . '" class="cities">
		<g id="asella">
			<circle class="cls-58" cx="686.47" cy="842.27" r="13.81" ry="3.95"/></circle>
			<text class="cls-7" transform="translate(676.65 877.42)">' . $GLOBALS['city_lang_arr']['Asella'] . '</text>		</g>
		</a>
		<a href="' . $base_link . 'Hosaena' . $str_url . '" class="cities">
		<g id="hosaena">
			<text class="cls-7" transform="translate(317.7 774.89)">' . $GLOBALS['city_lang_arr']['Hosaena'] . '</text>
			<circle class="cls-60" cx="443.67" cy="770.94" r="13.81" ry="3.95"/></circle>
		</g>
		</a>
		<a href="' . $base_link . 'Shashemene' . $str_url . '" class="cities">
		<g id="shashemene">
			<text class="cls-7" transform="translate(582.34 779.31)">' . $GLOBALS['city_lang_arr']['Shashemene'] . '</text>
			<circle class="cls-62" cx="568.53" cy="783.26" r="13.81" ry="3.95"/></circle>
		</g>
		</a>
		<a href="' . $base_link . 'Dila' . $str_url . '" class="cities">
		<g id="dila">
			<circle class="cls-64" cx="516.15" cy="875.19" r="13.81" ry="3.95"/></circle>
			<text class="cls-7" transform="translate(489.18 910.34)">' . $GLOBALS['city_lang_arr']['Dila'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Arba Minch' . $str_url . '" class="cities">
		<g id="arba-minch">
			<circle class="cls-67" cx="421.51" cy="935.53" r="16.46" ry="4.71"/></circle>
			<text class="cls-7" transform="translate(350.87 974.34)">' . $GLOBALS['city_lang_arr']['Arba Minch'] . '</text>
		</g>
		</a>
		<a href="' . $base_link . 'Dessie' . $str_url . '" class="cities">
		<g id="dessie">
			<text class="cls-7" transform="translate(590.51 413.89)">' . $GLOBALS['city_lang_arr']['Dessie'] . '</text>
			<circle class="cls-69" cx="633.34" cy="375.09" r="16.46" ry="4.71"/></circle>
		</g>
		</a>
		<a href="' . $base_link . 'Jijiga' . $str_url . '" class="cities">
		<g id="jijiga">
			<text class="cls-7" transform="translate(932.59 557.77)">' . $GLOBALS['city_lang_arr']['Jijiga'] . '</text>
			<circle class="cls-71" cx="970.82" cy="518.66" r="16.46" ry="4.71"/></circle>
		</g>
		</a>
		<text class="cls-73" transform="translate(800.74 50)">' . $GLOBALS["lang"]["select city from map"] . '</text>
	</g>
</g>
';
}

function svgMapElement()
{
	echo '
    <defs>
        <style>.cls-1{fill:#f2e4df;stroke:#c49a6c;stroke-linecap:round;stroke-linejoin:round;}.cls-2{fill:#1c75bc;}.cls-3{font-size:31px;}.cls-3,.cls-6{font-family:ProximaNova-Extrabld, Proxima Nova;}.cls-4{fill:#be4652;}.cls-5{letter-spacing:-0.02em;}.cls-6{font-size:38px;}</style>
    </defs>
    <g id="Layer_2" data-name="Layer 2">
        <g id="ethiopia-border-final">
            <path class="cls-1" d="M17.31,750.52l3.17-2.77v-2.37l-1.58-1-1.59-3.17,3.17-2,1.78-.8V734.7H19.79l-2.48-2.58,1-2.77,1.49-2-2.48-2,1-2.77h2.57l2.58-5.93,6.13,1.38,3,1,5.54-.4,10.09.2v-3.16l3.36-1,1,4.15,5.94-.59V716.5l4.35-.6v3.76l3.76,3,3,4.15,4.75-.59,1.58-2.37,4-3,7.71-1.19,5.94,1.19,3-2.37,5.34-4.75,8.31-10.48-3.16-95.74,1.58-8.7,3.36-9.7,2.18-6.72,2.77-9.1,3.56-7.32.79-4.75,2.18-3.36,3.36-1.78,1.18-3,3.17-1.58-2.57-4.94,2.57-2.38-4.55-37.58L138.57,491v-3.16l14.83-12.27h4.15L172.19,489v6.52l3.17-.39,1.38-4.16,4.95-.19,1-2.58,1.58-.39v-4.35l2.37-.79,5.94-5.54.79-6.13H191l-2-3.17.19-3.56,7.32-17.21v-2.77l-1.58-2.77L191.58,439l-.4-2L206,405l-1.59-3.36-3.16-4.16,1-11.47,2.77-5.74,6.33-3.36,7.71-2.77,3.56-4.94v-3.37l5.14-3.56,3-2.77v-6.13l2-6.13,3-2.17,3.16-1v-6.33l20.38-33.83,4.15-1,1-5.54,26.7-5.34h10.09v1.59l7.32-.2v-4.75l1.38-5.54v-3.95l1.19-2.57-1.39-3.37-2.37-1.58-.39-2.37,4.15-4.16v-3.95l-2.18-1.39.6-3,1.58-2.38,1.78-7.91L316,239v-7.91l3.37-4.35,15-22.75V194.1l2.77-4.15,1.78-4.75,2.77-5.14V172l-2.57-2.38-.6-5.73,9.1-28.68h2.57l1.59-3.76H356l2.18-2.37,9.69,1,.79-2.57,16.22,1.19.79,3.16h4.55l1.38,3.76,2.38-.39,2-2,4.55.2,3.16-4v-7.91l1.78-1v-2.37h3.36V116h15.43l1.39,3.56,2.77,3,3.36,3.36V132l3,.2v3.16l3.36.4,1.38,3.17v1.58l4.16,1.18v6.14l3,2.37,2.18,1.58,32.83-78.92,2.77,3.56,1.39,3.16h1.78v5l3.36.2,1.39,4.35,4.55.59,3.36,1.39,3,2.17,2.57-.39,8.11-.2V95.4l2.37.2v5.73l2.18-.79,1,2.38,1-.8v6.14l9.5,5.73v3.76l3.16.4v1.58l15.43-1,6.93-1.39.79-3.75,3,1,2.18,1.78,7.52-2s1.18-3,2-2.57,8.11-.4,8.11-.4l11.48-8.7V96l6.33.4,4,2.57,2.77,3.56,2.57,3.76,1,3.16v2.77l1.78,2.18,1,2.17,4,.4v-2.57l3.56-3h3.56l1.78,1.78,4.35.2,1-1.58,5.14-.4,5.94-3.16.79-2.38V104.1l1.58.2,2,.2v1.78l3.56,2,2.37,2.37,3.17.2,1,1.78,8.5-.6v-2.17l4.15.2,3.17,3,4.94,2.57,2.77,3,5.34-.39,1.59-2,2.37-1.39,5.34.4h3.56l7.12-.2,3,2.37,3.56.2,6.92,3.76,8.71,9.1,4.55,3.76,5.53,2.57,7.32,3.56,3.57,2.57,7.11.79,6.33,1,5.54,2,3.56,2,3.56,4.55,4,5.54,5.93,6.72,5.74,5.93,4.35,6.33,2.37,4.75,4,6.73,3.76,4.35,2,4.75,2.37,4.15,9.69,6.73,5.74,2.37,7.71,5.34,6.53,3.76,10.68,8.7,5.15,4.75L860,242l5.54,7.52,2.57,5.34,2.57,6.52,1.78,4.55,1.78,2.77,2.57,3.76,2.38,3.36,2.57,2.58,3.16,1.58,3.56,2,3.76,1.18,3,1,2.37.6,3.37,3.75,20,27.1-4.55,7.52L913.55,329l-4.94,6.53-11.08,16.62-3.16,2.57-3.17,5.54-6.92,10.08-4.94,9.5-7.72,3.36-.39,3.36-6.33,1-1.39,4.16.2,7.12-3,4.15-1.19,6.73.8,8.9,1.58,5.34.79,4.15.59,29.67-.39,3.76-3.56,2.57,1,1.39,7.51,1.38s5.54,1,6.13,1.19a28.7,28.7,0,0,1,3,1.78l5.34-.79,6.53.2,2.18-3.17,3.16-1.38,6.73-.2,2-.2,1.19,1.58,4.15-.79,1.59-2,4.15-.19,3.56-1.78,5.74,2,2.77-1.58,5.14-3.36,6.72-1.58,1-2,6.33.79,6.14.59,4.15,2.38,3,2.17,1.18,3,2.18,2.17L966,464.5l3.17,2.17,3-2.37,1.92-.86-.53,2.44-2,3,.59,3-2.37.79h-4l-1.38,3.76-1.38,3v3.17l-3.56,1.78-3.37,1.78-1,4.94L954.7,496l-3.56,2.57-3.56.79.19,3.36,1.59,4.55,2.17,3.76,5.15,4.16,3.75,4.35,1.59,3.16v7.72l1.38,4.55,1.58,5.34,2,4.35,5.34,3.76,4.55,2.57,2.77,2a21.61,21.61,0,0,1,2.77,3c.4.79,2.37,3.76,2.37,3.76v4.75l2,4.55,3.56,4.35,5,.59,3.36-.2,2.18.4,1.58,3.17,2.37,4.54-2.17.8,2.17,4.55v4.15l2.57,7.71,3,1.78,3.56.4v3.76l2.18,2.37,3.75,1.58,2,3.76v7.91L1038,631.05l2.18-1.59,2.77-.19,2.17.79,1.19,2.57,34,30.66L1374,763.57h96.13l-159.43,153.5-29.27,30.46L1255,977.2l-82.28,90.59-95.34-5.93-12.27,5.93-18.2,4.36h-14.24l-9.49,7.91-12.27,4.75-11.07,4-12.27,8.7-11.47,9.1-1.58,6.33-1.19,5.15-1.58,3.16-2,2.37-4,2.38-5.14,2.37-10.28,2.38-11.87,2H925l-7.12,2.77h-21l-21.36,14.24v5.94l-7.52,5.93-5.54-2.37-2.77-2.37-6.33-.4-2.77,2.37-4.35.79-1.58-4.35-2.37,2.38-3.3,1.45-5.28.66-2.63.26-1.06,1.58-6.59.93H803.84l-4.48-.8-1.72-2.24-2.24-2-3.69-3.42-3.56-4.88-4.22-4.88-5.28-.79-5.14-7.52-5.27-2.9-5-5.54-7.13,5.41-5.67,1.84-5,1.85-6.07,2.24-4.35,1.85-5.67,1.71-3.3,2.11-2.11,1.58-1.06,2-2.63.66-2.11.13-2.64.66-3,1.32-2.51.66-2.9,1.32-2.37.26-4.06,2.81L676,1168l-2.67,1.19-1.58,2.17-1,1.69-1,1.78-1,3.16-.59,2.37-.59,2.08-.89,3.07s-1.39.89-1.49,1.28-1.78,3.37-1.78,3.37l-16.81,15.72-1.09,1.39-.39,2.27-.69,2.27.09,1.19-1.78,2.08-1.58.69-2.47-.79-1.48-1.78-.5-2.08-1.38-1-1.39-.89-2.08-.29h-8l-2.17-.5v-2.08l-2.28-1-2,.69-1.29,1.78-2.18,1.58-4-.59-3-.5-3.46-2.07-4.35-1.88-1.78-.79-3.37.09h-4.64l-4.06.5-4-.1-3.76-.59-4.16-.79-3.36-.7-4.65-1.48-3.36-1.58-2.67-2-.89-2.37-.4-1.09-2,.2-.7,2-1,1.29-2.28.1-1.29-.6-.39-1-2.57-.6-1.78.3-1.39-1.68-.79-.89-.79-1.29-.69-1.18-1.29.39-1,1.48-.29,2.28-2.67.79-5.44.59-10.49-.1-1.38-1h-7.52l-3.86.09-2.57.1-3.16-.29-2.28-.5-.69-1.48-2.47-.3-3.07-2.17-1.38-2.48-1.68-2.27-1.68-2.08-1.09-1.18-85.35-55.19-.7-1.49-.49-1.58-1.78-.49-2.08-.1-1.38-1.78-.79-1.39-1.68-.29-2.58-.2-1.48-1.19-2.08-.79-.69-1.09-1.68-.69-1.88-.69-1.78.1-1.78-1-1.29-.5-13.05-.19-4.55-.5h-2.87l-6.53-.1-30.95-.1-9.89.2-13.25-.49-1.49-1.09-2.57-2.18-1.09-1.18-2.77-1.59-.19-1.48-.2-1.68v-1.38s.29-1.69.39-2a8.28,8.28,0,0,0,0-1.59l-1.18-1.68-16.62-20-.49-25.32,1.88-1.49,1.18-1.18.79-1.19,1-1.09.7-1.68v-5.14l-1.59-.69-.69-1.78-1.48-1.69-.5-1.38.3-1.88,1.28-1,1-.2.8-1.18.89-.6.09-1.28-.09-1.39-1.09-.39-2-.6-2.18-1.08-2-1.88-2-.6-2-1.08-2-.3-2.37-1.48-1.78-.1-.89,1.18-.6,1.09-2.07.59-2.48-.49L252.6,1020l-1.09-.89-1.88-1.39-1.38-1.48-2.18-.89-3.66-.5-1.78.79-2.17.5-6.63,6.43-1.68,1h-1.58l-1.39-.8-1.19-1.18-1.28-2.08-1-1.48-.89-1.29-1.29-1.48.5-1.49.59-.69.5-.29.69-.4,1-.79.2-.69.09-1-.09-1.88-1-.4L207.1,996.19l-1.18-2.27.29-2.87-.29-2.87-10.68-14.64-.3-2.47.69-1.48.69-.5.3-1.38-.49-1.39-2.08-.89-.69-.49-.89-1.49,1.18-2.07.6-.5,1.38-.29.5-1.49-1.19-1.28-.69-3.37v-1.88l-7.12-8.8-.89-2.57-1.19-2-1-2.77-2.37-1.58-.1-3.26.49-5.15-1-3.06-1.48-2.08-1.09-2-.49-1.48-1.58-2.47-.6-2,.1-2.08.3-2.17-.6-.89-.89-1.29-.79-1-.59-1.18-.4-2.28v-2.08l-1.28-3.56-.89-1.58-.79-.89-1.29-2.37-.59-1.29s-.69.5-1.19,0-1.58-1.78-1.58-1.78l-1.68-.49-1-.7-2-1.38-4.55.1-4.75-.5-.29-1-1.39-1-.29-1.59-.5-1.58.69-1.28,1.19-.2.4-2.18.49-1v-1.88l-2.27-2.07-1.39-1.59-1.88-1.08-.49-.4-2.28-1.78-2.77-1.48h-1.58l-2.37-.2-1.68-1-2.67-.69-2.48-.89-1.88-.3-2.27-1.68-.69-2-2-1.09-1.29-.79-2.47-2.07-1.09-1.78.4-1.29.49-1,.3-1.68-.69-1.38-.79-1.59-.7-1.48L117,844l-1.78-.39-1.88.19-2-.1-1.49-.49-7.22-7.52-.19-12.56-16.72-17.4-3.26-.4-2.87-1.19L73,797.4,71.91,795l-4.26-.8-1.88-1-.39-.8-1.88-1.08-2.27.19-1.39.6-.89.69-3.86-.4-.89-2-1.78-1.88-1.68-.79-1.48.19-1.49-1.58-5.93-.3-1.88.1-1.68.5-.89,1L35.81,789l-3.66-.1-1.49-.19-.69-.89-.39-.8-1.68-1.18-1.09-1.39-1-1.18-2.18-.1-1.58-.5-.79-1L19,781.48l-1.18-.7-.5-.89-1.78.3v.69l-1.08.5-.8.69c-.49.79-2.86.89-2.86.89l-1-1.39v-.49l-2.08-.89-2,.2V778.9L5,778.21l-1.09-2.27-.49-1.78L2,774.35v-2.67L.5,771.59v-2.08l.4-1.39,1.87-.59,1.49-2.08L4,764.37l.1-2,1.29-1.29L7,759.72l1-1.19L10.19,757l.89-1.39.4-1.38.69-1.09.79-1,.69-.39.8-.3,1,.3,1.69-.2Z"/>
        </g>
        <g id="all_cities">
            <text/>
            <g id="city-addis-ababa">
                <circle class="cls-2" cx="569.05" cy="665.29" r="23"/>
                <text class="cls-3" transform="translate(510.36 639.32) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Addis Ababa'] . '</text>
            </g>
            <g id="city-bishoftu">
                <rect class="cls-4" x="604.1" y="716.97" width="17.94" height="17.94" transform="translate(-333.76 646.13) rotate(-45)"/>
                <text class="cls-3" transform="translate(558.38 758.66) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Bishoftu'] . '</text>
            </g>
            <g id="city-adama">
                <circle class="cls-2" cx="649.34" cy="781.13" r="16.5"/>
                <text class="cls-3" transform="translate(601.65 818.1) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Adama'] . '</text>
            </g>
            <g id="city-bahirdar">
                <circle class="cls-2" cx="417.06" cy="400.7" r="18.5"/>
                <text class="cls-3" transform="translate(356.18 445.16) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Bahir Dar'] . '</text>
            </g>
            <g id="city-asossa">
                <circle class="cls-2" cx="190.19" cy="515.16" r="18.5"/>
                <text class="cls-3" transform="translate(144.41 559.62) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Asossa'] . '</text>
            </g>
            <g id="city-debre-markos">
                <text class="cls-3" transform="translate(398.24 553.34) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Debre Markos'] . '</text>
                <rect class="cls-4" x="477.55" y="506.19" width="17.94" height="17.94" transform="translate(-221.77 494.91) rotate(-45)"/>
            </g>
            <g id="city-dessie">
                <text class="cls-3" transform="translate(590.05 479.39) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Dessie'] . '</text>
                <rect class="cls-4" x="623.94" y="436.24" width="17.94" height="17.94" transform="translate(-129.44 577.93) rotate(-45)"/>
            </g>
            <g id="city-adigrat">
                <text class="cls-3" transform="translate(589.26 154.94) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Adigrat'] . '</text>
                <rect class="cls-4" x="628.82" y="111.79" width="17.94" height="17.94" transform="translate(101.41 486.35) rotate(-45)"/>
            </g>
            <g id="city-axum">
                <text class="cls-3" transform="translate(515.7 176.02) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Axum'] . '</text>
                <rect class="cls-4" x="544.09" y="136.22" width="17.94" height="17.94" transform="translate(59.32 433.6) rotate(-45)"/>
            </g>
            <g id="city-ambo">
                <text class="cls-3" transform="translate(400.22 697.3) rotate(-0.3) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Ambo'] . '</text>
                <rect class="cls-4" x="429.46" y="654.28" width="17.94" height="17.94" transform="translate(-340.58 504.28) rotate(-45)"/>
            </g>
            <g id="city-nekemte">
                <text class="cls-3" transform="translate(301.65 638.83) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Nekemte'] . '</text>
                <rect class="cls-4" x="350.86" y="645.57" width="17.94" height="17.94" transform="translate(-357.43 446.15) rotate(-45)"/>
            </g>
            <g id="city-debre-birhan">
                <text class="cls-3" transform="translate(579.52 589.65) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Debre Birhan'] . '</text>
                <rect class="cls-4" x="650.13" y="597.13" width="17.94" height="17.94" transform="translate(-235.53 643.58) rotate(-45)"/>
            </g>
            <g id="city-mekelle">
                <circle class="cls-2" cx="597.19" cy="199.81" r="18.5"/>
                <text class="cls-3" transform="translate(550.67 245.28) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Mekele'] . '</text>
            </g>
            <g id="city-dire-dawa">
                <circle class="cls-2" cx="880.92" cy="580.76" r="18.5"/>
                <text class="cls-3" transform="translate(813.79 555.29) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Dire Dawa'] . '</text>
            </g>
            <g id="city-asaita">
                <circle class="cls-2" cx="803.75" cy="402.99" r="18.5"/>
                <text class="cls-3" transform="translate(763.12 446.09) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Asaita'] . '</text>
            </g>
            <g id="city-jigjiga">
                <circle class="cls-2" cx="963.19" cy="586.55" r="15"/>
                <text class="cls-3" transform="translate(920.83 630.22) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Jijiga'] . '</text>
            </g>
            <g id="city-harar">
                <text class="cls-3" transform="translate(863.18 680.29) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Harar'] . '</text>
                <rect class="cls-4" x="890.57" y="635.13" width="17.94" height="17.94" transform="translate(-191.98 824.72) rotate(-45)"/>
            </g>
            <g id="city-jimma">
                <text class="cls-3" transform="translate(323.04 758.66) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Jimma'] . '</text>
                <rect class="cls-4" x="356.96" y="765.38" width="17.94" height="17.94" transform="translate(-440.37 485.55) rotate(-45)"/>
            </g>
            <g id="city-hosaena">
                <text class="cls-3" transform="translate(386.08 824.78) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Hosaena'] . '</text>
                <rect class="cls-4" x="433.81" y="831.31" width="17.94" height="17.94" transform="translate(-464.48 559.2) rotate(-45)"/>
            </g>
            <g id="city-shashemene">
                <text class="cls-3" transform="translate(584.09 854.8) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Shashemene'] . '</text>
                <rect class="cls-4" x="560.08" y="838.86" width="17.94" height="17.94" transform="translate(-432.83 650.7) rotate(-45)"/>
            </g>
            <g id="city-asella">
                <text class="cls-3" transform="translate(646.86 932.58) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Asella'] . '</text>
                <rect class="cls-4" x="677.16" y="888.7" width="17.94" height="17.94" transform="translate(-433.78 748.09) rotate(-45)"/>
            </g>
            <g id="city-dilla">
                <text class="cls-3" transform="translate(490.73 977.58) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Dila'] . '</text>
                <rect class="cls-4" x="510.86" y="930.54" width="17.94" height="17.94" transform="translate(-512.08 642.75) rotate(-45)"/>
            </g>
            <g id="city-sodo">
                <text class="cls-3" transform="translate(414.46 879.05) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Sodo'] . '</text>
                <rect class="cls-4" x="440.02" y="885.79" width="17.94" height="17.94" transform="translate(-501.18 579.56) rotate(-45)"/>
            </g>
            <g id="city-hawassa">
                <text class="cls-3" transform="translate(473.66 921.41) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Hawassa'] . '</text>
                <circle class="cls-2" cx="531.82" cy="884.68" r="18.5"/>
            </g>
            <g id="city-arba-minch">
                <text class="cls-3" transform="translate(346.46 1034.92) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Arba Minch'] . '</text>
                <rect class="cls-4" x="411.64" y="988.51" width="17.94" height="17.94" transform="translate(-582.13 589.57) rotate(-45)"/>
            </g>
            <g id="city-gambella">
                <text class="cls-3" transform="translate(81.95 798.95) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Gambela'] . '</text>
                <circle class="cls-2" cx="143.23" cy="755.83" r="18.5"/>
            </g>
            <g id="city-gondar">
                <text class="cls-3" transform="translate(391.06 355.8) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Gonder'] . '</text>
                <rect class="cls-4" x="429.46" y="308.58" width="17.94" height="17.94" transform="translate(-96.13 403.02) rotate(-45)"/>
            </g>
            <text class="cls-6" transform="translate(300.62 31.65) scale(0.98 1)">'.$GLOBALS["lang"]["select city from map"].'</text>
        </g>
    </g>
';
}
