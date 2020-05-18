var index = "index.php"
var games_page = "games_page.php"
var blog_page = "blog_page.php"
function get(nam){
	return document.getElementById(nam)
}
function css(id){
	return document.querySelector("#"+id);
}

function cssC(cl){
	return document.querySelector("."+cl);
}

function home(){
	window.location.href = index
}
function games(){
	window.location.href = games_page
}
function blog(){
	window.location.href = blog_page
}


function getViewport() {
	 var viewPortWidth;
	 var viewPortHeight;

	 // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
	 if (typeof window.innerWidth != 'undefined') {
	   viewPortWidth = window.innerWidth,
	   viewPortHeight = window.innerHeight
	 }

	// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
	 else if (typeof document.documentElement != 'undefined'
	 && typeof document.documentElement.clientWidth !=
	 'undefined' && document.documentElement.clientWidth != 0) {
		viewPortWidth = document.documentElement.clientWidth,
		viewPortHeight = document.documentElement.clientHeight
	 }

	 // older versions of IE
	 else {
	   viewPortWidth = document.getElementsByTagName('body')[0].clientWidth,
	   viewPortHeight = document.getElementsByTagName('body')[0].clientHeight
	 }
	 return [viewPortWidth, viewPortHeight];
}


function getJSONFromUrl(urlGet, functionDoWithResult){
	var res = "";
	 var cors_api_url = 'https://cors-anywhere.herokuapp.com/';
		 function doCORSRequest(options, printResult) {
		var x = new XMLHttpRequest();
		x.open(options.method, cors_api_url + options.url);
		x.onload = x.onerror = function() {
			 printResult(
			options.method + ' ' + options.url + '\n' +
			x.status + ' ' + x.statusText + '\n\n' +
			(x.responseText || '')
			 );
		};
		if (/^POST/i.test(options.method)) {
			 x.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		}
		x.send(options.data);
		 }

		 // Bind event
		 (function() {
			var urlField = document.getElementById('url');
			var dataField = document.getElementById('data');
			var outputField = document.getElementById('output');

			  doCORSRequest({
				method: this.id === 'post' ? 'POST' : 'GET',
				url: urlGet,
			  }, function printResult(result) {
				//console.log(result);
				functionDoWithResult(result);
			  });
		  })();
		  if (typeof console === 'object') {
			//console.log('// To test a local CORS Anywhere server, set cors_api_url. For example:');
			//console.log('cors_api_url = "http://localhost:8080/"');
		  }

		return res;
	}

function pageStarted(){
	var id = 28969907 //in the future we will need to fetch the current user id/name
	var id1 = 0
	if (id != 0){
		getJSONFromUrl("https://api.roblox.com/Users/"+id, function(result){
			console.log("res " + result)
			var namm =(getText(result, "Username", ','))
			namm = namm.substr(namm.search(':')+1)
			namm = namm.substr(namm.search('"'))
			namm = namm.substr(1, namm.length-2)
			console.log("Name: " + namm)

			var pic = get("current-user")
			var namText = get("username")
			var login = get("login-button")
			//namText.innerHTML = namm
			//pic.src = "https://www.roblox.com/headshot-thumbnail/image?userId="+id+"&width=420&height=420&format=png"
			//pic.hidden = false
			namText.hidden = false
			login.hidden = true
		});
	}
}


//page: main/index
var pics = document.getElementsByClassName("slideImg")
var cur = 0
function move(num, leftRight){
	for (i = 0; i < pics.length; i++){
		var pic = (document.querySelectorAll(".slideImg")[i]).style
		pic.position = "Absolute"
		if (i == cur){
			pic.right = "-100%"
		}
	}
//var ssbg = document.getElementById("sectionss")
//ssbg.width="100%"
}
var done = false

function getText(rep, toSearch, endRemove){
	var pos = (rep.search(toSearch));
	var end = pos;
	for (i = pos; i <= rep.length; i++){
		var ch = rep.charAt(i);
		if (ch == endRemove){
			end = i;
			break;
		}
	}
	return rep.substring(pos, end);
}

function visInvis(val){
	var boxes = document.getElementsByClassName("descBack")
	if (val == true){
		for (i = 0; i < boxes.length; i++){
			var ruc = boxes[i]
			ruc.hidden = true
		}
	}
	else if (val == false){
		for (i = 0; i < boxes.length; i++){
			var ruc = boxes[i]
			if (i == cur){
				ruc.hidden = false
			}
		}
	}
}

var setBack = "-200%"
function slideShowMain(){
	if (done){return}
	visInvis(true)
	for (i = 0; i < pics.length; i++){
		var pic = (document.querySelectorAll(".slideImg")[i]).style
		pic.position = "Absolute"
		pic.left = setBack
		pic.transition = "left 2s, right 2s"
	}
	setTimeout(function(){
		(document.querySelectorAll(".slideImg")[cur]).style.width = "100%";
		(document.querySelectorAll(".slideImg")[cur]).style.left = "0%";
		done = true
		visInvis(false)
	}, 500)
	//pageStarted()
}

