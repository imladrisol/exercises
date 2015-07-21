<html>
    <head>
        <title></title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                width:225px;
                margin: 100px auto 0;
            }
            .slider li img{
                width: 225px;
                height: 225px;
            }
            #slider-nav{
                display: none;
                margin-top: 1em;
                
            }
            #slider-nav button{
                margin-right: 1em;
            }
            .slider{
                width: inherit;
                height: 225px;
                overflow: scroll;
            }
            .slider ul{
                width: 10000px;
                list-style: none;
            }
            
            .slider ul li{
                float: left;
            }
        </style>
    </head>
    
    <body>
        <div class="slider">
            <ul>
                <li><img src="image/1.png" alt="image"></li>
                <li><img src="image/2.png" alt="image"></li>
                <li><img src="image/3.png" alt="image"></li>
                <li><img src="image/4.png" alt="image"></li>
                 <li><img src="image/3.png" alt="image"></li>
                <li><img src="image/4.png" alt="image"></li>
            </ul>
        </div>
        <div id="slider-nav">
            <button data-dir="prev">Prev</button>
            <button data-dir="next">Next</button>
            
        </div>
        <script src="jquery-1.11.3.js"></script>
            
        <script>
            (function(){
                var sliderUL = $('div.slider').css('overflow','hidden').children('ul'),
                    imgs = sliderUL.find('img'),
                    imgWidth = imgs[0].width,//225px
                    imgsLen = imgs.length,//4
                    current = 1,
                    totalImagesWidth = imgWidth * imgsLen;
                $('div#slider-nav').show().find('button').on('click',function(){
                    var direction = $(this).data('dir'),
                        loc = imgWidth;
                    
                    if(direction === 'next'){
                        if(current < imgsLen)
                            current++;
                        else{
                            current = 1;
                            loc = 0;
                        }
                        
                    }
                    else{
                        if(current > 1)
                            current--;
                        else{
                            current = imgsLen;
                            loc = totalImagesWidth - imgWidth;
                            direction='next';
                        }
                    }  
                    //console.log(current);
                    transition(sliderUL, loc, direction);
                });
                function transition(container, loc, direction){
                    var unit;
                    if(direction && loc !== 0){
                        unit = (direction === 'next')?'-=':'+=';
                    }
                    container.animate({
                        'margin-left':unit?(unit+loc):loc
                    });
                }
               
            })();
        </script>
    </body>
</html>

 