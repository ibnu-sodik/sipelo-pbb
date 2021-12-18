<section class="section" id="grafik" style="margin-top: 50px;">
 <div class="container">
  <div class="row">
   <div class="col-lg-12">
    <div class="section-heading">
     <h2>Grafik Data Nilai</h2>
   </div>
 </div>
</div>

<!-- <div class="row"> -->
  <div class="col-xl-12 text-center" id="div_timer">
    <div class="rounded bg-gradient-4 shadow text-center mb-5 p-3">
      <h4>Grafik muncul setelah hitung mundur selesai.!</h4>
      <button class="btn btn-primary">
        <h3><strong id="countdown"></strong></h3>         
      </button>
    </div>
  </div>
  <div class="" id="nilai_final"></div>
  <div class="" id="nilai_murni"></div>
  <div class="" id="nilai_kreasi"></div>
  <div class="" id="nilai_variasi"></div>
  <div class="" id="nilai_formasi"></div>
  <div class="" id="nilai_danton"></div>
  <!-- <div class="" id="nilai_supporter"></div> -->
  <div class="" id="nilai_kostum"></div>

<!-- </div> -->
</div>
<!-- </div> -->
</section>
<div style="margin-bottom: 50px;"></div>
<script type="text/javascript">
  var n = 30;
  setTimeout(countDown,1000);

  function countDown(){
    n--;
    if(n > 0){
      setTimeout(countDown,1000);
    }
    document.getElementById("countdown").innerHTML = n;
    if(n === 0){
      document.getElementById("div_timer").style.display="none";
    } 
  }

  $(document).ready(function () {
    setInterval(function() {
      $("#nilai_final").load("admin/grafik/grafik_nilai_final.php")
    }, 60 * 500);
    setInterval(function() {
      $("#nilai_murni").load("admin/grafik/grafik_nilai_murni.php")
    }, 60 * 500);
    setInterval(function() {
      $("#nilai_kreasi").load("admin/grafik/grafik_nilai_kreasi.php")
    }, 60 * 500);
    setInterval(function() {
      $("#nilai_variasi").load("admin/grafik/grafik_nilai_variasi.php")
    }, 60 * 500);
    setInterval(function() {
      $("#nilai_formasi").load("admin/grafik/grafik_nilai_formasi.php")
    }, 60 * 500);
    setInterval(function() {
      $("#nilai_danton").load("admin/grafik/grafik_nilai_danton.php")
    }, 60 * 500);
    // setInterval(function() {
    //  $("#nilai_supporter").load("admin/grafik/grafik_nilai_supporter.php")
    // }, 60 * 500);
    setInterval(function() {
      $("#nilai_kostum").load("admin/grafik/grafik_nilai_kostum.php")
    }, 60 * 500);
  })
</script>
