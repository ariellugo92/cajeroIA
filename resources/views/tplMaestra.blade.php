<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! Html::style(asset('css/main-style.css')) !!}
        {!! Html::style(asset('css/second-style.css')) !!}
        {!! Html::style(asset('css/icons_md_icon.css')) !!}
        
        @section('section-head')
            
        @show
        
    </head>
    <body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">JavaScript</a></li>
            </ul>
        </div>
    </nav>

    <div class="parallax-container  valign-wrapper" style="height:91vh ">
        <div class="parallax">
            <img src="images/background.jpg">          
        </div>

        <div class="container ">
            <div class="row">
                <h1 class="center-align" style="color: #fff" >APP - ATM</h1>
            </div>
            <div class="row center-align">
                <a href="#pnlNumerico" class="center-align btn-floating btn-large pulse waves-effect waves-light white "><i class="material-icons large blue-text">keyboard_arrow_down</i></a>
            </div>
        </div>
    </div>

    @section('section-prin')
        
    @show

        {{ Html::script(asset('js/jquery.js')) }}
        {{ Html::script(asset('js/bin/materialize.min.js')) }}
        {{ Html::script(asset('js/my_functions.js')) }}
        
        @section('section-scripts')
            
        @show

    </body>
</html>