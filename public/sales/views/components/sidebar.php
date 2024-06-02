 <!-- Start: Sidebar -->

 <div id="sidebar-menu" class="fixed bg-green-900 left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform" x-show="sidebarOpen">

     <div route='/' class="flex items-center pb-4 pb-4 border-b border-b-white">
         <div class="w-12 h-12 rounded bg-cover bg-[url('../public/finance/img/logo_reports.png')]">

         </div>

         <span class="cursor-pointer text-4xl font-russo text-white ml-3">BSCS 3A</span>
     </div>

     <ul class="mt-3">

         <li class="mb-1 hover:bg-slate-400 rounded-xl">
             <a route='/sls/Dashboard' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                 <i class="ri-speed-up-line mr-3 text-lg"></i>
                 <span class="text-sm font-medium">Dashboard</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </a>
         </li>

         <li class="mb-1 hover:bg-slate-400 rounded-xl">
             <a route='/sls/POS' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                 <i class="ri-shopping-cart-fill mr-3 text-lg"></i>
                 <span class="text-sm font-medium">Point of Sale(POS)</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </a>
         </li>

         <li class="mb-1 hover:bg-slate-400 rounded-xl">
             <a route='/sls/Product-Catalog' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                 <i class="ri-book-fill mr-3 text-lg"></i>
                 <span class="text-sm font-medium">Product Catalog</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </a>
         </li>

         <!-- <li class="mb-1 hover:bg-slate-400 rounded-xl">
        <a route='/sls/TEST' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
            <i class="ri-book-fill mr-3 text-lg"></i>
            <span class="text-sm font-medium">Product Catalog(Test)</span>
            <i class="ri-arrow-down-s-line ml-auto"></i>
        </a>
    </li> -->

         <script>
             document.addEventListener('DOMContentLoaded', function() {
                 document.querySelector('.toggle-transactions').addEventListener('click', function() {
                     document.getElementById('transactions').classList.toggle('hidden');
                 });

                 document.querySelector('.toggle-ledger').addEventListener('click', function() {
                     document.getElementById('transactions').classList.add('hidden');
                 });

                 document.querySelector('.toggle-request').addEventListener('click', function() {
                     document.getElementById('transactions').classList.add('hidden');
                 });
             });
         </script>

         <li class="mb-1 rounded-xl">
             <button id="transactions-button" class="toggle-transactions flex items-center py-2 px-4 w-full text-white hover:text-black focus:text-black focus:bg-slate-400  hover:bg-slate-400 rounded-xl">
                 <i class="ri-file-edit-fill mr-3 text-lg"></i>
                 <span class="text-sm font-medium">Transactions</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </button>
             <ul id="transactions" class="ml-8 my-2 hidden">
                 <li>
                     <a route='/sls/Transaction-History' class="flex flex-row gap-2 items-center py-2 px-4 text-white hover:text-black hover:bg-slate-400 rounded-full transition-colors active:bg-slate-400">
                         <i class="ri-history-fill"></i>
                         <span class="text-sm font-medium">History</span>

                     </a>
                 </li>
                 <li>
                     <a route='/sls/Returns' class="flex flex-row gap-2 items-center py-2 px-4 text-white hover:text-black hover:bg-slate-400 rounded-full transition-colors active:bg-slate-400">
                         <i class="ri-history-fill"></i>
                         <span class="text-sm font-medium">Returns</span>

                     </a>
                 </li>
                 <li>
                     <a route="/sls/Revenue" class="flex flex-row gap-2 items-center py-2 px-4 text-white  hover:text-black hover:bg-slate-400 rounded-full transition-colors">
                         <i class="ri-money-dollar-circle-line"></i>
                         <span class="text-sm font-medium">Revenue</span>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="mb-1 hover:bg-slate-400 rounded-xl">
             <a route='/sls/Audit-Logs/page=1' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                 <i class="ri-history-fill mr-3 text-lg"></i>
                 <span class="text-sm font-medium">Audit Logs</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </a>
         </li>

         <li class="mb-1 hover:bg-slate-400 rounded-xl">
             <a route='/sls/Sales-Management' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                 <i class="ri-bar-chart-fill mr-3 text-lg"></i>
                 <span class="text-sm font-medium">Sales Management</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </a>
         </li>

         <li class="mb-1 hover:bg-slate-400 rounded-xl">
             <a route='/sls/funds/Sales/page=1' class="flex items-center py-2 px-4 text-white hover:text-black cursor-pointer">
                 <i class="ri-pie-chart-fill mr-3 text-lg"></i> <!-- Changed icon here -->
                 <span class="text-sm font-medium">Department Funds</span>
                 <i class="ri-arrow-down-s-line ml-auto"></i>
             </a>
         </li>


 </div>

 <div class="fixed top-0 left-0 w-full h-full z-40 md:hidden sidebar-overlay"></div>
 <!-- End: Sidebar -->