<!-- sidebar -->
<div class="flex flex-col w-64 bg-gray-800">
  <div class="flex items-center justify-end h-16 bg-violet-950 p-6">
    <span class="text-white font-bold uppercase text-4xl">BSCS 3A</span>
  </div>
  <div class="flex flex-col flex-1 overflow-y-auto">
    <nav class="flex-1 px-2 py-4 bg-violet-950">
      <a route='/po/audit_logs/page=1' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <i class="ri-speed-up-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Dashboard</span>
        </span>

        <span>
          <i class="ri-arrow-right-s-line"></i>
        </span>
      </a>

      <a route='/po/suppliers' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <i class="ri-list-unordered" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Suppliers</span>
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

      <a route='/po/pondo/page=1' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <source >
          <i class="ri-wallet-3-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Pondo</span>
        </span>

        <span>
          <i class="ri-arrow-right-s-line"></i>
        </span>
      </a>   
 
      </a>
    </nav>
  </div>
</div>

<script  src="./../src/route.js"></script>