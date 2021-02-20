<?php
// show mapped page
function showMap()
{
	//918 800
	echo '<!!----SVG for bigger screens----!!>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-big-sc" width="620" height="500" viewbox="0 0 1471.67 1150.63">';
	svgMapElement();
	echo '</svg>';
	echo '<!!----SVG for mid screens----!!>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-mid-sc" width="350" height="320" viewbox="0 0 1500 1400">';
	svgMapElement();
	echo '</svg>';
	echo '<!!----SVG for small screens----!!>
		<svg xmlns="http//www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-small-sc" width="350" height="220" viewbox="0 0 3050 1950">';
	svgMapElement();
	echo '</svg>';
}

function svgMapElement()
{
	global $str_url;
	$base_link = '../includes/adverts.php?item=All&search_text=&cities=';
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
			<a href="' . $base_link . 'Addis Ababa' . $str_url . '">
            <g id="city-addis-ababa">
                <circle class="cls-2" cx="569.05" cy="665.29" r="23"/>
                <text class="cls-3" transform="translate(510.36 639.32) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Addis Ababa'] . '</text>
			</g> </a>
			<a href="' . $base_link . 'Bishoftu' . $str_url . '">
            <g id="city-bishoftu">
                <rect class="cls-4" x="604.1" y="716.97" width="17.94" height="17.94" transform="translate(-333.76 646.13) rotate(-45)"/>
                <text class="cls-3" transform="translate(558.38 758.66) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Bishoftu'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Adama' . $str_url . '">
            <g id="city-adama">
                <circle class="cls-2" cx="649.34" cy="781.13" r="16.5"/>
                <text class="cls-3" transform="translate(601.65 818.1) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Adama'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Bahir Dar' . $str_url . '">
            <g id="city-bahirdar">
                <circle class="cls-2" cx="417.06" cy="400.7" r="18.5"/>
                <text class="cls-3" transform="translate(356.18 445.16) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Bahir Dar'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Asossa' . $str_url . '">
            <g id="city-asossa">
                <circle class="cls-2" cx="190.19" cy="515.16" r="18.5"/>
                <text class="cls-3" transform="translate(144.41 559.62) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Asossa'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Debre Markos' . $str_url . '">
            <g id="city-debre-markos">
                <text class="cls-3" transform="translate(398.24 553.34) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Debre Markos'] . '</text>
                <rect class="cls-4" x="477.55" y="506.19" width="17.94" height="17.94" transform="translate(-221.77 494.91) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Asossa' . $str_url . '">
            <g id="city-dessie">
                <text class="cls-3" transform="translate(590.05 479.39) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Dessie'] . '</text>
                <rect class="cls-4" x="623.94" y="436.24" width="17.94" height="17.94" transform="translate(-129.44 577.93) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Adigrat' . $str_url . '">
            <g id="city-adigrat">
                <text class="cls-3" transform="translate(589.26 154.94) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Adigrat'] . '</text>
                <rect class="cls-4" x="628.82" y="111.79" width="17.94" height="17.94" transform="translate(101.41 486.35) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Axum' . $str_url . '">
            <g id="city-axum">
                <text class="cls-3" transform="translate(515.7 176.02) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Axum'] . '</text>
                <rect class="cls-4" x="544.09" y="136.22" width="17.94" height="17.94" transform="translate(59.32 433.6) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Ambo' . $str_url . '">
            <g id="city-ambo">
                <text class="cls-3" transform="translate(400.22 697.3) rotate(-0.3) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Ambo'] . '</text>
                <rect class="cls-4" x="429.46" y="654.28" width="17.94" height="17.94" transform="translate(-340.58 504.28) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Nekemte' . $str_url . '">
            <g id="city-nekemte">
                <text class="cls-3" transform="translate(301.65 638.83) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Nekemte'] . '</text>
                <rect class="cls-4" x="350.86" y="645.57" width="17.94" height="17.94" transform="translate(-357.43 446.15) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Debre Birhan' . $str_url . '">
            <g id="city-debre-birhan">
                <text class="cls-3" transform="translate(579.52 589.65) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Debre Birhan'] . '</text>
                <rect class="cls-4" x="650.13" y="597.13" width="17.94" height="17.94" transform="translate(-235.53 643.58) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Mekelle' . $str_url . '">
            <g id="city-mekelle">
                <circle class="cls-2" cx="597.19" cy="199.81" r="18.5"/>
                <text class="cls-3" transform="translate(550.67 245.28) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Mekelle'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Dire- Dawa' . $str_url . '">
            <g id="city-dire-dawa">
                <circle class="cls-2" cx="880.92" cy="580.76" r="18.5"/>
                <text class="cls-3" transform="translate(813.79 555.29) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Dire Dawa'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Asaita' . $str_url . '">
            <g id="city-asaita">
                <circle class="cls-2" cx="803.75" cy="402.99" r="18.5"/>
                <text class="cls-3" transform="translate(763.12 446.09) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Asaita'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Jigjiga' . $str_url . '">
            <g id="city-jigjiga">
                <circle class="cls-2" cx="963.19" cy="586.55" r="18.5"/>
                <text class="cls-3" transform="translate(920.83 630.22) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Jigjiga'] . '</text>
			</g></a>
			<a href="' . $base_link . 'Harar' . $str_url . '">
            <g id="city-harar">
                <text class="cls-3" transform="translate(863.18 680.29) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Harar'] . '</text>
                <rect class="cls-4" x="890.57" y="635.13" width="17.94" height="17.94" transform="translate(-191.98 824.72) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Jimma' . $str_url . '">
            <g id="city-jimma">
                <text class="cls-3" transform="translate(323.04 758.66) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Jimma'] . '</text>
                <rect class="cls-4" x="356.96" y="765.38" width="17.94" height="17.94" transform="translate(-440.37 485.55) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Hosaena' . $str_url . '">
            <g id="city-hosaena">
                <text class="cls-3" transform="translate(386.08 824.78) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Hosaena'] . '</text>
                <rect class="cls-4" x="433.81" y="831.31" width="17.94" height="17.94" transform="translate(-464.48 559.2) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Shashemene' . $str_url . '">
            <g id="city-shashemene">
                <text class="cls-3" transform="translate(584.09 854.8) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Shashemene'] . '</text>
                <rect class="cls-4" x="560.08" y="838.86" width="17.94" height="17.94" transform="translate(-432.83 650.7) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Asella' . $str_url . '">
            <g id="city-asella">
                <text class="cls-3" transform="translate(646.86 932.58) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Asella'] . '</text>
                <rect class="cls-4" x="677.16" y="888.7" width="17.94" height="17.94" transform="translate(-433.78 748.09) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Dilla' . $str_url . '">
            <g id="city-dilla">
                <text class="cls-3" transform="translate(490.73 977.58) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Dilla'] . '</text>
                <rect class="cls-4" x="510.86" y="930.54" width="17.94" height="17.94" transform="translate(-512.08 642.75) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Sodo' . $str_url . '">
            <g id="city-sodo">
                <text class="cls-3" transform="translate(414.46 879.05) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Sodo'] . '</text>
                <rect class="cls-4" x="440.02" y="885.79" width="17.94" height="17.94" transform="translate(-501.18 579.56) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Sodo' . $str_url . '">
            <g id="city-hawassa">
                <text class="cls-3" transform="translate(473.66 921.41) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Hawassa'] . '</text>
                <circle class="cls-2" cx="531.82" cy="884.68" r="18.5"/>
			</g></a>
			<a href="' . $base_link . 'Arba Minch' . $str_url . '">
            <g id="city-arba-minch">
                <text class="cls-3" transform="translate(346.46 1034.92) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Arba Minch'] . '</text>
                <rect class="cls-4" x="411.64" y="988.51" width="17.94" height="17.94" transform="translate(-582.13 589.57) rotate(-45)"/>
			</g></a>
			<a href="' . $base_link . 'Gambella' . $str_url . '">
            <g id="city-gambella">
                <text class="cls-3" transform="translate(81.95 798.95) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Gambella'] . '</text>
                <circle class="cls-2" cx="143.23" cy="755.83" r="18.5"/>
			</g></a>
			<a href="' . $base_link . 'Gondar' . $str_url . '">
            <g id="city-gondar">
                <text class="cls-3" transform="translate(391.06 355.8) scale(0.9 1)">' . $GLOBALS['city_lang_arr']['Gondar'] . '</text>
                <rect class="cls-4" x="429.46" y="308.58" width="17.94" height="17.94" transform="translate(-96.13 403.02) rotate(-45)"/>
            </g></a>
            <text class="cls-6" transform="translate(390.62 31.65) scale(0.98 1)">'.$GLOBALS["lang"]["select city from map"].'</text>
        </g>
    </g>
';
}
