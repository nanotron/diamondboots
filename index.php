<?
  /*   
    Author: Ernest Millan
  */
  include './includes/common.php';   
?>

<!DOCTYPE html>
<html>
<head>
  <title><?=$page_title?></title>
  <meta charset="utf-8" />  
  <meta name="description" content="A reference guide for Minecraft crafting and potion recipes. Tips, help and more. Optimized for handheld and desktop browsers." />
  <meta name="keywords" content="minecraft, crafting, reference, recipes, mobs, guide, help, tips, tools, weapons, potions, potion, blocks, brewing, armor, item ids, data values, diamond, boots, iphone, android, ipad, server, creative, data, values, craft, mining, items, terrain, diamondboots, pocket" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <!--meta name="apple-touch-fullscreen" content="no">
  <meta name="apple-mobile-web-app-capable" content="no">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"-->
  <meta name="apple-mobile-web-app-title" content="DiamondBoots">
  <meta name="format-detection" content="telephone=no">

  <link rel="apple-touch-startup-image"
      media="(device-width: 320px)"
      href="/img/apple-touch-startup-image-320.png">
  <link rel="apple-touch-startup-image"
      media="(device-width: 320px)
         and (-webkit-device-pixel-ratio: 2)"
      href="/img/apple-touch-startup-image.png">

  <link rel="shortcut icon" href="/img/favicon.ico">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <link rel="stylesheet" href="./db.css?v=<?=$asset_version?>" media="screen">
  
  <!--[if IE]>
  <script>
    document.createElement('header');
    document.createElement('nav');
    document.createElement('section');
    document.createElement('footer');
  </script>
  <![endif]-->

  <? if($prod_mode == true) { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-1989347-15', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
  </script>
  <? } ?>
  
</head>
<body>

<? if($prod_mode == true && $floatyad_mode == true) { ?>
<div id="floaty_ad">
  <? if($responsive_ad == true) { ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- diamondboots.com - responsive -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-0446740701433346"
         data-ad-slot="8732648699"
         data-ad-format="auto"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  <? } else { ?>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- diamondboots.com - non-responsive -->
    <ins class="adsbygoogle"
         style="display:block;width:320px;height:50px;margin:0 auto;"
         data-ad-client="ca-pub-0446740701433346"
         data-ad-slot="7304457893"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  <? } ?>
</div>
<? } ?>

<nav>
  <header><h1><?=$page_header?></h1></header>
  <div class="buttons">
    <a href="javascript:dBoots.navClick('crafting');" id="crafting_nav" title="Minecraft <?=$page_crafting?>" class="selected"><?=$page_crafting?></a><a href="javascript:dBoots.navClick('potions');" id="potions_nav" title="Minecraft <?=$page_potions?>"><?=$page_potions?></a><a href="javascript:dBoots.navClick('mobs');" id="mobs_nav" title="Minecraft Mobs">Mobs</a><a href="javascript:dBoots.navClick('server');" id="server_nav" title="Minecraft <?=$page_server?>"><?=$page_server?></a>
  </div>
</nav>

