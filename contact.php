<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $services = $_POST['services'];
    $adate = $_POST['adate'];
    $atime = $_POST['atime'];
    $phone = $_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);

    $query = mysqli_query($con, "insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");

    if ($query) {
        $ret = mysqli_query($con, "select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
        $result = mysqli_fetch_array($ret);
        $_SESSION['aptno'] = $result['AptNumber'];
        echo "<script>window.location.href='thank-you.php'</script>";
    } else {
        $msg = "Something Went Wrong. Please try again";
    }
}
?>
<?php include('includes/head.php'); ?>
<?php include('includes/header.php'); ?>

<main id="contact-page">
    <!-- About Header Section -->
    <section id="about-header">
        <div class="about-hero" style="">
            <div class="overlay"></div>
            <div class="overlay-2"></div>
            <div class="container mx-auto pb-12">
                <div class="ss-header">
                    <h1 class="font-extrabold text-6xl">Contact Us</h1>
                </div>
                <div class="text-sm breadcrumbs text-gray-300 text-lg">
                    <ul>
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                            <a>Contact</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section id="contact-info">
        <div class="container mx-auto">
            <div class="flex flex-row w-full justify-center">
                <div class="card p-3 text-center ">
                    <div class="icon-holder shadow-xl">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 463 463" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 463 463">
                            <g>
                                <g>
                                    <path d="m87.5,32c-4.142,0-7.5,3.358-7.5,7.5v384c0,4.142 3.358,7.5 7.5,7.5s7.5-3.358 7.5-7.5v-384c0-4.142-3.358-7.5-7.5-7.5z" />
                                    <path d="m399,193.234v-161.734c0-17.369-14.131-31.5-31.5-31.5h-288c-17.369,0-31.5,14.131-31.5,31.5v400c0,17.369 14.131,31.5 31.5,31.5h288c17.369,0 31.5-14.131 31.5-31.5v-161.734c9.29-3.138 16-11.93 16-22.266v-32c0-10.336-6.71-19.128-16-22.266zm-128-178.234h49v96.5c0,0.138 0,0.309-0.276,0.447-0.277,0.138-0.413,0.035-0.523-0.047l-19.201-14.4c-2.667-2-6.333-2-9,0l-19.2,14.4c-0.11,0.083-0.247,0.185-0.523,0.047-0.277-0.138-0.277-0.309-0.277-0.447v-96.5zm96.5,433h-288c-9.098,0-16.5-7.402-16.5-16.5v-400c0-9.098 7.402-16.5 16.5-16.5h176.5v96.5c0,5.909 3.283,11.221 8.568,13.864 2.211,1.105 4.586,1.65 6.947,1.65 3.281,0 6.535-1.052 9.284-3.114l14.7-11.025 14.7,11.025c4.727,3.545 10.947,4.105 16.231,1.464 5.285-2.643 8.568-7.955 8.568-13.864v-96.5h32.5c9.098,0 16.5,7.402 16.5,16.5v160.5h-40.5c-21.78,0-39.5,17.72-39.5,39.5s17.72,39.5 39.5,39.5h40.502v160.5c0,9.098-7.402,16.5-16.5,16.5zm32.5-200.5c0,4.679-3.8,8.485-8.476,8.499-0.008,0-0.016-0.001-0.024-0.001-0.016,0-0.032,0.002-0.048,0.002h-47.952c-13.509,0-24.5-10.991-24.5-24.5s10.991-24.5 24.5-24.5h48c4.687,0 8.5,3.813 8.5,8.5v32z" />
                                    <path d="m343.5,224c-1.98,0-3.91,0.8-5.3,2.2-1.4,1.39-2.2,3.32-2.2,5.3 0,1.97 0.8,3.91 2.2,5.3 1.39,1.4 3.33,2.2 5.3,2.2s3.91-0.8 5.3-2.2c1.4-1.39 2.2-3.32 2.2-5.3s-0.8-3.91-2.2-5.3c-1.39-1.4-3.32-2.2-5.3-2.2z" />
                                </g>
                            </g>
                        </svg>

                    </div>
                    <h5 class="font-bold text-lg mb-3">Address</h5>
                    <p class="text-base">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card p-3 text-center">
                    <div class="icon-holder shadow-xl">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="997.000000pt" height="1280.000000pt" viewBox="0 0 997.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                            <metadata>
                                Created by potrace 1.15, written by Peter Selinger 2001-2017
                            </metadata>
                            <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none">
                                <path d="M3045 12782 c-27 -10 -230 -122 -450 -248 -220 -127 -506 -291 -635
                                        -364 -301 -171 -350 -219 -382 -374 -23 -106 -15 -124 273 -615 480 -820 1464
                                        -2453 1505 -2500 54 -59 132 -106 213 -127 113 -28 117 -27 650 279 262 151
                                        553 318 648 371 236 134 298 204 325 370 21 129 12 151 -211 521 -1045 1729
                                        -1554 2566 -1580 2597 -73 87 -245 131 -356 90z" />
                                <path d="M1193 11440 c-530 -152 -892 -537 -1069 -1139 -285 -967 -66 -2490
                                        601 -4181 675 -1710 1696 -3334 2810 -4469 954 -971 1864 -1506 2775 -1632
                                        127 -18 508 -18 625 -1 218 33 412 85 604 161 86 35 177 76 189 86 5 4 -872
                                        1531 -975 1695 -105 168 -311 504 -630 1030 -170 279 -140 257 -293 219 -128
                                        -31 -394 -34 -545 -5 -331 61 -711 251 -1050 523 -139 111 -397 363 -527 513
                                        -197 228 -397 506 -563 785 -101 170 -151 270 -218 440 -168 426 -272 819
                                        -323 1220 -25 198 -23 540 5 722 53 353 178 647 377 890 30 36 52 68 50 72 -2
                                        3 -56 95 -120 204 -168 286 -414 732 -816 1477 -492 914 -776 1420 -795 1419
                                        -5 0 -56 -13 -112 -29z" />
                                <path d="M7690 4686 c-19 -8 -237 -130 -485 -273 -247 -143 -533 -306 -635
                                        -363 -199 -113 -268 -169 -308 -251 -51 -105 -48 -215 7 -313 701 -1244 1679
                                        -2927 1734 -2984 18 -18 61 -48 97 -65 59 -29 73 -32 160 -32 l96 0 159 92
                                        c88 50 385 220 660 377 275 158 512 299 528 314 41 38 76 95 98 160 22 63 26
                                        199 7 253 -6 19 -100 185 -208 369 -109 184 -403 688 -655 1120 -656 1125
                                        -854 1460 -887 1502 -18 23 -55 50 -96 70 -57 28 -78 33 -152 35 -53 2 -98 -3
                                        -120 -11z" />
                            </g>
                        </svg>

                    </div>
                    <h5 class="font-bold text-lg mb-3">Address</h5>
                    <p class="text-base">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card p-3 text-center">
                    <div class="icon-holder shadow-xl">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt" height="821.000000pt" viewBox="0 0 1280.000000 821.000000" preserveAspectRatio="xMidYMid meet">
                            <metadata>
                                Created by potrace 1.15, written by Peter Selinger 2001-2017
                            </metadata>
                            <g transform="translate(0.000000,821.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none">
                                <path d="M615 8204 c-129 -27 -208 -67 -284 -143 -31 -31 -72 -83 -90 -114
                                        -17 -30 -59 -83 -92 -118 -72 -73 -122 -170 -138 -267 -8 -48 -11 -1050 -9
                                        -3612 3 -3474 3 -3546 22 -3595 63 -162 179 -276 336 -331 54 -19 184 -19
                                        5945 -19 5037 0 5897 2 5940 14 129 37 248 129 314 244 17 30 59 83 92 118 72
                                        73 122 170 138 267 8 48 11 1050 9 3612 -3 3472 -3 3546 -22 3595 -62 159
                                        -172 269 -331 331 -49 19 -148 19 -5930 20 -3234 1 -5889 0 -5900 -2z m10595
                                        -704 c-1 -8 -4713 -2863 -4724 -2863 -10 1 -4703 2846 -4718 2861 -4 4 2119 7
                                        4718 7 2598 0 4724 -2 4724 -5z m928 -4886 l-3 -1556 -850 767 c-467 422
                                        -1394 1258 -2058 1858 -1024 925 -1205 1092 -1190 1101 85 47 4072 2471 4083
                                        2482 13 13 15 -158 18 -1541 1 -855 1 -2255 0 -3111z m-9373 3276 c1144 -694
                                        2081 -1263 2083 -1265 1 -1 -84 -81 -190 -177 -395 -357 -3964 -3581 -3980
                                        -3596 -17 -14 -18 137 -18 3153 0 2533 3 3165 13 3157 6 -5 948 -578 2092
                                        -1272z m5356 -1497 c157 -142 791 -715 1409 -1273 618 -558 1457 -1316 1865
                                        -1683 673 -608 740 -672 743 -702 3 -31 1 -33 -21 -27 -14 4 -436 378 -938
                                        832 -1618 1461 -3090 2790 -3251 2934 -154 139 -156 141 -136 159 11 9 25 17
                                        32 17 6 0 140 -116 297 -257z m282 -636 c452 -408 1382 -1248 2067 -1866 685
                                        -618 1260 -1137 1277 -1155 l33 -31 -5430 0 c-2987 0 -5429 3 -5427 7 2 6 899
                                        818 3062 2772 572 516 1054 952 1071 968 l31 29 509 -309 c280 -170 525 -317
                                        544 -327 55 -29 249 -33 321 -7 30 11 290 164 579 340 289 176 528 321 533
                                        321 4 1 377 -333 830 -742z" />
                            </g>
                        </svg>

                    </div>
                    <h5 class="font-bold text-lg mb-3">Address</h5>
                    <p class="text-base">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card p-3 text-center">
                    <div class="icon-holder shadow-xl">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt" height="1280.000000pt" viewBox="0 0 1280.000000 1280.000000" preserveAspectRatio="xMidYMid meet">
                            <metadata>
                                Created by potrace 1.15, written by Peter Selinger 2001-2017
                            </metadata>
                            <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none">
                                <path d="M6015 12413 c-462 -30 -960 -122 -1404 -259 -1166 -362 -2215 -1090
                                            -2969 -2061 -655 -845 -1073 -1843 -1211 -2893 -41 -316 -46 -398 -46 -805 0
                                            -416 7 -524 56 -870 128 -902 487 -1811 1014 -2565 390 -557 888 -1062 1430
                                            -1451 867 -622 1824 -985 2915 -1105 197 -21 784 -30 1006 -15 2081 145 3911
                                            1329 4906 3174 615 1139 842 2500 632 3796 -257 1592 -1134 3005 -2450 3947
                                            -898 643 -1953 1022 -3069 1104 -126 9 -684 11 -810 3z m710 -793 c1866 -117
                                            3514 -1210 4356 -2892 613 -1223 714 -2670 279 -3978 -211 -634 -525 -1195
                                            -967 -1725 -132 -159 -426 -456 -588 -594 -1297 -1108 -3014 -1514 -4672
                                            -1106 -1356 334 -2548 1230 -3253 2445 -390 674 -617 1392 -691 2190 -16 174
                                            -16 706 0 880 74 799 300 1516 691 2190 704 1214 1894 2109 3250 2444 525 130
                                            1063 179 1595 146z" />
                                <path d="M6298 11522 l-98 -3 0 -319 0 -320 200 0 200 0 0 320 0 320 -89 0
                                            c-49 0 -95 1 -103 3 -7 1 -57 1 -110 -1z" />
                                <path d="M3875 10857 c-172 -98 -225 -131 -225 -140 0 -14 311 -547 319 -547
                                            4 0 57 30 117 66 60 36 135 80 167 97 31 17 57 35 57 39 0 9 -299 519 -314
                                            536 -9 10 -35 -1 -121 -51z" />
                                <path d="M8787 10883 c-61 -98 -297 -503 -297 -510 0 -5 39 -31 88 -58 48 -26
                                            122 -70 165 -97 43 -26 82 -48 86 -48 8 0 321 534 321 548 0 7 -163 106 -282
                                            172 l-57 31 -24 -38z" />
                                <path d="M2002 9028 c-87 -145 -145 -259 -136 -268 13 -12 534 -310 542 -310
                                            7 0 204 342 200 345 -2 1 -113 64 -248 140 -135 75 -259 146 -277 156 l-31 20
                                            -50 -83z" />
                                <path d="M10475 8955 c-148 -85 -274 -156 -279 -158 -5 -2 13 -41 41 -88 28
                                            -46 72 -123 99 -171 26 -49 51 -88 54 -88 8 0 531 299 544 310 5 5 -10 43 -34
                                            87 -42 76 -151 263 -154 263 0 -1 -122 -70 -271 -155z" />
                                <path d="M6271 6884 c-179 -48 -326 -206 -363 -390 -7 -32 -12 -60 -13 -61 -1
                                            -2 -460 -172 -1021 -379 -1018 -375 -2863 -1057 -2896 -1069 -10 -4 -18 -16
                                            -18 -27 0 -17 4 -19 28 -13 29 7 952 267 2127 600 402 114 991 280 1309 370
                                            l579 164 51 -45 c63 -55 167 -109 243 -125 78 -16 204 -6 275 21 122 46 218
                                            131 278 248 19 36 26 42 55 42 18 0 147 7 286 15 140 8 733 42 1319 75 1289
                                            72 1220 67 1220 90 0 23 69 18 -1220 90 -586 33 -1179 67 -1319 75 -139 8
                                            -268 15 -287 15 -31 0 -36 5 -60 52 -36 71 -132 169 -203 207 -112 59 -253 77
                                            -370 45z" />
                                <path d="M1280 6400 l0 -200 320 0 320 0 0 200 0 200 -320 0 -320 0 0 -200z" />
                                <path d="M10880 6400 l0 -200 320 0 320 0 0 200 0 200 -320 0 -320 0 0 -200z" />
                                <path d="M2133 4197 c-144 -84 -265 -155 -268 -159 -8 -8 56 -131 137 -266
                                            l50 -83 31 20 c18 10 142 81 277 156 135 76 246 139 248 140 6 5 -194 344
                                            -203 344 -5 0 -128 -69 -272 -152z" />
                                <path d="M10336 4263 c-27 -49 -71 -125 -98 -171 -28 -46 -48 -85 -47 -86 2
                                            -2 110 -63 239 -136 129 -72 254 -143 276 -156 l42 -24 55 93 c96 161 140 248
                                            131 256 -14 13 -535 311 -543 311 -4 0 -29 -39 -55 -87z" />
                                <path d="M3806 2361 c-86 -149 -156 -273 -156 -278 0 -8 148 -99 282 -173 l57
                                            -31 15 23 c42 66 306 520 306 526 0 4 -26 22 -57 39 -32 17 -107 61 -167 97
                                            -60 36 -113 66 -117 66 -4 0 -77 -121 -163 -269z" />
                                <path d="M8783 2606 c-18 -12 -91 -56 -163 -97 -71 -40 -130 -77 -130 -82 0
                                            -8 237 -415 297 -510 l24 -38 57 31 c120 66 282 165 282 173 0 17 -314 547
                                            -324 547 -6 -1 -26 -11 -43 -24z" />
                                <path d="M6200 1600 l0 -320 200 0 200 0 0 320 0 320 -200 0 -200 0 0 -320z" />
                            </g>
                        </svg>

                    </div>
                    <h5 class="font-bold text-lg mb-3">Address</h5>
                    <p class="text-base">Lorem ipsum dolor sit amet.</p>
                </div>

            </div>

        </div>
    </section>
</main>


<?php //include('includes/footer.php'); 
?>