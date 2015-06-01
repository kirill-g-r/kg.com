<section>
    <h4>PROFILE</h4>

    <div class="row uniform">

        <div class="1u 12u$(xsmall)" >
            <img width="180px" src="<?php echo $data['avatar_image']; ?>" alt="" />
            <ul class="actions">
                <li><input type="button" value="upload" class="button" onclick="alert('release later');"/></li>
            </ul>

        </div>
        <div class="row uniform">
            <div class="2u 12u$(xsmall) ">

            </div>
            <div class="10u 12u$(xsmall) ">
                <h5>Username:</h5>
                <input type="text" name="profile_username" id="profile_username" value="<?php echo $data['username']; ?>" placeholder="Your Name" required />
            </div>

            <div class="2u 12u$(xsmall) ">

            </div>
            <div class="10u 12u$(xsmall)">
                <h5>Password:</h5>
                <input type="text" name="profile_password" id="profile_password" value="<?php echo $data['password']; ?>" placeholder="Your Password" required />
            </div>
            <div class="2u 12u$(xsmall) ">

            </div>
            <div class="10u$ 12u$(xsmall)">
                <h5>Email:</h5>
                <input type="text" name="profile_email" id="profile_email" value="<?php echo $data['email']; ?>" placeholder="Your Email" required />
                </BR>
                <ul class="actions">
                    <li><input type="button" value="update profile" class="special" onclick="updateProfile();"/></li>
                </ul>
            </div>

        </div>
        <div class="10u$ 12u$(xsmall)">
        </div>

    </div>

</section>
