<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Toasts</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <style>
  		.main2{
  			position: absolute;
  			top: 14%;
  			right: 5%;
  		}
/*      .main2 .progress{
          position: absolute;
          bottom: 0;
          left: 0;
          height: 3px;
          width: 100%;
          background: #ddd ;
  }
.main2 .progress:before{
    content:'';
    position: absolute;
    bottom: 0;
    right: 50px;
    height: 100%;
    width: 100%;
    background-color: #4070f4 ;

}
.progress.active:before{
    animation: progress 5s linear forwards;
}
@keyframes progress{
    100%{
        right: 100%
    }*/
  </style>
  <body>
  
    <div class="main2 toast fade show ms-auto" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="red"></rect></svg>
        <strong class="me-auto">Failed</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Discord Name is Empty!
      </div>
      <!-- <div class="progress"></div> -->
    </div>
    
    <!-- End Example Code -->
    <script>
      let main2=document.querySelector(".main2");
      // ,progress=document.querySelector(".progress");
      // progress.classList.add("active");
      setTimeout(()=>{
            main2.classList.remove("show");
        },5000);
      // setTimeout(() => {
      //       progress.classList.remove("active");
      //   }, 5300);
    </script>
  </body>
</html>