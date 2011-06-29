Contact ontvangen via de website:

Naam: <?php echo $contactentry['Contactentry']['name']; ?>
Email: <?php echo $contactentry['Contactentry']['email']; ?>
Bedrijf: <?php echo $contactentry['Contactentry']['company']; ?>

Geïnteresseerd in de modules:

	<?php
		if($contactentry['Contactentry']['wettelijke_conformiteit'] == 1) echo 'Veiligheid: Wettelijke Conformiteit' . "\n";
		if($contactentry['Contactentry']['vca'] == 1) echo 'Veiligheid: VCA' . "\n";
		if($contactentry['Contactentry']['ohsas_18001'] == 1) echo 'Veiligheid: OHSAS 18001' . "\n";
		
		if($contactentry['Contactentry']['documentbeheer'] == 1) echo 'Kwaliteit: Documentbeheer' . "\n";
		if($contactentry['Contactentry']['klachtenbeheer'] == 1) echo 'Kwaliteit: Klachtenbeheer' . "\n";
		if($contactentry['Contactentry']['interne_audits'] == 1) echo 'Kwaliteit: Interne Audits' . "\n";
		if($contactentry['Contactentry']['procesbeschrijving'] == 1) echo 'Kwaliteit: Procesbeschrijving' . "\n";
		
		if($contactentry['Contactentry']['iso_14001'] == 1) echo 'Milieu: ISO 14001' . "\n";
		if($contactentry['Contactentry']['vergunningen'] == 1) echo 'Milieu: Vergunningen' . "\n";
		if($contactentry['Contactentry']['msds'] == 1) echo 'Milieu: MSDS' . "\n";
	?>

Bericht:

<?php echo $contactentry['Contactentry']['remarks']; ?>