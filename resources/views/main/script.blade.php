<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.js"></script>
<script>
   $(document).ready(function(){
$(".openbtn").on("click", function () {
    $(".ui.sidebar").toggleClass("very thin icon");
    // $(".asd").toggleClass("marginlefting");
    $(".sidebar z").toggleClass("displaynone");
    $(".ui.accordion").toggleClass("displaynone");
    $(".ui.dropdown.item").toggleClass("displayblock");
  
    $(".logo").find("img").toggle();
  });
  });
  $(document).ready(function(){
    var sidebarWidth = $(".sidebar").width();
    $('body').css('margin-left', sidebarWidth + 'px');  
  $(".openbtn").click(function(){
    var sidebarWidth = $(".sidebar").width();
    $('body').css('margin-left', sidebarWidth + 'px');
  });
});


  // var sidebarwidth = $('.sidebar').length();
  // alert(sidebarwidth);
  
  $(".ui.dropdown").dropdown({
    allowCategorySelection: true,
    transition: "fade up",
    context: "sidebar",
    on: "hover"
  });
  
  $(".ui.accordion").accordion({
    selector: {}
  });

  // iamge preview in form

  const fileInput = document.querySelector(".InputImage");
  const previewImage = document.getElementById("preview-image");

  fileInput.addEventListener('change',event =>{
    if(event.target.files.length > 0){
      previewImage.src = URL.createObjectURL(event.target.files[0]);
      previewImage.style.display = 'block';   
    }
    fileInput.value = null;
  })
  
</script>