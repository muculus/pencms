<p>Contact ontvangen via de website:</p>
<p>
	Naam: <?php echo $contactentry['Contactentry']['name']; ?><br />
	Email: <?php echo $contactentry['Contactentry']['email']; ?><br />
	Bedrijf: <?php echo $contactentry['Contactentry']['company']; ?><br />
</p>
<p>Geïnteresseerd in de modules:</p>
<p>
	<?php
		if($contactentry['Contactentry']['wettelijke_conformiteit'] == 1) echo 'Veiligheid: Wettelijke Conformiteit<br />';
		if($contactentry['Contactentry']['vca'] == 1) echo 'Veiligheid: VCA<br />';
		if($contactentry['Contactentry']['ohsas_18001'] == 1) echo 'Veiligheid: OHSAS 18001<br />';
		
		if($contactentry['Contactentry']['documentbeheer'] == 1) echo 'Kwaliteit: Documentbeheer<br />';
		if($contactentry['Contactentry']['klachtenbeheer'] == 1) echo 'Kwaliteit: Klachtenbeheer<br />';
		if($contactentry['Contactentry']['interne_audits'] == 1) echo 'Kwaliteit: Interne Audits<br />';
		if($contactentry['Contactentry']['procesbeschrijving'] == 1) echo 'Kwaliteit: Procesbeschrijving<br />';
		
		if($contactentry['Contactentry']['iso_14001'] == 1) echo 'Milieu: ISO 14001<br />';
		if($contactentry['Contactentry']['vergunningen'] == 1) echo 'Milieu: Vergunningen<br />';
		if($contactentry['Contactentry']['msds'] == 1) echo 'Milieu: MSDS<br />';
	?>
</p>
<p>Bericht:</p>
<p><?php echo $contactentry['Contactentry']['remarks']; ?></p>