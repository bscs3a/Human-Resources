<!-- Start: Sidebar -->

<div class="bg-sidebar w-1/5 min-h-screen p-4 z-50 sidebar-menu transition-transform" id = "sidebar">

    <div route='/' class="flex items-center pb-4 pb-4 border-b border-b-white">
        <div class="w-12 h-12 rounded bg-cover bg-[url('../public/finance/img/logo_reports.png')]">

        </div>

        <span class="cursor-pointer text-4xl font-russo text-white ml-3">BSCS 3A</span>
    </div>

    <ul class="mt-3">

        <li class="mb-1 hover:bg-slate-400 rounded-xl">
            <a route="/fin/dashboard" class="flex items-center py-2 px-4 text-white hover:text-black">
                <i class="ri-speed-up-line mr-3 text-lg"></i>
                <span class="text-sm font-medium">Dashboard</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </a>
        </li>
        <li class="mb-1">
            <button
                class="toggle-ledger flex items-center py-2 px-4 w-full text-white hover:bg-slate-400 hover:text-black rounded-xl">
                <i class="ri-survey-fill mr-3 text-lg"></i>
                <span class="text-sm font-medium">Ledger</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </button>
            <ul id="ledger" class="ml-8 hidden">
                <li>
                    <a route='/fin/ledger/page=1' class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">General</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
                <li>
                    <a route='/fin/ledger/accounts/investors'
                        class="flex items-center py-2 px-4 text-white hover:text-black">

                        <span class="text-sm font-medium">Payables</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li class="mb-1">
            <a route="/fin/funds/finance/page=1" class="flex items-center py-2 px-4 text-white hover:text-black">
            <svg width="20" height="20" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="38" height="38" fill="url(#pattern0_5301_124)"/>
                <defs>
                <pattern id="pattern0_5301_124" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_5301_124" transform="scale(0.0104167)"/>
                </pattern>
                <image id="image0_5301_124" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAELklEQVR4nO2dO2gVQRSGN1FRLARjJDEaAkZMFCsRxFehFpJGYyHBQjvrFFoJvi2MJoIggqBBrFQC8QWCgoiIoiikiVpoVHzHV4wgah6fDBlINNnduTd378zdOR9sc7lnZs5/9p7Zndk9NwgEQRAEQRAEQRAcBpgKbAXOAB3AG3106M+2qO/YHmfqACYDe4BvxPMV2KVsbI87FQCLgadkzhNla3v8BQ1D6eYn2fMLaASKbPtSUADTgHPkjotAiW2/CgJgCfCc3PMKWG7bP2cBioAdwB8DMW8B9UC1Pur1Z3GotrdLShotfilw1UDAHqAhIogNwHeDdlRfpYmfVYUAsBR4YSDaI2CeQXtVwD2D9l4DqwLPU06jYco5mcl1PTAJOAQMxrTbD+wFigOfAGYC1wxTzqZx9LMe+GLQz01gVuADwGrgrYEoD4C5OeivErhj0N9HYF2QVoAJwH5gIEaIQaAJmBgjahvQq492oCYmJTUZpKQBPcYJQZoAZhteJnYDdTFtVYakFbUGVBljW6f7iEONdXaQBjJ0usKgPXXmh3EhnyeD0+if/eFc/+wZSjlhfE8oHU4KCgl9LX7X4Cx7B6zJsO2oAPRk2NZa4L3BOJUvVUEhoJcFVD6O4zpQlkX7asIN43wW7ZXpscShfNoQOL5pcswg5fQBO7O9+QFqQgL8GZiTZZvFekxqbFEMah/d2uzRC2IPDW//V+agv0o14ep1H3Wcz1b8/9pdpccYh/K1OnABYKPhVuGNbFJOvgFmAFcM/FFz0WabA52if45x9BXaegvD61S/Dfw7m/cHAXQeVk8ipHoThKHNoWcGfnYCi/I1KPXoxw9ftgEx3x5Ve9fbkr6xajUYiO+0JnLjBrTY9qyAaE4iAOo6WzDjkwQghQGQFGTOkaQm4WbDpWVf6VbiR20mCYIgCEIihM1MPtlYxWVhkAD4YWMVl4VBAuCHjVVcFgYJgB82VnFZGCQAfthYxWVhkAD4YWMVl4VBAuCHjVVcFgYJgB82VnFZGCQAfthYxWVhkAD4YWMVl4VBAuCHjVVcFgYJgB82VnFZGCQAfthYxWVhSGMAgPm6pPBtwyJMaeGt9nm30sDWy8yndc013+kHTuXtjVBggeG7s77xDKhNWvxy/fK1MDYvEy3HAFwO6VgYpj0p8VeO6ESIJvflGYATEZNQs64fka5qg+HlzpSvRyMuQo4HuUb/IcJY7As8BTgQoklnEp2FFeiIrXSYVoCKEE16k+gsrFheOuprZl+5a9zFA007eywpyG4KipqEWzybhGttTMIrQjoTRrMs5wHQQbg0RmfCv7QlIv6IWV+WIqKXIsoTC4AOwkKgK2IQvtKlFioTFX9EEEp0uca44tc+0K//x3J6XsQfY2n6oP63iw/4wwfgvr4MTXYJWhAEQRAEQRAEQRCCNPEXmvYVDg+V8ZkAAAAASUVORK5CYII="/>
                </defs>
            </svg>

                <span class="ms-3 text-sm font-medium">Funds per Department</span>
            </a>
        </li>
        <li class="mb-1">
            <a route="/fin/logs/page=1" class="flex items-center py-2 px-4 text-white hover:text-black">
            <svg width="20" height="20" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="36" height="36" fill="url(#pattern0_5336_86)"/>
                <defs>
                <pattern id="pattern0_5336_86" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_5336_86" transform="scale(0.0104167)"/>
                </pattern>
                <image id="image0_5336_86" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADLklEQVR4nO2dS24UMRCGh+xg2ITHgpyCTQignCBchvC6BBJvKZPALeA2vAJhARtAYiIBAn3IwisY98x4bFfb/X9SS1G37HLVP3a1nRrNaCSEEEIIIUQ7AGuyYQBwEngCfPXXY3dPNgoBPOB/7slGIYCPMwT4JBuFIIBsFEICGCMBjJEAxkgAYySAMRLAGAlgjARoWABgDbgasuGfrdXyQcpCjoEDp4A7wBHzeQ/cdm365kcRUg8cuAy8YXleA1t98aMYKQcObANT4nFtt639KEqqgQPrwDtW5wNw1sqPmgV4RjoOrPwoToqBAxvA90BXP4H7wCZwzl+b/p57NgvX14XSftQswI1AN7+AnY52O8DvQNvd0n7ULMCLQDd7C7TdD7R9XtqPmgU4DHQz97USuBJo+7a0HzULcBzoZu7mChgH2h6X9mOoApwOtP1W2o+aBTgMdKMlyDgJTxZoexBoqyS8hAC7ka+h1zpeQ68v8RkY/BK00bER+wHcBS76hDv2f7t72oilWIIcwFPSsT8y8qNmAdZ1GGcogEPH0RGknrrAJeAVy/PSte2LH8XIMXD+fufg1oJLkttD3Fz1OwkSIPxP+dBZD/7ZiVECJIBxcCRABxJgAMGhgI0stBIcJEAYCTCA4KAZEEYCDCA41DYDWqtcphYBWq1cpgYBWq5cpu8CtH5UTJ8FcNXGCy458zjqW+VyyVy2yiCbq1zGIJfFDrS5ymWMclnsYJuqXMYwl0XRUuUyxrksipbKBjHOZVF0FM6OV6hcni45hpnUlsui6FgvxytULk8NBDDPZYNeguhBLouilcplevBBiqKVymV6kMuiWCB5PfTVbOf9teXv9WojRg9yWTQtVC5T6xKUYQNzxkgA81w26ONoepDLVqbmymV6kMuSUHPlMsa5LCk1Vi5jnMuykCo4pWxUdxzdmgCWuSwLNQpglcuyUKsAFrksC7ULUNJGFloJDhIgjAQYQHDQDAgjAQYQHDQDwkiAAQQHzYAwEqA7OF9mBOjzKCE0YiML/pdU/+WRbBTCH2pNfNmHu/Yy/ZztpHYbWXEHVrkPrWjEhhBCCCGEEKOy/AGqgULxJ4p8PwAAAABJRU5ErkJggg=="/>
                </defs>
            </svg>
                <span class="ms-3 text-sm font-medium">Audit Logs</span>
            </a>
        </li>


</div>

<!-- button dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelector('.toggle-ledger').addEventListener('click', function () {
            document.getElementById('ledger').classList.toggle('hidden');
            // document.getElementById('reports-button').classList.toggle('bg-slate-400');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
        });
    });

</script>