<?php 
require_once "public/finance/functions/pondo/generalPondo.php";
$department = $_SESSION['user']['role'];
$allowance = pondoForEveryone($department)['total'];
$pondoExpense = getExpensesPondo($department, 'Cash on hand') + getExpensesPondo($department, 'Cash on bank');
$pondoBalance = $allowance - $pondoExpense;
?>

<div class=" col-span-1 border-2 rounded-xl drop-shadow-md">
    <div class="mx-5 my-5 py-3 px-3">
        <h1 class="text-3xl font-bold mb-3"><a route="/fin/funds/finance/page=1">Funds</a></h1>
        <div class = "border-2 drop-shadow-sm flex flex-nowrap justify-between px-20 py-3 items-center rounded-md mb-4">
            <div class = "flex items-center gap-2">
                <img src="../public\finance\img\Stack of Coins.png" alt="" class = "bg-radial-gradient max-w-full h-auto py-2 px-1 rounded-full"> 
                <h3 class = "text-xl text-[#6C6C6C]">Allowance</h3>
            </div>
            <div class = "text-2xl text-[#F8B721]">₱ <?= $allowance ?></div>
        </div>
        <div class = "border-2 drop-shadow-sm flex flex-nowrap justify-between px-20 py-3 items-center p-3 rounded-md mb-4">
            <div class = "flex items-center gap-2">
                <div class = "bg-radial-gradient p-2 rounded-full">
                    <svg width="1rem" height="1rem" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="20" height="20" fill="url(#pattern0_6056_47)"/>
                        <defs>
                            <pattern id="pattern0_6056_47" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_6056_47" transform="scale(0.0104167)"/>
                            </pattern>
                            <image id="image0_6056_47" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEYElEQVR4nO2czY4VRRiGGxaMKKgRwcSRuHThwl8uQMMS/LsJWYhewgT36iigbhS2EBMThfFcgUoiMN6ARkXjHzjOjIwLzWOK82FOTrq6q7pPdfX0eZ+kk8mcU/V9/b7dVd31c4pCCCGEEEIIIYQQQogKgPuBE8AVYJP5ZRO4bFrs6+SiAZ4H1nKfeQ/5A3iuC/H/zX2mPcZpczRls6Mrv54bSZoja+dEGEspDLgaGFzA5RQGbEQo+2cxMIg7//UUCcTwRTEwgEsxAqRIIIZXioEBvLpdDHB9xa5iYAALwGrfDXDiL848uAE8ALwGXASuAX8DW8AP9j93lR4oEgE8FGpCiuA+XOf0uWt2Ul35wL3Asoldh/vOW8A9Ce+E466fq+qYUwTuJtAUwFPAd8TzLfBEkZhBGwA8ClynOe7N/bHEOQ7TAGDR2vm2XEvcLw3WgI+YHecS5jk8A4DDNSOOp6xvuMuOp4HTNSO1zybKdZAGfOYJ948bEq8o96J9p4wLiXIdlgGM236fiCcCyr9eYd6DCfIdnAHHPKF+BXYHlL8T+M1Tx8tzYQBw0DrRdTs+Bh4JjHPGE+rtiFzf8dTxQWD54Px7Z4Alf90zU3QwIM7XnlDBU31ubtZTx9WAslH599GAqsfH8wFxfvKUrTVvoo6HPXX8GFA2Kv9QXVoTGshu2cYTNfjHe2rb/4k6dnvquBlQNir/UF1aExqo5gTWtrkBa011aU1oIOuwGr+Rkr8Jiso/VJfWhAZyTwvWYU3zuxtPD4izmrATvhJQNir/3hkw8SRx3rWZdpwLEd8BfNiTx9Cg/HtpQMs4xzyh9CLWkQGLGoro92DcCxXlXtJgXDfD0adtCHoPsBc4BLxbMxz9TKJch3cHODQhk9+ARU1JZjRgRpPybtOEJuXbADxpS0xi+QZ4vIP8urkwa/ZJfWmr0hZmHri4FftuW2wVsjDrJvCG65wT5XKHrc67VLU/LkXgEFZD33gb5nDAVqVdAL43Q7bs709tdd7+xEsTffMVvTDgtglJ7oSc2JUfJH5uAxzHi4HBuNkJJkUCMWiDxqypmaiYZqMYGOTeoqVNevk36WmbauZtqvvszVJU42bT7pu5ARNTffqpAj9OmyNJxJ8w4ahnznTeuZFc/KnmaAn4KvLpaGismwZLyZodIYQQpQA7yz8RSWG89vOUbUN1x8mYtaOivQHLJU8kb0rYjgB+LjHgFxnQnQGlyAAZMB/gIXdecwMyQAbMNegO6EzoncCOpgZYeb0tNxB+L3DWFl39ZVuOFkINsJ8VO2llt2z3/Z7oROYVxuJPs3LbhCoDTHz33WnO5D6vbQHjZsO3BvSWCT4DKsTH6lRzFGjAZoXIKw0/2yjrT0TcNtM2LJfFEiXUNCVN+L//EIEAu4BPZiD+yK1slvB5TBhJ/HwmjCR+PhNGEj+fCSOJn8+EkcTP94i6okfNbjfMvW9bUt2A23u68jMA7NDwghBCCCGEEEUs/wELgm+kinwczwAAAABJRU5ErkJggg=="/>
                        </defs>
                    </svg>
                </div>
                <!-- <img src="../public/finance/img/RequestMoney.png" alt="" class="bg-radial-gradient max-w-full h-[1.25rem] py-2 px-1 rounded-full">  --> 
                <h3 class="text-xl text-[#6C6C6C]">Expense</h3>
            </div>
            <div class = "text-2xl text-[#F8B721]">₱ <?= $pondoExpense ?></div>
        </div>
        <div class = "border-2 drop-shadow-sm flex flex-nowrap justify-between px-20 py-3 items-center p-3 rounded-md mb-4">
            <div class = "flex items-center gap-2">
                <img src="../public\finance\img\Cash in Hand.png" alt="" class = "bg-radial-gradient max-w-full h-auto py-2 px-1 rounded-full"> 
                <h3 class = "text-xl text-[#6C6C6C]">Remaining</h3>
            </div>
            <div class = "text-2xl text-[#F8B721]">₱ <?= $pondoBalance ?></div>
        </div>
    </div>
</div>