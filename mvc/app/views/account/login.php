
<script src ='/mvc/public/js/account/loginCtrl.js' ></script>

    <body ng-app="loginApp" ng-controller="loginCtrl"  id="usr_mng_module">
        <div id="loginIconContainer">
            <img id="loginIcon" src="/mvc/public/images/monikos_login_icon.png">
        </div>
        <div class="wrapper">
            <input id="un" type="text" placeholder="username">
            <input id="pw" type="password" placeholder="password">
            <div class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();"></div>
            <button ng-click="login()">Login</button>
            <a class=sub-link ng-click="create()">Create Account</a>
        </div>
         <div class="loadingDiv" ng-show="loading">
            <p class="loadingText">LOADING...</p>
            <img class="loadingGif" src="/mvc/public/images/loading.gif">

        </div>

    </body>
