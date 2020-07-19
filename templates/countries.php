 <div class="container" style="margin-top: 3%;">
        <h1 class="text-center" style="margin-bottom: 1%;">Aktuelle Fallzahlen der Länder</h1>
	 	<div class="alert alert-success" role="alert" style="margin-bottom: 1%;">
  			Alles funktioniert einwandfrei! Bei Problemen bitte die Seite neuladen.<br>
			<b><a href="?p=countries">Seite neuladen..</a></b>
		</div>
	 	<input align="center" type="text" id="search" class="searchInput" onKeyUp="searchFunction()" placeholder="Nach einem Land suchen...">
	 	<table id="countries" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <th>Land</th>
            <th>Neue Fälle</th>
            <th>Insgesamt Bestätigt</th>
            <th>Neue Todesfälle</th>
            <th>Insgesamte Todesfälle</th>
            <th>Neue Geheilte</th>
            <th>Insgesamt Geheilt</th>
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
        <?php
        foreach($arr["Countries"] as $key => $value) {
            echo "<tr>
            <td><b>" . $value["Country"] . "</b></td>
            <td style='color: red;'>+" . $value["NewConfirmed"] . "</td>
            <td>" . $value["TotalConfirmed"] . "</td>
            <td style='color: red;'>+" . $value["NewDeaths"] . "</td>
            <td style='color: red;'>" . $value["TotalDeaths"] . "</td>
            <td style='color: green;'>+" . $value["NewRecovered"] . "</td>
            <td style='color: green;'>" . $value["TotalRecovered"] . "</td>
            </tr>";
        }
        ?>
        </table>
</div>
	
	<script>
	function searchFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("search");
		filter = input.value.toUpperCase();
		table = document.getElementById("countries");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if(txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
	</script>