<?php
    session_start();
    include'header.php';
    // include'./slider.php';  
?>
    <!-- Contact -->
    <section class="book" id="book">
        <h1 class="heading">Contact <span>send us message</span></h1>
        <?php
        if (isset($_GET['success'])):
            echo '<div class="alert alert-success">We will contact to you shortly</div>';
        endif;
        ?>

        <form method="post" action="contact_process.php" id="form" onsubmit="return validateInputs()">
            <div class="input-control">
                <input type="text" placeholder="Name" class="box" name="txtName" id="name" autocomplete="off">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Email" class="box" name="txtEmail" id="email" autocomplete="off">
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <input type="text" placeholder="Phone Number" class="box" name="txtPhone" id="phone" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <input type="text" placeholder="Subject" class="box" name="txtSubject" id="subject" autocomplete="off">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <textarea placeholder="Message" class="box" id="mess" name="txtMess" cols="30" rows="8"></textarea>
                <div class="error"></div>
            </div>
            <br>

            <input name="btnSend" type="submit" value="send message" class="btn">
        </form>
    </section>
    <!-- FOOTER -->
    <?php
   include 'footer.php';
   ?>
    <!-- Check valid -->
    <script type=text/javascript>
        const form = document.getElementById("form");
        const name = document.getElementById("name");                   
        const email = document.getElementById("email");
        const phone = document.getElementById("phone");
        const subject = document.getElementById("subject");
        const mess = document.getElementById("mess");

        // form.addEventListener('submit', e => {
        //     // e.preventDefault();

        //     return validateInputs();
        // });

        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success')
        }

        const setSuccess = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        };

        const isValidEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        const isValidNumber = number => {
            const re = /^[0-9]+$/;
            var a = re.test(number);
            return a;
        }

        const validateInputs = () => {
            const nameValue = name.value.trim();
            const emailValue = email.value.trim();
            const phoneValue = phone.value.trim();
            const subjectValue = subject.value.trim();
            const messValue = mess.value.trim();
            var valid = true;

            if(nameValue == '') {
                setError(name, 'Name is required');
                valid = false;
            } else {
                setSuccess(name);
            }

            if(emailValue == '') {
                setError(email, 'Email is required');
                valid = false;
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Provide a valid email address');
                valid = false;
            } else {
                setSuccess(email);
            }

            if(phoneValue == '') {
                setError(phone, 'Phone is required');
                valid = false;
            } else if (phoneValue.length > 13) {
                setError(phone, 'Phone must be below 13 digits.');
                valid = false;
            } else if (!isValidNumber(phoneValue)) {
                setError(phone, 'Invalid number');
                valid = false;
            } else {
                setSuccess(phone);
            }

            if(subjectValue == '') {
                setError(subject, 'Subject is required');
                valid = false;
            } else {
                setSuccess(subject);
            }

            if(messValue == '') {
                setError(mess, 'Message is required');
                valid = false;
            } else {
                setSuccess(mess);
            }

            return valid;
        };
    </script>
    <?php
        include'./footer.php';
   ?>
</body>

</html>