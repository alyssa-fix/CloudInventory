function editItemInfo()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          document.getElementById("iteminfo").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","iteminfoedit.php",true);
    xmlhttp.send();
}

function deleteItem()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          document.getElementById("iteminfo").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","iteminfodelete.php",true);
    xmlhttp.send();
}

function editRoomInfo(RoomIDAJAX)
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("settingsDivLeft").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","roomEdit.php?RoomIDAJAX=" + RoomIDAJAX,true);
    xmlhttp.send();
}

function deleteRoomInfo(RoomIDAJAX)
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("settingsDivLeft").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","roomDelete.php?RoomIDAJAX=" + RoomIDAJAX,true);
    xmlhttp.send();
}

function editRoomItemsPage()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("roomInfoLeft").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","itemsroomedit.php",true);
    xmlhttp.send();
}

function editWindowsRoomItems()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("roomInfoRight").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","itemsroomeditwindows.php",true);
    xmlhttp.send();
}

function addWindowRoomItems()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("roomInfoRight").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","itemsroomaddwindow.php",true);
    xmlhttp.send();
}

function editCategoryInfo(CategoryIDAJAX)
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("settingsDivRight").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","categoryEdit.php?CategoryIDAJAX=" + CategoryIDAJAX,true);
    xmlhttp.send();
}

function deleteCategoryInfo(CategoryIDAJAX)
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("settingsDivRight").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","categoryDelete.php?CategoryIDAJAX=" + CategoryIDAJAX,true);
    xmlhttp.send();
}

function addRoom()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("settingsDivLeft").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","roomAdd.php",true);
    xmlhttp.send();
}

function addCategory()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("settingsDivRight").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","categoryAdd.php",true);
    xmlhttp.send();
}

function itemCatList()
      {
      var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
          //document.getElementById("SettingsRow" + RoomIDAJAX).innerHTML=xmlhttp.responseText;
          document.getElementById("roomsTableHolder").innerHTML=xmlhttp.responseText;
          }
        }
    xmlhttp.open("GET","itemscatlist.php",true);
    xmlhttp.send();
}