function slide(newCur){
	var old = cur;
	visInvis(true)
	if (newCur < cur){
		(document.querySelectorAll(".slideImg")[cur]).style.left = setBack;
		(document.querySelectorAll(".slideImg")[cur]).style.transition = "left 2s, right 2s";
		cur = newCur;
		(document.querySelectorAll(".slideImg")[cur]).style.left = "0%";
		(document.querySelectorAll(".slideImg")[cur]).style.transition = "left 2s, right 2s";
		(document.querySelectorAll(".slideImg")[cur]).style.width = "100%";
	}
	else if (newCur > cur){
		(document.querySelectorAll(".slideImg")[cur]).style.left = "200%";
		(document.querySelectorAll(".slideImg")[cur]).style.transition = "left 2s, right 2s";
		cur = newCur;
		(document.querySelectorAll(".slideImg")[cur]).style.left = "0%";
		(document.querySelectorAll(".slideImg")[cur]).style.transition = "left 2s, right 2s";
		(document.querySelectorAll(".slideImg")[cur]).style.width = "100%";
	}
	setTimeout(function(){
		visInvis(false)
	}, 2000)

	/*setTimeout(function(){
		(document.querySelectorAll(".slideImg")[old]).style.transition = "";
		(document.querySelectorAll(".slideImg")[old]).style.left = "-100%";
	}, 2000);*/

}

function slideLeft(){
	if (cur-1 >= 0){
		slide(cur-1)
	}
}
function slideRight(){
	if (cur+1 < pics.length){
		slide(cur+1)
	}
}

//page: blog
function readyBlog(){
	var gv = getViewport()
	console.log(gv[0] + ", " + gv[1])
	var numEntries = 3
	//, "2.art", "new_game.art", "byMr.art", "aidan.art", "dan.art", "third.art"
	var entries = ["welcome.art", "2.art", "new_game.art", "byMr.art", "aidan.art", "dan.art", "third.art", "secondTest"]
	var x = 10
	var xPlus = 30
	var y = 250
	var yPlus = 300
	var xMax = 70

	for (i = entries.length-1; i >= 0; i--){
		console.log(entries[i] + x)
		var cs = get(entries[i])
		cs.style.left = x+"%"
		cs.style.top = y+"px"
		x = x + xPlus
		if (x > xMax){
			x = 10
			y = y + yPlus
		}
		get("pageSize").style.height = (entries.length*170)+"px"
	}

	var getIm = document.getElementsByClassName("squareImg")
	for (i = 0; i < getIm.length; i++){
		var im = (getIm[i])
		var px = ""
		var siz = getViewport()[0]/11
		px = siz + "px"
		im.style.width = px
		im.style.height = px

	}

	var getTT = document.getElementsByClassName("artPrev")
	for (i = 0; i < getTT.length; i++){
		var im = (getTT[i])
		var px = ""
		var siz = getViewport()[0]/90
		px = siz + "px"
		im.style.fontSize = px
		if (siz < 20 && siz > 11){
			im.style.top = "-50%"
		}
		else if (siz <= 11){
			im.style.top = "-30%"
		}
		else{
			im.style.top = "-85%"
		}
	}
}


//page: test blog post: nothing yet

//page: games
var info = [["test_spng.jpg", "info"], ["test_mem.png", "info"]]
var cur = 0
function changeCur(newNum){
	console.log("num:" + newNum)
	cur = newNum
	var imm = get("gamePrev")
	imm.src = info[cur][0]
}
function rightGo(){
	if (cur+1 < info.length){
		changeCur(cur+1)
	}
}
function leftGo(){
	if (cur-1 >= 0){
		changeCur(cur-1)
	}
}



//topbar stuff
// function getheadshot(user) {
// 	var id = 'https://api.roblox.com/users/get-by-username?username=' + user
// 	var it
// 	console.log(id)
// 	var script = document.createElement('script');
// 	script.src = 'https://api.roblox.com/users/get-by-username?username=' + user;
// 	document.body.appendChild(script);
// 	console.log(script)
// 	//var id = 'https://api.roblox.com/users/get-by-username?username=user'
// 	//console.log(url)
// 	var url = 'https://www.roblox.com/headshot-thumbnail/json?userId=1&width=180&height=180'
// 	url.replace(/userId=1/,'userId='+it)
// 	console.log(it)
// }

// function getheadshot(user) {
// 	var xhr = new XMLHttpRequest();
//             xhr.open("GET", "https://api.roblox.com/users/get-by-username?username="+user);
//             xhr.send();
//             var rep = xhr.Id;
// 	console.log(rep)
// }
// 	getheadshot('danzlua')
