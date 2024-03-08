 <!-- start: Sidebar -->
 <div class="fixed left-0 top-0 w-64 h-full bg-red-900 p-4 z-50 sidebar-menu transition-transform">
  <a href="/Master" class="flex items-center pb-4 border-b border-b-white ">
    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
    <span class="text-xl font-bold text-white ml-28">BSCS 3A</span>
</a>  
<!-- Dashboard -->
<ul class="mt-4">
  <li class="mb-1 group active">
    <a href="/Master/hr/dashboard" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-dashboard-3-line mr-3 text-lg"></i>
      <span class="text-sm">Dashboard</span>
    </a>
  </li>
<!-- Calendar -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-line-chart-line mr-3 text-lg"></i>
    <span class="text-sm">Calendar</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Product Order -> Employees -->
  <li class="mb-1 group">
    <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
      <i class="ri-shopping-cart-line mr-3 text-lg"></i>
      <span class="text-sm">Employees</span>
      <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
    </a>
<!-- View Order -> View Employees -->
<ul class="pl-7 mt-2 hidden group-[.selected]:block">
  <li class="mb-4">
    <a href="/Master/hr/employees" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">View List
        <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
  <!-- Add Employees -->
  <li class="mb-4">
    <a href="/Master/hr/add" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Add New
        <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
<!-- Edit Order -> Update Employees-->
  <li class="mb-4">
    <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Update List
        <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
</ul>
  </li>
<!-- Delivery -> Departments -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
    <i class="ri-truck-line mr-3 text-lg"></i>
    <span class="text-sm">Departments</span>
    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
  </a>
  <ul class="pl-7 mt-2 hidden group-[.selected]:block">
    <!-- To Pay -> Inventory -->
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Inventory
    <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
    <!-- To Ship -> Sales -->
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Sales
    <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
    <!-- To Receive -> Finance -->
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Finance
    <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
    <!-- Human Resources -->
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Human Resources
    <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
    <!-- Delivery -->
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Delivery
    <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
  </ul>
</li>
<!-- Inventory -> Leave Requests -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-survey-line mr-3 text-lg"></i>
    <span class="text-sm">Leave Requests</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Sales -> Payroll -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-line-chart-line mr-3 text-lg"></i>
    <span class="text-sm">Payroll</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
</ul>
</div>
<!-- end: Sidebar -->
<!-- <script src="./../js/script.js"></script> -->
<script type="module" src="../public/humanResources/js/script.js"></script>