<?php
$router = [];
// khởi tạo định tuyến cho các page
function router_on($path, $callback)
{
    global $router;
    $router[$path] = $callback;
}

// chạy router
function router_resolve()
{
    global $router;
    $requestURI = parse_url($_SERVER['REQUEST_URI']);
    $uri  = $requestURI['path'];
    // khai báo biến xác định xem đường dẫn có tồn tại hay ko, nếu ko có -> false
    $found = false;

    foreach ($router as $path => $callback) {
        // nếu đường dẫn khác uri path thì bỏ qua
        if ($path !== $uri)
            continue;
        $found = true;
        // chạy callback để show page
        $callback();
    }
    if ($found == false) {
        $fileNotFound  = $router['/404'];
        return $fileNotFound();
    }
}
