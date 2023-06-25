<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TToast</title>
    <!-- fontawesome cdm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    .TToast{
    position: absolute;
    top: 50%;
    right: 30px;
    border-radius: 12px;
    padding: 20px 35px 20px 25px;
    background: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    border-left: 6px solid #4070f4;
    overflow: hidden;
    transform: translateX(calc(100% + 30px));
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.35);

}
.TToast.active{
    transform: translateX(0%);
}
.TToast .TToast-content{
    display: flex;
    align-items: center;
}
.TToast-content .ccheck{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 35px;
    width: 35px;
    background-color:#4070f4 ;
    color: #fff;
    font-size: 20px;
    border-radius: 50%;
}
.TToast-content .mmessage{
    display: flex;
    flex-direction: column;
    margin: 0 20px;
} 
.mmessage .ttext{
    font-size: 20px;
    font-weight: 600;
    color: #666666;
}
.mmessage .ttext.ttext-1{
    font-weight: 600;
    color: #333;
}
.TToast .close{
    position: absolute;
    top: 10px;
    right: 15px;
    padding: 5px;
    cursor: pointer;
    opacity: 0.7;
}
.TToast .close:hover{
    opacity: 1;
}
.TToast .pprogress{
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    background: #ddd ;
}
.TToast .pprogress:before{
    content:'';
    position: absolute;
    bottom: 0;
    right: 50px;
    height: 100%;
    width: 100%;
    background-color: #4070f4 ;

}
.pprogress.active:before{
    animation: pprogress 5s linear forwards;
}
@keyframes pprogress{
    100%{
        right: 100%;
    }
}
</style>
<body>
    <div class="TToast">
        <div class="TToast-content">
            <i class="fas fa-solid fa-ccheck ccheck"></i>
        <div class="mmessage">
            <span class="ttext ttext-1">Failed</span>
            <span class="ttext ttext-2">Discord Name is Empty!</span>      
        </div>
        </div>
        <div class="fa-solid fa-xmark close"></div>
        <div class="pprogress"></div>
    </div>
    <script>
        const button=document.querySelector("button"),
      TToast=document.querySelector(".TToast")
      closeIcon=document.querySelector(".close"),
      pprogress=document.querySelector(".pprogress");

      // button.addEventListener("click",()=>{
      //   TToast.classList.add("active");
      //   pprogress.classList.add("active");
      //   setTimeout(()=>{
      //       TToast.classList.remove("active");
      //   },5000);
      //   setTimeout(() => {
      //       pprogress.classList.remove("active");
      //   }, 5300);
      // });
      TToast.classList.add("active");
        pprogress.classList.add("active");
        setTimeout(()=>{
            TToast.classList.remove("active");
        },5000);
        setTimeout(() => {
            pprogress.classList.remove("active");
        }, 5300);
      closeIcon.addEventListener("click",()=>{
        TToast.classList.remove("active");
        setTimeout(() => {
            pprogress.classList.remove("active");
        }, 300);
      });
    </script>
</body>
</html>