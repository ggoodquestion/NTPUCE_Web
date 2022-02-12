<footer id="footer" class="">
    <div class="col-lg-7 align-self-center " align="center">
        <img src="/images/footer-logo.svg" class="footer-logo " style="width: calc(50%);">
    </div>
    <section class="split contact col-lg">
        <section>
            <h4><?php get_eng_footer(0, "聯絡我們") ?></h4>
        </section>
        <section>
            <h3><?php get_eng_footer(1, "校址") ?></h3>
            <p>23741 <?php get_eng_footer(2, "新北市三峽區大學路151號(圖書館B1)") ?></p>
        </section>
        <section>
            <h3><?php get_eng_footer(3, "電話") ?></h3>
            <p>(02)8674-1111 #68375</p>
        </section>
        <section>
            <h3>E-mail</h3>
            <p>cie@gm.ntpu.edu.tw</p>
        </section>
        <section>
            <h3><?php get_eng_footer(6, "服務時間") ?></h3>
            <p><?php get_eng_footer(7, "週一～週五 9:00 – 17:00") ?></p>
        </section>
        <section>
            <!-- <ul class="icons alt">
                <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
            </ul> -->
        </section>
    </section>
</footer>

<!-- Copyright -->
<div id="copyright">
    <ul>
        <li>&copy; NTPUCIE</li>
        <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
    </ul>
</div>
<?php

function get_eng_footer($index, $zh){
    if(isEng()){
        global $json;
        $about = $json['about']['contact'];
        echo $about[$index];
        
    }else{
        echo $zh;
    }
}
?>
