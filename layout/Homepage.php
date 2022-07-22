<?php 
include "pdo.php";
$sql = "SELECT * FROM product order by PRODUCT_ID";
pdo_query($sql);

$sqli = "SELECT * FROM product order by PRODUCT_ID desc limit 0,10";
$list_sanpham = pdo_query($sqli);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar bg-base-100">
                <div class="navbar-start">

                    <a href=""><img class="max-h-[150px] max-w-[150px] hover:scale-[1.2]" src="/img/logo.png" alt=""></a>
                </div>
                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal p-0">
                        <li><a href="" class="text-[20px] font-[600]">Trang chủ</a></li>
                        <li><a href="" class="text-[20px] font-[600]">Cửa hàng</a></li>
                        <li><a href="" class="text-[20px] font-[600]">Dịch vụ</a></li>
                        <li><a href="" class="text-[20px] font-[600]">Tin tức</a></li>
                    </ul>
                </div>
                <div class="navbar-end gap-[25px] pr-[10px]">
                    <a href=""><img class="max-h-[25px] max-w-[25px] hover:scale-[1.5]" src="/img/Vector (1).png" alt=""></a>
                    <a href=""><img class="max-h-[25px] max-w-[25px] hover:scale-[1.5]" src="/img/Heart.png" alt=""></a>
                    <div class="indicator">
                        <a href=""><img class="max-h-[25px] max-w-[25px] hover:scale-[1.5]" src="/img/Vector.png" alt=""></a>
                        <span class="badge badge-sm badge-error indicator-item"></span>
                    </div>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="">Trang chủ</a></li>
                            <li><a href="">Cửa hàng</a></li>
                            <li><a href="">Dịch vụ</a></li>
                            <li><a href="">Tin tức</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </header>
    <!-- HEADER END  -->
    <main>
        <div class="banner pt-[50px]">
            <div class="container">
                <div class=" flex justify-between gap-[30px]  items-center flex-wrap  ">
                    <div class=" pl-[50px] lg:pl-[0px]">
                        <h2 class="lg:text-[60px] font-[800] text-[30px]">Playstation 5 - Digtal Edtion</h2>
                        <p class="lg:text-[40px] font-[400] pt-3 text-[20px]">Khám phá sức mạnh ấn tượng<br>của AMD Ryzen “Zen 2”
                        </p>
                        <a href="" class="inline-block mt-[80px] lg:px-[50px] lg:py-[15px] px-[20px] py-[5px] border-[1px] border-[#000] rounded-[8px] lg:text-[35px] text-[20px] hover:bg-[#000] hover:text-[#fff]">Xem
                            ngay</a>
                    </div>
                    <div class="">
                        <img class="hover:scale-[1.1] lg:w-full" src="/img/Frame 34.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="ke max-w-[1440px] m-auto pt-[150px]">
            <hr class="border-1 border-[#000]">
        </div>
        <div class="content container text-center pt-[150px]">
            <h2 class="lg:text-[50px] text-[35px] font-[500]"> Khám phá Playstation ® 4</h2>
            <p class="lg:text-[24px] text-[15px] font-[500] pt-[15px] ">Những tựa games hấp dẫn, giải trí bất tận. Cùng PS Store tận hưởng ngày nghỉ với Playstation 4</p>
            <div class="row grid xl:grid-cols-3 grid-cols-1 gap-[30px] mt-[100px]">
                <div class="col ">
                    <div class="imgg">
                        <a href="" class="inline-block"><img src="/img/Frame 68.png" class="hover:scale-[1.15]  " alt=""></a>
                    </div>
                    <div class="ct lg:text-left lg:ml-[100px]">
                        <h3 class="text-[32px] font-[600] hover:underline "><a href="">Playstation 4</a> </h3>
                        <p class="text-[18px] ">Cửa hàng game trực tuyến đa dạng, với<br> 1TB dụng lượng</p>
                        <a href="" class="hover:bg-[#000] hover:text-[#fff] inline-block mt-8 px-[20px] py-[10px] border-[1px] border-[#000]">Khám
                            phá
                            ngay</a>
                    </div>
                </div>
                <div class="col">
                    <div class="imgg">
                        <a href="" class="inline-block"><img src="/img/Frame 68 (1).png " class="hover:scale-[1.15]" alt=""></a>
                    </div>
                    <div class="ct lg:text-left">
                        <h3 class="text-[32px] font-[600] hover:underline"><a href="">Playstation VR</a> </h3>
                        <p class="text-[18px] ">Trải nghiệm thế giới ảo với kính VR của<br> Sony</p>
                        <a href="" class="hover:bg-[#000] hover:text-[#fff] inline-block mt-8 px-[20px] py-[10px] border-[1px] border-[#000]">Khám
                            phá
                            ngay</a>
                    </div>
                </div>
                <div class="col">
                    <div class="imgg">
                        <a href="" class="inline-block"><img src="/img/Frame 68 (2).png" class="hover:scale-[1.15] lg:mr-[200px]" alt=""></a>
                    </div>
                    <div class="ct lg:text-left ">
                        <h3 class="text-[32px] font-[600] hover:underline"><a href=""> Dualshock 4</a></h3>
                        <p class="text-[18px] ">Tay cầm chơi game cực chất với<br> bluetooth 5.0 và touchpad cảm biến
                        </p>
                        <a href="" class="hover:bg-[#000] hover:text-[#fff] inline-block mt-8 px-[20px] py-[10px] border-[1px] border-[#000]">Khám
                            phá
                            ngay</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- content end  -->
        <div class=" acb bg-[#222222] py-[50px] mt-[150px] text-center flex justify-center gap-[100px]">
            <div class="f">
                <a href="" class="text-[#fff] lg:text-[30px] text-[15px] font-[400] hover:underline">Sản phẩm mới</a>
            </div>
            <div class="f">
                <a href="" class="text-[#fff]  lg:text-[30px] text-[15px] font-[400] hover:underline">Giảm giá</a>
            </div>
            <div class="f">
                <a href="" class="text-[#fff] lg:text-[30px] text-[15px] font-[400] hover:underline">Mua nhiều</a>
            </div>
        </div>
        <!-- acb end  -->
        <div class="row product container pt-[100px] grid 2xl:grid-cols-5 lg:grid-cols-3  grid-cols-2 gap-[30px] ">
        <?php
