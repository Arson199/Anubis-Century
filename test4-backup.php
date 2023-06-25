<?php
    if(isset($_SESSION['message'])) :
?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Iceberg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
    .popup{
    position: absolute;
    top:-100%;
    left: 50%;
    transform:translate(-50%,-50%);
    width: 98%;
    width: 400px;
    height: 90px;
    background: #4B2275;
    border-radius: 10px;
    box-shadow: 10px 10px 10px black, 0 0 25px #4C237B, 0 0 10px white;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    margin-top: -25px;
    transition: top 0ms ease-in-out 0ms, opacity 300ms ease-in-out,margin-top 300ms ease-in-out;
}
.popup .close-btn{
    position: absolute;
    padding: 12px;
    font-size: 1.5em;
    color: red;
    cursor: pointer;
    text-shadow: 1px 1px 2px black, 0 0 25px red, 0 0 5px darkred;
    /*transition: top 0ms ease-in-out 300ms, 
                opacity 300ms ease-in-out,
                margin-top 300ms ease-in-out;*/
}
body.active-popup{
    overflow:hidden;
}
body.active-popup .blur{
/*     filter:blur(5px); */
    background:rgba(0,0,0.08);
    transition: filter 0ms ease-in-out 0ms;
}
body.active-popup .popup{
    top:50%;
    opacity: 1;
    margin-top:0px;
    transition: top 0ms ease-in-out 0ms,
                opacity 300ms ease-in-out,
                margin-top 300ms ease-in-out;
}
.circle{
            display: inline-block;
            text-decoration: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-image:url('images/circle.png');
            background-repeat: no-repeat;
            background-size: 60px 200px;
            left: 13%;
            top: 20%;
            color: white;
/*          text-align: center;*/
            position: absolute;
        }
.right-top{
            top: 0;
            right: 0;
        }
.left-bottom{
            bottom: 0;
            left: 0;
        }
.side{
            display:block;
            width: 2.5vw;
            position: absolute;
        }
.message-text{
            left: 30%;
            top: 35%;
            position: absolute;
            color: white;
            font-family: Iceberg;
            font-size: 1.5em;
        }

</style>
<body>

     <!-- <div class="popup">
        <button class="close-btn">&times;</button>
        <h2>This is popup Title</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
             Nesciunt eos amet minima repudiandae illo?
            Voluptatum veniam vel, totam obcaecati ea excepturi ad,
            eligendi nulla nostrum cumque architecto pariatur autem error!</p>
     </div> -->
     <!-- <input type="submit"  id="open-popup" class="mt-5 btn-lg btn btn-outline-info" name="submit" value="Submit"> -->
     <div class="popup">
            <a href="index.html" class="circle" data-bs-dismiss="alert" aria-label="Close"><p class="c1 close-btn">OK</p></a>
            <p class="message-text">Successfully Submited !</p class="message-text">
            <img src="images/2.png" class="side right-top">
            <img src="images/3.png" class="side left-bottom">
     </div>


     <script>
         document.body.classList.add("active-popup");
        // document.querySelector("#open-popup").addEventListener("click",function(){
        //     document.body.classList.add("active-popup");
        // });
        document.querySelector(".popup .close-btn").addEventListener("click",function(){
    document.body.classList.remove("active-popup");
    });
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

<?php 
    unset($_SESSION['message']);
    endif;
?>