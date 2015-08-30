<?php

class filters {

    public function writeSRFilterJSON() {
        /*
         * Writes the current array seen below into a Json file, this can then be read at runtime and a list of items can be made. This will eventually be used with the item static data
         * when the item call starts displaying correct information again.
         */

        $summRiftItems = array(

            //Array is ID => ["name", [components], cost]
            //Boots and Boot enchants
            "2003" => ["Health Potion", [], 35],
            "2004" => ["Mana Potion", [], 35],

            "1001" => ["Boots of Speed", [], 325],
            "3020" => ["Sorcerer's Shoes", [1001], 775],
            "3006" => ["Berserker's Greaves", [1001, 1042], 225],
            "3158" => ["Ionian Boots of Lucidity", [1001], 325],
            "3009" => ["Boots of Swiftness", [1001], 675],
            "3117" => ["Boots of Mobility", [1001], 475],
            "3047" => ["Ninja Tabi", [1001, 1029], 375],
            "3111" => ["Mercury's Treads", [1001, 1033], 425],

            //Each can have any of 5 possible enchantments BORING!
            //Sorc Shoes

            "1312" => ["Enchantment: Captain", [3020], 475],
            "1311" => ["Enchantment: Alacrity", [3020], 475],
            "1314" => ["Enchantment: Homeguard", [3020], 475],
            "1310" => ["Enchantment: Furor", [3020], 475],
            "1313" => ["Enchantment: Distortion", [3020], 475],

            //Serkers

            "1302" => ["Enchantment: Captain", [3006], 475],
            "1301" => ["Enchantment: Alacrity", [3006], 475],
            "1304" => ["Enchantment: Homeguard", [3006], 475],
            "1300" => ["Enchantment: Furor", [3006], 475],
            "1303" => ["Enchantment: Distortion", [3006], 475],

            // CD boots

            "1332" => ["Enchantment: Captain", [3158], 475],
            "1331" => ["Enchantment: Alacrity", [3158], 475],
            "1334" => ["Enchantment: Homeguard", [3158], 475],
            "1330" => ["Enchantment: Furor", [3158], 475],
            "1333" => ["Enchantment: Distortion", [3158], 475],

            //swift

            "1307" => ["Enchantment: Captain", [3009], 475],
            "1306" => ["Enchantment: Alacrity", [3009], 475],
            "1309" => ["Enchantment: Homeguard", [3009], 475],
            "1305" => ["Enchantment: Furor", [3009], 475],
            "1308" => ["Enchantment: Distortion", [3009], 475],

            //Mobi

            "1327" => ["Enchantment: Captain", [3117], 475],
            "1326" => ["Enchantment: Alacrity", [3117], 475],
            "1329" => ["Enchantment: Homeguard", [3117], 475],
            "1325" => ["Enchantment: Furor", [3117], 475],
            "1328" => ["Enchantment: Distortion", [3117], 475],

            //Ninja Tabi

            "1317" => ["Enchantment: Captain", [3047], 475],
            "1316" => ["Enchantment: Alacrity", [3047], 475],
            "1319" => ["Enchantment: Homeguard", [3047], 475],
            "1315" => ["Enchantment: Furor", [3047], 475],
            "1318" => ["Enchantment: Distortion", [3047], 475],

            //Merc Treads

            "1322" => ["Enchantment: Captain", [3111], 475],
            "1321" => ["Enchantment: Alacrity", [3111], 475],
            "1324" => ["Enchantment: Homeguard", [3111], 475],
            "1320" => ["Enchantment: Furor", [3111], 475],
            "1323" => ["Enchantment: Distortion", [3111], 475],

            //Jungle Items

            "1039" => ["Hunter's Machete", [], 400],
            "3713" => ["Ranger's Trailblazer", [1039], 450],
            "3711" => ["Poacher's Knife", [1039], 450],
            "3706" => ["Stalker's Blade", [1039], 450],
            "3715" => ["Skirmisher's Sabre", [1039], 450],

            //4 possible enchants on each, Devourer has multiple states
            //Stalker's

            "3707" => ["Enchantment: Warrior", [3706, 3134], 63],
            "3709" => ["Enchantment: Cinderhulk", [3706, 3751], 400],
            "3708" => ["Enchantment: Runeglavie", [3706, 3057], 200],
            "3710" => ["Enchantment: Devourer", [3706, 1043], 300],
            "3930" => ["Enchantment: Devourer", [3706, 1043], 300], //sated

            //Poacher's

            "3719" => ["Enchantment: Warrior", [3711, 3134], 63],
            "3721" => ["Enchantment: Cinderhulk", [3711, 3751], 400],
            "3720" => ["Enchantment: Runeglavie", [3711, 3057], 200],
            "3722" => ["Enchantment: Devourer", [3711, 1043], 300],
            "3932" => ["Enchantment: Devourer", [3711, 1043], 300], //sated

            //Ranger's

            "3723" => ["Enchantment: Warrior", [3713, 3134], 63],
            "3725" => ["Enchantment: Cinderhulk", [3713, 3751], 400],
            "3724" => ["Enchantment: Runeglavie", [3713, 3057], 200],
            "3726" => ["Enchantment: Devourer", [3713, 1043], 300],
            "3933" => ["Enchantment: Devourer", [3713, 1043], 300], //sated

            //Skirmishers

            "3714" => ["Enchantment: Warrior", [3715, 3134], 63],
            "3717" => ["Enchantment: Cinderhulk", [3715, 3751], 400],
            "3716" => ["Enchantment: Runeglavie", [3715, 3057], 200],
            "3718" => ["Enchantment: Devourer", [3715, 1043], 300],
            "3931" => ["Enchantment: Devourer", [3715, 1043], 300], //sated

            //AD ish Items

            "3031" => ["Infinity Edge", [1038, 1037, 1018], 645],   //IE
            "3072" => ["The Bloodthirster", [1038, 1053], 1150],   //BT
            "3508" => ["Essence Reaver", [1038, 1053], 850],   //EssenceR
            "3074" => ["Ravenous Hydra", [3077, 1053], 600],   //RavenousH
            "3071" => ["The Black Cleaver", [3044, 3067], 825],   //BlackC
            "3078" => ["Trinity Force", [3044, 3086, 3057], 78],   //Triforce
            "3134" => ["The Brutalizer", [1036, 1036], 617],   //Brutalizer
            "1036" => ["Longsword", [], 360],   //Schlongsword
            "1037" => ["Pickaxe", [], 875],   //Pickaxe
            "1038" => ["B.F. Sword", [], 1550],   //BF sword
            "1018" => ["Cloak of Agility", [], 730],   //Cloak of agi
            "3077" => ["Tiamat", [1037, 1036, 1006, 1006], 305],   //Tiamat
            "1053" => ["Vampiric Scepter", [1036], 440],   //Vamp Scepter
            "3065" => ["Avarice Blade", [1051], 400],   //Avarice Blade
            "3046" => ["Phantom Dancer", [1042, 3086, 1018], 520],   //PD
            "3087" => ["Statikk Shiv", [3065, 3086], 600],   //Statik Shiv
            "3086" => ["Zeal", [1042, 1051], 250],   //Zeal
            "1043" => ["Recurve Bow", [1042, 1042], 200],   //Recurve Bow
            "3085" => ["Runaan's Hurricane", [1043, 1042, 1042], 500],   //Ruunans
            "3153" => ["Blade of the Ruined King", [3144, 1043], 700],   //BOTRK
            "3091" => ["Wit's End", [1043, 1042, 1033], 550],   //Wits end
            "3155" => ["Hexdrinker", [1036, 1033], 640],   //Sexdrinker
            "3156" => ["Maw of Malmortius", [3155, 1037], 875],   //MawofM
            "3144" => ["Bilgewater Cutlass", [1053, 1036], 240],   //Cutlass
            "1051" => ["Brawler's Glove", [], 400],   //Brawlers glove
            "1042" => ["Dagger", [], 450],   //Dagger
            "3142" => ["Youmuu's Ghostblade", [3056, 3134], 563],   //Yomuus
            "1055" => ["Doran's Blade", [], 440],   //Dorans Blade
            "3022" => ["Frozen Mallet", [1028, 1037, 1011], 1025],   //Frozen mallet
            "3124" => ["Guinsoo's Rageblade", [1037, 1026], 865],   //Rageblade
            "3035" => ["Last Whisper", [1036, 1037], 1065],   //Last whisper
            "3146" => ["Hextech Gunblade", [3144, 3145], 800],   //hextechGB
            "3004" => ["Manamune", [1037, 3037], 605],   //Manamune
            "3139" => ["Mercurial Scimitar", [1038, 3140], 900],   //Merc Scim
            "3044" => ["Phage", [1036, 1028], 565],   //Phage
            "3053" => ["Sterak's Gage", [1036, 1011], 1190],   //Sterak's Gage
            "3141" => ["Sword of the Occult", [1036], 1040],   //Sword of the occult
            "3101" => ["Stinger", [1042, 1042], 350],   //Stinger
            "3172" => ["Zephyr", [3101, 1037], 725],   //Zephyr
            "3042" => ["Muramana", [1037, 3037], 605],   //Muramana

            //Ap ish Items

            "3089" => ["Rabadon's Deathcap", [1058, 1026, 1052], 965],   //Deathcap
            "3027" => ["Rod of Ages", [3010, 1026], 650],   //Roa
            "3116" => ["Rylai's Crystal Scepter", [1058, 1052, 1011], 315],   //Ryalis
            "1052" => ["Amplifying Tome", [], 435],   //Amp tome
            "1026" => ["Blasting Wand", [], 850],   //Blasting wand
            "1058" => ["Needlessly Large Rod", [], 1250],   //NeedlesslyLR
            "3285" => ["Luden's Echo", [1058, 3113], 900],   //Ludens
            "3157" => ["Zhonya's Hourglass", [1058, 3191], 550],   //Zhonyas
            "3145" => ["Hextech Revolver", [1052, 1052], 330],   //Hextech Rev
            "3152" => ["Will of the Ancients", [3145, 3108], 480],   //WoTA
            "3165" => ["Morellonomicon", [3108, 1052, 3114], 445],   //Morellonomicon
            "1004" => ["Faerie Charm", [], 180],   //Faerie Charm
            "3108" => ["Fiendish Codex", [1052], 385],   //Fiendish Codex
            "3100" => ["Lich Bane", [3057, 3113], 950],   //Lich Bane
            "3114" => ["Forbidden Idol", [1004, 1004], 240],   //Forbidden Idol
            "3001" => ["Abyssal Scepter", [1026, 1057], 800],   //abbysal
            "3113" => ["Aether Wisp", [435], 415],   //Aether wisp
            "3003" => ["Archangel's Staff", [1058, 3037], 1030],   //Archangels
            "3504" => ["Ardent Censer", [3114, 3113], 650],   //Ardent Censer
            "3174" => ["Athene's Unholy Grail", [1052, 3108, 3028], 545],   //Athenes
            "3028" => ["Chalice of Harmony", [1033, 1004, 1004], 90],   //Chalice of H
            "3098" => ["Frostfang", [3303], 500],   //Frostfang
            "3151" => ["Liandry's Torment", [3136, 1026], 650],   //Liandries
            "3041" => ["Mejai's Soulstealer", [1052], 965],   //Mejais
            "3170" => ["Moonflair Spellblade", [1057, 3191], 570],   //Moonflair
            "3191" => ["Seeker's Armguard", [1052, 1029], 465],   //Seekers
            "3048" => ["Seraph's Embrace", [1058, 3037], 1030],   //Seraphs
            "3057" => ["Sheen", [1052, 1027], 365],   //Sheen
            "3303" => ["Spellthief's Edge", [], 365],   //Spellthiefs
            "3290" => ["Twin Shadows", [3113, 3108], 730],   //Twin Shadows
            "3135" => ["Void Staff", [1026, 1052], 1215],   //Void Staff
            "3092" => ["Frost Queen's Claim", [3098, 3108], 515],   //Frost queens claim
            "3115" => ["Nashor's Tooth", [3108, 3101], 930],   //Nashors tooth
            "3136" => ["Haunting Guise", [1052, 1028], 665],   //Haunting Guise
            "3070" => ["Tear of the Goddess", [1027, 1004], 140],   //Tear
            "1027" => ["Sapphire Crystal", [], 400],   //Sapphire crystal
            "1056" => ["Doran's Ring", [], 400],   //Dorans Ring

            //Tanky Items

            "3075" => ["Thornmail", [1029, 1031], 1250],   //Thornmail
            "1029" => ["Cloth Armor", [], 300],   //Cloth Armor
            "1031" => ["Chain Vest", [1029], 450],   //Chain Vest
            "3143" => ["Randuin's Omen", [1011, 3082], 600],   //Randuins
            "3110" => ["Frozen Heart", [3082, 3024], 600],   //Frozen Heart
            "3025" => ["Iceborn Gauntlet", [3024, 3057], 800],   //Iceborn G
            "3068" => ["Sunfire Cape", [1031, 3751], 850],   //Sunfire Cape
            "3102" => ["Banshee's Veil", [3211, 3801], 900],   //Banshees
            "3026" => ["Guardian Angel", [1031, 1057], 1250],   //GA
            "1033" => ["Null-Magic Mantle", [], 450],   //Null magic
            "1057" => ["Negatron Cloak", [1033], 350],   //Mr cloaky thing
            "3065" => ["Spirit Visage", [3067, 3211], 650],   //Spirit Visage
            "1028" => ["Ruby Crystal", [], 400],   //Ruby Crystal
            "3751" => ["Bami's Cinder", [1028], 600],   //Bami's Cinder
            "3010" => ["Catalyst the Protector", [1027, 1028], 400],   //Catalyst the pro
            "1054" => ["Doran's Shield", [], 440],   //Dorans shield
            "3082" => ["Warden's Mail", [1029, 1029], 500],   //Wardens mail
            "3024" => ["Glacial Shroud", [1029, 1027], 200],   //Glacial shroud
            "1011" => ["Giant's Belt", [1028], 600],   //Giants belt
            "3083" => ["Warmog's Armor", [1011, 3801, 3801], 550],   //Warmogs
            "3801" => ["Crystalline Bracer", [1028, 1006], 20],   //crystalline bracer
            "2053" => ["Raptor Cloak", [1029, 1006], 620],   //Raptor cloak
            "3512" => ["Zz'Rot Portal", [2053, 1057], 950],   //ZZ'rot
            "3056" => ["Ohmwrecker", [2053, 3067], 750],   //Ohmwecker
            "3105" => ["Aegis of the Legion", [1033, 3801], 550],   //Aegis
            "3067" => ["Kindlegem", [1028], 450],   //Kindlegem
            "3800" => ["Righteous Glory", [3801, 3010], 600],   //Rightous glory
            "3190" => ["Locket of the Iron Solari", [3105, 3067], 300],   //Locket of iron solari
            "3211" => ["Spectre's Cowl", [1028, 1033], 350],   //Spectre's cowl
            "3401" => ["Face of the Mountain", [3097, 3067], 485],   //Face OTM
            "3097" => ["Targon's Brace", [3302], 500],   //Targons brace
            "1006" => ["Rejuvenation Bead", [], 180],   //Rejuv Bead
            "3140" => ["Quicksilver Sash", [1033], 800],   //QSS
            "3302" => ["Relic Shield", [], 365],   //Relic Shield
            "3748" => ["Titanic Hydra", [3077, 1011], 400],   //Titanic Hydra
            "3742" => ["Dead Man's Plate", [1011, 1031], 1000],   //Dead mans plate

            //Other supporty items

            "2049" => ["Sightstone", [1028], 400],   //Sightstone
            "2045" => ["Ruby Sightstone", [2049, 1028], 400],   //Ruby Sightstone
            "3096" => ["Nomad's Medallion", [3301], 500],   //nomads medallion
            "3222" => ["Mikael's Crucible", [3114, 3028], 950],   //Mikels
            "3301" => ["Ancient Coin", [], 365],   //Ancient coin
            "3096" => ["Talisman of Ascension", [3096, 3114], 635],   //Talisman of Ascension
            "3060" => ["Banner of Command", [3105, 3108], 330],   //Banner of command
            "3050" => ["Zeke's Harbinger", [3024, 1052, 1052], 530],   //Zekes harbinger
			"2043" => ["Vision Ward", [], 100],   //vision ward
			"2044" => ["Stealth Ward", [], 75],   //ward
			"2139" => ["Elixir of Sorcery", [],250],   //mage elixir
			"2138" => ["Elixir of Iron", [], 250],   //tankoo elixir
			"2140" => ["Elixir of Wrath", [], 250],   //AD elixir
            //Trinkits

            "3340" => ["Warding Totem", [], 0],   //Warding totem
            "3361" => ["Greater Stealth Totem", [3340], 250],   //greater stealth totem
            "3362" => ["Greater Vision Totem", [3340], 250],   //greater vision totem
            "3341" => ["Sweeping Lens", [], 0],   //Sweeping lens
            "3364" => ["Oracle's Lens", [3341], 250],   //Oracles lens
            "3342" => ["Scrying Orb", [], 0],   //Scrying orb
            "3363" => ["Farsight Orb", [3342], 250],   //Farsight orb

            //Hex Core

            "3200" => ["Prototype Hex Core", [], 0],   //prototype
            "3196" => ["The Hex Core mk-1", [3200], 1000],   //mk1
            "3197" => ["The Hex Core mk-2", [3196], 1000],   //mk2
            "3198" => ["Perfect Hex Core", [3197], 1000],   //Perfected Hex core


        );

        $SRData = json_encode($summRiftItems);
        $items = fopen(ROOT.'api/sr_items.json','r+');
        ftruncate($items,0);
        fwrite($items,$SRData);
        fclose($items);
    }

    public function getSRFilter() {
        $items = file_get_contents(ROOT.'api/sr_items.json');
        return json_decode($items);

    }
}

?>