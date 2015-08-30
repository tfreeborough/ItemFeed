<?php
/*
 * This grabs all of the champion images for the champion list and places them into a large list
 */
include '../api/api.php';
getChampSquares();

	function getChampSquares() {

		$champSquares = scandir("../img/champs/squares");
		?> <ul class="champ-list mCustomScrollbar" data-mcs-theme="rounded-dots"> <?php
		$api = new api;
		$champions = json_decode($api->getChampionsList());
		foreach ($champSquares as $key => $square) {
			if ($key > 1) {
				foreach($champions->data as $champKey => $champion){
					if($champion->name == str_replace('.png','',$square)){
						?>
						<li class="champ-list-element" data-champKey="<?php print $champion->key; ?>" onclick="selectChampion(this)" data-name="<?php print str_replace('.png','',$square); ?>"><img src=" <?php print "/img/champs/squares/" . $square ?> " class="champ-square darkened"></li>
						<?php
					}

				}
			}
		}

	}

?>