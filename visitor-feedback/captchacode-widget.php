<?php
$captchacode = rand();
?>               

<img src="captcha-code/Generate_Captcha_Code.php?rand=<?php echo $captchacode; ?>" id='captchaimg' alt="img" style=" margin-top: 17px;">  

<a href='javascript: refreshCaptcha();' class="contact-details">
    <div class="refreshbox">
        <div class="refresh-img">        
            <img style="border:none;" src="captcha-code/img/refresh.png" title="Click to change the code" alt="img"/>
        </div>
    </div>
</a>

<script language='JavaScript' type='text/javascript'>

    function refreshCaptcha() {
        var img = document.images['captchaimg'];
        var c = Math.round(Math.random() * 10000);
        img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + c;
    }

</script>
