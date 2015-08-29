<?php
include('../api/api.php');
$champions = new api;
if (isset($_GET['data'])) {
    $champions = json_decode($champions->getChampionsList());

    $details = array();
    foreach ($champions->data as $championKey => $champion) {
        if ($champion->name == $_GET['data']) {
            $stats = $champion->info->attack . $champion->info->defense . $champion->info->magic . $champion->info->difficulty;
            ?>
        <div data-stats="<?php print $stats; ?>" class="active-champ-details">
            <script>statBarSlide();</script>
            <div class="stats-container">
                <div class="stat-bars-container">
                    <div class="stat-bar">
                        <p class="details-title">Attack: </p>
                        <div class="bar-border">
                            <div class="champ-stat-bar champ-stat-bar-attack"></div>
                        </div>
                    </div>
                    <div class="stat-bar">
                        <p class="details-title">Defense: </p>
                        <div class="bar-border">
                            <div class="champ-stat-bar champ-stat-bar-defense"></div>
                        </div>
                    </div>
                    <div class="stat-bar">
                        <p class="details-title">Magic: </p>
                        <div class="bar-border">
                            <div class="champ-stat-bar champ-stat-bar-magic"></div>
                        </div>
                    </div>
                    <div class="stat-bar">
                        <p class="details-title">Difficulty: </p>
                        <div class="bar-border">
                            <div class="champ-stat-bar champ-stat-bar-difficulty"></div>
                        </div>
                    </div>
                </div>
                <div class="champion-info-container">
                    <div>
                        <img src="/img/champs/squares/<?php print htmlspecialchars($champion->name,ENT_QUOTES) ?>.png">
                    </div>
                    <h4><?php print ucfirst($champion->title); ?></h4>
                </div>
            </div>
            <div onclick="buildChampion(this)" data-championid="<?php print $champion->name; ?>" class="build-champion-button" onclick="buildChampion($(this))">
                <p style="font-size: 64px; text-transform: uppercase;" class="build-text">Build Champion!</p>
            </div>
        </div>
            <?php
        }

    }
}
?>