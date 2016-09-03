<!-- UB = Userbackend -->
<div class="UB">
    <!--Userbackend Container-->
    <div class="UBContainer">
        <a class="hideTerms" href="<?=URL?>userprofile" ></a>
        <form class="" action="" method="post">
            <!--Userbackend Main Container-->
            <!--Custom FileUpload -->
            <div class="UBBackgroundImageUpload">
                <label class="custom-file-upload">
                    <span class="imageUploadPic"></span>
                    <input type="file"/>
                </label>
                <!--UserProfileImage-->
                <div class="UBProfileImageUpload">
                    <label class="custom-file-upload">
                        <span class="imageUploadPic"></span>
                        <input type="file"/>
                    </label>
                </div>
            </div>
            <div class="radioprefix">
                <label for="">Male</label>
                <input type="radio" name="gender" value="">
                <label for="">Female</label>
                <input type="radio" name="gender" value="">
            </div>
            <div class="mainForm">
                <label for="">Name</label>
                <input type="text" name="fullName" value="">
                <label>Choose your Style</label>
                <ul id="radio-button">
                    <li>
                        <input type="radio" name="style" value="dancing">
                        <div>Dancing</div>
                    </li>
                    <li>
                        <input type="radio" name="style" value="freestyle">
                        <div>Freestyle</div>
                    </li>
                    <li>
                        <input type="radio" name="style" value="downhill">
                        <div>Downhill</div>
                    </li>
                </ul>
                <label for="">Country</label>
                <input type="text" name="country" value="">
                <label for="">City</label>
                <input type="text" name="city" value="">
                <hr>
                <!--if someone clicks in the email inputfield, check passwort again-->
                <label for="">Mail</label>
                <input type="text" name="email" value="">
            </div>
            <!--SaveBtn-->
            <input type="submit" name="name" value="Save">
        </form>
    </div>
    <div class="">
        <h4>Type in your Password again</h4>
        <form class="" action="index.html" method="post">
            <input type="text" name="reenterPassword" value="">
            <input type="submit" name="name" value="Enter">
        </form>
    </div>
</div>
