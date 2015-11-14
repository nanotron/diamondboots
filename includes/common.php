<?
  include '/srv/www/inc/mobile.php';

  $asset_version = 1;
  $prod_mode = true;
  
  if(isset($_GET['etest']) == true) {
    $prod_mode = false;
  }
  if($_SERVER["SERVER_NAME"] == "test.diamondboots.com") {
    $prod_mode = false;
  }
  if($_SERVER["REQUEST_URI"] == "/test.php") {
    $prod_mode = false;
  }

  $floatyad_mode = true;
  # To re-enable condition set this to false.
  $responsive_ad = true;

  if($mobile) {
    $responsive_ad = false;
  }

  if($prod_mode) {
    error_reporting(E_ALL);
  }
  
  function jumpTo($jumptype, $jumpid, $jumpname) {
    return "<a onclick='dBoots.jumpTo".$jumptype."(this,\"".$jumpid."\");'>".$jumpname."</a>";
  }

  /* Common Links */
  $link_awkward_potion = jumpTo("Potion","1","Awkward Potion");
  $link_glowstone_dust = jumpTo("Item","348","Glowstone Dust"); 
  $link_water_bottle = jumpTo("Item","373","Water Bottle"); 
  $link_chicken = jumpTo("Mob","2","Chicken");
  $link_chickens = jumpTo("Mob","2","Chickens");
  $link_cow = jumpTo("Mob","3","Cow");
  $link_cows = jumpTo("Mob","3","Cows");
  $link_creeper = jumpTo("Mob","5","Creeper");
  $link_creepers = jumpTo("Mob","5","Creepers");
  $link_fermented_spidereye = jumpTo("Item","376","Fermented Spider Eye");
  $link_furnace = jumpTo("Item","61","Furnace");
  $link_golem_iron = jumpTo("Mob","9","Iron Golem");
  $link_golem_snow = jumpTo("Mob","10","Snow Golem"); 
  $link_horse = jumpTo("Mob","32","Horse");
  $link_horses = jumpTo("Mob","32","Horses");
  $link_pig = jumpTo("Mob","13","Pig");
  $link_pigs = jumpTo("Mob","13","Pigs");
  $link_rabbit = jumpTo("Mob","30","Rabbit");
  $link_rabbits = jumpTo("Mob","30","Rabbits");
  $link_redstone_dust = jumpTo("Item","331","Redstone Dust"); 
  $link_seeds = jumpTo("Item","295","Seeds");
  $link_shears = jumpTo("Item","359","Shears");
  $link_sheep = jumpTo("Mob","14","Sheep");
  $link_skeleton = jumpTo("Mob","17","Skeleton");
  $link_spiders = jumpTo("Mob","19","Spiders");
  $link_slimes = jumpTo("Mob","18","Slimes");
  $link_wither = jumpTo("Mob","26","Wither");
  $link_wolf = jumpTo("Mob","23","Wolf");
  $link_wolves = jumpTo("Mob","23","Wolves");
  $link_villager = jumpTo("Mob","22","Villager");
  $link_villagers = jumpTo("Mob","22","Villagers");
  $link_zombie = jumpTo("Mob","24","Zombie");
  $link_zombies = jumpTo("Mob","24","Zombies");
  $link_zombie_villager = jumpTo("Mob","28","Zombie Villager");
  $link_zombie_pigman = jumpTo("Mob","29","Zombie Pigman");
  $link_potions = '<a href="javascript:dBoots.navClick(\'potions\');">Potions</a>';

  /* Utilities */
  function isWeekend() {
    $dw = date("w");
    /* Whitelist Off - Friday, Sat, Sunday */
    if ($dw == 5 || $dw == 6 || $dw == 0) {
        return true;
    } else {
        /* Override here on holidays and so forth. */
        return false;
        #return false;
    }
  }

  $disable_server_tab = true;

  /* Includes */
  include './includes/i18n.php';
  include './includes/items.php';  

  
  if($prod_mode == true) {
    function callback($buffer) {
      $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer); // remove comments
      $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer); // remove tabs, spaces, newlines, etc.
      $buffer = str_replace('{ ', '{', $buffer); // remove unnecessary spaces.
      $buffer = str_replace(' }', '}', $buffer);
      $buffer = str_replace(' {', '{', $buffer);
      $buffer = str_replace('} ', '}', $buffer);
      /*$buffer = str_replace(': ', ':', $buffer);*/
      $buffer = str_replace(' ,', ',', $buffer);
      $buffer = str_replace(' ;', ';', $buffer);
      return $buffer;
    }
    ob_start("callback");
  }
?>