foreach ($list_sanpham as $sp) {
    extract($sp);
    $ass = number_format($PRICE);
    $pathimg = "\uploads\product-image.png" ;
    if ($pathimg) {
        $hinh = "<img src='" . $pathimg . "' height='100'>";
    }
    else {
        echo " no photo";
    }


            echo " <div class='col shadow-lg p-5'> 
                <div class='imggg'>
                    <a href=''>$hinh</a>
                </div>
                <div class='ctt'>
                    <h4 class='text-[20px]'>
                        $PRODUCT_NAME 
                    </h4>
                    <div class='rating'>
                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' checked/>
                        <input type='radio' name='rating-1' class='mask mask-star-2 bg-orange-400' />
                       
                    </div>
                   
                    <p class=text-[16px]'>$DISCOUNT viewers</p>
                    <span class='text-[#407CB4] text-[20px] font-[500]'>$ass</span> <span class='text-[#407CB4] text-[20px] font-[500]'đ</span>
                </div>
                <form action='?page=addtocart' method='post'>
                <input type='hidden' name='id' value='$PRODUCT_ID'>
                <input type='hidden' name='name_pro' value=' $PRODUCT_NAME'>
                <input type='hidden' name='price' value='$PRICE'> 
                <input type='hidden' name='img' value=''>
                <button type='submit' class='colsa btn w-full mt-[10px]' name='add_btn'>Mua Ngay</button>
            </form>
            </div>
            ";
}
?>
            
         

        </div>
        <div class="bao container pt-[30px]">
            <div class="flex items-center justify-center gap-5">
                <div class="inline-flex gap-3 shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                    <button type="button" class="inline-block px-6 py-[15px] bg-[#fff] text-black font-medium text-xs leading-tight uppercase hover:bg-[#4A4A4A] focus:bg-[#4A4A4A] focus:text-white focus:ring-0 active:bg-[#4A4A4A] active:text-white transition duration-150 ease-in-out">1</button>
                    <button type="button" class=" inline-block px-6 py-[15px] bg-[#fff] text-black font-medium text-xs leading-tight uppercase hover:bg-[#4A4A4A] focus:bg-[#4A4A4A] focus:text-white focus:ring-0 active:bg-[#4A4A4A] active:text-white transition duration-150 ease-in-out">2</button>
                    <button type="button" class=" inline-block px-6 py-[15px] bg-[#fff] text-black font-medium text-xs leading-tight uppercase hover:bg-[#4A4A4A] focus:bg-[#4A4A4A] focus:text-white focus:ring-0 active:bg-[#4A4A4A] active:text-white transition duration-150 ease-in-out">3</button>
                </div>
            </div>
        </div>
        <!-- product end  -->
        <div class="ke max-w-[1440px] m-auto py-[150px] ">
            <hr class="border-1 border-[#000]">
        </div>
        <h2 class="container text-center text-[40px] font-[600] underline pb-[50px] ">TIN TỨC MỚI</h2>
        <div class="gr grid 2xl:grid-cols-[3fr,1fr] grid-cols-1 2xl:container pb-[50px] gap-[50px]">
            <div class="col grid lg:grid-cols-3 grid-cols-1  gap-8  pl-[70px] lg:pl-[0px] ">
                <div class="col">
                    <div class="card max-w-[350px] max-h-[618px] bg-base-100 shadow-xl">
                        <figure><img src="/img/post-image.png" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-[16px]">Call of duty - Cold War đã có trên nền tảng Playstation
                            </h2>
                            <p>Được phát hành vào ngày 6/7/2020, theo như Activistion công bố, đây hứa hẹn sẽ là tựa game ...</p>
                            <button class="btn ">Xem thêm</button>
                            <div class="kl flex justify-around items-center">
                                <div class="card-actions justify-start">
                                    <div class="avatar">
                                        <div class="w-[50px] rounded-full mt-5">
                                            <img src="https://placeimg.com/192/192/people" />
                                        </div>
                                    </div>
                                </div>
                                <div class="con">
                                    <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]">Quang
                                        Hiệp</span>
                                    <p class="text-[12px]">6/7/2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card w-[350px] h-[618px] bg-base-100 shadow-xl">
                        <figure><img src="/img/post-image.png" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-[16px]">Call of duty - Cold War đã có trên nền tảng Playstation
                            </h2>
                            <p>Được phát hành vào ngày 6/7/2020, theo như Activistion công bố, đây hứa hẹn sẽ là tựa game ...</p>
                            <button class="btn ">Xem thêm</button>
                            <div class="kl flex justify-around items-center">
                                <div class="card-actions justify-start">
                                    <div class="avatar">
                                        <div class="w-[50px] rounded-full mt-5">
                                            <img src="https://placeimg.com/192/192/people" />
                                        </div>
                                    </div>
                                </div>
                                <div class="con">
                                    <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]">Quang
                                        Hiệp</span>
                                    <p class="text-[12px]">6/7/2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card w-[350px] h-[618px] bg-base-100 shadow-xl">
                        <figure><img src="/img/post-image.png" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title text-[16px]">Call of duty - Cold War đã có trên nền tảng Playstation
                            </h2>
                            <p>Được phát hành vào ngày 6/7/2020, theo như Activistion công bố, đây hứa hẹn sẽ là tựa game ...</p>
                            <button class="btn ">Xem thêm</button>
                            <div class="kl flex justify-around items-center">
                                <div class="card-actions justify-start">
                                    <div class="avatar">
                                        <div class="w-[50px] rounded-full mt-5">
                                            <img src="https://placeimg.com/192/192/people" />
                                        </div>
                                    </div>
                                </div>
                                <div class="con">
                                    <span class="text-[15px]">Đăng bởi :</span> <span class="font-[600]">Quang
                                        Hiệp</span>
                                    <p class="text-[12px]">6/7/2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col">
                <h3 class="text-[30px] font-[600] mb-[20px] mt-[50px] lg:mt-[0px]">Bài viết nổi bật</h3>
                <div class="supo flex flex-col justify-between gap-[30px]">
                    <div class="bao flex 2xl:justify-between justify-center items-center gap-[20px]">
                        <div class="a">
                            <div class="f">
                                <a href=""><img src="/img/Frame 83.png" alt=""></a>
                            </div>
                        </div>
                        <div class="b">
                            <h3 class="text-[20px] font-[400]">Call Of Duty - Ghost Remaster</h3>
                            <p class="text-[16px] font-[200]">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>

                            <span class="text-[14px] font-[800]">Đăng ngày:</span> <span>6/7/2022</span> <span class="text-[14px] font-[800] inline-block ml-[50px]">Bởi:</span>
                            <span> quanghiep03198</span>
                        </div>
                    </div>
                    <div class="bao flex 2xl:justify-between justify-center items-center gap-[20px]">
                        <div class="a">
                            <div class="f">
                                <a href=""><img src="/img/Frame 83.png" alt=""></a>
                            </div>
                        </div>
                        <div class="b">
                            <h3 class="text-[20px] font-[400]">Call Of Duty - Ghost Remaster</h3>
                            <p class="text-[16px] font-[200]">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>

                            <span class="text-[14px] font-[800]">Đăng ngày:</span> <span>6/7/2022</span> <span class="text-[14px] font-[800] inline-block ml-[50px]">Bởi:</span>
                            <span> quanghiep03198</span>
                        </div>
                    </div>
                    <div class="bao flex 2xl:justify-between justify-center items-center gap-[20px]">
                        <div class="a">
                            <div class="f">
                                <a href=""><img src="/img/Frame 83.png" alt=""></a>
                            </div>
                        </div>
                        <div class="b">
                            <h3 class="text-[20px] font-[400]">Call Of Duty - Ghost Remaster</h3>
                            <p class="text-[16px] font-[200]">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>

                            <span class="text-[14px] font-[800]">Đăng ngày:</span> <span>6/7/2022</span> <span class="text-[14px] font-[800] inline-block ml-[50px]">Bởi:</span>
                            <span> quanghiep03198</span>
                        </div>
                    </div>
                    <div class="bao flex 2xl:justify-between justify-center items-center gap-[20px]">
                        <div class="a">
                            <div class="f">
                                <a href=""><img src="/img/Frame 83.png" alt=""></a>
                            </div>
                        </div>
                        <div class="b">
                            <h3 class="text-[20px] font-[400]">Call Of Duty - Ghost Remaster</h3>
                            <p class="text-[16px] font-[200]">Phiên bản remake của tựa game đình đám này hứa hẹn ...</p>

                            <span class="text-[14px] font-[800]">Đăng ngày:</span> <span>6/7/2022</span> <span class="text-[14px] font-[800] inline-block ml-[50px]">Bởi:</span>
                            <span> quanghiep03198</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </main>

    <footer>
        <div class="footer py-[80px]  bg-[#222222] text-[#fff] text-center">
            <div>
                <img src="/img/logo-footer.png" alt="">

            </div>
            <div class="flex flex-col justify-between gap-[20px]">
                <span class="text-[32px] font-[600] text-[#fff] mb-[15px]">Hỗ trợ</span>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Chính sách bảo hành</a>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Chính sách mua hàng</a>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Chính sách thanh toán</a>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Chính sách đổi trả</a>
            </div>
            <div class="flex flex-col justify-between gap-[20px]">
                <span class="text-[32px] font-[600] text-[#fff] mb-[15px]">Dịch vụ</span>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Cung cấp máy chơi game chính hãng</a>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Sửa chữa lấy ngay</a>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]">Thiết kế, lắp đặt PS Center</a>

            </div>
            <div class="flex flex-col justify-between gap-[20px]">
                <span class="text-[32px] font-[600] text-[#fff] mb-[15px]">Liên hệ</span>
                <a class="link link-hover text-[20px] font-[400] text-[#fff]"> <img class="inline-block mr-[10px]" src="/img/phone.png" alt=""> 033 608 9988
                </a>

                <a class="link link-hover text-[20px] font-[400] text-[#fff] "> <img class="inline-block mr-[10px]" src="/img/mail.png" alt=""> pshnstore@gmail.com</a>

                <a class="link link-hover text-[20px] font-[400] text-[#fff]"> <img class="inline-block mr-[10px]" src="/img/vt.png" alt=""> Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</a>

                <a class="link link-hover text-[20px] font-[400] text-[#fff]"> <img class="inline-block mr-[10px]" src="/img/fb.png" alt=""> https://fb.me/psstorevn</a>

            </div>
        </div>
        <div class="ke max-w-[1440px] container">
            <hr class="border-1 border-[#fff]">
        </div>
        <div class="cop bg-[#222222] text-center py-[30px] ">
            <p class="text-[#fff] text-[20px] font-[400]">Đại lý được ủy quyền bỏi Sony Việt Nam</p>
        </div>
    </footer>

</body>

</htm