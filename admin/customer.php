<?php
require_once "sidebar.php";
require_once "link.php";
require_once "data.php";
require_once "../database/PDO.php";

// Fetch all customers
$allCustomers = getCustomer($pdo);

// Check if there's a search query
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Filter customers based on the search query (name or email)
if (!empty($searchQuery)) {
    $allCustomers = array_filter($allCustomers, function($customer) use ($searchQuery) {
        // Match search query against name or email
        return stripos($customer['name'], $searchQuery) !== false || 
               stripos($customer['email'], $searchQuery) !== false;
    });
}
?>






<div class="p-4 sm:ml-64">
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
<form class="max-w-md mx-auto" method="GET">   
         <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
         <div class="relative">
             <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                 <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                 </svg>
             </div>
             <input type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
             <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
         </div>
     </form>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Customer Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allCustomers as $customer) :?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?=$customer['CusId'] ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?=$customer['name'] ?>
                </th>
                <td class="px-6 py-4">
                <?=$customer['email'] ?>
                </td>
                <td class="px-6 py-4">
                <?=$customer['address'] ?>
                </td>
                <td class="flex items-center gap-2 p-3">
                    <a href="customerupdate.php?id=<?=$customer['CusId']?>" class="text-black p-4 rounded-full bg-green-600 hover:bg-green-700"><i class="fa-solid fa-pen"></i></a>
                    <form action="customerdelete.php" class="mt-3" method="POST">
                    <input type="hidden" value="<?=$customer['CusId']?>" name="id">
                    <button href="" class="text-black p-4 rounded-full bg-red-600 hover:bg-red-700"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</div>


