<?
/* i18n */
$page_title = "Minecraft Crafting and Reference Guide - Crafting Recipes, Potions, &amp; Information - Optimized for iPhone, Android, iPad, and tablets.";    
$page_header = "Minecraft Crafting Guide & Reference";
$page_crafting = "Crafting";
$page_potions = "Potions";
$page_server = "Server";
$page_search_filter = "Search Filter";
$page_ernest = "Ernest";
$lang = "en";

if(isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
    $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

    switch($lang) {
      case "de":
        $page_title = "Minecraft Crafting und Referenzhandbuch - Handwerksrezepte, Datenwerte &amp; Tränke - Optimiert für iPhone, Android und andere mobile Geräte.";    
        $page_header = "Minecraft Crafting Referenz";
        $page_potions = "Tränke";
        $page_search_filter = "Suche";
        break;
      case "es":
        $page_title = "Minecraft Crafting y Guía de Referencia - La elaboración de recetas, los valores de datos &amp; Pociones - Optimizado para iPhone, Android y otros dispositivos móviles.";
        $page_header = "Referencia de Minecraft";
        $page_potions = "Pociones";
        $page_server = "Servidor";
        $page_search_filter = "Filtro de Búsqueda";
        $page_ernest = "Ernesto";
        break;
      case "fr":
        $page_title = "Minecraft Crafting et guide de référence - Recettes, des valeurs de données &amp; Artisanat; Potions - Optimisé pour iPhone, Android et autres appareils mobiles.";    
        $page_header = "Minecraft Crafting Référence";
        $page_server = "Serveur";
        $page_search_filter = "Recherche";
        break;
      case "it":
        $page_title = "Minecraft Crafting e Guida di riferimento - Crafting Ricette, Valori &amp; dati; Pozioni - Ottimizzato per iPhone, Android e altri dispositivi mobili.";
        $page_header = "Minecraft Crafting di riferimento";
        $page_potions = "Pozioni";
        $page_search_filter = "Filtro di ricerca";
        break;
      case "pt":
        $page_title = "Minecraft Crafting e Guia de Referência - Crafting Receitas, Valores &amp; de dados; Poções - Optimizado para iPhone, Android e outros dispositivos móveis.";    
        $page_header = "Minecraft Crafting Referência";
        $page_potions = "Poções";
        $page_server = "Servidor";
        $page_search_filter = "Pesquisa";
        $page_ernest = "Ernesto";
        break;
      case "ru":
        $page_title = "Minecraft Крафт и Справочное руководство - Крафт Рецепты, значений данных &amp; Зелья - Оптимизированные для iPhone, Android и других мобильных устройств.";
        $page_header = "Minecraft Крафт Ссылка";
        $page_crafting = "Крафт";
        $page_potions = "Зелья";
        $page_server = "сервер";
        $page_search_filter = "поиск";
        break;
      case "tr":
        $page_title = "Minecraft hazırlama ve Başvuru Kılavuzu - Tarifler, Veri Değerleri ve amp hazırlama, İksir - iPhone, Android ve diğer mobil cihazlar için optimize edilmiştir.";
        $page_header = "Minecraft Crafting Referans";
        $page_crafting = "Hazırlama";
        $page_potions = "İksir";
        $page_server = "Sunucusu";
        $page_search_filter = "Arama Filtresi";
        break;
      default:
        break;
    }  

}
?>