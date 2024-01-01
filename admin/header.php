<body>
    <div class="ui grid">
        <div class="row">
            <div class="ui grid">
                <!-- BEGIN NAVBAR -->
                <!-- computer only navbar -->
                <div class="computer only row">
                    <div class="column">
                        <div class="ui top fixed menu navcolor">
                            <div class="item">
                                <img src="images/logo.png" alt="SimpleIU">
                            </div>
                            <div class="left menu">
                                <div class="nav item">
                                    <strong class="navtext">ADMIN</strong>
                                </div>
                            </div>
                            <div class="ui top pointing dropdown admindropdown link item right">
                                <img class="imgrad" src="images/user.png" alt="">
                                <span class="clear navtext"><strong><?php echo $_SESSION['name'];?></strong></span>
                                <i class="dropdown icon navtext"></i>
                                <div class="menu">
                                    <!-- <div class="item">
                                        <p><i class="settings icon"></i>Account Setting</p>
                                    </div> -->
                                    <a href="admin.php?act=logout" class="item"><i class="sign out alternate icon"></i>
                                        Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end computer only navbar -->
                <!-- mobile and tablet only navbar -->
                <div class="tablet mobile only row">
                    <div class="column">
                        <div class="ui top fixed menu navcolor">
                            <a id="showmobiletabletsidebar" class="item navtext"><i class="content icon"></i></a>
                            <div class="right menu">
                                <div class="item">
                                    <strong class="navtext">ADMIN</strong>
                                </div>
                                <div class="item">
                                    <img src="images/logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end mobile and tablet only navbar -->
                <!-- END NAVBAR -->