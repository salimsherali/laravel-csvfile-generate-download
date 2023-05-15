<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project : {{env('APP_NAME')}}</title>
	    <link rel="stylesheet" type="text/css" href="style.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
         <!-- Styles -->
        <style>
            body {
                margin: 0;
                padding-top: 800px;
            }

            .profile {
                width: 175px;
                border-radius: 50%;
            }

            #welcome {
                position: absolute;
                overflow: hidden;
                height: 800px;
                color: #FFFFFF;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                opacity: 0.83;
                display: table;
                width: 100%;
                height: 100%;
                background: linear-gradient(#276cd2 0%,#09d996 100%);
            }



            h1 {

                font-size: 40px;
                line-height: 1.2;
                font-family: 'Lato', sans-serif;
                font-weight: 300;
            }

            #name {
                font-size: 30px;
                line-height: 1.2;
                font-family: cursive
            }

            h2 {
                font-size: 30px;
                font-weight: 300;
                line-height: 1.2;
                font-family: monospace;
               
            }

            #bio {

                padding: 50px;
                text-align: center;
                font-size: 42px;
            }

            .line {
                height: 6px;
                background-color: #000;
                width: 70px;
                margin: 8px auto;
            }


            p {
                max-width: 450px;
                margin: 25px auto;
                font-size: 17px;
                line-height: 1.3;
            }

            .parallax-inner {

                display: table-cell;
                position: relative;
                text-align: center;
                vertical-align: middle;

            }


        </style>
    </head>
    <body >
    <!-- <header>
		<h1>{{env('APP_NAME')}} - Code Snippet </h1>
		
	</header> -->

    <section id="welcome" class="parallax-container">
		<div class="parallax-inner">
            <h1>{{env('APP_NAME')}} - Code Snippet</h1>
			<h2>Hope this code snippet paves the way for your development journey!</h2>
		</div>
	</section>
	
	
	
	<section id="bio">
        <h1>Hi</h1>
      
        <img src="https://d1fdloi71mui9q.cloudfront.net/qqeBlapS62fJR1NRCwOV_YS9RwTmW1nxWlA40" class="profile" />
        <h1>I Am <br><span id="name">Salim Sherali</span></h1>
		<div class="line"></div>
		<p>A passionate software engineer, take pride in developing innovative programs that enhance organizational efficiency and effectiveness. With an extensive experience of 8 years in coding and a solid understanding of the latest technologies, skilled in building reliable, user-friendly systems that meet complex business requirements.
            <br/> <br/>
            <a href="https://linktr.ee/salimsherali" >Click here for an in-depth exploration!<a>
        </p>
      
    </section>

</body>
	
    </body>
</html>
