@extends('layouts.show')



<script  src="http://www.youtube.com/player_api?api_key=AIzaSyBqYhm7-q_k2YjJoBms0pAEL_TMTKHkOLo"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
body {
 background-color: #2f2f2f;

    margin: 0;
    padding: 0;
    
}
html {
 scroll-behavior: smooth;
}

#logo {
 height: 50px;
 width: 50px;
   margin-top: 130%;
   left:0;
}
#myVideo {
 
position: absolute;
 right: 0;
 bottom:0;
 min-width: 100%;
 min-height: 100%; 
  background-repeat: no-repeat;
  background-size: cover; 
 
}
.content {
 position: absolute;
 justify-content: left;
 bottom: 0;
 margin-right: 1em;
 background: rgba( 0, 0, 0, 0.1);
 color: #f1f1f1;
 width: 200vh;
 height: 200vh;
 padding: 20px;
 left:0;
 display: inline-block;
 border-bottom:1px solid white;
}

#h-main {
 font-family: 'Oswald', sans-serif;
 font-size: 1.3em;
 margin-left: 0.5em;
 text-decoration: overline;
}

h1 {
 font-family: 'Oswald', sans-serif;
 font-size: 1.3em;
 margin-left: 0.5em;
 margin-top:0.5em;
position: relative;
 color: white;
}
p {
 font-family: 'Roboto', sans-serif;
 font-size: 1em;
 margin-left: auto;
 margin-right: auto;
 padding-left: 1.3em;
 padding-right: 1.3em;
 margin-top: 0.7em;
}
#item {

 font-size: 1.5em;
}

#content {
 font-size: 0.8em;
 line-height: 1.5em;
 max-width: 60%;
 margin-left: 1em;
}
#myBtn {
 margin-left: 1em;
 font-size: 18px;
 font-style: bold;
 padding: 10px;
 border: none;
 background-color: rgba(100,100,100,0.6);
 color: white;
 cursor: pointer;
 position: relative;
}
#myBtn:hover {  
 background-color: white;
 color: black;
}
.leftbox {
 height:100%;
 width: 99vh;
 background: linear-gradient(to right, rgba(0,0,0,1), rgba(0,0,0,0));
 
 display: inline-block;
color: #f1f1f1;
 position: absolute;
 
 top:0;
}
.rightbox {
 height:100%;
 width: 50vh;
 float: right;
 top:0; 
 right:0;
 color: #f1f1f1;
 justify-content: right;
 display: inline-block;
 position: absolute;
}
#pgsign {
 height: 15px;
 width: 50px;
 border-left: 4px solid white;
 background-color: rgba(100,100,100);
 font-size: 0.8em;
 float: right;
 margin-right: 1em;
 margin-top: 25em;
 justify-content: right;
 text-align: center;
 padding: 5px;
}
#netflix-logo {
 height: 50px;
 width: auto;
 margin-top:0.5em;
 margin-left:0.5em;
 background-color: white
 }
#netflix-toplogo {
 height: 30px;
 width: 100px;
 top:0;
}

    #bottom-vids {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        margin-top: 1em;
    }
    #bottom-vids::-webkit-scrollbar {
        display: none;
    }
    #bottom-vids video:hover{
        transform: scale(1.2);
        cursor: pointer;
    }
    #bottom-vids a {
        scroll-snap-align: center;
        max-width: 100%;
        max-height: 100%;
        transition: transform 100ms ease-in-out;
    }
    #bottom-vids video::poster {
        max-width: 100%;
        max-height: 100%;
    }
    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        font-size: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        z-index: 10;
    }
    .scroll-btn:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
    .scroll-btn.left {
        left: 0;
    }
    .scroll-btn.right {
        right: 0;
    }

::-webkit-scrollbar {
 width: 5px;
}
::-webkit-scrollbar-track {
 background: rgba(100,100,100,0.2);
}
::-webkit-scrollbar-thumb {
 background: #141414;
}
::-webkit-scrollbar-thumb:hover {
 background: #555;
}
a {
 text-decoration: none;
 color: rgba(100,100,100, 0.2);
}
.featured {
 /* background-image: url('https://theplumlist.com/wp-content/uploads/2019/08/GLOW-season-3-on-Netflix.jpg'); */
 background-repeat: no-repeat;
 background-size: cover;
 filter: blur(4px);
 width: 100%;
 height: 630px;
 filter: grayscale(.7);
}
.featured-layer {
 background: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0.8));
 height: 630px;
}
.featured-vid {
 float: left;
 margin-left: 1em;
 margin-top: 3em;
 width: 600px;
 position: absolute;
 display: inline-block;
 filter: none;
}
.featured-text {
    position: absolute;
    display: flex;
    flex-direction: column;
    color: white;
    font-size: 1em;
    font-family: 'Lato';
    float: right;
    right:0;
    padding-right: 2em;
    margin-top: 5%;
    align-items: center;
    width: 400px;
    line-height: 1.7em;
}

