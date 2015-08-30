<?php
include_once('class.krumo.php'); // Krumo is used for debugging
include_once('sr_filter.php'); // sr_filter is used to insert items from summoners rift


define("ROOT",$_SERVER['DOCUMENT_ROOT'].'/',true);
class api{

    private $key = 'YOUR API KEY GOES HERE'; // Private api key goes here

    function __construct(){

    }

    /*
     * @returns array
     */
    public function updateChampionsList(){
        /*
         * Grab all champion info and write it out to a file so we can use it later
         */
        $response = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?champData=info&api_key='.$this->key);
        $champions = fopen(ROOT.'api/champions.json','r+');
        ftruncate($champions,0);
        fwrite($champions,$response);
        fclose($champions);
    }

    public function updateItemsList(){
        /*
         * call the filters class to update items list
         */
        $filter = new filters;
        $filter->writeSRFilterJSON();
    }

    /*
     * @returns array
     */
    public function getItems(){
        $items = new filters;
        return $items->getSRFilter();
    }

    /*
     * @returns string
     */
    public function getChampionsList(){
        $response = file_get_contents(ROOT.'api/champions.json');
        return $response;
    }

    /*
     * @returns array
     */
    public function getChampionDetails($id){
        $response = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/'.$id.'?champData=all&api_key='.$this->key);
        return json_decode($response);
    }

    /*
     * @returns object
     */
    public function getFeaturedGames(){
        $response = file_get_contents('https://euw.api.pvp.net/observer-mode/rest/featured?api_key='.$this->key);
        $response = json_decode($response);
        return $response;
    }

    /*
     * @returns string
     */
    public function imageFromID($id){
        /*
         * Convert all champion id'd to their respective image links
         */
        $champions = json_decode($this->getChampionsList());
        $champions = $champions->data;
        foreach($champions as $champion){
            if($champion->id == $id){
                return '<img data-championid="'.$champion->id.'" src="/img/champs/squares/'.$champion->name.'.png">';
            }
        }
    }
}

?>