<style>
    @font-face {
        font-family: supermarket;
        src: url({{ asset('/font/supermarket.ttf') }});
    }
    body , html{
        font-family: supermarket;
    }
    .w3-dropdown-hover:first-child, .w3-dropdown-click:hover{
        background-color: transparent;
    }
    .w3-dropdown-hover{
        vertical-align: middle;
        line-height: 0px;
    }
    .setBox{
        top:100px;
    }

    .bg-light {
        background-color: #DDF6FB !important;
    }
    hr {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 1em 0;
        padding: 0;
    }

    .dropdown-menu{
        top: 60px !important;;
        left: 25% !important;
        width: 50% !important;;
    }
    input[type=search] {
        -webkit-appearance: textfield;
        -webkit-box-sizing: content-box;
        font-family: inherit;
        font-size: 100%;
    }
    input::-webkit-search-decoration,
    input::-webkit-search-cancel-button {
        display: none;
    }

    input[type=search] {
        background: url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 20px center;
        border: solid 1px #ccc;
        padding: 9px 10px 9px 50px;
        width: 55px;

        -webkit-border-radius: 10em;
        -moz-border-radius: 10em;
        border-radius: 10em;

        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        transition: all .5s;
    }
    input[type=search]:focus {
        width: 130px;
        background-color: #fff;
        border-color: #DDF6FB;

        -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
        -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
        box-shadow: 0 0 5px rgba(109,207,246,.5);
    }


    input:-moz-placeholder {
        color: #999;
    }
    input::-webkit-input-placeholder {
        color: #999;
    }
    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }

    .qrcode-stream__camera, .qrcode-stream__pause-frame{
        border-radius: 10px !important;
    }
</style>