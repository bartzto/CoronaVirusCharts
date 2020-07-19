<div class="container" style="margin-top: 3%;">
        <h1 class="text-center" style="margin-bottom: 1%;">Aktuelle Fallzahlen weltweit</h1>
        <p class="text-center" style="margin-bottom: 2%;">Weltweit sind Menschen mit dem Corona-Virus infiziert.<br>Hier werden die Zahlen weltweit von den letzten 24 Stunden aufgelistet.</p>
	
		<div class="alert alert-success" role="alert" style="margin-bottom: 1%;">
        Alles funktioniert einwandfrei! Bei Problemen bitte die Seite neuladen.<br>
			<b><a href="?p=cases">Seite neuladen..</a></b>
		</div>
	
		<?php

			$curl = curl_init();

			curl_setopt_array($curl, array(
  				CURLOPT_URL => "https://api.covid19api.com/summary",
  				CURLOPT_RETURNTRANSFER => true,
  				CURLOPT_ENCODING => "",
  				CURLOPT_MAXREDIRS => 10,
  				CURLOPT_TIMEOUT => 0,
  				CURLOPT_FOLLOWLOCATION => true,
  				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  				CURLOPT_CUSTOMREQUEST => "GET",
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$arr = json_decode($response, true);
		?>
	
        <div class="table-responsive" style="padding-top: 2%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Neue bestätigte Fälle</th>
                        <th>Insgesamt Bestätigte Fälle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color: red">+<?php echo $arr["Global"]["NewConfirmed"]; ?></td>
                        <td style="color: black"><?php echo $arr["Global"]["TotalConfirmed"]; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Neue Todesfälle</strong></td>
                        <td><strong>Ingesamt gezählte Todefälle</strong></td>
                    </tr>
                    <tr>
                        <td style="color: red">+<?php echo $arr["Global"]["NewDeaths"]; ?></td>
                        <td style="color: red"><?php echo $arr["Global"]["TotalDeaths"]; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Wieder genesen</strong></td>
                        <td><strong>Ingesamt genesen</strong></td>
                    </tr>
                    <tr>
                        <td style="color: green">+<?php echo $arr["Global"]["NewRecovered"]; ?></td>
                        <td style="color: green"><?php echo $arr["Global"]["TotalRecovered"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
