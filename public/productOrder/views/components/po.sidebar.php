<!-- sidebar -->
<div class="flex flex-col w-64 bg-gray-800">
  <div class="flex items-center justify-end h-16 bg-violet-950 p-6">
    <span onclick="location.href='/Master'" class="text-white font-bold uppercase text-4xl">BSCS 3A</span>
  </div>
  <div class="flex flex-col flex-1 overflow-y-auto">
    <nav class="flex-1 px-2 py-4 bg-violet-950">
      <a route='/po/dashboard' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <i class="ri-speed-up-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Dashboard</span>
        </span>

        <span>
          <i class="ri-arrow-right-s-line"></i>
        </span>
      </a>
      
      <a route='/po/orderDetail' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <i class="ri-survey-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Order Details</span>
        </span>

        <span>
          <i class="ri-arrow-right-s-line"></i>
        </span>
      </a>

      <a route='/po/transactionHistory' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <i class="ri-history-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Transaction History</span>
        </span>

        <span>
          <i class="ri-arrow-right-s-line"></i>
        </span>
      </a>

      <a route='/po/requestHistory' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <i class="ri-history-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Request History</span>
        </span>

        <span>
          <i class="ri-arrow-right-s-line"></i>
        </span>
      </a>

      <!-- testing area -->
      <a
        route='/po/test'
        class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
        <span class="flex items-center">
          <span class="mx-4 font-normal">Tester</span>
        </span>

        <span>
          <svg
            class="h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="m8.25 4.5 7.5 7.5-7.5 7.5" />
          </svg>
        </span>
      </a>
    </nav>
  </div>
</div>

<script  src="./../src/route.js"></script>