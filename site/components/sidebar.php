<aside class="sticky top-0 sm:h-auto lg:h-screen lg:border-r z-10">
    <!-- top -->
    <div class="sm:dropdown md:dropdown w-full sm:shadow-lg md:shadow-lg ">
        <div class="bg-[color:var(--primary-color)] text-white p-5" tabindex="0">
            <i class="bi bi-list"></i>
            <span class="indent-2">Danh mục sản phẩm</span>
        </div>
        <div class="dropdown-content bg-white  w-full" tabindex="0">
            <!-- search product input -->
            <form action="?page=product" method="GET">
                <div class="form-control rounded-none">
                    <div class="input-group justify-between px-3 border-b">
                        <input type="hidden" name="page" value="product">
                        <input type="text" name="kw" placeholder="Tìm kiếm sản phẩm..." class="input focus:outline-none bg-white" />
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- sort product by category & manufacturer-->
            <div class="collapse-title max-w-full text-xl border-b">
                <a href=<?php echo "?page=product" ?>>Tất cả sản phẩm</a>
            </div>
            <?php foreach (get_all_categories() as $cate) :   if (strtolower($cate['name'])  == 'thẻ psn')  continue; ?>
                <div tabindex="0" class="collapse collapse-arrow border-b bg-white ">
                    <div class="collapse-title text-xl">
                        <?php echo $cate['name'] ?>
                    </div>
                    <div class="collapse-content">
                        <ul class="w-full menu">
                            <?php foreach (get_all_manufacturer() as $manu) :   ?>
                                <li>
                                    <a href=<?php echo "?page=product&cate={$cate['id']}&manu={$manu['id']}" ?>><?= $manu['name'] ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            <?php

            endforeach ?>
            <?php if (in_array(strStandardize($cate['name']), ['thẻ psn'])) ?>
            <div class="collapse-title max-w-full text-xl border-b">
                <a href=<?php echo "?page=product&cate={$cate['id']}" ?>><?php echo $cate['name'] ?></a>
            </div>
        </div>
    </div>
</aside>
<script>
    const collapseContent = document.querySelectorAll('.collapse-content')
    collapseContent.forEach(title => title.onmousedown = (event) => {
        event.preventDefault()
    })
</script>