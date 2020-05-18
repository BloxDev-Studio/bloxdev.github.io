<script>
  function goBack() {
      window.history.back();
  }
  function home() {
    document.location.href = "/index.php";
  }
</script>
<div id="boxof404">
  <p class="verd" style="font-size: 34px/*1.8vw*/; position: relative; width: 50%; margin-top: 0px;">Page cannot be found<br>or no longer exists</p>
  <p class="verd" style="font-size: 17px/*1.1vw*/;">404 | Page Not found</p>
  <img src="images/extras/error.png" alt="error face" style="position: absolute; right: 0px; top: 0px; height: 100%; max-width: 50%;"></img>
  <button onMouseOver="this.style.cursor='pointer'" onclick="goBack()" style="position: absolute; bottom: 30px; background-color: #FAAF42; border-radius: 5px; border: none; width: 120px/*7vw*/; height: 44px/*4.5vh*/; font-size: 120%/*1vw*/;" class="verd">Go Back</button>
  <button onMouseOver="this.style.cursor='pointer'" onclick="home()" style="position: absolute; bottom: 30px; background-color: #d8d8d8; border-radius: 5px; border: none; width: 120px/*7vw*/; height: 44px/*4.5vh*/; font-size: 120%/*1vw*/; left: 150px/*8vw*/;" class="verd">Home</button>
</div>


<!-- <script>
  function goBack() {
      window.history.back();
  }
  function home() {
    document.location.href = "/index.php";
  }
</script>
<div id="boxof404">
  <p class="verd" style="font-size: 1.8vw; position: relative; width: 50%; margin-top: 0px;">Page cannot be found<br>or no longer exists</p>
  <p class="verd" style="font-size: 1.1vw;">404 | Page Not found</p>
  <img src="images/extras/error.png" alt="error face" style="position: absolute; right: 0px; top: 0px; height: 100%; max-width: 50%;"></img>
  <button onclick="goBack()" style="position: absolute; bottom: 30px; background-color: #FAAF42; border-radius: 5px; border: none; width: 7vw; height: 4.5vh; font-size: 1vw;" class="verd">Go Back</button>
  <button onclick="home()" style="position: absolute; bottom: 30px; background-color: #d8d8d8; border-radius: 5px; border: none; width: 7vw; height: 4.5vh; font-size: 1vw; left: 8vw;" class="verd">Home</button>
</div> -->
