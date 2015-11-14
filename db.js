<?
  header("Content-type: text/javascript; charset: UTF-8"); 
  include './includes/common.php';
?>

var _id = function(id) { return document.getElementById(id); };
var _addEvent = function(ele,type,func) {
  if(ele.attachEvent) { 
    ele.attachEvent("on"+type, function(event) { func(event,ele); }); 
  } else { 
    ele.addEventListener(type, function(event) { func(event,ele); }, false); 
  }
};
var _byClass = function(className) {
  if(!!document.getElementsByClassName) {
    return document.getElementsByClassName(className);
  } else {
    tag = "*";
    var k, l, m;
    var classes = className.split(" "), classesToCheck = [], elements = document.all, current, returnElements = [], match;
    for(k=0, kl=classes.length; k<kl; k+=1) {
      classesToCheck.push(new RegExp("(^|\\s)" + classes[k] + "(\\s|$)"));
    }
    for(l=0, ll=elements.length; l<ll; l+=1) {
      current = elements[l];
      match = false;
      for(m=0, ml=classesToCheck.length; m<ml; m+=1) {
        match = classesToCheck[m].test(current.className);
        if(!match) { break; }
      }
      if(match) { returnElements.push(current); }
    }
    return returnElements;
  }
};
var _stopProp = function(e) {
  if(window.event) {
    window.event.cancelBubble = true;
  } else if(e.stopPropagation) {
    e.stopPropagation();
  }
};
  
