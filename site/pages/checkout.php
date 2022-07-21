    <div class="bao bg-[#EDEDED] pt-[10px] pb-[80px]">
        <div class="mt-20">
            <!-- <h1 class="flex items-center justify-center font-bold text-blue-600 text-md lg:text-3xl">Tailwind CSS Ecommerce Checkout Page UI
            </h1> -->
        </div>
        <div class="container p-12 mx-auto bg-[#fff] ">
            <div class="flex flex-col w-full px-0 mx-auto md:flex-row gap-5 ">
                <div class="flex flex-col md:w-full">
                    <div class="dv lg:flex justify-start gap-[290px] ">
                        <h2 class="mb-4 font-[500]  text-[40px] text-[#407CB4] block lg:hidden">Kiểm tra lại thông tin </h2>
                        <div class="q">
                            <h2 class="mb-4 font-[500]  text-[40px] text-[#407CB4] hidden lg:block">1. Thông tin nhận hàng </h2>
                        </div>
                        <div class="sdd">
                            <h2 class="mb-4 font-[500]  text-[40px] text-[#407CB4] hidden lg:block">2. Giao hàng </h2>
                        </div>
                    </div>
                    <form class="justify-center w-full mx-auto" method="post" action>
                        <div class="">
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstName" class="block mb-3 text-xl font-semibold ">Họ tên</label>
                                    <input name="firstName" type="text" placeholder="" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>

                                <div class="w-full lg:w-1/2">

                                    <label for="giaohang" class="block mb-3 text-xl font-semibold mt-4 lg:mt-0">Phương thức giao hàng</label>
                                    <select name="giaohang" id="giaohang" class="text-lg font-[400] w-full text-[#858585] border-2 py-3">
                                        <option value="">Giao hàng nhanh</option>
                                        <option value="">Giao hàng tiết kiệm</option>
                                        <option value="">Giao hàng nhanh</option>
                                        <option value="">Giao hàng nhanh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full ">
                                    <label for="Email" class="block mb-3 text-xl font-semibold ">Số điện thoại</label>
                                    <input name="Last Name" type="text" placeholder="" class="lg:w-[49.3%] w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">

                                    <label for="Address" class="block mb-3 text-xl font-semibold ">Địa chỉ</label>
                                    <div class="as flex lg:justify-between">

                                        <div class="ba lg:w-[49.3%] w-full ">
                                            <input name="Address" type="text" placeholder="" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        </div>
                                        <div class="lop text-left lg:w-[49.3%] ">
                                            <h2 class="mb-4 font-[500] hidden lg:block text-[40px] text-[#407CB4] ">3. Thanh toán</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="note" class="block mb-3 text-xl font-semibold ">Ghi chú</label>
                                    <input name="note" type="text" placeholder="" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>

                                <div class="w-full lg:w-1/2 ">

                                    <label for="tt" class="block mb-3 text-xl font-semibold mt-4 lg:mt-0">
                                        Phương thức thanh toán</label>
                                    <select name="tt" id="tt" class="text-lg font-[400] w-full text-[#858585] border-2 py-3">
                                        <option value="">Thanh toán khi nhận hàng</option>
                                        <option value="">Giao hàng tiết kiệm</option>
                                        <option value="">Giao hàng nhanh</option>
                                        <option value="">Giao hàng nhanh</option>
                                    </select>
                                </div>
                            </div>


                            <div class="mt-[50px]">
                                <button class="lg:w-1/5 px-6 text-[20px] text-[#fff] bg-[#4A4A4A] hover:opacity-80 py-[15px] rounded">Xác nhận đơn hàng</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>