.bottom-vids2 {
 height:230px;
 display: inline-block;
 color: #f1f1f1;
 position: relative;
 left:0;
 right:0;
 overflow-x: auto;
 overflow-y: auto;
 width: 100%;
}
.tall {
 position: absolute;
 height: 500px;
 width: 96%;
 display: inline-block;
 margin-left: 2.5em;
 overflow-y: auto;
}
#tall {
  transition: transform .4s;
  height:550px;
   width:300px;
}
#tall:hover {
 transform: scale(1.2);
}
#highlight{
    position: relative;
    height: 630px;
}
#player {
    position: absolute;
    width: 100%;
    height: 100%;
    /* z-index: 9999; */
}
#highlight-item{
    z-index: 9999;
}
#player > iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    outline: none;
}
#highlight-content{
   position: absolute;
    bottom: 5em;
}
.read-more{
    background-color: transparent;
    border: 1px solid white;
    padding: .5em;
    color: white;
    cursor: pointer;
}
.read-more:hover{
    background-color: #9a9a9a;
}
</style>



@section('content')

<div id="highlight" >
    <div id="highlight-item" >
        <div  id="player" >
        </div>
        <div class="leftbox">
           <img @if($production_companies['logo_path']) src="http://image.tmdb.org/t/p/w500{{$production_companies['logo_path']}}" @else src="https://www.freepnglogos.com/uploads/netflix-logo-0.png" @endif id="netflix-logo"> <h1 id="h-main">  {{$movie['name']}} </h1>
           <div id="highlight-content" >
            <p id="content"> {{$movie['overview']}} </p><br>
           <a href="{{ url('/tv/'.$production_companies['id'])}}"><button id="myBtn">Learn More</button> </a>   
           
           </div>
           </div>
           <div class="rightbox"><div id="pgsign"> @if($movie['adult']) 18+ @else 13+ @endif </div></div>
    </div>
</div>




  <div class="bottom-slider">
    <h1>Popular now</h1>
    <div id="bottom-vids">
        @foreach ($movies as $item)
        <a href="{{ url('/tv/'.$item['id'])}}">
            <video width="250px" controls poster="http://image.tmdb.org/t/p/original/{{$item['poster_path']}}">
                <source src="" type="video/mp4">
            </video>
        </a>
        @endforeach
    </div>
</div>

<div class="bottom-slider">
    <h1>On Air right now</h1>
    <div id="bottom-vids">
        @foreach ($upcoming as $item)
        <a href="{{ url('/tv/'.$item['id'])}}">
        <video width="250px" controls poster="http://image.tmdb.org/t/p/original/{{$item['poster_path']}}">
            <source src="" type="video/mp4">
        </video>
    </a>
        @endforeach
    </div>
</div>

<div class="featured">
    <div class="featured-layer">
    <br>
    <h1 id="featured">Featured</h1>
    <div class="featured-vid">
     <video  width="600" height="500" poster="http://image.tmdb.org/t/p/original/{{$random['poster_path']}} ">
     <source src="" type="video/mp4">
    </div>
    <div class="featured-text"><p><b><i>{{$random['name']}}</b></i>: {{$random['overview']}}
    </p>
    <a href="{{ url('/tv/'.$random['id'])}}">
        <button class="read-more" >
            Read More
        </button>
    </a>
    </div>
    </div>
    </div>
    <br>

<div class="bottom-slider">
    <h1>Top rated shows</h1>
    <div id="bottom-vids">
        @foreach ($latest as $item)
        <a href="{{ url('/tv/'.$item['id'])}}">
        <video width="250px" controls poster="http://image.tmdb.org/t/p/original/{{$item['poster_path']}}">
            <source src="" type="video/mp4">
        </video>
        </a>
        @endforeach
    </div>
</div>

    
    
    
   

@endsection('content')

<script>
  function onPlayerReady(event) {
    event.target.playVideo();
}
    let player;
    let link = "{{$movie['trailer']}}" ;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        videoId: link ,
        playerVars: {
            'autoplay': 0,
            'modestbranding': 0,
            'showinfo': 0,
            'fs': 0,
            'rel': 0,
            'loop': 0
            
        },
        events: {
            'onReady': onPlayerReady
        }
    });
}

const sliderContainer = document.querySelector('.slider-container');
const prevBtn = document.querySelector('.slider-btn-prev');
const nextBtn = document.querySelector('.slider-btn-next');

let itemWidth = 0;

function setItemWidth() {
  const items = document.querySelectorAll('.slider-item');
  itemWidth = items[0].offsetWidth + parseInt(window.getComputedStyle(items[0]).marginRight);
}

function scrollSlider(distance) {
  const transform = getComputedStyle(sliderContainer).getPropertyValue('transform');
  const matrix = new WebKitCSSMatrix(transform);
  const currentTranslateX = matrix.m41;
  const newTranslateX = currentTranslateX + distance;
  sliderContainer.style.transform = `translateX(${newTranslateX}px)`;
}

function slidePrev() {
  scrollSlider(itemWidth);
}

function slideNext() {
  scrollSlider(-itemWidth);
}

setInterval(setItemWidth, 100);
prevBtn.addEventListener('click', slidePrev);
nextBtn.addEventListener('click', slideNext);


</script>



