<section xmlns="http://www.w3.org/1999/html">
    <h4>PROFILE</h4>

    <form method="post" action="#" onsubmit="updateProfile()" ">

        <div class="row uniform">

            <div class="1u 12u$(xsmall)" >
                <img width="180px" src="<?php echo $data['avatar_image']; ?>" alt="" />
                <ul class="actions">
<!--                    <li><input type="file" value="upload" class="button" onload="uploadAvatar();"/></li>    -->
                    <li><input type="button" value="upload" class="button" onload="uploadAvatar();"/></li>
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
                    <input type="email" name="profile_email" id="profile_email" value="<?php echo $data['email']; ?>" placeholder="Your Email" required />
                    </BR>
                    <ul class="actions">
                        <li><input type="submit" value="update profile" class="special" /></li>
                    </ul>
                </div>

            </div>
            <div class="10u$ 12u$(xsmall)">
            </div>

        </div>

    </form>

</section>
