<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css" />
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/defaults.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js"></script>
<script type="text/javascript">
	function setCookie(c_name, value, exdays) {
		var exdate = new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
		document.cookie = c_name + "=" + c_value;
	}

	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while(c.charAt(0) == ' ')
			c = c.substring(1, c.length);
			if(c.indexOf(nameEQ) == 0)
				return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	function clearAll() {
		//See if cookie exists, if not, create one.
		checkCookie();

		//Delete ingredients from DB (PHP)
		if(window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var cId = readCookie("cId");

		var url = "includes/clearAll.php?";
		url += "cid=" + cId;

		xmlhttp.open("GET", url, false);
		xmlhttp.send();

		alert("Your shopping list has been cleared.");

		window.location.href = "http://livefreshforless.com";
	}

	function eraseCookie(name) {
		setCookie(name, "", -1);
	}

	function deleteItem(item) {
		if(window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//createCookie(cId,xmlhttp.responseText,30);
				//alert(xmlhttp.responseText);
				location.reload(true);
			}
		}

		xmlhttp.open("GET", "includes/removeItem.php?rowId=" + item, true);
		xmlhttp.send();
	}

	function checkCookie() {

		var cId = readCookie("cId");
		if(cId != null && cId != "") {
			//Cookie exists (do nothing)
			return true;
		} else {
			//Create Row; Echo id; (PHP)

			if(window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.open("GET", "includes/addCookie.php", true);
			xmlhttp.send();

			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					//createCookie(cId,xmlhttp.responseText,30);
					setCookie("cId", xmlhttp.responseText, 30);
				}
			}
		}

	}
</script>
<link rel="stylesheet" type="text/css" href="css/s.css" />
<link rel="stylesheet" type="text/css" href="css/l.css" />
<link rel="stylesheet" type="text/css" href="css/h.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/webfontkit.css" />
<!--[if !IE]>-->
<link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 480px)" href="css/iphone.css" />
<link type="text/css" rel="stylesheet" media="only screen and (min-device-width: 768px) and (max-device-width: 1024px)" href="css/ipad.css" />
<!--<![endif]-->