<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toast</title>
    <!-- fontawesome cdm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    .Toast{
    position: absolute;
    top: 25px;
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
.Toast.active{
    transform: translateX(0%);
}
.Toast .Toast-content{
    display: flex;
    align-items: center;
}
.Toast-content .check{
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
.Toast-content .message{
    display: flex;
    flex-direction: column;
    margin: 0 20px;
} 
.message .text{
    font-size: 20px;
    font-weight: 600;
    color: #666666;
}
.message .text.text-1{
    font-weight: 600;
    color: #333;
}
.Toast .close{
    position: absolute;
    top: 10px;
    right: 15px;
    padding: 5px;
    cursor: pointer;
    opacity: 0.7;
}
.Toast .close:hover{
    opacity: 1;
}
.Toast .progress{
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    background: #ddd ;
}
.Toast .progress:before{
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
        right: 100%;
    }
}
</style>
<body>
    <div class="Toast">
        <div class="Toast-content">
            <i class="fas fa-solid fa-check check"></i>
        <div class="message">
            <span class="text text-1">Failed</span>
            <span class="text text-2">Twitter Name is Empty!</span>      
        </div>
        </div>
        <div class="fa-solid fa-xmark close"></div>
        <div class="progress"></div>
    </div>
    <script>
        const button=document.querySelector("button"),
      Toast=document.querySelector(".Toast")
      closeIcon=document.querySelector(".close"),
      progress=document.querySelector(".progress");

      // button.addEventListener("click",()=>{
      //   Toast.classList.add("active");
      //   progress.classList.add("active");
      //   setTimeout(()=>{
      //       Toast.classList.remove("active");
      //   },5000);
      //   setTimeout(() => {
      //       progress.classList.remove("active");
      //   }, 5300);
      // });
      Toast.classList.add("active");
        progress.classList.add("active");
        setTimeout(()=>{
            Toast.classList.remove("active");
        },5000);
        setTimeout(() => {
            progress.classList.remove("active");
        }, 5300);
      closeIcon.addEventListener("click",()=>{
        Toast.classList.remove("active");
        setTimeout(() => {
            progress.classList.remove("active");
        }, 300);
      });
    </script>
</body>
</html>