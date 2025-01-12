<?php
require_once "link.php";
require_once "data.php";
require_once "navbar.php";

// Fetch all products, brands, and categories
$productbyCat = getProductCategory($pdo);
$productbyBrand = getProductBrand($pdo);
$allProducts = getProduct($pdo);

// Pagination settings
$itemsPerPage = 12; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $itemsPerPage; // Offset for SQL query

$products = $allProducts; // Default to all products

if (!empty($_GET)) {
    $cat = $_GET['category'] ?? null;
    $brand = $_GET['brand'] ?? null;
    $search = isset($_GET['search']) ? trim($_GET['search']) : null;
    $minPrice = $_GET['minPrice'] ?? null;
    $maxPrice = $_GET['maxPrice'] ?? null;

    if ($search) {
        $products = getProductByName($pdo, $search);
    } else {
        // Apply all filters (category, brand, minPrice, maxPrice)
        $products = getProductByFilters($pdo, $cat, $brand, $minPrice, $maxPrice);
    }
}

// Get the total number of products (for pagination)
$totalProducts = count($products);
$totalPages = ceil($totalProducts / $itemsPerPage);

// Slice the products array to get only the items for the current page
$products = array_slice($products, $offset, $itemsPerPage);

// New function to handle multiple filters
function getProductByFilters($pdo, $cat = null, $brand = null, $minPrice = null, $maxPrice = null) {
    try {
        $sql = "SELECT * FROM products WHERE 1=1";
        $params = [];

        if ($cat) {
            $sql .= " AND category = :category";
            $params[':category'] = $cat;
        }

        if ($brand) {
            $sql .= " AND brand = :brand";
            $params[':brand'] = $brand;
        }

        if ($minPrice !== null && $minPrice !== '') {
            $sql .= " AND price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        }

        if ($maxPrice !== null && $maxPrice !== '') {
            $sql .= " AND price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <div class="product_show">
        <div class="product_texts">
            <h1>Gaming Products</h1>
            <p>Improve your gaming experience with our products.</p>
        </div>
        <div class="product_img">
            <img src="../img/product.png" alt="">
        </div>
    </div>
    <section class="py-10 relative">
        <div class="max-w-full px-4 md:px-8 text-center">
            <h1 class="text-black text-3xl">Products</h1>
            <svg class="my-7 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2"
                fill="none">
                <path d="M0 1H1216" stroke="#E5E7EB" />
            </svg>
            <div class="grid grid-cols-12">
                <!-- Filter -->
                <div class="col-span-12 md:col-span-3 w-full max-md:max-w-md max-md:mx-auto">
                    <form method="GET">
                        <div class="box rounded-xl border border-gray-300 bg-white p-6 w-full md:max-w-sm">
                            <div class="flex items-center justify-between w-full pb-3 border-b border-gray-200 mb-7">
                                <p class="font-medium text-base leading-7 text-black ">Filter Plans</p>
                            </div>
                            <!-- Price Filter -->
                            <label for="Offer" class="font-medium text-sm leading-6 text-gray-600 mb-1">Price</label>
                            <label for="minPrice" class="font-medium text-sm leading-6 text-gray-600 mb-1">Min Price</label>
                            <input type="number" id="minPrice" name="minPrice" placeholder="Min" class="text-black w-full p-2 border border-gray-300 rounded-md mb-3">
                            <label for="maxPrice" class="font-medium text-sm leading-6 text-gray-600 mb-1">Max Price</label>
                            <input type="number" id="maxPrice" name="maxPrice" placeholder="Max" class="text-black w-full p-2 border border-gray-300 rounded-md mb-3">
                            <hr class="text-black m-3">
                            <!-- Brand Filter -->
                            <p class="font-medium text-sm leading-6 text-black mb-3">Brand</p>
                            <div class="box flex flex-col gap-2">
                                <?php foreach ($productbyBrand as $brand): ?>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="brand" value="<?= $brand['brand'] ?>" class="w-5 h-5 appearance-none border border-gray-300 rounded-md mr-2">
                                        <label class="text-xs font-normal text-gray-600 leading-4 cursor-pointer"><?= $brand['brand'] ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <hr class="text-black mt-4">
                            <!-- Category Filter -->
                            <h2 class="text-black mt-2">Categories</h2>
                            <div class="box flex flex-col gap-2">
                                <?php foreach ($productbyCat as $category): ?>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="category" value="<?= $category['category'] ?>" class="w-5 h-5 appearance-none border border-gray-300 rounded-md mr-2">
                                        <label class="text-xs font-normal text-gray-600 leading-4 cursor-pointer"><?= $category['category'] ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="text-sm px-2 h-9 mt-6 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Filter</button>
                        </div>
                    </form>
                </div>
                <!-- Product Grid -->
                <div class="col-span-12 md:col-span-9">
                    <div class="font-[sans-serif] bg-gray-100">
                        <div class="p-4 mx-auto lg:max-w-7xl md:max-w-4xl sm:max-w-xl max-sm:max-w-sm">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-xl:gap-4 gap-6">
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                        <div class="bg-white rounded p-4 cursor-pointer hover:-translate-y-1 transition-all relative">
                                            <a href="productoverview.php?id=<?= $product['id'] ?>" class="mb-4">
                                                <img src="../img/<?= $product['img_url'] ?>" alt="<?= $product['name'] ?>" class="aspect-[33/35] w-full object-contain" />
                                            </a>
                                            <div>
                                                <div class="flex gap-2">
                                                    <h5 class="text-base font-bold text-black text-left"><?= $product['name'] ?></h5>
                                                    <h6 class="text-base text-gray-800 font-bold ml-auto">$<?= $product['price'] ?></h6>
                                                </div>
                                                <form action="addtowish.php" method="POST">
                                                <div class="flex justify-between">
                                                    <div class="flex">
                                                        <p class="text-black text-[15px] mt-2 font-bold">Color:</p>
                                                        <p class="text-black text-[15px] mt-2 ml-2"><?= $product['color'] ?></p>
                                                    </div>
                                                    <!-- Wishlist -->
                                                    <input type="hidden" name="id" value="<?=$product['id'] ?>">
                                                    <button type="submit"><i class="fa-solid fa-heart text-white bg-black p-2 border-black rounded-full"></i></button>
                                                </div>
                                                </form>
                                                <form action="addtocart.php" method="POST" class="mt-3">
                                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                                    <button type="submit" class="text-sm px-2 h-9 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-black">No products found for the selected filters.</p>
                                <?php endif; ?>
                            </div>
                            <!-- Pagination -->
                            <!-- Pagination -->
                            <div class="flex justify-center mt-48">
                                <?php if ($totalPages > 1): ?>
                                    <div class="pagination">
                                        <?php
                                        // Build the base query string with filters
                                        $queryParams = $_GET;
                                        unset($queryParams['page']); // Remove the current 'page' parameter if present
                                        $baseQueryString = http_build_query($queryParams);
                                        ?>

                                        <?php if ($page > 1): ?>
                                            <a href="?<?= $baseQueryString ?>&page=<?= $page - 1 ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md mr-2">Previous</a>
                                        <?php endif; ?>
            
                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <a href="?<?= $baseQueryString ?>&page=<?= $i ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md mr-2 <?= $i == $page ? 'bg-blue-800' : '' ?>"><?= $i ?></a>
                                        <?php endfor; ?>
            
                                        <?php if ($page < $totalPages): ?>
                                            <a href="?<?= $baseQueryString ?>&page=<?= $page + 1 ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md">Next</a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php
require_once "footer.php";
?>