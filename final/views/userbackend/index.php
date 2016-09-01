<!-- UB = Userbackend -->
<div class="UB">
    <!--Userbackend Container-->
    <div class="UBContainer">
        <span class="hideTerms"></span>
        <form class="" action="" method="post">
            <!--SaveBtn-->
            <input type="submit" name="name" value="Save">
            <!--Userbackend Main Container-->
            <!--Custom FileUpload -->
            <div class="UBBackgroundImageUpload">
                <label class="custom-file-upload">
                    <input type="file"/>
                </label>
                <span class="chooseImg"></span>
                <span class="fileInput"></span>
                <!--UserProfileImage-->
                <div class="UBProfileImageUpload">
                    <label class="custom-file-upload">
                        <input type="file"/>
                    </label>
                    <span class="chooseImg"></span>
                    <span class="fileInput"></span>
                </div>
            </div>
            <div class="radioprefix">
                <label for="">Male</label>
                <input type="radio" name="gender" value="">
                <label for="">Female</label>
                <input type="radio" name="gender" value="">
            </div>
            <div class="">
                <label for="">Name</label>
                <input type="text" name="fullName" value="">
                <label for="">Style</label>
                <select class="ChooseYourStyle" name="">
                    <option value="option">Choose your Style...</option>
                    <option value="option">Dance</option>
                    <option value="option">Freestyle</option>
                    <option value="option">Downhill</option>
                </select>
                <label for="">Country</label>
                <input type="text" name="country" value="">
                <label for="">City</label>
                <input type="text" name="city" value="">
                <hr>
                <!--if someone clicks in the email inputfield, check passwort again-->
                <label for="">Mail</label>
                <input type="text" name="email" value="">
            </div>
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
