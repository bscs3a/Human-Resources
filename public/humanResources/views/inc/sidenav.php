<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./output.css" rel="stylesheet">
</head>
<body>
   <div class="fixed left-0 top-0 w-64 h-full bg-red-900 p-4 z-50 sidebar-menu transition-transform">
  <a route="/" class="flex items-center pb-4 border-b border-b-white ">
    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
    <span class="text-xl font-bold text-white ml-28">BSCS 3A</span>
</a>  
<!-- Dashboard -->
<ul class="mt-4">
  <li class="mb-1 group">
    <a route="/hr/dashboard" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-dashboard-3-line mr-3 text-lg"></i>
      <span class="text-sm">Dashboard</span>
      <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
<!-- Calendar -->
<li class="mb-1 group">
  <a route="/hr/schedule" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-calendar-2-line mr-3 text-lg"></i>
    <span class="text-sm">Schedule</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Applicants -->
<li class="mb-1 group">
  <a route="/hr/applicants" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-file-user-line mr-3 text-lg"></i>
    <span class="text-sm">Applicants</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Employees -->
  <li class="mb-1 group">
    <a route="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
      <i class="ri-team-line mr-3 text-lg"></i>
      <span class="text-sm">Employees</span>
      <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
    </a>
<!-- All Employees -->
<ul class="pl-7 mt-2 hidden group-[.selected]:block">
  <li class="mb-4">
  <a route="/hr/employees" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All Employees
        <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
  <!-- Departments -->
  <li class="mb-4">
    <a route="/hr/employees/departments/product-order" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Departments
        <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
</ul>
  </li>
<!-- Leave Requests -->
<li class="mb-1 group">
  <a route="/hr/leave-requests" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-briefcase-line mr-3 text-lg"></i>
    <span class="text-sm">Leave Requests</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Payroll -->
<li class="mb-1 group">
  <a route="/hr/payroll" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-line-chart-line mr-3 text-lg"></i>
    <span class="text-sm">Payroll</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Daily Time Record -->
<li class="mb-1 group">
  <a route="/hr/dtr" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-calendar-schedule-line mr-3 text-lg"></i>
    <span class="text-sm">Daily Time Record</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>   
  </a>
</li>
</ul>
</div>
<!-- end: Sidebar -->
<!-- <script src="./../js/script.js"></script> -->
<!-- <script type="module" src="../public/humanResources/js/script.js"></script> -->

<!-- start:dropdown -->
<script>
    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(item){
        item.addEventListener('click', function(e){
            e.preventDefault()
            const parent = item.closest('.group')
            if(parent.classList.contains('selected')){
                parent.classList.remove('selected')    
            } else {
                document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(i){
                    i.closest('.group').classList.remove('selected')
                })
                parent.classList.add('selected')   
            }
        })
    })
    </script>
<!-- end:dropdown -->
</body>
</html>