var dBoots = {
  init : function() { 
    scp = this;
    /*loader = new Image();
    loader.src = "/img/loader.gif";*/
    this.setRowClicks("item");
    this.setRowClicks("mob");
    this.setRowClicks("potion");
    this.setFilter();
    this.setClearButton(this);
  },
  asyncRequest : function(path,target) {
    var req = new XMLHttpRequest();
    req.open("get", path, true);
    req.onreadystatechange = function(e) {
      if(req.readyState === 4 && req.status === 200) {
        target.innerHTML = req.responseText;
      }
    };
    req.send(null);
  },
  fixTop : function() {
    if(document.location.hash.indexOf("item_") == -1) {
      setTimeout(function(){
        window.scrollTo(0,0);
      }, 500);
      _id("sections_container"),scrollTo(0,0);
    }
  },
  navClick : function(target,noFixTop) {
    _id(dBoots.currentlySelectedSection+"_section").style.display="none";
    _id(dBoots.currentlySelectedSection+"_nav").setAttribute("class","");
    
    _id(target+"_section").style.display="block";
    _id(target+"_nav").setAttribute("class","selected");
    dBoots.currentlySelectedSection = target;
    
    if(target == "potions") {
      location.hash = "potions";
    } else if(target == "mobs") {
      location.hash = "mobs";  
    } else if(target == "server") {
      location.hash = "server";  
    } else {
      location.hash = "";
    }
    
    if(!noFixTop) {
      dBoots.fixTop();
    }
  },
  generateRecipeMarkup : function(list,item,amt) {
    var amt_markup = (amt) ? '<div class="amt">'+amt+'</div>' : "";
    var parent_box_attr = 'class="box" title="Click for more info..."';

    var list_arr = list.split(",");
    if(list_arr.length > 2) {
      var markup = '<div class="craft">'
            + '<div class="recipe">'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[0]+'\');"><div class="icon i_'+list_arr[0]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[1]+'\');"><div class="icon i_'+list_arr[1]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[2]+'\');"><div class="icon i_'+list_arr[2]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[3]+'\');"><div class="icon i_'+list_arr[3]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[4]+'\');"><div class="icon i_'+list_arr[4]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[5]+'\');"><div class="icon i_'+list_arr[5]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[6]+'\');"><div class="icon i_'+list_arr[6]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[7]+'\');"><div class="icon i_'+list_arr[7]+'"></div></a></div>'
              + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[8]+'\');"><div class="icon i_'+list_arr[8]+'"></div></a></div>'
            + '</div>'
            + '<div class="arrow"> </div>'
            + '<div class="result">'
              + '<div class="icon i_'+item+'"></div>'
              + amt_markup
            + '</div>'
          + '</div>';
    } else {
      var markup = '<div class="craft smelt">'
        + '<div class="recipe">'
          + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[0]+'\');"><div class="icon i_'+list_arr[0]+'"></div></a></div>'
          + '<div class="box fire"> </div>'
          + '<div '+parent_box_attr+'><a onclick="dBoots.jumpToItem(event,\''+list_arr[1]+'\');"><div class="icon i_'+list_arr[1]+'"></div></a></div>'
        + '</div>'
        + '<div class="arrow"> </div>'
        + '<div class="result"><div class="icon i_'+item+'"></div></div>'
      + '</div>';
    }
    return markup;
  },
  loadRecipes : function(list,item,amt) {      
    _id("recipe_"+item).innerHTML = this.generateRecipeMarkup(list,item,amt);
  },
  jumpToItem : function(event,item,origin_type) {
    _stopProp(event);
    
    if(dBoots.current_open_type == "potion" || dBoots.current_open_type == "mob" || origin_type == "potion" || origin_type == "mob") {
      dBoots.navClick("crafting",true);
    }
    
    this.showAllRows();
    _id("filter_box").value="";
    _id("clear_button").style.display = "none";
    dBoots.createRowContent(_id("item_content_"+item),_id("item_"+item),"item");
    dBoots.scrollToIt("item_"+item);
    return false;
  },
  jumpToPotion : function(event,item) {
    _stopProp(event);
    
    dBoots.navClick("potions",true);
    dBoots.createRowContent(_id("potion_content_"+item),_id("potion_"+item),"mob");
    dBoots.scrollToIt("potion_"+item);  
    return false;
  },
  jumpToMob : function(event,item) {
    _stopProp(event);
    
    dBoots.navClick("mobs",true);
    dBoots.createRowContent(_id("mob_content_"+item),_id("mob_"+item),"mob");
    dBoots.scrollToIt("mob_"+item);
    return false;
  },
  openMore : function(event,keyword) {
    _stopProp(event);
    
    location.href="http://www.minecraftwiki.net/wiki/"+keyword;
    return false;
  },
  populateFilter : function(s_param) {
    var s_value = s_param;
    console.log(s_value);
    if(s_value != "") {
      _id("filter_box").value = s_value;
      dBoots.runFilter();
    }
  },
  scrollToIt : function(target_row) {
    _id(target_row).scrollIntoView(true); 
    window.scrollBy(0,-80);
  },
  showAllRows : function() {
    var item_rows = _byClass("item");
    for(var x=0; x<item_rows.length; x++) {
      item_rows[x].style.display="block";            
    }
  },
  setClearButton : function() {
    _addEvent(_id("clear_button"),
      "click", 
      function(event) {
        _id("clear_button").style.display = "none";
        _id("filter_box").focus();
        _id("filter_box").value = "";
        scp.showAllRows();
        scp.fixTop();
      }
    );
  },
  setCurrentlyOpenRow : function(row,type) {
    if(dBoots.current_open_row) {
      dBoots.current_open_row.parentNode.setAttribute("class",dBoots.current_open_type);
    } else {
      row.parentNode.setAttribute("class",type);
    }
    
    if(dBoots.current_open_row && dBoots.current_open_row.id != row.id) {
      dBoots.current_open_row.style.display="none";
    } 
    dBoots.current_open_row = row;
    dBoots.current_open_type = type;
    
    row.style.display = (row.style.display != "block") ? "block" : "none";
    if(row.style.display == "block") {
      /* Set opened item */
      row.parentNode.setAttribute("class",type+" selected");
      <? if ($mobile) { ?>
      dBoots.scrollToIt(row.parentNode.id);
      <? } ?>
    }
  },
  runFilter : function() {
    _id("clear_button").style.display = (_id("filter_box").value != "") ? "block" : "none";
    var item_rows = _byClass("item");
    
    if(_id("filter_box").value != "") {
      for(var x=0; x<item_rows.length; x++) {
        item_rows[x].style.display="none";            
      } 
      
      for(var y=0; y<dBoots.name_list.length; y++) {
        var name_match = new RegExp(_id("filter_box").value, "gi");
        var name_list_to_match = (_id("filter_box").value.length == 1) ? dBoots.name_list[y][0] : dBoots.name_list[y];
        
        if(name_list_to_match.match(name_match)) {
          var with_underscore = dBoots.name_list[y].replace(/ /g,"_");
          if(_id(with_underscore)) {
            _id(with_underscore).parentNode.parentNode.style.display="block";
          }
        }
      }
    } else {
      dBoots.showAllRows();
    }
  },
  setFilter : function() {   
    _addEvent(_id("filter_box"),
      "keyup",
      function(event) {
        dBoots.runFilter();
      }
    );
  },
  createRowContent : function(row,target,type) {    
    this.setCurrentlyOpenRow(row,type);
    var item_number = target.id.split(type+"_")[1];
      
    /* Potion */
    if(type == "potion") {
    /* Mob */
    } else if(type == "mob") {
    /* Item */
    } else {
      var recipe_box = _id("recipe_"+item_number);
      var recipe_list = _id("recipe_list_"+item_number) ? _id("recipe_list_"+item_number) : false;
      var amt = _id("amt_"+item_number) ? _id("amt_"+item_number) : false;
        
      if(recipe_list && recipe_list.innerHTML != "" && recipe_box.innerHTML == "") {
        /*recipe_box.innerHTML = '<img src="'+loader.src+'" class="loader" />';*/
        scp.loadRecipes(recipe_list.innerHTML,item_number,amt.innerHTML);
      }
    } 
  },
  setRowClicks : function(type) {
    var rows = _id(type+"_rows").getElementsByTagName("li");
    for(var x=0;x<rows.length;x++) {
      var scp = dBoots.selectedRow = this;
      
      if(rows[x].className != "heading") {
        _addEvent(rows[x],
          "click",
          function(event,target) {
            var row = _id(type+"_content_"+target.id.split(type+"_")[1]);
            dBoots.createRowContent(row,target,type); 
          }  
        );
      }
    }
  }
};

dBoots.init(); 

<?
  $name_list = array();
  foreach ($terrain as $item) { 
    $row_item = (isset($item["name_b"])) ? $item["name"]." ".$item["name_b"] : $item["name"];
    array_push($name_list,str_replace("_"," ",strtolower($row_item)));
  }
  echo 'dBoots.name_list ="',implode(",",$name_list),'";';
?>
dBoots.name_list = dBoots.name_list.split(",");

/* Execute before assets (images, css, etc) have been loaded. */
_addEvent(document,
  "DOMContentLoaded",
  function() { 
    if(document.location.hash.indexOf("crafting") != -1) {
      dBoots.navClick("crafting");
    }
    if(document.location.hash.indexOf("potions") != -1) {
      dBoots.navClick("potions");
    }
    if(document.location.hash.indexOf("mobs") != -1) {
      dBoots.navClick("mobs");
    }
    if(document.location.hash.indexOf("server") != -1) {
      dBoots.navClick("server");
    }
  }
);

dBoots.currentlySelectedSection = "crafting";

<?
  if($prod_mode == true) {
    ob_end_flush(); 
  }
?>
