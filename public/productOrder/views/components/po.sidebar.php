<!-- sidebar -->
<div class="flex flex-col w-64 bg-violet-950">
    <div route='/' class="flex items-center p-4 border-b border-b-white">
        <div class="w-12 h-12 rounded bg-cover bg-[url('../public/finance/img/logo_reports.png')]">
        </div>
        <span class="cursor-pointer text-4xl font-russo text-white ml-3">BSCS 3A</span>
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

      <a route='/po/viewRequest' class="flex justify-between items-center px-4 py-2 hover:bg-slate-400 rounded-xl text-white cursor-pointer">
        <span class="flex items-center">
          <source >
          <i class="ri-pencil-line" style="font-size: 1.2em;"></i>
          <span class="mx-4 text-sm font-medium">Requested Orders</span>
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