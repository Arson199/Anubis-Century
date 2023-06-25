<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Page</title>
    <!-- css File -->
    <link rel="stylesheet" type="text/css" href="style29.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Iceberg">
</head>
<style>
    .popup{
    position: absolute;
    top:-100%;
    left: 50%;
    transform:translate(-50%,-50%);
    width: 98%;
    width: 450px;
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
    border-radius: 50%;
    cursor: pointer;
    text-shadow: 1px 1px 2px black, 0 0 25px red, 0 0 5px darkred;
    transition: top 0ms ease-in-out 300ms, 
                opacity 300ms ease-in-out,
                margin-top 300ms ease-in-out;
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
</body>

</html>