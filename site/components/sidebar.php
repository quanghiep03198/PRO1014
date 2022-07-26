    <aside class="sticky top-0 h-screen border-r z-50">
        <!-- top -->
        <div class="bg-[color:var(--primary-color)] text-white p-5">
            <i class="bi bi-list"></i>
            <span class="indent-2">Danh mục sản phẩm</span>
        </div>
        <!-- search product input -->
        <form action="?page=product" method="post">
            <div class="form-control rounded-none">
                <div class="input-group justify-between px-3 border">
                    <input type="text" placeholder="Tìm kiếm sản phẩm..." class="input focus:outline-none" />
                    <button type="submit" name="find-product"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
        <!-- sort product by category & manufacturer-->
        <div tabindex="0" class="px-5 py-3 max-w-full">
            <a href=<?php echo "?page=product" ?>>Tất cả sản phẩm</a>
        </div>
        <?php foreach (get_all_categories() as $cate) :  if ($cate['id'] == 5) continue  ?>
            <div class="dropdown dropdown-right w-full z-50">
                <div tabindex="0" class="px-5 py-3 max-w-full hover:cursor-pointer"><?php echo $cate['name'] ?></div>
                <ul class="dropdown-content z-[9999] w-full menu p-2 shadow bg-gray-100">
                    <?php foreach (get_all_manufacturer() as $manu) :   ?>
                        <li>
                            <a href=<?php echo "?page=product&cate={$cate['id']}&manu={$manu['id']}" ?>><?= $manu['name'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endforeach ?>
        <?php $lastCate = get_all_categories()[4] ?>
        <div tabindex="0" class="px-5 py-3 max-w-full">
            <a href=<?php echo "?page=product&cate={$lastCate['id']}" ?>>
                <?php echo $cate['name'] ?></a>
        </div>
    </aside>