<div id="sections_container">
  <!--div class="promo">Also try <a href="http://iqmobilesearch.com">iQ Mobile Search</a>!</div-->
  <? if($prod_mode == true && $floatyad_mode != true) { ?>
    <div class="adbanner_2014">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- diamondboots.com -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-0446740701433346"
           data-ad-slot="3154106692"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  <? } ?>
  <div id="crafting_section" class="section_main">
    <div id="filter_container"><input type="search" results="5" placeholder="<?=$page_search_filter?>" id="filter_box" autocorrect="off" autocapitalize="off" /><div id="clear_button"></div></div>
    <!--div class="promo">Try our new family-friendly <strong>survival server</strong>: <span class="highlight"><strong>diamondboots.com</strong></span></div-->
    <section>
      <ul id="item_rows">
        <? 
          foreach ($terrain as $item) {         
            if($item["name"] != "") {
              $source_markup = isset($item["source"]) ? '<div class="source"><span class="soft">Source:</span>&#160;'.$item["source"].'</div>' : false;
              $stackable_markup_state = isset($item["stackable"]) ? 'Yes' : 'No';
              $stackable_markup = '<div class="source"><span class="soft">Stackable:</span>&#160;'.$stackable_markup_state.'</div>';
              $desc_markup = isset($item["desc"]) && $item["desc"] != "" ? '<div class="desc"><strong class="soft">Use:</strong>&#160;'.$item["desc"].'</div>' : false;
              $tips_markup = isset($item["tips"]) && $item["tips"] != "" ? '<div class="desc"><strong class="soft">Tips:</strong>&#160;'.$item["tips"].'</div>' : false;
              $recipe_markup = isset($item["recipe"]) ? '<div style="display:none;" id="recipe_list_'.$item["id"].'">'.$item["recipe"].'</div>' : false;
              $amt_markup = isset($item["amt"]) ? '<div style="display:none;" id="amt_'.$item["id"].'">'.$item["amt"].'</div>' : false;
              $name_b_markup = isset($item["name_b"]) ? '&#160;<span class="soft">('.$item["name_b"].')</span>' : false;
              $row_title_name = isset($item["name_b"]) ? str_replace(" ","_",strtolower($item["name"]."_".$item["name_b"])) : str_replace(" ","_",strtolower($item["name"]));
              $footnote_markup = isset($item["footnote"]) && $item["footnote"] != "" ? '<div class="footnote">'.$item["footnote"].'</div>' : false;
              
              $item_arr = explode("_",$item["id"]);
              if(isset($item["no_data_value"])) {
                $item_markup = "";
              } else {
                if(strpos($item["id"],'-') === false) {
                  $item_markup = (count($item_arr) > 1) ? $item_arr[0].'<sub>'.$item_arr[1].'</sub>' : $item["id"];
                } else {
                  $item_markup = "";
                }
              } 
              $data_value_markup = '<span class="data_value">'.$item_markup.'</span>';
              
              echo '<li id="item_',$item["id"],'" class="item"><div class="row_item_container" title="'.$item["name"].' - Minecraft"><span class="icon i_',$item["id"],'"></span> ',$data_value_markup,' <h2 id="',$row_title_name,'">',$item["name"],$name_b_markup,'</h2></div> <div class="content" id="item_content_',$item["id"],'" onclick="_stopProp(event);"> ',$recipe_markup,$amt_markup,'<div class="soft" id="recipe_',$item["id"],'"></div> ',$desc_markup,$tips_markup,$source_markup,$stackable_markup,$footnote_markup,' <!--google_ad_section_start(weight=ignore)--><a onclick="dBoots.openMore(event,\'',$item["more_info"],'\');" class="more_info">More Info</a><!--google_ad_section_end--></div></li>';
            }
          } 
        ?>   
      </ul>
    </section>
  </div>
  
  <div id="potions_section" class="section_main" style="display:none;">
    <?
      $base_potions = array(
        0 => array("id" => "0", "name" => "Water Bottle", "type" => "potion", "bg_pos" => "0 0", "recipe" => "", "ingredients" => "Right-click <a onclick='dBoots.jumpToItem(this,374);'>Glass Bottle</a> on water source, such as a filled <a onclick='dBoots.jumpToItem(this,380);'>Cauldron</a>.", "desc" => "Starting point for all recipes.", "more_info" => "Potions"),
        1 => array("id" => "1", "name" => "Awkward Potion", "type" => "potion", "bg_pos" => "0 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,115);'>Nether Wart</a> + ".$link_water_bottle, "desc" => "Base for all primary potions and splash potions (excluding Splash Mundane Potion).", "more_info" => "Potions"),
        2 => array("id" => "2", "name" => "Thick Potion", "type" => "potion", "bg_pos" => "0 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + ".$link_water_bottle, "desc" => "Base for <a onclick='dBoots.jumpToPotion(this,29);'>Potion of Weakness</a>.", "more_info" => "Potions"),
        3 => array("id" => "3", "name" => "Mundane Potion", "type" => "potion", "bg_pos" => "0 0", "recipe" => "", "ingredients" => $link_redstone_dust." + ".$link_water_bottle, "desc" => "Base for <a onclick='dBoots.jumpToPotion(this,29);'>Potion of Weakness</a> and Splash Mundane Potion.", "more_info" => "Potions"),
        4 => array("id" => "4", "name" => "Mundane Potion (Extended)", "type" => "potion", "bg_pos" => "0 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,370);'>Ghast Tear</a>, <a onclick='dBoots.jumpToItem(this,382);'>Glistering Melon</a>, <a onclick='dBoots.jumpToItem(this,377);'>Blaze Powder</a>, <a onclick='dBoots.jumpToItem(this,378);'>Magma Cream</a>, <a onclick='dBoots.jumpToItem(this,353);'>Sugar</a>, or <a onclick='dBoots.jumpToItem(this,375);'>Spider Eye</a> + ".$link_water_bottle, "desc" => "Base for <a onclick='dBoots.jumpToPotion(this,29);'>Potion of Weakness (Extended)</a>.", "more_info" => "Potions"),
      );
      $primary_potions = array(
        0 => array("id" => "5", "name" => "Potion of Regeneration", "type" => "potion", "bg_pos" => "-32px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,370);'>Ghast Tear</a> + ".$link_awkward_potion, "desc" => "Restores 46 health over time.", "more_info" => "Potions"),
        1 => array("id" => "6", "name" => "Potion of Regeneration (Extended)", "type" => "potion", "bg_pos" => "-32px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,5);'>Potion of Regeneration</a>", "desc" => "Restores 108 health over time.", "more_info" => "Potions"),
        2 => array("id" => "7", "name" => "Potion of Regeneration II", "type" => "potion", "bg_pos" => "-32px 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + <a onclick='dBoots.jumpToPotion(this,5);'>Potion of Regeneration</a>", "desc" => "Restores 48 health over time.", "more_info" => "Potions"),
        3 => array("id" => "8", "name" => "Potion of Swiftness", "type" => "potion", "bg_pos" => "-64px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,353);'>Sugar</a> + ".$link_awkward_potion, "desc" => "Increases player's movement, sprinting speed, jumping length and field of view.", "more_info" => "Potions"),
        4 => array("id" => "9", "name" => "Potion of Swiftness (Extended)", "type" => "potion", "bg_pos" => "-64px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,8);'>Potion of Swiftness</a>", "desc" => "Increases player's movement, sprinting speed, jumping length and field of view.", "more_info" => "Potions"),
        5 => array("id" => "10", "name" => "Potion of Swiftness II", "type" => "potion", "bg_pos" => "-64px 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + <a onclick='dBoots.jumpToPotion(this,8);'>Potion of Swiftness</a>", "desc" => "Increases player's movement, sprinting speed, jumping length and field of view.", "more_info" => "Potions"),
        6 => array("id" => "11", "name" => "Potion of Fire Resistance", "type" => "potion", "bg_pos" => "-96px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,378);'>Magma Cream</a> + ".$link_awkward_potion, "desc" => "Gives immunity to damage from fire, lava, and ranged Blaze attacks.", "more_info" => "Potions"),
        7 => array("id" => "12", "name" => "Potion of Fire Resistance (Extended)", "type" => "potion", "bg_pos" => "-96px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,11);'>Potion of Fire Resistance</a>", "desc" => "Gives immunity to damage from fire, lava, and ranged Blaze attacks.", "more_info" => "Potions"),
        8 => array("id" => "13", "name" => "Potion of Healing", "type" => "potion", "bg_pos" => "-128px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,382);'>Glistering Melon</a> + ".$link_awkward_potion, "desc" => "Restores 6 health per potion's tier.", "more_info" => "Potions"),
        9 => array("id" => "14", "name" => "Potion of Healing II", "type" => "potion", "bg_pos" => "-128px 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + <a onclick='dBoots.jumpToPotion(this,13);'>Potion of Healing</a>", "desc" => "Restores 6 health per potion's tier.", "more_info" => "Potions"),        
        10 => array("id" => "15", "name" => "Potion of Night Vision", "type" => "potion", "bg_pos" => "-352px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,396);'>Golden Carrot</a> + ".$link_awkward_potion, "desc" => "Player's visibility is enhanced in the dark.", "more_info" => "Potions"),
        11 => array("id" => "16", "name" => "Potion of Night Vision (Extended)", "type" => "potion", "bg_pos" => "-352px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,15);'>Potion of Night Vision</a>", "desc" => "Player's visibility is enhanced in the dark.", "more_info" => "Potions"),
        12 => array("id" => "17", "name" => "Potion of Strength", "type" => "potion", "bg_pos" => "-160px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,377);'>Blaze Powder</a> + ".$link_awkward_potion, "desc" => "Increases melee damage by 3 per potion's tier.", "more_info" => "Potions"),
        13 => array("id" => "18", "name" => "Potion of Strength (Extended)", "type" => "potion", "bg_pos" => "-160px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,17);'>Potion of Strength</a>", "desc" => "Increases melee damage by 3 per potion's tier.", "more_info" => "Potions"),
        14 => array("id" => "19", "name" => "Potion of Strength II", "type" => "potion", "bg_pos" => "-160px 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + <a onclick='dBoots.jumpToPotion(this,17);'>Potion of Strength</a>", "desc" => "Increases melee damage by 3 per potion's tier.", "more_info" => "Potions"),
        15 => array("id" => "20", "name" => "Potion of Leaping", "type" => "potion", "bg_pos" => "-320px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,'rabbits_foot');'>Rabbit's Foot</a> + ".$link_awkward_potion, "desc" => "Allows player to jump higher and reduces fall damage.", "more_info" => "Potions"),
        16 => array("id" => "21", "name" => "Potion of Leaping II", "type" => "potion", "bg_pos" => "-320px 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + <a onclick='dBoots.jumpToPotion(this,20);'>Potion of Leaping</a>", "desc" => "Allows player to jump higher and reduces fall damage.", "more_info" => "Potions"),
        17 => array("id" => "22", "name" => "Potion of Water Breathing", "type" => "potion", "bg_pos" => "-382px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,\"349_3\");'>Pufferfish</a> + ".$link_awkward_potion, "desc" => "Prevents oxygen depletion and increases underwater visibility.", "more_info" => "Potions"),
        18 => array("id" => "23", "name" => "Potion of Water Breathing (Extended)", "type" => "potion", "bg_pos" => "-382px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,22);'>Potion of Water Breathing</a>", "desc" => "Prevents oxygen depletion and increases underwater visibility.", "more_info" => "Potions"),
        19 => array("id" => "24", "name" => "Potion of Invisibility", "type" => "potion", "bg_pos" => "-416px 0", "recipe" => "", "ingredients" => $link_fermented_spidereye." + <a onclick='dBoots.jumpToPotion(this,15);'>Potion of Night Vision</a>", "desc" => "Causes players model to disappear. Armor and weapons are not affected.", "more_info" => "Potions"),
        20 => array("id" => "25", "name" => "Potion of Invisibility (Extended)", "type" => "potion", "bg_pos" => "-416px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,15);'>Potion of Night Vision</a>", "desc" => "Causes players model to disappear. Armor and weapons are not affected.", "more_info" => "Potions"),
      );
      $negative_effect_potions = array(
        0 => array("id" => "26", "name" => "Potion of Poison", "type" => "potion", "bg_pos" => "-192px 0", "recipe" => "", "ingredients" => "<a onclick='dBoots.jumpToItem(this,375);'>Spider Eye</a> + ".$link_awkward_potion, "desc" => "Poisons the player, reducing the health to 1.", "more_info" => "Potions"),
        1 => array("id" => "27", "name" => "Potion of Poison (Extended)", "type" => "potion", "bg_pos" => "-192px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,26);'>Potion of Poison</a>", "desc" => "Poisons the player, reducing the health to 1.", "more_info" => "Potions"),
        2 => array("id" => "28", "name" => "Potion of Poison II", "type" => "potion", "bg_pos" => "-192px 0", "recipe" => "", "ingredients" => $link_glowstone_dust." + <a onclick='dBoots.jumpToPotion(this,26);'>Potion of Poison</a>", "desc" => "Poisons the player, reducing the health to 1.", "more_info" => "Potions"),
        3 => array("id" => "29", "name" => "Potion of Weakness", "type" => "potion", "bg_pos" => "-224px 0", "recipe" => "", "ingredients" => $link_fermented_spidereye." + ".$link_water_bottle, "desc" => "Base for <a onclick='dBoots.jumpToPotion(this,30);'>Potion of Weakness (Extended)</a>.", "more_info" => "Brewing#Primary"),
        5 => array("id" => "30", "name" => "Potion of Weakness (Extended)", "type" => "potion", "bg_pos" => "-224px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,29);'>Potion of Weakness</a>", "desc" => "Reduces melee damage by 2.", "more_info" => "Potions"),
        6 => array("id" => "31", "name" => "Potion of Slowness", "type" => "potion", "bg_pos" => "-256px 0", "recipe" => "", "ingredients" => $link_fermented_spidereye." + (<a onclick='dBoots.jumpToPotion(this,11);'>Potion of Fire Resistance</a> or <a onclick='dBoots.jumpToPotion(this,8);'>Potion of Swiftness</a>)", "desc" => "Player's movement speed is reduced.", "more_info" => "Potions"),
        7 => array("id" => "32", "name" => "Potion of Slowness (Extended)", "type" => "potion", "bg_pos" => "-256px 0", "recipe" => "", "ingredients" => $link_redstone_dust." + <a onclick='dBoots.jumpToPotion(this,31);'>Potion of Slowness</a>", "desc" => "Player's movement speed is reduced.", "more_info" => "Potions"),
        8 => array("id" => "33", "name" => "Potion of Harming", "type" => "potion", "bg_pos" => "-288px 0", "recipe" => "", "ingredients" => $link_fermented_spidereye." + (<a onclick='dBoots.jumpToPotion(this,13);'>Potion of Healing</a> or <a onclick='dBoots.jumpToPotion(this,26);'>Potion of Poison</a>)", "desc" => "Inflicts 6 damage per potion's tier.", "more_info" => "Potions"),
        9 => array("id" => "34", "name" => "Potion of Harming II", "type" => "potion", "bg_pos" => "-288px 0", "recipe" => "", "ingredients" => $link_fermented_spidereye." + (<a onclick='dBoots.jumpToPotion(this,14);'>Potion of Healing II</a> or <a onclick='dBoots.jumpToPotion(this,28);'>Potion of Poison II</a>)", "desc" => "Inflicts 6 damage per potion's tier.", "more_info" => "Potions"),        
      );
      
      function render_potion_rows($potion_type) {
        $splash_notice_li = '<div class="footnote">Add <a onclick=\'dBoots.jumpToItem(this,289,"potion");\'>Gunpowder</a> to any potion, in a '.jumpTo("Item","379","Brewing Stand").', to convert it to a <a href="http://minecraft.gamepedia.com/Splash_Potion">Splash Potion</a>.</div>';

        foreach ($potion_type as $potion) {    
          $desc_markup = isset($potion["desc"]) && $potion["desc"] != "" ? '<div class="desc">'.$potion["desc"].'</div>' : false;
          $name_b_markup = isset($potion["name_b"]) ? '&#160;<span class="soft">('.$potion["name_b"].')</span>' : false;
          $row_title_name = isset($potion["name_b"]) ? str_replace(" ","_",strtolower($potion["name"]."_".$potion["name_b"])) : str_replace(" ","_",strtolower($potion["name"]));
          $stackable_markup = '<div class="source"><span class="soft">Stackable:</span> No</div>';
          $ingredients_markup = isset($potion["ingredients"]) ? '<div class="line"><span class="soft">Ingredients:</span> '.$potion["ingredients"].'</div>' : false;
          
          if($potion["name"] != "") {          
            echo '<li id="potion_',$potion["id"],'" class="potion"><div class="row_item_container" title="'.$potion["name"].' - Minecraft"><span class="potion_icon" style="background-position:'.$potion["bg_pos"],';"></span><h2 id="',$row_title_name,'">',$potion["name"],$name_b_markup,'</h2></div> <div class="content" id="potion_content_',$potion["id"],'" onclick="_stopProp(event);"> ',$desc_markup,$ingredients_markup,$stackable_markup,$splash_notice_li,' <a onclick="dBoots.openMore(event,\'',$potion["more_info"],'\');" class="more_info">More Info</a></div></li>';
          }
        } 
      }
    ?> 
    <section>
      <ul id="potion_rows">
        <li class="heading">Base Potions</li>
        <? render_potion_rows($base_potions); ?>   
        <li class="heading">Primary Potions</li>
        <? render_potion_rows($primary_potions); ?>
        <li class="heading">Negative Effect Potions</li>
        <? render_potion_rows($negative_effect_potions); ?>
      </ul>
    </section>
  </div>

  <div id="mobs_section" class="section_main" style="display:none;">
    <?
      $common_biomes = "Plains, Extreme Hills, Forest, Taiga, Swamp, Jungle, Birch Forest, Roofed Forest, Cold Taiga, Mega Taiga, Savanna.";
      $zombie_drops = jumpTo("Item",265,"Iron Ingots").", ".jumpTo("Item",391,"Carrots").", ".jumpTo("Item",392,"Potatoes").", and any naturally spawned equipment.";
      $guardian_drops = jumpTo("Item","-pris_crystals","Prismarine Crystals").", ".jumpTo("Item","-pris_shard","Prismarine Shards").", Various Raw Fish.";
      $rabbit_drops = jumpTo("Item","415","Rabbit Hide").", ".jumpTo("Item","411","Raw Rabbit").", ".jumpTo("Item","414","Rabbit's Foot")." (Rare)";
      $witch_drops = jumpTo("Item","374","Glass Bottles").", ".$link_glowstone_dust.", ".jumpTo("Item","289","Gunpowder").", ".$link_redstone_dust.", ".jumpTo("Item","375","Spider Eyes").", ".jumpTo("Item","353","Sugar").", and ".jumpTo("Item","280","Sticks");

      $mobs = array(
          34 => array("id" => "34", "name" => "Bat", "type" => "mob", "bg_pos" => "-128px -64px", "mob_image" => "", "health" => "6", "exp" => "0", "drops" => "", "spawn" => "Below layer 63, light level of 4 or less", "desc" => "Passive mob often found in caves.", "more_info" => "Bat"),
          0 => array("id" => "0", "name" => "Blaze", "type" => "mob", "bg_pos" => "0 0", "mob_image" => "", "health" => "20", "exp" => "10", "drops" => "<a onclick='dBoots.jumpToItem(this,369);'>Blaze Rod</a>", "spawn" => "Nether Fortresses", "desc" => "Hostile <a onclick='dBoots.jumpToItem(this,385);'>Fire Charge</a>-shooting mob found in the Nether.", "more_info" => "Blaze"),
          1 => array("id" => "1", "name" => "Cat", "type" => "mob", "bg_pos" => "-32px 0", "mob_image" => "", "health" => "10", "exp" => "1-3", "drops" => "", "spawn" => "<a onclick='dBoots.jumpToMob(this,12);'>Ocelot</a>", "breed" => "Any type of uncooked fish.", "desc" => "Passive mob tamed from <a onclick='dBoots.jumpToMob(this,12);'>Ocelots</a>. Defense against ".$link_creepers.".", "more_info" => "Cat"),
          2 => array("id" => "2", "name" => "Chicken", "type" => "mob", "bg_pos" => "-64px 0", "mob_image" => "", "health" => "4", "exp" => "1-3", "drops" => "<a onclick='dBoots.jumpToItem(this,365);'>Chicken</a>, <a onclick='dBoots.jumpToItem(this,288);'>Feathers</a>, <a onclick='dBoots.jumpToItem(this,344);'>Eggs</a>", "spawn" => "", "breed" => jumpTo("Item","295","Seeds"), "desc" => "Passive livestock mob.", "more_info" => "Chicken"),
          33 => array("id" => "33", "name" => "Chicken Jockey", "type" => "mob", "bg_pos" => "-96px -64px", "mob_image" => "", "health" => "24", "exp" => "12, 10", "drops" => $zombie_drops, "spawn" => "Light level 7 or less.", "desc" => "Hostile mob.", "more_info" => "Zombie"),
          3 => array("id" => "3", "name" => "Cow", "type" => "mob", "bg_pos" => "-96px 0", "mob_image" => "", "health" => "10", "exp" => "1-3", "drops" => "<a onclick='dBoots.jumpToItem(this,363);'>Beef</a>, <a onclick='dBoots.jumpToItem(this,334);'>Leather</a>, <a onclick='dBoots.jumpToItem(this,335);'>Milk</a> (with <a onclick='dBoots.jumpToItem(this,325);'>bucket</a>)", "spawn" => "Grass or sheared <a onclick='dBoots.jumpToMob(this,4);'>Mooshroom Cow</a>.", "breed" => jumpTo("Item","296","Wheat"), "desc" => "Passive livestock mob.", "more_info" => "Cow"),
          4 => array("id" => "4", "name" => "Cow", "name_b" => "Mooshroom", "type" => "mob", "bg_pos" => "-128px 0", "mob_image" => "", "health" => "10", "exp" => "1-3", "drops" => "<a onclick='dBoots.jumpToItem(this,334);'>Leather</a>, <a onclick='dBoots.jumpToItem(this,363);'>Raw Beef</a>, <a onclick='dBoots.jumpToItem(this,40);'>Red Mushrooms</a> (with ".$link_shears."), <a onclick='dBoots.jumpToItem(this,282);'>Mushroom Stew</a> (with <a onclick='dBoots.jumpToItem(this,281);'>Bowl</a>), <a onclick='dBoots.jumpToItem(this,335);'>Milk</a> (with <a onclick='dBoots.jumpToItem(this,325);'>Bucket</a>)", "spawn" => "Mushroom biomes", "desc" => "Passive mob found in Mushroom biomes.", "more_info" => "Mooshroom"),
          5 => array("id" => "5", "name" => "Creeper", "type" => "mob", "bg_pos" => "-160px 0", "mob_image" => "", "health" => "20", "exp" => "5", "drops" => "<a onclick='dBoots.jumpToItem(this,289);'>Gunpowder</a>, <a onclick='dBoots.jumpToItem(this,2256);'>Music Disc</a>", "spawn" => "Light level 7 or less.", "desc" => "Explosive hostile mob. Can survive in sunlight. Fearful towards <a onclick='dBoots.jumpToMob(this,1);'>Cats</a>.", "more_info" => "Creeper"),
          6 => array("id" => "6", "name" => "Ender Dragon", "type" => "mob", "bg_pos" => "-192px 0", "mob_image" => "", "health" => "200", "exp" => "20,000", "drops" => "Overworld Portal, <a onclick='dBoots.jumpToItem(this,122);'>Dragon Egg</a>.", "spawn" => "The End", "desc" => "Hostile boss mob of <strong>The End</strong>.", "more_info" => "Ender_Dragon"),
          7 => array("id" => "7", "name" => "Enderman", "type" => "mob", "bg_pos" => "-224px 0", "mob_image" => "", "health" => "40", "exp" => "5", "drops" => jumpTo("Item",368,"Ender Pearl"), "spawn" => "Light level 7 or less, The End", "desc" => "Neutral until attacked or looked directly at by a player. Damaged by water.", "more_info" => "Enderman"),
          35 => array("id" => "35", "name" => "Endermite", "type" => "mob", "bg_pos" => "-160px -64px", "mob_image" => "", "health" => "8", "exp" => "3", "drops" => "", "spawn" => "When ".jumpTo("Item",368,"Ender Pearl")." is thrown (5% chance).", "desc" => "Hostile mob.", "more_info" => "Endermite"),
          36 => array("id" => "36", "name" => "Guardian", "type" => "mob", "bg_pos" => "-192px -64px", "mob_image" => "", "health" => "30", "exp" => "10", "drops" => $guardian_drops, "spawn" => "Near Ocean Monuments.", "desc" => "Hostile ocean mob.", "more_info" => "Guardian"),
          37 => array("id" => "37", "name" => "Guardian", "name_b" => "Elder", "type" => "mob", "bg_pos" => "-224px -64px", "mob_image" => "", "health" => "80", "exp" => "10", "drops" => jumpTo("Item","-sponge_wet","Wet Sponge").", ".$guardian_drops, "spawn" => "Ocean Monuments.", "desc" => "Hostile ocean boss mob.", "more_info" => "Elder_Guardian"),
          8 => array("id" => "8", "name" => "Ghast", "type" => "mob", "bg_pos" => "-256px 0", "mob_image" => "", "health" => "10", "exp" => "5", "drops" => "<a onclick='dBoots.jumpToItem(this,370);'>Ghast Tear</a>, <a onclick='dBoots.jumpToItem(this,289);'>Gunpowder</a>", "spawn" => "The Nether", "desc" => "Hostile flying, fire-ball shooting, Nether mob.", "tips" => "A Ghast's fire-ball can be repelled effectively by targeting it with an arrow.", "more_info" => "Ghast"),
          9 => array("id" => "9", "name" => "Golem", "name_b" => "Iron", "type" => "mob", "bg_pos" => "-288px 0", "mob_image" => "", "health" => "100", "exp" => "0", "drops" => "<a onclick='dBoots.jumpToItem(this,265);'>Iron Ingot</a>, <a onclick='dBoots.jumpToItem(this,38);'>Rose</a>", "spawn" => "Near a group of 16 ".$link_villagers." and 21 houses in any light level. May be built by player.", "desc" => "Utility village mob used to defend ".$link_villagers.". May be built with 4 <a onclick='dBoots.jumpToItem(this,42);'>Iron Blocks</a> and 1 <a onclick='dBoots.jumpToItem(this,86);'>Pumpkin</a>.", "more_info" => "Iron_Golem"),
        10 => array("id" => "10", "name" => "Golem", "name_b" => "Snow", "type" => "mob", "bg_pos" => "-320px 0", "mob_image" => "", "health" => "6", "exp" => "0", "drops" => "<a onclick='dBoots.jumpToItem(this,332);'>Snowball</a>", "spawn" => "Built by player. Anywhere except Jungle or Desert biomes.", "desc" => "Utility mob built by player using 2 <a onclick='dBoots.jumpToItem(this,80);'>Snow Blocks</a> and 1 <a onclick='dBoots.jumpToItem(this,86);'>Pumpkin</a>.", "more_info" => "Snow_Golem"),
        32 => array("id" => "32", "name" => "Horse", "type" => "mob", "bg_pos" => "-64px -64px", "mob_image" => "", "health" => "15-30", "exp" => "1-7", "drops" => " <a onclick='dBoots.jumpToItem(this,334);'>Leather</a>, ".jumpTo("Item","352","Bone").", ".jumpTo("Item","367","Rotten Flesh")."", "spawn" => "Plains & Savanna", "breed" => "<a onclick='dBoots.jumpToItem(this,396);'>Golden Carrots</a> or <a onclick='dBoots.jumpToItem(this,322);'>Golden Apples</a>", "desc" => "Passive livestock mob which may be ridden by player once tamed. To tame a wild horse right-click, with an empty hand, to mount. The horse may throw you off. Repeat as necessary until the Horse is broken in.", "more_info" => "Horse"),
        31 => array("id" => "31", "name" => "Killer Bunny", "type" => "mob", "bg_pos" => "-32px -64px", "mob_image" => "", "health" => "10", "exp" => "1-4", "drops" => $rabbit_drops, "spawn" => $common_biomes, "desc" => "Rare hostile mob.", "more_info" => "Rabbit#The_Killer_Bunny"),
        11 => array("id" => "11", "name" => "Magma Cube", "type" => "mob", "bg_pos" => "-352px 0", "mob_image" => "", "health" => "Lg: 16, Med: 4, Sm: 1", "exp" => "Lg: 4, Med: 2, Sm: 1", "drops" => "<a onclick='dBoots.jumpToItem(this,378);'>Magma Cream</a>", "spawn" => "The Nether", "desc" => "Hostile hopping Nether mob which divides when attacked.", "more_info" => "Magma_Cube"),
        12 => array("id" => "12", "name" => "Ocelot", "type" => "mob", "bg_pos" => "-384px 0", "mob_image" => "", "health" => "10", "exp" => "1-3", "drops" => "", "spawn" => "Jungle biomes", "desc" => "Passive mob found in Jungle biomes. Tamable with <a onclick='dBoots.jumpToItem(this,349);'>Raw Fish</a>.", "more_info" => "Ocelot"),
        13 => array("id" => "13", "name" => "Pig", "type" => "mob", "bg_pos" => "-416px 0", "mob_image" => "", "health" => "10", "exp" => "1-3", "drops" => jumpTo("Item","319","Porkchop"), "spawn" => "Grass blocks", "breed" => "<a onclick='dBoots.jumpToItem(this,391);'>Carrots</a>", "desc" => "Passive livestock mob.", "more_info" => "Pig"),
        30 => array("id" => "30", "name" => "Rabbit", "type" => "mob", "bg_pos" => "0 -64px", "mob_image" => "", "health" => "10", "exp" => "1-4", "drops" => $rabbit_drops, "spawn" => $common_biomes, "breed" => "<a onclick='dBoots.jumpToItem(this,391);'>Carrots</a> or <a onclick='dBoots.jumpToItem(this,37);'>Dandelion</a>", "desc" => "Passive livestock mob.", "more_info" => "Rabbit"),
        14 => array("id" => "14", "name" => "Sheep", "type" => "mob", "bg_pos" => "-448px 0", "mob_image" => "", "health" => "8", "exp" => "1-3", "drops" => "1 <a onclick='dBoots.jumpToItem(this,35);'>Wool</a> block (1-3 with ".$link_shears.")", "spawn" => "Grass blocks", "breed" => jumpTo("Item","296","Wheat"), "desc" => "Passive wool source mob.", "more_info" => "Sheep"),
        15 => array("id" => "15", "name" => "Squid", "type" => "mob", "bg_pos" => "0 -32px", "mob_image" => "", "health" => "10", "exp" => "1-3", "drops" => "<a onclick='dBoots.jumpToItem(this,351);'>Ink Sac</a>", "spawn" => "Water", "desc" => "Passive water mob.", "more_info" => "Squid"),
        16 => array("id" => "16", "name" => "Silverfish", "type" => "mob", "bg_pos" => "-32px -32px", "mob_image" => "", "health" => "8", "exp" => "5", "drops" => "", "spawn" => "Spawners in Strongholds.", "desc" => "Hostile underground mob.", "more_info" => "Silverfish"),
        17 => array("id" => "17", "name" => "Skeleton", "type" => "mob", "bg_pos" => "-64px -32px", "mob_image" => "", "health" => "20", "exp" => "5", "drops" => "<a onclick='dBoots.jumpToItem(this,262);'>Arrows</a>, <a onclick='dBoots.jumpToItem(this,352);'>Bone</a>, <a onclick='dBoots.jumpToItem(this,261);'>Bow</a>", "spawn" => "Light level 7 or less.", "desc" => "Hostile arrow shooting mob. Burns in sunlight.", "more_info" => "Skeleton"),
        18 => array("id" => "18", "name" => "Slime", "type" => "mob", "bg_pos" => "-96px -32px", "mob_image" => "", "health" => "Lg: 16, Med: 4, Sm: 1", "exp" => "Lg: 4, Med: 2, Sm: 1", "drops" => "<a onclick='dBoots.jumpToItem(this,341);'>Slimeball</a>", "spawn" => "Swamps and caves.", "desc" => "Hostile hopping underground mob which divides when attacked.", "more_info" => "Slime"),
        19 => array("id" => "19", "name" => "Spider", "type" => "mob", "bg_pos" => "-128px -32px", "mob_image" => "", "health" => "16", "exp" => "5", "drops" => "<a onclick='dBoots.jumpToItem(this,287);'>String</a>, <a onclick='dBoots.jumpToItem(this,375);'>Spider Eye</a>", "spawn" => "Light level 7 or less.", "desc" => "Hostile climbing mob which becomes peaceful in daylight.", "more_info" => "Spider"),
        20 => array("id" => "20", "name" => "Spider", "name_b" => "Cave", "type" => "mob", "bg_pos" => "-160px -32px", "mob_image" => "", "health" => "12", "exp" => "5", "drops" => "<a onclick='dBoots.jumpToItem(this,287);'>String</a>, <a onclick='dBoots.jumpToItem(this,375);'>Spider Eye</a>", "spawn" => "Abandoned Mine Shafts", "desc" => "Venomous hostile mob.", "more_info" => "Cave_Spider"),
        21 => array("id" => "21", "name" => "Spider", "name_b" => "Jockey", "type" => "mob", "bg_pos" => "-192px -32px", "mob_image" => "", "health" => "Skeleton: 20, Spider: 16", "exp" => "Skeleton: 5, Spider: 5", "drops" => "<a onclick='dBoots.jumpToItem(this,352);'>Bone</a>, <a onclick='dBoots.jumpToItem(this,262);'>Arrows</a>, <a onclick='dBoots.jumpToItem(this,261);'>Bow</a>, <a onclick='dBoots.jumpToItem(this,287);'>String</a>, <a onclick='dBoots.jumpToItem(this,375);'>Spider Eye</a>", "spawn" => "Light level 7 or less.", "desc" => "Rare hostile combination mob.", "more_info" => "Spider_Jockey"),
        22 => array("id" => "22", "name" => "Villager", "type" => "mob", "bg_pos" => "-224px -32px", "mob_image" => "", "health" => "20", "exp" => "0", "drops" => "", "spawn" => "Villages", "desc" => "Passive NPC mob which can be traded with and will breed depending on housing availability.", "more_info" => "Villager"),
        28 => array("id" => "28", "name" => "Witch", "type" => "mob", "bg_pos" => "-416px -32px", "mob_image" => "", "health" => "26", "exp" => "5", "drops" => $witch_drops, "spawn" => "Light level of 7 or less.", "desc" => "Hostile mob.", "more_info" => "Witch"),
        26 => array("id" => "26", "name" => "Wither", "type" => "mob", "bg_pos" => "-352px -32px", "mob_image" => "", "health" => "300", "exp" => "50", "drops" => "<a onclick='dBoots.jumpToItem(this,399);'>Nether Star</a>", "spawn" => "Built by player using 4 ".jumpTo("Item",88,"Soul Sand")." and 3 ".jumpTo("Mob",27,"Wither Skeleton Skulls").".", "desc" => "Hostile mob.", "more_info" => "Wither"),
        27 => array("id" => "27", "name" => "Wither Skeleton", "type" => "mob", "bg_pos" => "-384px -32px", "mob_image" => "", "health" => "20", "exp" => "5", "drops" => "<a href='http://minecraft.gamepedia.com/Wither_Skeleton_Skull'>Wither Skeleton Skull</a> (Rare)", "spawn" => "Nether fortresses at light level 7 or less.", "desc" => "Hostile mob.", "more_info" => "Wither_Skeleton"),
        23 => array("id" => "23", "name" => "Wolf", "type" => "mob", "bg_pos" => "-256px -32px", "mob_image" => "", "health" => "Wild: 8, Tamed: 20", "exp" => "1-3", "drops" => "", "spawn" => "On grass in Forest and Taiga biomes.", "breed" => "Any type of meat.", "desc" => "Neutral mob. Use ".jumpTo("Item",352,"Bones")." to tame. Becomes hostile when attacked.", "more_info" => "Wolf"),
        24 => array("id" => "24", "name" => "Zombie", "type" => "mob", "bg_pos" => "-288px -32px", "mob_image" => "", "health" => "20", "exp" => "5", "drops" => $zombie_drops, "spawn" => "Light level 7 or less.", "desc" => "Hostile mob.", "more_info" => "Zombie"),
        25 => array("id" => "25", "name" => "Zombie Pigman", "type" => "mob", "bg_pos" => "-320px -32px", "mob_image" => "", "health" => "20", "exp" => "5", "drops" => "<a onclick='dBoots.jumpToItem(this,367);'>Rotten Flesh</a>, <a onclick='dBoots.jumpToItem(this,371);'>Gold Nugget</a>, <a onclick='dBoots.jumpToItem(this,266);'>Gold Ingot</a>, <a onclick='dBoots.jumpToItem(this,283);'>Gold Sword</a>, <a onclick='dBoots.jumpToItem(this,314);'>Gold Helmet</a>", "spawn" => "The Nether", "desc" => "Neutral Nether mob. Becomes hostile, in groups, when attacked.", "more_info" => "Zombie_Pigman"),
        29 => array("id" => "29", "name" => "Zombie Villager", "type" => "mob", "bg_pos" => "-448px -32px", "mob_image" => "", "health" => "20", "exp" => "5", "drops" => $zombie_drops, "spawn" => "Light level 7 or less.", "desc" => "Infected hostile mob. May be cured by throwing a <a onclick='dBoots.jumpToPotion(this,29);'>Splash Potion of Weakness</a> at them, then feeding a <a onclick='dBoots.jumpToItem(this,322);'>Golden Apple</a>.", "more_info" => "Zombie#Zombie_Villagers")
      );
    ?> 
    <section>
      <ul id="mob_rows">
        <? 
          function mob_line_markup($title, $text) {
            return '<div class="line"><strong class="soft">'.$title.':</strong>&#160;'.$text.'</div>';
          }

          foreach ($mobs as $mob) {    
            $desc_markup = isset($mob["desc"]) && $mob["desc"] != "" ? '<div class="desc">'.$mob["desc"].'</div>' : false;
            $tips_markup = isset($mob["tips"]) && $mob["tips"] != "" ? '<div class="desc"><strong class="soft">Tips:</strong>&#160;'.$mob["tips"].'</div>' : false;
            $footnote_markup = isset($mob["footnote"]) && $mob["footnote"] != "" ? '<div class="footnote">'.$mob["footnote"].'</div>' : false;
            $name_b_markup = isset($mob["name_b"]) ? '&#160;<span class="soft">('.$mob["name_b"].')</span>' : false;
            $drops_markup = isset($mob["drops"]) && $mob["drops"] != "" ? mob_line_markup("Drops", $mob["drops"]) : false;
            $breed_markup = isset($mob["breed"]) && $mob["breed"] != "" ? mob_line_markup("Breed With", $mob["breed"]) : false;
            $spawn_markup = isset($mob["spawn"]) && $mob["spawn"] != "" ? mob_line_markup("Spawn", $mob["spawn"]) : false;
            $health_markup = isset($mob["health"]) ? mob_line_markup("Health Points", $mob["health"]) : false;
            $exp_markup = isset($mob["exp"]) ? mob_line_markup("Experience", $mob["exp"]) : false;
            $row_title_name = isset($mob["name_b"]) ? str_replace(" ","_",strtolower($mob["name"]."_".$mob["name_b"])) : str_replace(" ","_",strtolower($mob["name"]));
            
            $all_markup = $desc_markup.$drops_markup.$breed_markup.$spawn_markup.$health_markup.$exp_markup.$tips_markup.$footnote_markup;
            
            if($mob["name"] != "") {          
              echo '<li id="mob_',$mob["id"],'" class="mob"><div class="row_item_container" title="'.$mob["name"].' - Minecraft"><span class="mob_icon" style="background-position:'.$mob["bg_pos"],';"></span> <h2 id="',$row_title_name,'">',$mob["name"],$name_b_markup,'</h2></div> <div class="content" id="mob_content_',$mob["id"],'" onclick="_stopProp(event);"> ',$all_markup,' <a onclick="dBoots.openMore(event,\'',$mob["more_info"],'\');" class="more_info">More Info</a></div></li>';
            }
          } 
        ?>   
      </ul>
    </section>
  </div>

  <? if($prod_mode == true && $floatyad_mode != true) { ?>
    <div class="adbanner_2014_bottom">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- diamondboots.com - bottom -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-0446740701433346"
           data-ad-slot="1978424693"
           data-ad-format="auto"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  <? } ?>  

  <footer>
    <div class="footer">
      <div>Minecraft Crafting Guide &amp; Reference</div>
      <div><strong>diamondboots.com</strong></div>
      <div>Minecraft Version: 1.8</div>
      <div>&copy; 2015 <a href="mailto:lavastands@gmail.com?subject=diamondboots.com">diamondboots.com</a></div>
      <div class="twitter_button">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://diamondboots.com" data-text="Check out Minecraft Crafting Guide &amp; Reference!" data-size="large" data-related="diamondboots_mc" data-hashtags="minecraft">Tweet</a> 
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
      </div>
    </div>
    <div class="sub_footer">
      <div><a href="http://www.minecraft.net/">Minecraft</a> content and materials are trademarks and copyrights of <a href="http://mojang.com/">Mojang</a> AB or its licensors. All rights reserved.</div>
    </div>
  </footer>

</div> <!-- sections_container -->

<script type="text/javascript" src="db.js?v=<?=$asset_version?>"></script>
<script>
/* Execute after assets (images, css, etc) have been loaded. */
window.onload = function() {  
  <? if($prod_mode == true) { ?>
  /*dBoots.fixTop();*/
  <? } ?>
  dBoots.populateFilter("<? echo (isset($_GET['q'])) ? $_GET['q'] : ""; ?>");
};


</script>

</body>
</html>

<?php 
  if($prod_mode == true) {
    ob_end_flush(); 
  }
?>
