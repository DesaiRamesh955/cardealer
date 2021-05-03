<div class="row">
    <div class="col">
        <h2 class="head-title">Profile</h2>
    </div>
</div>
<div class="row mt-5">
        <div class="col-md-4 offset-md-4">
             <div class="message"></div>   
         </div>
</div>
<div class="row mt-4">
    <div class="col-md-4 offset-md-4">
        <form id="profile_form">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name"
                    data-require="true" data-error="Please enter first name" data-display="fname_error">
                <p class="text-danger" id="fname_error"></p>
            </div>
            <div class="form-group">
                <label for="lname">last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"
                    data-require="true" data-error="Please enter last name" data-display="lname_error">
                <p class="text-danger" id="lname_error"></p>
            </div>

            <div class="form-group">
                <label for="number">Mobile Number</label>
                <input type="text" name="number" id="number" class="form-control" placeholder="Mobile Number"
                    data-require="true" data-error="Please enter number" data-display="number_error"
                    data-number='{"msg":"Please enter valid number"}'
                    data-long='{"len":"10","msg":"Number should be 10 charators long"}'>
                <p class="text-danger" id="number_error"></p>
            </div>

            <div class="form-group">
                <label for="alt_number">Alternative Number</label>
                <input type="text" name="alt_number" id="alt_number" class="form-control"
                    placeholder="Alternative Number" data-require="true" data-error="Please enter alternative number"
                    data-display="alt_number_error" data-number='{"msg":"Please enter valid number"}'
                    data-long='{"len":"10","msg":"Number should be 10 charators long"}'>
                <p class="text-danger" id="alt_number_error"></p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" class="form-control" type="text" id="email" placeholder="Email Address*" data-require="true"
                    data-error="Please enter email" data-display="email_err"
                    data-email='{"msg":"Please enter valid email"}'>
                <p class="text-danger" id="email_err"> </p>
            </div>
            <div class="form-group">
                <label for="email">Map (optional)</label>
                <textarea name="map" id="map" class="form-control" cols="30" rows="10"></textarea>
                <p>Go to google map > search place > share > Embed a map > Copy HTML</p>
            </div>

            <div class="form-group">
                <input type="hidden" name="profile_form">

                <button type="submit" id="form-submit" class="btn btn-primary btn-block">Update</button>
            </div>

        </form>
    </div>
</div>
<script defer src="js/profile.js"></script>