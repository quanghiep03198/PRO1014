<aside>
    <div class="bg-[#EDEDED] h-full  drop-shadow rounded-md  ">
        <div class="ssd  flex justify-start items-center gap-3 py-[20px] ">
            <h1 class="  ml-[20px] font-[600] text-[30px]  "> Danh mục bài viết
            </h1>
        </div>
        <div class="search ">
            <div class="form-control py-4 ">
                <div class="input-group justify-center mt-[5px] ">
                    <input type="text" placeholder="Search…" class="input input-bordered py-3 w-[80%]" />
                    <button class="btn btn-square ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class=" open:bg-amber-200 duration-300 ">
            <h3 class="ml-[40px] mt-[50px] mb-[15px] font-[600] text-[20px] hover:underline"> <a href="">Tất cả bài viết</a> </h3>
        </div>
        <div class="ke  text-center px-[20px] ">
            <hr class="border-1 border-[#C6C6C6]  ">
        </div>
        <div class=" open:bg-amber-200 duration-300 ">
            <h3 class="ml-[40px] mt-[50px] mb-[15px] font-[600] text-[20px] hover:underline"> <a href="">Tin công nghệ</a> </h3>
        </div>
        <div class="ke  text-center px-[20px] ">
            <hr class="border-1 border-[#C6C6C6]  ">
        </div>
        <div class=" open:bg-amber-200 duration-300 ">
            <h3 class="ml-[40px] mt-[50px] mb-[15px] font-[600] text-[20px] hover:underline"> <a href="">Tin game</a> </h3>
        </div>
        <div class="ke  text-center px-[20px] ">
            <hr class="border-1 border-[#C6C6C6]  ">
        </div>
        <div class=" open:bg-amber-200 duration-300 ">
            <h3 class="ml-[40px] mt-[50px] mb-[15px] font-[600] text-[20px] hover:underline"> <a href="">Esport</a> </h3>
        </div>
        <div class="ke  text-center px-[20px] ">
            <hr class="border-1 border-[#C6C6C6]  ">
        </div>
        <div class="col mx-[10px] ">
            <h3 class="text-[30px] font-[600] mb-[20px] mt-[10px] lg:mt-[170px]">Bài viết nổi bật</h3>
            <div class="supo flex flex-col justify-between gap-[30px] ">
                <?php for ($i = 0; $i < 3; $i++) {
                    include "site/components/post-sidecard.php";
                } ?>
            </div>
        </div>
        <div class="tags">
            <div class="bao  py-[50px]">
                <div class="flex items-center justify-center gap-5">
                    <div class="inline-flex gap-3   focus:shadow-lg" role="group">
                        <button type="button" class="inline-block px-6 py-[15px] bg-[#DEDEDE] text-black font-[600] text-xs leading-tight uppercase hover:bg-[#4A4A4A] focus:bg-[#4A4A4A] focus:text-white focus:ring-0 active:bg-[#4A4A4A] active:text-white transition duration-150 ease-in-out border-2"> <a href="">Games</a> </button>
                        <button type="button" class=" inline-block px-6 py-[15px] bg-[#DEDEDE] text-black font-[600] text-xs leading-tight uppercase hover:bg-[#4A4A4A] focus:bg-[#4A4A4A] focus:text-white focus:ring-0 active:bg-[#4A4A4A] active:text-white transition duration-150 ease-in-out border-2"><a href="">Công nghệ</a></button>
                        <button type="button" class=" inline-block px-6 py-[15px] bg-[#DEDEDE] text-black font-[600] text-xs leading-tight uppercase hover:bg-[#4A4A4A] focus:bg-[#4A4A4A] focus:text-white focus:ring-0 active:bg-[#4A4A4A] active:text-white transition duration-150 ease-in-out border-2"><a href="">Tin games</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ok">
        <label for="checker1" id="lb2"><img class="max-w-[50px] 2xl:hidden block absolute top-[20px] right-[50px]" src="/img/ant-design_close-circle-outlined.png" alt="" /></label>
        <input type="checkbox" id="checker" class="hidden" />
    </div>
</aside>